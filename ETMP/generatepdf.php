<?php
require_once __DIR__ . '/vendor/autoload.php';



$conn = mysqli_connect('sql6.freesqldatabase.com','sql6416331','WBlQPE6vKx','sql6416331');

if (!$conn) {
	die("Connection failed:" . mysqli_connect_error());
}

if(isset($_POST["generatepdf"]))
{
	$id = $_POST['id2'];
	
	$query_select = "SELECT app.*, tra.base_price, tra.daily_price FROM application app, training tra WHERE app.id='$id' AND app.program=tra.tname";
	$result = mysqli_query($conn,$query_select);
	
	while($row = mysqli_fetch_assoc($result))
	{
		$start_date = strtotime($row['date_start']);
		$end_date = strtotime($row['date_end']);
		$noOfDays = ($end_date - $start_date)/60/60/24;
		
		$html = '
		<!DOCTYPE html>
		<html>
		<head>
			<title></title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		</head>
		<body>
			<div class="container">
				<div class="row">
					<div class ="col-xs-12">
						<h3 align="center"><b>ITINERARY</b></h3>
					</div>
				</div>
				<div class="row">
					<div class ="col-xs-12">
                        <img src="images/company_logo.png" alt="logo" style="width:20%"/>
                        <br><br>
				    </div>
				</div>
				<div class="row">
				      <div></div>
					  <div class="column" style = "float: left; width: 50%;" >
					  Address : 163, First Floor, <br> The Spring Kuching <br> <br>
					  Email : expertdotcome@gmail.com</div>
					  
					  <div class="column" style = "float: left; width: 50%; " >Website : www.etmp.epizy.com/ETMP-Team5/ETMP/login.php</div>
				</div>
				<hr>
				<div class="row">
					<div class ="col-xs-1">
						<b>To:-</b>
					</div>
					
					<div class="col-xs-6">
						' . $row['name'] .'
					</div>
					
					<div class="col-xs-3">
						<p>Date: ' . date("Y-m-d") . '</p>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-12">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th colspan="2">Application Details</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>Application ID</th>
									<td>' . $row['id'] . '</td>
								</tr>
								<tr>
									<th>Name</th>
									<td>' . $row['name'] . '</td>
								</tr>
								<tr>
									<th>Email</th>
									<td>' . $row['email'] . '</td>
								</tr>
								<tr>
									<th>Phone</th>
									<td>' . $row['phone'] . '</td>
								</tr>
								<tr>
									<th>Venue</th>
									<td>' . $row['venue'] . '</td>
								</tr>
								<tr>
									<th>Address</th>
									<td>' . $row['street'] . '</td>
								</tr>
								<tr>
									<th>City</th>
									<td>' . $row['city'] . '</td>
								</tr>
								<tr>
									<th>Post Code</th>
									<td>' . $row['postcode'] . '</td>
								</tr>
								<tr>
									<th>Program</th>
									<td>' . $row['program'] . '</td>
								</tr>
								<tr>
									<th>Category</th>
									<td>' . $row['category'] . '</td>
								</tr>
								<tr>
									<th>Date Start</th>
									<td>' . $row['date_start'] . '</td>
								</tr>
								<tr>
									<th>Date End</th>
									<td>' . $row['date_end'] . '</td>
								</tr>
								<tr>
									<th>Time Start</th>
									<td>' . $row['time_start'] . '</td>
								</tr>
								<tr>
									<th>Time End</th>
									<td>' . $row['time_end'] . '</td>
								</tr>
								<tr>
									<th>Remarks</th>
									<td>' . $row['remarks'] . '</td>
								</tr>
								
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th colspan="5">Payment</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>Program</th>
									<th>Base Price</th>
									<th>Daily Price</th>
									<th>No. of Days</th>
									<th>Total Price</th>
								</tr>
								<tr>
									<td>' . $row['program'] . '</td>
									<td>$' . $row['base_price'] . '</td>
									<td>$' . $row['daily_price'] . '</td>
									<td>' . $noOfDays . '</td>
									<td>$' . $row['total_cost'] . '</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
                <hr>
                <div class="row">
                    <div class ="col-xs-12">
                        <address align="center">&#169; ETMP 2021. All rights reserved</address>
                    </div>
                </div>
			</div>
		</body>
		</html>';
		$mpdf = new \Mpdf\Mpdf();
		
		$data = '';
		$data .= '<h1>Application </h1>';
		
		$data .= '<strong>Application ID : </strong> ' . $row['id'] . '<br />';
		$data .= '<strong>Name : </strong> ' . $row['name'] . '<br />';
		$data .= '<strong>Email : </strong> ' . $row['email'] . '<br />';
		$data .= '<strong>Phone : </strong> ' . $row['phone'] . '<br />';
		$data .= '<strong>Venue : </strong> ' . $row['venue'] . '<br />';
		$data .= '<strong>Address : </strong> ' . $row['street'] . '<br />';
		$data .= '<strong>City : </strong> ' . $row['city'] . '<br />';
		$data .= '<strong>PostCode : </strong> ' . $row['postcode'] . '<br />';
		$data .= '<strong>Program : </strong> ' . $row['program'] . '<br />';
		$data .= '<strong>Category : </strong> ' . $row['category'] . '<br />';
		$data .= '<strong>Date Start : </strong> ' . $row['date_start'] . '<br />';
		$data .= '<strong>Date End : </strong> ' . $row['date_end'] . '<br />';
		$data .= '<strong>Time Start : </strong> ' . $row['time_start'] . '<br />';
		$data .= '<strong>Time End : </strong> ' . $row['time_end'] . '<br />';
		$data .= '<strong>Price : </strong> ' . $row['total_cost'] . '<br />';
		$data .= '<strong>Remarks : </strong> ' . $row['remarks'] . '<br />';
		
		$mpdf->WriteHTML($html);
		
		$mpdf->Output('itinerary.pdf','D');
		
	}
}

