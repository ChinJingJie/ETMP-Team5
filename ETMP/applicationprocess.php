<?php

//variables
$id = "";
$isComplete = "";
$name = "";
$email = "";
$phone = "";
$venue = "";
$street = "";
$city = "";
$postcode = "";
$program = "";
$category = "";
$date_start = "";
$date_end = "";
$time_start = "";
$time_end = "";
$template = "";
$remarks = "";

$errors = array();


$conn = mysqli_connect('sql6.freesqldatabase.com','sql6410152','BpVpCG11xT','sql6410152');

if (!$conn) {
	die("Connection failed:" . mysqli_connect_error());
}

if(isset($_POST["booking"])){
	
	$name = $_POST['picName'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$venue = $_POST['venue'];
	$street = $_POST['address'];
	$city = $_POST['city'];
	$postcode = $_POST['postcode'];
	$program = $_POST['tcourse'];
	$category = $_POST['category'];
	$date_start = $_POST['Stdays'];
	$date_end = $_POST['Edays'];
	$time_start = $_POST['Stime'];
	$time_end = $_POST['Etime'];
	$remarks = $_POST['comment'];
	
	$template = $_FILES['template'];
	$templateName = $_FILES['template']['name'];
	$templateTmpName = $_FILES['template']['tmp_name'];
	$templateSize = $_FILES['template']['size'];
	$templateError = $_FILES['template']['error'];
	$templateType = $_FILES['template']['type'];
	
	$templateExt = explode('.', $templateName);
	$templateActualExt = strtolower(end($templateExt));
	
	$allowed = array('jpg','jpeg', 'png', 'pdf');
	
	$isAccepted = 0;
	$isSubmitted = 1;
	
	if(in_array($templateActualExt, $allowed)){
		if($templateError === 0){
			if($templateSize < 1000000){
				$templateNewName = uniqid('', true).".".$templateActualExt;
				$templateDestination = 'uploads/'.$templateNewName;
				move_uploaded_file($templateTmpName, $templateDestination);
			} else {
				array_push($errors, "You file is too big");
			}
		}else{
			array_push($errors, "Upload file error");
		}
	} else {
		array_push($errors, "You cannot upload files of this type");
	}
	
	if(empty($name)) {
		array_push($errors, "Please enter your name");
	} else {
		if (!preg_match("/^[a-zA-Z ]*$/",$_POST["picName"])) {
			array_push($errors, "Only letters and white space allowed");
		};
	}
	if(empty($email)) {
		array_push($errors, "Please enter your email");
	} else {
		if (!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)) {
			array_push($errors , "Invalid email format");
		};
	}
	if(empty($phone)) {
		array_push($errors, "Please enter your phone number");
	}else {
		if (!is_numeric($_POST["phone"])) {
		array_push($errors , "Only numbers are allowed");
		};
	}
	if(empty($venue)) {
		array_push($errors, "Please enter your venue");
	}
	if(empty($street)) {
		array_push($errors, "Please enter your address");
	}
	if(empty($city)) {
		array_push($errors, "Please enter your city");
	}
	if(empty($postcode)) {
		array_push($errors, "Please enter your postcode");
	}
	if(empty($program)) {
		array_push($errors, "Please choose your training program");
	}
	if(empty($category)) {
		array_push($errors, "Please enter your category");
	}
	if(empty($date_start)) {
		array_push($errors, "Please select your starting date");
	}
	if(empty($date_end)) {
		array_push($errors, "Please select your ending date");
	}
	if(empty($time_start)) {
		array_push($errors, "Please select your starting time");
	}
	if(empty($time_end)) {
		array_push($errors, "Please select your ending time");
	}
	$progress_bar_message = "Your booking has been submitted, Please wait for the admin to approve";
	
	$query_training = "SELECT * FROM training";
	$results = mysqli_query($conn,$query_training);
	
	while($rows = mysqli_fetch_assoc($results))
	{
		if($program == $rows['tname'])
		{
			$base_price = $rows['base_price'];
			$daily_price = $rows['daily_price'];
			
		}
		
		if($program == "Others")
		{
			$base_price = 50.00;
			$daily_price = 50.00;
		}
	}
	
	$start_date = strtotime($date_start);
	$end_date = strtotime($date_end);
	$noOfDays = ($end_date - $start_date)/60/60/24;;
	$total_cost = 0;
	$total_cost = $base_price + ($daily_price * $noOfDays);
	
	if(count($errors) == 0){
		$query = "INSERT INTO application (isAccepted, isSubmitted, name, email, phone, venue, street, city, postcode, program, category, date_start, date_end, time_start, time_end, base_price, daily_price, total_cost, template, remarks, progress_bar_message)
					VALUES ('$isAccepted', '$isSubmitted', '$name', '$email', '$phone', '$venue', '$street', '$city', '$postcode', '$program', '$category', '$date_start', '$date_end', '$time_start', '$time_end', $base_price, $daily_price, '$total_cost', '$templateNewName', '$remarks', '$progress_bar_message')";

		
		mysqli_query($conn, $query);
		$_SESSION['id'] = $id;
		$_SESSION['success'] = "Your booking has been submitted";
		$noOfDays = 0;
		header('location: trainingcourse.php');
	}

}

