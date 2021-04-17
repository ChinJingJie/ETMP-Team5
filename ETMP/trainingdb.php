<?php
//variable
$id = "";
$pic = "";
$tname = "";
$tdesc = "";
$category = "";
$tTemplate = "";

$errors = array();

//connection or link to database
$conn = mysqli_connect('sql6.freemysqlhosting.net','sql6405286','csc3XZRv7d','sql6405286');

if (!$conn) {
	die("Connection failed:" . mysqli_connect_error());
}else{
	//echo "Successfully connecting to the database\n";
	//echo "<br />";
}

if(isset($_POST["deleteNOW"])){
	$tname = $_POST['selection'];
	$user_query = "DELETE FROM training WHERE tname='$tname'" or die($user_query->error());
	$result = mysqli_query($conn, $user_query);
	
	header('location: trainingcourseadmin.php');
}

if(isset($_POST["addNEW"])){
	
	//$id = $_POST['id'];
	$pic = addslashes(file_get_contents($_FILES['addIMG']['tmp_name']));
	$tname = $_POST['addNAME'];
	$tdesc = $_POST['addDESC'];
	$category = $_POST['addCAT'];
	$tTemplate = $_POST['addTemp'];
	
	$user_query = "INSERT INTO training (pic, tname, tdesc, category, tTemplate) 
				VALUES ('$pic', '$tname', '$tdesc', '$category', '$tTemplate')";
	mysqli_query($conn, $user_query);
	
	header('location: trainingcourseadmin.php');
}
?>
