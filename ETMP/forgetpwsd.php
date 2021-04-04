<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <img class="logo" src="images/company_logo.png" alt="Expert.com logo"/>
    </header>
    <section>
        <p>Type registered email to get the password reset link</p>
        <form id="forgetpwsdForm" method="post" action="mailto:expertdotcom@hotmail.com" novalidate="novalidate">
            <input type="text" id="email" name="email" placeholder="email address" maxlength="25"/>
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