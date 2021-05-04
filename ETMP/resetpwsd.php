<?php include 'forgetpwsdprocess.php'?>

<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <img class="logo" src="images/company_logo.png" alt="Expert.com logo"/>
        <h1>Expert Training Management Portal</h1>
    </header>
    <section>
        <p>Reset the password and proceed to login again</p>
		<?php if(isset($msg)){echo $msg;}?>
        <form id="resetpwsdForm" method="post" action="" novalidate="novalidate">
            <input type="password" id="pwsd" name="pwsd" placeholder="new password" maxlength="25"/>
			<span class ="eye" onclick="showPwsd()">
				<i id="hide1" class="fa fa-eye"></i>
				<i id="hide2" class="fa fa-eye-slash"></i>
			</span>
            <br/>
            <input type="password" id="pwsd1" name="pwsd1" placeholder="re-enter new password" maxlength="25"/>
			<span class ="eye" onclick="showPwsd1()">
				<i id="hide3" class="fa fa-eye"></i>
				<i id="hide4" class="fa fa-eye-slash"></i>
			</span>
            <br/>
            <input type="submit" name="resetbtn" value="Confirm"/>
        </form>
        <p class="link">Login existing account? <a href="login.php">Click here</a></p>
        <p class="link">New user? <a href="registration.php">Register here</a></p>
        <br/><br/><br/>
    </section>
  <?php include "footer.php"; ?>
  
</body>
  
</html>