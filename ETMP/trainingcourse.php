<?php include ('userdata.php');?>

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
                    $connection = mysqli_connect('sql6.freesqldatabase.com','sql6416331','WBlQPE6vKx','sql6416331');
                    $db = mysqli_select_db($connection,'sql6416331');

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
        <p>View the course below to apply, if no favourable coure, apply for a self proposed training course <a href="application.php" onclick="storePrograms('none','Others')">here</a>.</p>
        <?php
            $connection = mysqli_connect('sql6.freesqldatabase.com','sql6416331','WBlQPE6vKx','sql6416331');
            $db = mysqli_select_db($connection,'sql6416331');
            
            $query = " SELECT * FROM training ";
            $query_run = mysqli_query($connection,$query);
        
            while($row = mysqli_fetch_array($query_run)){
                ?>
                <div class="card">
                  <?php echo '<img src="data:image;base64,'.base64_encode($row['pic']).'" alt="Cover" >'; ?>
                  <div class="text">
                    <p><b><?php echo $row['tname']; ?></b></p> 
                    <div class="scrolls">
                        <p><?php echo $row['tdesc']; ?></p> <!-- need to set htmlspecial character -->
                        <p>Category: <?php echo $row['category']; ?></p>
                        <p><a href="<?php echo $row['tTemplate']; ?>" target="_blank"><?php echo $row['tTemplate']; ?></a></p>
                    </div> 
                    <button type="button"><a href="application.php" onclick="storePrograms('<?php echo $row['category']; ?>','<?php echo $row['tname']; ?>')">Apply</a></button>
                  </div>
                </div>
                <?php
            }
        ?>
    <p>- End of the list -</p>
    </section>
    <section>
        <?php include "chat.php";?>
    </section>
  <?php include "footer.php"; ?>
  
</body>
  
</html>