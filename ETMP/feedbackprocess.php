<?php

//variables
$id = "";
$rating = "";
$experience = "";
$improvement = "";
$trainperform = "";


$errors = array();


$conn = mysqli_connect('sql6.freemysqlhosting.net','sql6405286','csc3XZRv7d','sql6405286');

if (!$conn) {
	die("Connection failed:" . mysqli_connect_error());
}

if(isset($_POST["feedbacksubmit"])){
	
	$id = $_POST['trainingID'];
	$rating = $_POST['star'];
	$experience = $_POST['experience'];
	$improvement = $_POST['improvement'];
	$trainperform = $_POST['TrainPerform'];
	
	if(empty($rating)) {
		array_push($errors, "Please rate your completed training program");
	} 	
	
	if(empty($experience)) {
		array_push($errors, "Please fill in the Overall Experience Field");
	}
	if(empty($improvement)) {
		array_push($errors, "Please fill in the Improvement Field");
	}
	if(empty($trainperform)) {
		array_push($errors, "Please fill in the Comments on Trainer Performance Field");
	}
	
	if(count($errors) == 0){
		$query = "UPDATE application SET rating='$rating', overall_experience='$experience',
		improvements='$improvement', comments_on_trainer_performance='$trainperform'  
				  WHERE id='$id'";
		
		$result = mysqli_query($conn, $query);
		
		header('location: dashboard.php');
	}
}
?>



<?php if (count($errors) > 0): ?>
	<div class ="error">
		<?php foreach ($errors as $error): ?>
			<p><?php echo $error; ?></p>
		<?php endforeach ?>
	</div>
<?php endif ?> 