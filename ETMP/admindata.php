<?php
include "sessionstart.php";
include "registrationadminprocess.php";

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

?>