<?php
include "sessionstart.php";
include "registrationclientprocess.php";


function getUsersData(){
	$array = array();
	
	$conn = mysqli_connect('sql6.freesqldatabase.com','sql6416331','WBlQPE6vKx','sql6416331');
	$name = $_SESSION['name'];
	$user_query = "SELECT * FROM users WHERE name ='$name'";
	$result = mysqli_query($conn, $user_query);
	
	while($user = mysqli_fetch_assoc($result)){
		$array['id'] = $user['id'];
		$array['name'] = $user['name'];
		$array['email'] = $user['email'];
		$array['phone'] = $user['phone'];
		$array['occupation'] = $user['occupation'];
		$array['password'] = $user['password'];
	}
	return $array;
	
}

?>