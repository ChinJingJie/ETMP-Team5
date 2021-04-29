<?php

include 'registrationclientprocess.php';

$errors = array();
//connection or link to database
$conn = mysqli_connect('sql6.freemysqlhosting.net','sql6405286','csc3XZRv7d','sql6405286');

if(isset($_POST['forgetbtn'])){
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$query = "SELECT * from users WHERE email='$email'";
	$run = mysqli_query($conn,$query);
	
	if(mysqli_num_rows($run)>0){
		$row = mysqli_fetch_array($run);
		$db_email = $row['email'];
		if(mysqli_query($conn, $query)){
			$to = $db_email;
			$subject = "Password reset link";
			$message = "Click <a href='http://localhost/ETMP-Team5/ETMP/resetpwsd.php?email=$email'>here</a> to reset your password.";
			$headers = "MIME-Version: 1.0"."\r\n";
			$headers = "Content-type:text/html;charset=UTF-8"."\r\n";
			$headers = 'From:<expertdotcome@hotmail.com>'."\r\n";
			
			//mail($to, $subject, $message, $headers);
			
			$msg = "<div class='alert alert-success'>Password reset link has been sent to the email.\n
			Click <a href='http://localhost/ETMP-Team5/ETMP/resetpwsd.php?email=$email'>here</a> to reset your password.</div>";
		}
	}else{
		$msg = "<div class='alert alert-danger'>User not found.</div>";
	}	
}

if (isset($_GET['pswd'])){
	$password = mysqli_real_escape_string($conn, $_GET['pswd']);
	$query = "SELECT email from users where password = '$password'";
	$run = mysqli_query($conn, $query);
	if(mysqli_num_rows($run)>0){
		$row = mysqli_fetch_array($run);
		$password = md5($password);
		$password_1=$row['pwsd'];
		$email = $row['email'];
	}else{
		header("location:login.php");
	}
}

if(isset($_POST['resetbtn'])){
	$password = mysqli_real_escape_string($conn,$_POST['pswd']);
	$password_2 = mysqli_real_escape_string($conn,$_POST['pswd1']);
	if($password!=$password_2){
		$msg = "<div class ='alert alert-danger'>Sorry, passwords not matched</div>";
	}else{
		$query = "UPDATE users SET pswd='$password' WHERE email='$email'";
		mysqli_query($conn,$query);
		//$query = "DELETE from users WHERE email='$email'";
		//mysqli_query($conn,$query);
		$msg = "<div class='alert alert-success'>Password Updated.</div>";
	}
}
	
?>