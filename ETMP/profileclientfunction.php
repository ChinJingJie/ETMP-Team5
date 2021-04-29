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

?>