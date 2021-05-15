<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <img class="logo" src="images/company_logo.png" alt="Expert.com logo"/>
        <h1>Admin Account Registration Form</h1>
    </header>
    <section>
        <form id="adminRegistrationForm" method="post" action="registrationadminprocess.php" novalidate="novalidate">
            <fieldset>	
                <p>
                    <label for="name" class="required">Full Name</label>
                    <span class="labelcolon">:</span>
                    <input type="text" id="name" name="name" placeholder="full name" maxlength="25"/>
                </p>
                <p>
                    <label for="email" class="required">Email Address</label>
                    <span class="labelcolon">:</span>
                    <input type="text" id="email" name="email" placeholder="Your email"/>
                </p>
                <p>
                    <label for="phone" class="required">Phone Number</label>
                    <span class="labelcolon">:</span>
                    <input type="text" id="phone" name="phone" placeholder="0123456789" maxlength="11"/>
                </p>
                <p>
                    <label for="staffid" class="required">Staff ID</label>
                    <span class="labelcolon">:</span>
                    <input type="text" id="staffid" name="staffid" placeholder="staff ID" maxlength="25"/>
                </p>
                <p>
                    <label for="pwsd" class="required">Password</label>
                    <span class="labelcolon">:</span>
                    <input type="password" id="pwsd" name="pwsd" placeholder="password" maxlength="25"/>
                    <span class ="eye2" onclick="showPwsd()">
                        <i id="hide1" class="fa fa-eye"></i>
                        <i id="hide2" class="fa fa-eye-slash"></i>
                    </span>
                </p>
                <p>
                    <label for="pwsd1" class="required">Re-confirm Password</label>
                    <span class="labelcolon">:</span>
                    <input type="password" id="pwsd1" name="pwsd1" placeholder="re-enter password" maxlength="25"/>
                    <span class ="eye2" onclick="showPwsd1()">
                        <i id="hide3" class="fa fa-eye"></i>
                        <i id="hide4" class="fa fa-eye-slash"></i>
                    </span>
                </p>
                <p class="chklink">
                    <input type="checkbox" id = "t&c"/>
                    I agree with the <a href="#">Terms and Conditions</a> applied
                </p>
            </fieldset>
            <button type="button"><a href="login.php">Cancel</a></button>
            <input type="submit" name="submit" value="Register"/>
        </form>
    </section>
  <?php include "footer.php"; ?>
  
</body>
  
</html>