if(isset($_POST['save'])){
	
	$name = $_POST['picName'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$venue = $_POST['venue'];
	$street = $_POST['address'];
	$city = $_POST['city'];
	$postcode = $_POST['postcode'];
	$program = $_POST['tcourse'];
	$category = $_POST['category'];
	$date_start = $_POST['Stdays'];
	$date_end = $_POST['Edays'];
	$time_start = $_POST['Stime'];
	$time_end = $_POST['Etime'];
	$remarks = $_POST['comment'];
	
	$template = $_FILES['template'];
	$templateName = $_FILES['template']['name'];
	$templateTmpName = $_FILES['template']['tmp_name'];
	$templateSize = $_FILES['template']['size'];
	$templateError = $_FILES['template']['error'];
	$templateType = $_FILES['template']['type'];
	
	$templateExt = explode('.', $templateName);
	$templateActualExt = strtolower(end($templateExt));
	
	$allowed = array('jpg','jpeg', 'png', 'pdf');
	
	$isAccepted = 0;
	$isSubmitted = 0;
	
	if(in_array($templateActualExt, $allowed)){
		if($templateError === 0){
			if($templateSize < 1000000){
				$templateNewName = uniqid('', true).".".$templateActualExt;
				$templateDestination = 'uploads/'.$templateNewName;
				move_uploaded_file($templateTmpName, $templateDestination);
			} else {
				array_push($errors, "You file is too big");
			}
		}else{
			array_push($errors, "Upload file error");
		}
	} else {
		array_push($errors, "You cannot upload files of this type");
	}
	
	if($program ="1")
	{
		$program = "Others";
	}
	
	$query = "INSERT INTO application (isAccepted, isSubmitted, name, email, phone, venue, street, city, postcode, program, category, date_start, date_end, time_start, time_end, template, remarks)
					VALUES ('$isAccepted', '$isSubmitted', '$name', '$email', '$phone', '$venue', '$street', '$city', '$postcode', '$program', '$category', '$date_start', '$date_end', '$time_start', '$time_end', '$templateNewName', '$remarks')";
		
	mysqli_query($conn, $query);
	$_SESSION['id'] = $id;
	$_SESSION['success'] = "Your saved your data";
	header('location: trainingcourse.php');
}

if(isset($_POST['bookfromsaved'])){
	$id = $_POST['id'];
	$venue = $_POST['venue'];
	$street = $_POST['address'];
	$city = $_POST['city'];
	$postcode = $_POST['postcode'];
	$program = $_POST['tcourse'];
	$category = $_POST['category'];
	$date_start = $_POST['Stdays'];
	$date_end = $_POST['Edays'];
	$time_start = $_POST['Stime'];
	$time_end = $_POST['Etime'];
	$remarks = $_POST['comment'];
	
	$template = $_FILES['template'];
	$templateName = $_FILES['template']['name'];
	$templateTmpName = $_FILES['template']['tmp_name'];
	$templateSize = $_FILES['template']['size'];
	$templateError = $_FILES['template']['error'];
	$templateType = $_FILES['template']['type'];
	
	$templateExt = explode('.', $templateName);
	$templateActualExt = strtolower(end($templateExt));
	
	$allowed = array('jpg','jpeg', 'png', 'pdf');
	
	$isSubmitted = 1;
	
	if(in_array($templateActualExt, $allowed)){
		if($templateError === 0){
			if($templateSize < 1000000){
				$templateNewName = uniqid('', true).".".$templateActualExt;
				$templateDestination = 'uploads/'.$templateNewName;
				move_uploaded_file($templateTmpName, $templateDestination);
			} else {
				array_push($errors, "You file is too big");
			}
		}else{
			array_push($errors, "Upload file error");
		}
	} else {
		array_push($errors, "You cannot upload files of this type");
	}
	
	
	if(empty($venue)) {
		array_push($errors, "Please enter your venue");
	}
	if(empty($street)) {
		array_push($errors, "Please enter your address");
	}
	if(empty($city)) {
		array_push($errors, "Please enter your city");
	}
	if(empty($postcode)) {
		array_push($errors, "Please enter your postcode");
	}
	if(empty($program)) {
		array_push($errors, "Please choose your training program");
	}
	if(empty($category)) {
		array_push($errors, "Please enter your category");
	}
	if(empty($date_start)) {
		array_push($errors, "Please select your starting date");
	}
	if(empty($date_end)) {
		array_push($errors, "Please select your ending date");
	}
	if(empty($time_start)) {
		array_push($errors, "Please select your starting time");
	}
	if(empty($time_end)) {
		array_push($errors, "Please select your ending time");
	}
	
	if($program ="1")
	{
		$program = "Others";
		$base_price = "50.00";
		$daily_price = "50.00";
	}
	
	$progress_bar_message = "Your booking has been submitted, Please wait for the admin to approve";
		
	$query_training = "SELECT * FROM training";
	$results = mysqli_query($conn,$query_training);
	
	while($rows = mysqli_fetch_assoc($results))
	{
		if($program == $rows['tname'])
		{
			$base_price = $rows['base_price'];
			$daily_price = $rows['daily_price'];
		}
		
		if($program == "Others")
		{
			$base_price = 50.00;
			$daily_price = 50.00;
		}
	}
	
	$start_date = strtotime($date_start);
	$end_date = strtotime($date_end);
	$noOfDays = ($end_date - $start_date)/60/60/24;;
	$total_cost = 0;
	$total_cost = $base_price + ($daily_price * $noOfDays);
	
	if(count($errors) == 0){
		$query = "UPDATE application SET isSubmitted='$isSubmitted', venue='$venue', street='$street', city='$city' , postcode='$postcode' 
					, program='$program' , category='$category' , date_start='$date_start' , date_end='$date_end', time_start='$time_start'
					,time_end='$time_end', base_price='$base_price', daily_price='$daily_price', total_cost='$total_cost'
					, template='$templateNewName', remarks='$remarks', progress_bar_message='$progress_bar_message'  WHERE id='$id'";
		$result = mysqli_query($conn, $query);
		$noOfDays = 0;
		header('location: current.php');
	}
}

if(isset($_POST['resave'])){
	
	$id = $_POST['id'];
	$venue = $_POST['venue'];
	$street = $_POST['address'];
	$city = $_POST['city'];
	$postcode = $_POST['postcode'];
	$program = $_POST['tcourse'];
	$category = $_POST['category'];
	$date_start = $_POST['Stdays'];
	$date_end = $_POST['Edays'];
	$time_start = $_POST['Stime'];
	$time_end = $_POST['Etime'];
	$remarks = $_POST['comment'];
	
	$template = $_FILES['template'];
	$templateName = $_FILES['template']['name'];
	$templateTmpName = $_FILES['template']['tmp_name'];
	$templateSize = $_FILES['template']['size'];
	$templateError = $_FILES['template']['error'];
	$templateType = $_FILES['template']['type'];
	
	$templateExt = explode('.', $templateName);
	$templateActualExt = strtolower(end($templateExt));
	
	$allowed = array('jpg','jpeg', 'png', 'pdf');
	
		
	if($program ="1")
	{
		$program = "Others";
	}
	
	
	if(in_array($templateActualExt, $allowed)){
		if($templateError === 0){
			if($templateSize < 1000000){
				$templateNewName = uniqid('', true).".".$templateActualExt;
				$templateDestination = 'uploads/'.$templateNewName;
				move_uploaded_file($templateTmpName, $templateDestination);
			} else {
				array_push($errors, "You file is too big");
			}
		}else{
			array_push($errors, "Upload file error");
		}
	} else {
		array_push($errors, "You cannot upload files of this type");
	}
	
	$query = "UPDATE application SET venue='$venue', street='$street', city='$city' , postcode='$postcode' 
				, program='$program' , category='$category' , date_start='$date_start' , date_end='$date_end', time_start='$time_start'
				,time_end='$time_end', template='$templateNewName', remarks='$remarks'  WHERE id='$id'";
	$result = mysqli_query($conn, $query);
		
	header('location: current.php');
}

if(isset($_POST["delete"])){
	$id = $_POST['id'];
	$user_query = "DELETE FROM application WHERE id='$id'";
	$result = mysqli_query($conn, $user_query);
	
	header('location: current.php');
}

?>




<?php if (count($errors) > 0): ?>
	<div class ="error">
		<?php foreach ($errors as $error): ?>
			<p><?php echo $error; ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?> 