<?php
include "sessionstart.php";
include "registrationadminprocess.php";

$conn = mysqli_connect('sql6.freemysqlhosting.net','sql6405286','csc3XZRv7d','sql6405286');

function getUsersData(){
	$array = array();
	
	$conn = mysqli_connect('sql6.freemysqlhosting.net','sql6405286','csc3XZRv7d','sql6405286');
	$name = $_SESSION['name'];
	$user_query = "SELECT * FROM admins WHERE name ='$name'";
	$result = mysqli_query($conn, $user_query);
	
	while($user = mysqli_fetch_assoc($result)){
		$array['id'] = $user['id'];
		$array['name'] = $user['name'];
		$array['email'] = $user['email'];
		$array['phone'] = $user['phone'];
		$array['staffid'] = $user['staffid'];
	}
	return $array;
	
}

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

?>