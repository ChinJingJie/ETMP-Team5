<?php

//variable
$id = "";
$name = "";
$notification_message = "";

$errors = array();

$conn = mysqli_connect('sql6.freesqldatabase.com','sql6416331','WBlQPE6vKx','sql6416331');

if (!$conn) {
	die("Connection failed:" . mysqli_connect_error());
}

if(isset($_POST["send"])){
	
	$id = $_POST['id'];
	$name = $_POST['notify_name'];
	$notification_message = $_POST['newmessage'];
	$user_query = "SELECT * FROM application WHERE id='$id'";
	
	if(empty($notification_message)){
		array_push($errors, "Please enter your message");
	}
	
	if(count($errors) == 0){
		$query = "UPDATE application SET notification_message='$notification_message' WHERE id='$id'";
		mysqli_query($conn,$query);
		header('location: dashboardadmin.php'); //redirect to admin dashboard 
	}
}

?>