<?php

session_start();

//variables
$isAdmin = "";
$name = "";  
$email = "";
$phone = "";
$occupation ="";

$errors = array();

//connection or link to database
$conn = mysqli_connect('localhost','root','','registration');

if (!$conn) {
	die("Connection failed:" . mysqli_connect_error());
}else{
	echo "Successfully connecting to the database\n";
	echo "<br />";
}


if(isset($_POST["submit"])){

//register user
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$occupation = $_POST['occupations'];
$password_1 = $_POST['pwsd'];
$password_2 = $_POST['pwsd1'];

//form validation
$isAdmin = 0;

if(empty($name)) {
	array_push($errors, "Please enter your name");
} else {
	if (!preg_match("/^[a-zA-Z ]*$/",$_POST["name"])) {
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
	array_push($errors , "Only intergers are allowed");
	};
}
if(empty($occupation)) {
	array_push($errors, "Please select your occupation");
}
if(empty($password_1)) {
	array_push($errors, "Please enter your password");
}
if($password_1 != $password_2){
	array_push($errors, "The passwords do not match");
}

//check db for same details
$user_check_query = "SELECT * FROM users WHERE email = '$email' or phone = '$phone' LIMIT 1";

$result = mysqli_query($conn, $user_check_query);

$user = mysqli_fetch_assoc($result);

if($user) {

	if($user['email'] === $email){
		array_push($errors, "This email has already been used");
	}
	if($user['phone'] === $phone){
		array_push($errors, "This phone number has already been used");
	}

}

//Register the user if no error

if(count($errors) == 0){

	//encrypts the password before saving into the DB
	$password = md5($password_1); 

	$query = "INSERT INTO users (isAdmin, name, email, phone, occupation, password) 
				VALUES ('$isAdmin', '$name', '$email', '$phone', '$occupation', '$password')";

	mysqli_query($conn,$query);
	$_SESSION['name'] =  $name;
	$_SESSION['success'] = "You are now logged in";
}
}

?>