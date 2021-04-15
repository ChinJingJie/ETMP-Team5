<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <?php include "navigation.php";?>
    </header>
    <section>
        <h1>Training Course</h1>
        <p>View the course below to apply, if no favourable coure, apply for a self proposed training course <a href="application.php" onclick="storePrograms('Others')">here</a>.</p>
        <div class="row">
            <div class="card">
              <img src="images/couse_leadership.jpeg" alt="Course1">
              <div class="text">
                <p><b>Training name</b></p> 
                <p>training description in a few sentences</p> 
                <p><a href="#" target="_blank">training template link</a></p> 
                <button type="button"><a href="application.php" onclick="storePrograms('Training 1')">Apply</a></button>
              </div>
            </div>
            <div class="card">
              <img src="images/couse_leadership.jpeg" alt="Course2">
              <div class="text">
                <p><b>Training name1</b></p> 
                <p>training description in a few sentences 1</p> 
                <p><a href="#" target="_blank">training template link 1</a></p> 
                <button type="button"><a href="application.php" onclick="storePrograms('Training 2')">Apply</a></button>
              </div>
            </div>
            <div class="card">
              <img src="images/couse_leadership.jpeg" alt="Course3">
              <div class="text">
                <p><b>Training name2</b></p> 
                <p>training description in a few sentences 2</p> 
                <p><a href="#" target="_blank">training template link 2</a></p> 
                <button type="button"><a href="application.php" onclick="storePrograms('Training 3')">Apply</a></button>
              </div>
            </div>
            <div class="card">
              <img src="images/couse_leadership.jpeg" alt="Course4">
              <div class="text">
                <p><b>Training name3</b></p> 
                <p>training description in a few sentences 3</p> 
                <p><a href="#" target="_blank">training template link 3</a></p> 
                <button type="button"><a href="application.php" onclick="storePrograms('Training 4')">Apply</a></button>
              </div>
            </div>
        </div>
    </section>
    <div class="sticky">
        <a href="#">
	       <i class="fa fa-comment"></i>
        </a>
    </div>
  <?php include "footer.php"; ?>
  
</body>
  
</html>