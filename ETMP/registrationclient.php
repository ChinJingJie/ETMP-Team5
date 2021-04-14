<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <img class="logo" src="images/company_logo.png" alt="Expert.com logo"/>
        <h1>Client Account Registration Form</h1>
    </header>
    <section>
        <form id="clientRegistrationForm" method="post" action="registrationclientprocess.php" novalidate="novalidate">
            <fieldset>	
                <p>
                    <label for="name">Full Name:</label>
                    <input type="text" id="name" name="name" placeholder="full name" maxlength="25"/>
                </p>
                <p>
                    <label for="email">Email Address:</label>
                    <input type="text" id="email" name="email" placeholder="Your email"/>
                </p>
                <p>
                    <label for="phone">Phone Number:</label>
                    <input type="text" id="phone" name="phone" placeholder="0123456789" maxlength="11"/>
                </p>
                <p><label>Occupation:</label>
                    <select name="occupations" id="occupation">
                        <option> Student </option>  
                        <option> Teacher </option>  
                        <option> Businessman </option>  
                        <option> Scientist </option>         
                        <option> Programmer </option>         
                        <option> Environmentalist </option>         
                        <option> Others </option>         
                    </select>
                </p>
                <p>
                    <label for="pwsd">Password:</label>
                    <input type="text" id="pwsd" name="pwsd" placeholder="password" maxlength="25"/>
                </p>
                <p>
                    <label for="pwsd1">Re-confirm Password:</label>
                    <input type="text" id="pwsd1" name="pwsd1" placeholder="re-enter password" maxlength="25"/>
                </p>
                <p class="link">
                    <input type="checkbox" id = "t&c"/>
                    I agree with the <a href="#">Terms and Conditions</a> applied
                </p>
            </fieldset>
            <button type="button"><a href="login.php">Cancel</a></button>
            <input type="submit" name ="submit" value="Register"/>
        </form>
    </section>
  <?php include "footer.php"; ?>
  
</body>
  
</html>