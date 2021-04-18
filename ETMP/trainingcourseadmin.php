<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <?php include "navigationadmin.php";?>
    </header>
    <section>
        <h1>Training Course</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+ Add new course</button>
        <!-- Modal -->
        <div class="modal fade design" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog box">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title" id="staticBackdropLabel">Add New Training Course Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form id="addCourseForm" method="post" enctype="multipart/form-data" action = "trainingdb.php" >
                <div class="modal-body left">
                  <div class="form-group">
                    <label for="addIMG">Cover Image:</label>
				    <input type="file" id="addIMG" name="addIMG"/>
                  </div>
                  <div class="form-group">
                    <label for="addNAME">Course Name:</label>
				    <input type="text" id="addNAME" name="addNAME" placeholder="course name" maxlength="50"/>
                  </div>
                  <div class="form-group">
                    <label for="addDESC">Description:</label>
				    <textarea id="addDESC" name="addDESC" rows="4" cols="50" placeholder="Enter short description and occupation that suits the course/program"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="addCAT">Category:</label>
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
                    <label for="addTemp">Template:</label>
				    <input type="text" id="addTemp" name="addTemp" placeholder="Template Link"/>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <input type="submit" name="addNEW" class="btn btn-info" value="Add">
              </div>
              </form>
            </div>
          </div>
        </div>
        <form method="post" action="viewtrainingdata.php">
		<input type="submit" name="confirm" value="Edit existing course"/>
		</form>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">+ Delete existing course</button>
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
                    <label for="addCAT">Program Name:</label>
				    <select name="selection" id="selection">
                        <!-- need to load from database -->
                        <?php
                            $connection = mysqli_connect("sql6.freemysqlhosting.net","sql6405286","csc3XZRv7d");
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
                  <button type="submit" name="deleteNOW" class="btn btn-info">Delete</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <h2>Course Listing</h2>
        <?php
            $connection = mysqli_connect("sql6.freemysqlhosting.net","sql6405286","csc3XZRv7d");
            $db = mysqli_select_db($connection,'sql6405286');
            
            $query = " SELECT * FROM training ";
            $query_run = mysqli_query($connection,$query);
        
            while($row = mysqli_fetch_array($query_run)){
                ?>
                <div class="card">
                  <?php echo '<img src="data:image;base64,'.base64_encode($row['pic']).'" alt="Cover" >'; ?>
                  <div class="text">
                    <p><b><?php echo $row['tname']; ?></b></p> 
                    <p><?php echo $row['tdesc']; ?></p> 
                    <p>Category: <?php echo $row['category']; ?></p>
                    <p><a href="<?php echo $row['tTemplate']; ?>" target="_blank"><?php echo $row['tTemplate']; ?></a></p> 
                  </div>
                </div>
                <?php
            }
        ?>
    </section>
    <div class="sticky">
        <a href="#">
	       <i class="fa fa-comment"></i>
        </a>
    </div>
  <?php include "footer.php"; ?>
  
</body>
  
</html>