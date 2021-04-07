<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <?php include "navigationadmin.php";?>
    </header>
    <section>
        <h1>Training Course</h1>
        <p class="newcourse"><a>+ Add new course</a></p>
        <div class="accordion1">
            <div class="progress-tab1">
                <input type="checkbox" id="course1"/>
                <label class="progress-label1" for="course1"><img src="images/couse_leadership.jpeg" alt="logo"/>Build Your Confidence</label>
                <div class="tab-content1">
                    <p>Details of the course</p>
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