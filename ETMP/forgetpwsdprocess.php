<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

include 'sessionstart.php';
require 'PHPMailer/vendor/autoload.php';
include 'registrationclientprocess.php';

$conn = mysqli_connect('sql6.freesqldatabase.com','sql6416331','WBlQPE6vKx','sql6416331');

if(isset($_POST['forgetbtn'])){

	$email = $_POST['email'];
	$query = "SELECT * FROM users WHERE email='$email'";
	$run = mysqli_query($conn,$query);
	$count = mysqli_num_rows($run);
	$data = mysqli_fetch_array($run);
	
	$idData = $data['id'];
	$emailData = $data['email'];
	$nameData = $data['name'];
	
	$url = 'http://'.$_SERVER['SERVER_NAME'].'/ETMP/resetpwsd.php?id='.$idData.'&email='.$emailData;
	
	$output = 'Click the link to change your password.<br>'.$url;
	
	if ($email == $emailData){
		
		$mail = new PHPMailer(true);
		
		try{
			//Server setting
			//$mail->SMTPDebug = 1;
			$mail->IsSMTP();
			$mail->Host = 'smtp.gmail.com';
		
			$mail->SMTPAuth = true;
			$mail->Username = 'expertdotcome@gmail.com';
			$mail->Password = 'ExpertDotcome';
			$mail->SMTPSecure = 'tls';
			$mail->Port = '587';
			
			//Recipients
			$mail->SetFrom('expertdotcome@gmail.com', 'Expert');
			$mail->addAddress($email);
			
			//Content
			$mail->isHTML(true);
			$mail->Subject = 'Reset Pasword';
			$mail->Body = $output;
			$mail->Send();
			$msg = '<div class="alert alert-success">Message has been sent</div>';
			
		}catch (Exception $e) {
			echo 'Message could not be sent ';
		}
		
	}else{
		$msg = "<div class='alert alert-danger'>User not found.</div>";
	}
}

if (isset($_POST['resetbtn'])) {
	
	$id = $_GET['id'];
	$email = $_GET['email'];
	$newpwsd = $_POST['pwsd'];
	$confirmpwsd = $_POST['pwsd1'];
	$newpwsd = md5($newpwsd);
	$confirmpwsd = md5($confirmpwsd);
	
	$query = "SELECT * FROM users WHERE id='$id' AND email='$email'";
	$run = mysqli_query($conn,$query);
	$count = mysqli_num_rows($run);
	$data = mysqli_fetch_array($run);
	
	if ($newpwsd == $confirmpwsd){
		$update = "UPDATE users SET password = '$newpwsd' WHERE email = '$email' AND id='$id'";
		$result = mysqli_query($conn, $update);
		if($result){
			$msg = '<div class="alert alert-success">Your password change successful.</div>';
		}
	}else{
		$msg = "<div class='alert alert-danger'>Password does not match.</div>";
	}
	
}

?>