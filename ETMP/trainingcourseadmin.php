<?php include('admindata.php')?>
<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <?php include "navigationadmin.php";?>
    </header>
    <section>
        <h1>Training Course</h1>
        <div class="line">
            <!-- Button trigger modal -->
            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+ Add course</button>
            <!-- Modal -->
            <div class="modal fade design" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog box">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title" id="staticBackdropLabel">Add New Training Course Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form id="addCourseForm" method="post" enctype="multipart/form-data" action = "trainingdb.php" >
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="addIMG" class="required">Cover Image</label>
                        <span class="labelcolons">:</span>
                        <input type="file" id="addIMG" name="addIMG"/>
                      </div>
                      <div class="form-group">
                        <label for="addNAME" class="required">Course Name</label>
                        <span class="labelcolons">:</span>
                        <input type="text" id="addNAME" name="addNAME" placeholder="course name" maxlength="50"/>
                      </div>
                      <div class="form-group">
                        <label for="addCAT" class="required">Category</label>
                        <span class="labelcolons">:</span>
                        <select name="addCAT" id="addCAT">
                            <option> Business </option>    
                            <option> Customer Services </option> 
                            <option> Environment </option>
                            <option> Healthcare </option>
                            <option> Science </option>         
                            <option> Technology </option>         
                            <option> Animals </option>         
                            <option> Others </option>
                          </select>
                      </div>
                      <div class="form-group">
                        <label for="addTemp" class="required">Template</label>
                        <span class="labelcolons">:</span>
                        <input type="text" id="addTemp" name="addTemp" placeholder="Template Link"/>
                      </div>
					  <div class="form-group">
                        <label for="addBasePrice" class="required">Base Price</label>
                        <span class="labelcolons">:</span>
                        <input type="text" id="addBasePrice" name="addBasePrice" placeholder="$ 00.00"/>
                      </div>
					  <div class="form-group">
                        <label for="addDailyPrice" class="required">Daily Price</label>
                        <span class="labelcolons">:</span>
                        <input type="text" id="addDailyPrice" name="addDailyPrice" placeholder="$ 00.00"/>
                      </div>
                      <div class="form-group">
                        <div class="hLine1"></div>
                        <label class="labelling required" for="addDESC">Description</label>
                        <textarea id="addDESC" name="addDESC" rows="4" cols="20" placeholder="Enter short description and occupation that suits the course/program"></textarea>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" name="addNEW" class="btn btn-primary">Add</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
            <form method="post" action="viewtrainingdata.php">
            <input type="submit" name="confirm" value="Edit course"/>
            </form>
            <!-- Button trigger modal -->
            <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">- Delete course</button>
            <!-- Modal -->
            <div class="modal fade design" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
              <div class="modal-dialog box">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title" id="staticBackdropLabel">Delete Existing Training Course</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <form id="deleteCourseForm" method="post" action = "trainingdb.php">
                    <div class="modal-body left">
                      <div class="form-group">
                        <label for="addCAT">Program Name</label>
                        <span class="labelcolons">:</span>
                        <select name="selection" id="selection">
                            <!-- need to load from database -->
                            <?php
                                $connection = mysqli_connect('sql6.freesqldatabase.com','sql6410152','BpVpCG11xT','sql6410152');
                                $db = mysqli_select_db($connection,'sql6405286');

                                $query = " SELECT * FROM training ";
                                $query_run = mysqli_query($connection,$query);

                                while($row = mysqli_fetch_array($query_run)){
                                    ?>
                                    <option><?php echo $row['tname']; ?></option>
                                    <?php
                                }
                          ?>
                          </select>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                      <button type="submit" name="deleteNOW" class="btn btn-danger">Delete</button>
                  </div>
                  </form>
                </div>
              </div>
            </div>
        </div>
        
        <h2>Course Listing</h2>
        <?php
            $connection = mysqli_connect('sql6.freesqldatabase.com','sql6410152','BpVpCG11xT','sql6410152');
            $db = mysqli_select_db($connection,'sql6405286');
            
            $query = " SELECT * FROM training ";
            $query_run = mysqli_query($connection,$query);
        
            while($row = mysqli_fetch_array($query_run)){
                ?>
                <div class="card">
                  <?php echo '<img src="data:image;base64,'.base64_encode($row['pic']).'" alt="Cover" >'; ?>
                  <div class="text">
                    <p><b><?php echo $row['tname']; ?></b></p> 
                    <div class="scroll">
                        <p><?php echo $row['tdesc']; ?></p> 
                        <p>Category: <?php echo $row['category']; ?></p>
                        <p><a href="<?php echo $row['tTemplate']; ?>" target="_blank"><?php echo $row['tTemplate']; ?></a></p>
                    </div> 
                  </div>
                </div>
                <?php
            }
        ?>
    <p>- End of the list -</p>
    </section>
    <section>
        <?php include "chatadmin.php";?>
    </section>
  <?php include "footer.php"; ?>
  
</body>
  
</html>