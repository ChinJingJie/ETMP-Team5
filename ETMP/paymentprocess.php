<?php

//variables
$id = "";
$payment_proof = "";

$errors = array();

$conn = mysqli_connect('sql6.freesqldatabase.com','sql6416331','WBlQPE6vKx','sql6416331');

if (!$conn) {
	die("Connection failed:" . mysqli_connect_error());
}

if(isset($_POST["proof"])){
    $id = $_POST['trainingID'];
	$payment_proof = addslashes(file_get_contents($_FILES['newPayment']['tmp_name']));
	
    if(empty($payment_proof)) {
		array_push($errors, "Please select a file");
	}
        
    if(count($errors) == 0){
        $query_payment = "UPDATE application SET payment_proof='$payment_proof' WHERE id='$id'";
	    $result = mysqli_query($conn,$query_payment);
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