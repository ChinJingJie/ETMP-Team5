<?php
//variable
$id = "";
$pic = "";
$tname = "";
$tdesc = "";
$category = "";
$tTemplate = "";
$base_price = "";
$daily_price = "";

$errors = array();

//connection or link to database
$conn = mysqli_connect('sql6.freesqldatabase.com','sql6410152','BpVpCG11xT','sql6410152');

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
	$base_price = $_POST['addBasePrice'];
	$daily_price = $_POST['addDailyPrice'];
	
	$user_query = "INSERT INTO training (pic, tname, tdesc, category, tTemplate, base_price, daily_price) 
				VALUES ('$pic', '$tname', '$tdesc', '$category', '$tTemplate', '$base_price', '$daily_price')";
	mysqli_query($conn, $user_query);
	
	header('location: trainingcourseadmin.php');
}

	if(isset($_POST["updatetrainingdata"])){
		$id = $_POST['id'];
		//$pic = $_FILES['picture'];
		$pic = addslashes(file_get_contents($_FILES['picture']['tmp_name']));
		$tname = $_POST['tName'];
		$tdesc = $_POST['tDesc'];
		$category = $_POST['tCat'];
		$tTemplate = $_POST['tTemp'];
		$base_price = $_POST['addBaseP'];
		$daily_price = $_POST['addDailyP'];
	
		$user_query = "UPDATE training SET 
		pic = '$pic', tdesc = '$tdesc',
		tname = '$tname',category = '$category',
		tTemplate = '$tTemplate', base_price = '$base_price',
		daily_price = '$daily_price'
		WHERE id= '$id'"
		or die($user_query->error());
		$result = mysqli_query($conn, $user_query);
		
		header('location: viewtrainingdata.php');
		
	}	
?>
