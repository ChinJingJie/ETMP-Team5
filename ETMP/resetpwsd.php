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
        <form id="resetpwsdForm" method="post" action="mailto:expertdotcom@hotmail.com" novalidate="novalidate">
            <input type="text" id="pwsd" name="pswd" placeholder="new password" maxlength="25"/>
            <br/>
            <input type="text" id="pwsd1" name="pswd1" placeholder="re-enter new password" maxlength="25"/>
            <br/>
            <input type="submit" value="Confirm"/>
        </form>
        <p class="link">Login existing account? <a href="#">Click here</a></p>
        <p class="link">New user? <a href="#">Register here</a></p>
        <br/><br/><br/>
    </section>
  <?php include "footer.php"; ?>
  
</body>
  
</html>