if(isset($_POST["generateReceipt"]))
{
	$id = $_POST['id'];
	$receiptid = 0;
	
	$query = "SELECT * from application WHERE isPaid = '1'";
	$results = mysqli_query($conn,$query); 
	while($row = mysqli_fetch_assoc($results))
	{
		$receiptid += 1;
		if($row['id'] == $id)
		{
			break;
		}
	}
	
	$query_select = "SELECT app.*, tra.base_price, tra.daily_price FROM application app, training tra WHERE app.id='$id' AND app.program=tra.tname";
	$result = mysqli_query($conn,$query_select);
	while($row = mysqli_fetch_assoc($result))
	{
		$start_date = strtotime($row['date_start']);
		$end_date = strtotime($row['date_end']);
		$noOfDays = ($end_date - $start_date)/60/60/24;
	
		$html = '
		<!DOCTYPE html>
		<html>
		<head>
			<title></title>
			<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		</head>
		<body>
			<div class="container">
				<div class="row">
					<div class ="col-xs-12">
						<h3 align="center"><b>RECEIPT</b></h3>
					</div>
				</div>
                <div class="row">
					<div class ="col-xs-12">
                        <img src="images/company_logo.png" alt="logo" style="width:20%"/>
                        <br><br>
				    </div>
				</div>
				<div class="row">
				      <div></div>
					  <div class="column" style = "float: left; width: 50%;" >
					  Address : 163, First Floor, <br> The Spring Kuching <br> <br>
					  Email : expertdotcome@gmail.com</div>
					  
					  <div class="column" style = "float: left; width: 50%; " >Website : www.etmp.epizy.com/ETMP-Team5/ETMP/login.php</div>
				</div>
				<hr>
				<div class="row">
					<div class ="col-xs-1">
						<b>To:-</b>
					</div>
					
					<div class="col-xs-6">
						' . $row['name'] .'
					</div>
					
					<div class="col-xs-3">
						<p>Date: ' . date("Y-m-d") . '</p>
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-xs-12">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th colspan="2" style = "text-align: center;">Receipt Details</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>Receipt ID</th>
									<td>ref#' . $receiptid . '</td>
								</tr>
								<tr>
									<th>Application ID</th>
									<td>' . $row['id'] . '</td>
								</tr>
								<tr>
									<th>Name</th>
									<td>' . $row['name'] . '</td>
								</tr>
								<tr>
									<th>Phone</th>
									<td>0' . $row['phone'] . '</td>
								</tr>
								<tr>
									<th>Date Start</th>
									<td>' . $row['date_start'] . '</td>
								</tr>
								<tr>
									<th>Date End</th>
									<td>' . $row['date_end'] . '</td>
								</tr>
								
							</tbody>
						</table>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-12">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th colspan="5" style = "text-align: center;">Payment</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<th>Program</th>
									<th>Base Price</th>
									<th>Daily Price</th>
									<th>No. of Days</th>
									<th>Total Price</th>
								</tr>
								<tr>
									<td>' . $row['program'] . '</td>
									<td>$' . $row['base_price'] . '</td>
									<td>$' . $row['daily_price'] . '</td>
									<td>' . $noOfDays . '</td>
									<td>$' . $row['total_cost'] . '</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
                <hr>
                <div class="row">
                    <div class ="col-xs-12">
                        <address align="center">&#169; ETMP 2021. All rights reserved</address>
                    </div>
                </div>
            </div>
		</body>
		</html>';
		$mpdf = new \Mpdf\Mpdf();
		
		$data = '';
		$data .= '<h1>Application </h1>';
		
		$data .= '<strong>Application ID : </strong> ' . $row['id'] . '<br />';
		$data .= '<strong>Name : </strong> ' . $row['name'] . '<br />';
		$data .= '<strong>Email : </strong> ' . $row['email'] . '<br />';
		$data .= '<strong>Phone : </strong> ' . $row['phone'] . '<br />';
		$data .= '<strong>Venue : </strong> ' . $row['venue'] . '<br />';
		$data .= '<strong>Address : </strong> ' . $row['street'] . '<br />';
		$data .= '<strong>City : </strong> ' . $row['city'] . '<br />';
		$data .= '<strong>PostCode : </strong> ' . $row['postcode'] . '<br />';
		$data .= '<strong>Program : </strong> ' . $row['program'] . '<br />';
		$data .= '<strong>Category : </strong> ' . $row['category'] . '<br />';
		$data .= '<strong>Date Start : </strong> ' . $row['date_start'] . '<br />';
		$data .= '<strong>Date End : </strong> ' . $row['date_end'] . '<br />';
		$data .= '<strong>Time Start : </strong> ' . $row['time_start'] . '<br />';
		$data .= '<strong>Time End : </strong> ' . $row['time_end'] . '<br />';
		$data .= '<strong>Price : </strong> ' . $row['total_cost'] . '<br />';
		$data .= '<strong>Remarks : </strong> ' . $row['remarks'] . '<br />';
		
		$mpdf->WriteHTML($html);
		
		$mpdf->Output('receipt.pdf','D');
		
	}
}

if(isset($_POST["itineraryconf"])){
	$id = $_POST['id2'];
	$itinerary_confirm = 1;
	
	$query = "UPDATE application SET itinerary_confirm = '$itinerary_confirm'  WHERE id='$id'";
	$result = mysqli_query($conn, $query);
	
	header('location: current.php');
}






?>
