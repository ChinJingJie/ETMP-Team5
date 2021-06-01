<?php
include "sessionstart.php";
$errors = array();

$conn = mysqli_connect('sql6.freesqldatabase.com','sql6416331','WBlQPE6vKx','sql6416331');


if(isset($_POST["updateprofile"])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$staffid = $_POST['staffid'];
	
	$user_query = "UPDATE admins SET email = '$email',phone = '$phone',staffid = '$staffid' WHERE name = '$name'"
	or die($user_query->error());
	$result = mysqli_query($conn, $user_query);
	
	header('location: profileadmin.php');
	
}

if(isset($_POST["delete"])){
	$name = $_SESSION['name'];
	$user_query = "DELETE FROM admins WHERE name='$name'" or die($user_query->error());
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
		
		$sql_2 = "UPDATE admins SET password = '$newpwsd' WHERE name='$name' AND password = '$password'" or die($sql_2->error());
		mysqli_query($conn, $sql_2);
		header('location: profileadmin.php');
		$_SESSION['success'] = "Your password is successfully Update";
	}else{
		array_push($errors, "Incorrect password");
	}
}

?>