<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <img class="logo" src="images/company_logo.png" alt="Expert.com logo"/>
    </header>
    <section>
        <form id="resetpwsdForm" method="post" action="mailto:expertdotcom@hotmail.com" novalidate="novalidate">
            <input type="text" id="pwsd" name="pswd" placeholder="new password" maxlength="25"/>
            <br/>
            <input type="text" id="pwsd1" name="pswd1" placeholder="re-enter new password" maxlength="25"/>
            <br/>
            <input type="submit" value="Confirm"/>
        </form>
        <p class="link">Login existing account? <a href="login.php">Click here</a></p>
        <p class="link">New user? <a href="registration.php">Register here</a></p>
        <br/><br/><br/>
    </section>
  <?php include "footer.php"; ?>
  
</body>
  
</html>