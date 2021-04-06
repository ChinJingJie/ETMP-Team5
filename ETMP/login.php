<?php
// User only allow 5 attempt to login the account and prohibiting the user to login for 5 minutes

	session_start();
	
	if (isset($_SESSION["locked"]))
	{
		$difference = time() - $_SESSION["locked"];
		if ($difference > 10)
		{
			unset($_SESSION["locked"]);
			unset($_SESSION["login_attempts"]);
		}
	}
	
	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$username = "username"; // "username"
		$password = "password"; // "password"
		
		$conn = mysqli_connect("localhost","root","root","");
		$result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
		
		if (mysqli_num_rows($result) > 0)
		{
			$row = mysqli_fetch_object($result);
			
			if (password_verify($password, $row->password))
			{
				$_SESSION["user"] = $row->id;
				header("Location: dashboard.php");
			}
			else
			{
				$_SESSION["login_attempts"] += 1;
				$_sESsION["error"] = "Username or Password not found. Please try again";
			}
		}
		else
		{
			$_SESSION["login_attempts"] += 1;
			$_SESSION["error"] = "Username or Password not found. Please try again";
		}
	}
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
			<?php if (isset($_SESSION["error"])) { ?>
				<p style = "color: red;"><?= $_SESSION["error"]; ?></p>
			<?php unset($_SESSION["error"]); } ?>
            <input type="text" id="username" name="username" placeholder="username" maxlength="25"/>
            <br/>
            <input type="text" id="password" name="password" placeholder="password" maxlength="25"/>
            <br/>
			<?php
				if ($_SESSION["login_attempts"] > 5) {
					$_SESSION["locked"] = time();
					echo "<p>Please wait for 5 minutes</p>";
				}else{
			?>
				<input type="submit" value="Login"/>
			<?php } ?>
        </form>
        <p class="link">Forget password? <a href="forgetpwsd.php">Reset now</a></p>
        <p class="link">New user? <a href="registration.php">Register here</a></p>
        <br/><br/><br/>
    </section>
  <?php include "footer.php"; ?>
  
</body>
  
</html>
