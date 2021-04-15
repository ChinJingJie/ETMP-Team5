<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <?php include "navigationadmin.php";?>
    </header>
    <section>
        <h1>Training Course</h1>
        <!-- Trigger Modal -->
        <button id="addBtn" onclick="createNew()">+ Add new course</button>
        <!-- The Modal -->
        <div id="myModal" class="modal">
            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>Form building in contruction...</p>
            </div>
        </div>
        <button>Edit existing course</button>
        <h2>Course Listing</h2>
        <div class="row">
            <div class="card">
              <img src="images/couse_leadership.jpeg" alt="Course1">
              <div class="text">
                <p><b>Training name</b></p> 
                <p>training description in a few sentences</p> 
                <p><a href="#" target="_blank">training template link</a></p> 
              </div>
            </div>
            <div class="card">
              <img src="images/couse_leadership.jpeg" alt="Course2">
              <div class="text">
                <p><b>Training name1</b></p> 
                <p>training description in a few sentences 1</p> 
                <p><a href="#" target="_blank">training template link 1</a></p> 
              </div>
            </div>
            <div class="card">
              <img src="images/couse_leadership.jpeg" alt="Course3">
              <div class="text">
                <p><b>Training name2</b></p> 
                <p>training description in a few sentences 2</p> 
                <p><a href="#" target="_blank">training template link 2</a></p> 
              </div>
            </div>
            <div class="card">
              <img src="images/couse_leadership.jpeg" alt="Course4">
              <div class="text">
                <p><b>Training name3</b></p> 
                <p>training description in a few sentences 3</p> 
                <p><a href="#" target="_blank">training template link 3</a></p> 
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