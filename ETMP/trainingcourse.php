<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <?php include "navigation.php";?>
    </header>
    <section>
        <h1>Training Course</h1>
        <select name="courses" id="courses" style="display: none;">
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
              <option selected="selected">Others</option>
          </select>
        <p>View the course below to apply, if no favourable coure, apply for a self proposed training course <a href="application.php" onclick="storePrograms('others','Others')">here</a>.</p>
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
                    <p><?php echo $row['tdesc']; ?></p> <!-- need to set htmlspecial character -->
                    <p>Category: <?php echo $row['category']; ?></p>
                    <p><a href="<?php echo $row['tTemplate']; ?>" target="_blank"><?php echo $row['tTemplate']; ?></a></p> 
                    <button type="button"><a href="application.php" onclick="storePrograms('<?php echo $row['id']; ?>','<?php echo $row['category']; ?>')">Apply</a></button>
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