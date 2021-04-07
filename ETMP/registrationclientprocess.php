<?php

session_start();

//variables
//$isAdmin = "";
//$name = "";  
//$email = "";
//$phoneno = "";
//$occupation ="";

//$errors = array();

//connect to db


//connection or link to database
//$conn = new mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);

//if (!$conn) {
	//die("Connection failed:" . mysqli_connect_error());
//}else{
	//echo "Successfully connecting to the database\n";
	//echo "<br />";
//}



//if(isset($_POST["submit"])){
	
//register user
//$isAdmin = $_POST['isAdmin'];
$name = $_POST['name'];
$email = $_POST['email'];
$phoneno = $_POST['phone'];
$occupation = $_POST['staffid'];

if (!empty($name) || !empty($email) || !empty($phoneno) || !empty($occupation)) {
	
	$dbServername = "localhost";
		$dbUsername = "root";
		$dbPassword = "";
		$dbName = "registeration";
		//connect to db
		$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);
		if (mysqli_connect_error()) {
			die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
		}else {
     $SELECT = "SELECT email From register Where email = ? Limit 1";
     $INSERT = "INSERT Into register (name, email, phone,staffid) values(?, ?, ?, ?)";
	 
	 $stmt = $conn->prepare($SELECT);
     //$stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
	 
	 if ($rnum==0) {
		 $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssii", Sname, $email, $phoneno, $occupation);
	  $stmt->execute();
	  echo "New record";
	 }else{
		 echo "some";
	 }
	 $stmt->close();
	 $conn->close();
	}
}else {
	echo "all";
	die();
}


//check db for same details 

//$user_check_query = "SELECT * FROM user WHERE email = '$email' or phoneno = '$phoneno' LIMIT 1";

//$results = mysqli_query($conn, $user_check_query);
//$user = mysqli_fetch_assoc($results);

//if($user) {

	//if($user['email'] === $email){
		//array_push($errors, "This email has already been used");
	//}
	//if($user['phoneno'] === $phoneno){
		//array_push($errors, "This phone number has already been used");
	//}

//}

//Register the user if no error

//if(count($errors) == 0){

	//$query = "INSERT INTO user (isAdmin, name, email, phoneno, occupation) VALUES ('$isAdmin', '$name', '$email', '$phoneno', '$occupation')";

	//mysqli_query($conn,$query);
	//$_SESSION['name'] =  $name;
	//$_SESSION['success'] = "You are now logged in";




?>