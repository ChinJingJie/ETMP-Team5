<?php
include "sessionstart.php";

$conn = mysqli_connect('sql6.freesqldatabase.com','sql6410152','BpVpCG11xT','sql6410152');


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
	
	if(isset($_POST["canceltraining"])){
		$id = $_POST['id'];
		$user_query = "UPDATE application SET isCancelled = '1', progress_bar_message = 'You have cancel the training program'
		WHERE id= $id"
		or die($user_query->error());
		$result = mysqli_query($conn, $user_query);
		
		header('location: dashboard.php');
	}	
	
	if(isset($_POST["updatetraining"])){
		$id = $_POST['id'];
		$isSubmitted = $_POST['submit'];
		$isAccepted = $_POST['accept'];
		$isComplete = $_POST['complete'];
		$isPaid = $_POST['paid'];
		
		if ($isAccepted == 0)
		{
			$user_query = "UPDATE application SET isAccepted = '1', progress_bar_message = 'Your booking has been Accepted, You may need to accept the Itinerary in Current Page and Proceed to the Payment Stage'
			WHERE id= $id"
			or die($user_query->error());
			$result = mysqli_query($conn, $user_query);
		}
		
		else if ($isPaid == 0)
		{
			$user_query = "UPDATE application SET isPaid = '1', progress_bar_message = 'Payment made is successful, Thanks for joining us. Current Stage is To Be Trained'
			WHERE id= $id"
			or die($user_query->error());
			$result = mysqli_query($conn, $user_query);
		}
		
		else if ($isComplete == 0)
		{
			$user_query = "UPDATE application SET isComplete = '1', progress_bar_message = 'Congratulation, you have completed the training, Please fill up the feedback form. Thanks'
			WHERE id= $id"
			or die($user_query->error());
			$result = mysqli_query($conn, $user_query);
		}

		else
		{}
		
		header('location: dashboardadmin.php');
	}	


?>