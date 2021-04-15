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


$conn = mysqli_connect('sql6.freemysqlhosting.net','sql6405286','csc3XZRv7d','sql6405286');

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
	$template = $_POST['template'];
	$remarks = $_POST['comment'];
	
	$isAccepted = 0;
	$isComplete = 1;
	
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
	} else {
		if (!preg_match("/^[a-zA-Z ]*$/",$_POST["venue"])) {
			array_push($errors, "Only letters and white space allowed");
		};
	}
	if(empty($street)) {
		array_push($errors, "Please enter your address");
	}
	if(empty($city)) {
		array_push($errors, "Please enter your city");
	} else {
		if (!preg_match("/^[a-zA-Z ]*$/",$_POST["city"])) {
			array_push($errors, "Only letters and white space allowed");
		};
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
	
	if(count($errors) == 0){
		$query = "INSERT INTO application (isAccepted, isComplete, name, email, phone, venue, street, city, postcode, program, category, date_start, date_end, time_start, time_end, template, remarks)
					VALUES ('$isAccepted', '$isComplete', '$name', '$email', '$phone', '$venue', '$street', '$city', '$postcode', '$program', '$category', '$date_start', '$date_end', '$time_start', '$time_end', '$template', '$remarks')";
		
		mysqli_query($conn, $query);
		$_SESSION['id'] = $id;
		$_SESSION['success'] = "Your booking has been submitted";
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
	$template = $_POST['template'];
	$remarks = $_POST['comment'];
	
	$isAccepted = 0;
	$isComplete = 0;
	
	$query = "INSERT INTO application (isAccepted, isComplete, name, email, phone, venue, street, city, postcode, program, category, date_start, date_end, time_start, time_end, template, remarks)
					VALUES ('$isAccepted', '$isComplete', '$name', '$email', '$phone', '$venue', '$street', '$city', '$postcode', '$program', '$category', '$date_start', '$date_end', '$time_start', '$time_end', '$template', '$remarks')";
		
	mysqli_query($conn, $query);
	$_SESSION['id'] = $id;
	$_SESSION['success'] = "Your saved your data";
	header('location: trainingcourse.php');
}


if(isset($_POST['cancel'])){
	header('location: trainingcourse.php');
}


?>


<?php if (count($errors) > 0): ?>
	<div class ="error">
		<?php foreach ($errors as $error): ?>
			<p><?php echo $error; ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?> 