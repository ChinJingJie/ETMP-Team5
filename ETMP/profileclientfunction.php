<?php
include "sessionstart.php";

$conn = mysqli_connect('sql6.freemysqlhosting.net','sql6405286','csc3XZRv7d','sql6405286');


if(isset($_POST["updateprofile"])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phoneno'];
	$occupation = $_POST['occupations'];
	
	$user_query = "UPDATE users SET email = '$email',phone = '$phone',occupation = '$occupation' WHERE name = '$name'"
	or die($user_query->error());
	$result = mysqli_query($conn, $user_query);
	
	header('location: profile.php');
	
}

if(isset($_POST["delete"])){
	$name = $_SESSION['name'];
	$user_query = "DELETE FROM users WHERE name='$name'" or die($user_query->error());
	$result = mysqli_query($conn, $user_query);
	
	header('location: login.php');
}

if(isset($_POST["confirmpass"])){
	
	$name = $_SESSION['name'];
	$password = $_POST['pwsd'];
	$newpwsd = $_POST['pwsd2'];
	$confirmpwsd = $_POST['pwsd3'];
		
	if(empty($password)){
		array_push($errors, "Old Password is required");
		header('location: profileadmin.php');
	}
	if(empty($newpwsd)){
		array_push($errors, "New Password is required");
		header('location: profileadmin.php');
	}
	if($newpwsd !== $confirmpwsd){
		array_push($errors, "Password not match");
		header('location: profileadmin.php');
	}
	
	if(count($errors) == 0){
		//hashing the password
		$name = $_SESSION['name'];
		$password = md5($password);
		$newpwsd = md5($newpwsd);
		
		$sql_2 = "UPDATE users SET password = '$newpwsd' WHERE name='$name' AND password = '$password'" or die($sql_2->error());
		mysqli_query($conn, $sql_2);
		header('location: profileadmin.php');
		$_SESSION['success'] = "Your password is successfully Update";
	}else{
		array_push($errors, "Incorrect password");
	}
}

?>