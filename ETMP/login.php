<?php 
include "sessionstart.php";
include "registrationadminprocess.php";
include "registrationclientprocess.php";
?>

<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <img class="logo" src="images/company_logo.png" alt="Expert.com logo"/>
        <h1>Expert Training Management Portal</h1>
    </header>
    <section>
        <form id="myForm" method="post" action="" novalidate="novalidate">
			<?php include"errors.php";?>
            <input type="text" id="name" name="name" placeholder="username" maxlength="25"/>
            <br/>
            <input type="password" id="pwsd" name="pwsd" placeholder="password" maxlength="25"/>
            <br/>
	    <?php
		if ($_SESSION['login_attempts'] > 5) { // numbers of attempts to Login
			$_SESSION['locked'] = time();
			echo "<p>Please wait for 5 minutes to continue Login</p>";
		}else{
	     ?>
		<input type="submit" name="login" value="Login"/>
	     <?php } ?>
        </form>
        <p class="link">Forget password? <a href="forgetpwsd.php">Reset now</a></p>
        <p class="link">New user? <a href="registration.php">Register here</a></p>
    </section>
  <?php include "footer.php"; ?>
  
</body>
  
</html>
