<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <?php include "navigation.php";?>
    </header>
    <section>
        <h1>My Profile</h1>
        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'Info')">Basic Information</button>
            <button class="tablinks" onclick="openTab(event, 'Password')">Password</button>
            <button class="tablinks" onclick="openTab(event, 'History')">Training History</button>
        </div>

        <div id="Info" class="tabcontent">
            <p>Information from registration form.</p>
        </div>

        <div id="Password" class="tabcontent">
            <p>allow changing of password</p> 
        </div>

        <div id="History" class="tabcontent">
            <p>Display training History</p>
        </div>
    </section>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <div class="sticky">
        <a href="#">
	       <i class="fa fa-comment"></i>
        </a>
    </div>
  <?php include "footer.php"; ?>
  
</body>
  
</html>