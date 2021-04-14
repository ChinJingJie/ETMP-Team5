<?php include "registrationadminprocess.php";?>

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
            <input type="text" id="pwsd" name="pwsd" placeholder="password" maxlength="25"/>
            <br/>
			<input type="submit" name="login" value="Login"/>
        </form>
        <p class="link">Forget password? <a href="forgetpwsd.php">Reset now</a></p>
        <p class="link">New user? <a href="registration.php">Register here</a></p>
        <br/><br/><br/>
    </section>
  <?php include "footer.php"; ?>
  
</body>
  
</html>
