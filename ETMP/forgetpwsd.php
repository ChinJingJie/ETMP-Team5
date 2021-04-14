<?php include 'sessionstart.php';?>

<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <img class="logo" src="images/company_logo.png" alt="Expert.com logo"/>
    </header>
    <section>
        <p>Type registered email to get the password reset link</p>
        <form id="forgetpwsdForm" method="post" action="" novalidate="novalidate">
            <input type="text" id="email" name="email" placeholder="email address" maxlength="25"/>
            <br/>
            <input type="submit" name="confirm" value="Confirm"/>
        </form>
        <p class="link">Login existing account? <a href="login.php">Click here</a></p>
        <p class="link">New user? <a href="registration.php">Register here</a></p>
        <br/><br/><br/>
    </section>
  <?php include "footer.php"; ?>
  
</body>
  
</html>