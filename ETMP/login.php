<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <img class="logo" src="images/company_logo.png" alt="Expert.com logo"/>
        <h1>Expert Training Management Portal</h1>
    </header>
    <section>
        <form id="myForm" method="post" action="mailto:expertdotcom@hotmail.com" novalidate="novalidate">
            <input type="text" id="username" name="username" placeholder="username" maxlength="25"/>
            <br/>
            <input type="text" id="password" name="password" placeholder="password" maxlength="25"/>
            <br/>
            <input type="submit" value="Login"/>
        </form>
        <p class="link">Forget password? <a href="#">Reset now</a></p>
        <p class="link">New user? <a href="#">Register here</a></p>
        <br/><br/><br/>
    </section>
  <?php include "footer.php"; ?>
  
</body>
  
</html>