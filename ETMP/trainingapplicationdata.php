<?php
include "sessionstart.php";

$conn = mysqli_connect('sql6.freemysqlhosting.net','sql6405286','csc3XZRv7d','sql6405286');


	if(isset($_POST["updatetrainingapplication"])){
		$id = $_POST['id'];
		$name = $_POST['fName'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$venue = $_POST['venue'];
		$street = $_POST['address'];
		$city = $_POST['city'];
		$postcode = $_POST['postcode'];
		$program = $_POST['tcourse'];
		$category = $_POST['category'];
		$date_start = $_POST['Sdate'];
		$date_end = $_POST['Edate'];
		$time_start = $_POST['Stime'];
		$time_end = $_POST['Etime'];
		$template = $_POST['template'];
		$remarks = $_POST['remarks'];
		
		if(empty($program))
		{
			$program = $_POST['oriprogram'];
		}
		if($program == 1)
		{
			$program = "Others";
		}

		$user_query = "UPDATE application SET name = '$name', email = '$email',
		phone = '$phone',venue = '$venue', 
		street = '$street',city = '$city',
		postcode = '$postcode',program = '$program',
		category = '$category', date_start= '$date_start',
		date_end = '$date_end',time_start = '$time_start',
		time_end = '$time_end',template = '$template',
		remarks = '$remarks' 
		WHERE id= '$id'"
		or die($user_query->error());
		$result = mysqli_query($conn, $user_query);
		
		header('location: viewtrainingapplicationdata.php');
		
	}	


?>