<?php include('registrationadminprocess.php')?>
<?php include('admindata.php')?>

<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <?php include "navigationadmin.php";?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
	  $(".edit").click(function(){
		$.ajax({url: "dashboarddata.php?id="+$(this).data('id'), success: function(result){
		   //result not empty
		   if (result) {
			// assign result  to each label/ text
			var resu = JSON.parse(result);
			
            $("#id0").val(resu.id);
               
			$("#id1").val(resu.id);
			$("#accept1").val(resu.isAccepted);
			$("#paid1").val(resu.isPaid);
			$("#complete1").val(resu.isComplete);
               
            $("#id2").val(resu.id);
			$("#id3").val(resu.id);
		   }
		 
		}});
	  });
	});

	</script>
    </header>
    <section>
        <h1>Welcome to Expert Training Management Portal</h1>
        <h2>Overview of Training Requisition In Charged</h2>
		
        <div class="accordion">
            <div class="progress-tab">
                <input type="checkbox" id="chck2"/>
                <label class="progress-label" for="chck2">Training Program Confirmation</label>
                <div class="tab-content">
                     <?php
					$connection = mysqli_connect('sql6.freesqldatabase.com','sql6410152','BpVpCG11xT','sql6410152');
					$db = mysqli_select_db($connection,'sql6405286');
							
					$query = "SELECT * FROM application WHERE isSubmitted = '1' 
					and isAccepted = '0' and isCancelled = '0' and isComplete = '0'";
					$query_run = mysqli_query($connection,$query);
        
                    while($row = mysqli_fetch_array($query_run)){
                        ?>
                        <div class="card1">
                          <div class="text">
                            <p>Training ID: <b><?php echo $row['id']; ?></b></p> 
                            <div class="scrolls">
                                <p>Name: <?php echo $row['name']; ?></p>
                                <p>Program: <?php echo $row['program']; ?></p>
                                <p>Start Date: <?php echo $row['date_start']; ?></p>
                                <p>Start Time: <?php echo $row['time_start']; ?></p>
                            </div> 
                            <button type="button" class = "edit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewprogressbar1" data-id ="<?php echo $row['id'];?>">
                            View
                            </button>
                          </div>
                        </div>
				    <?php };?>
                </div>
            </div>
        </div>
        <div class="accordion">
            <div class="progress-tab">
                <input type="checkbox" id="chck3"/>
                <label class="progress-label" for="chck3">Payment</label>
                <div class="tab-content">
                <?php
					$connection = mysqli_connect('sql6.freesqldatabase.com','sql6410152','BpVpCG11xT','sql6410152');
					$db = mysqli_select_db($connection,'sql6405286');
							
					$query = "SELECT * FROM application WHERE isSubmitted = '1' 
					and isAccepted = '1' and isPaid = '0' and isCancelled = '0' and isComplete ='0'";
					$query_run = mysqli_query($connection,$query);
        
            while($row = mysqli_fetch_array($query_run)){
                ?>
                <div class="card1">
                  <div class="text">
                    <p>Training ID: <b><?php echo $row['id']; ?></b></p> 
                    <div class="scrolls">
						<p>Name: <?php echo $row['name']; ?></p>
                        <p>Program: <?php echo $row['program']; ?></p>
                        <p>Start Date: <?php echo $row['date_start']; ?></p>
                        <p>Start Time: <?php echo $row['time_start']; ?></p>
                    </div> 
                    <button type="button" class = "edit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewprogressbar2" data-id ="<?php echo $row['id'];?>">
					View
					</button>
                  </div>
                </div>
				<?php };?>
                </div>
                </div>
            </div>
        <div class="accordion">
            <div class="progress-tab">
                <input type="checkbox" id="chck4"/>
                <label class="progress-label" for="chck4">To Be Trained</label>
                <div class="tab-content">
                    <?php
					$connection = mysqli_connect('sql6.freesqldatabase.com','sql6410152','BpVpCG11xT','sql6410152');
					$db = mysqli_select_db($connection,'sql6405286');
							
					$query = "SELECT * FROM application WHERE isSubmitted = '1' 
					and isPaid ='1' and isAccepted = '1' and isCancelled = '0' and isComplete ='0'";
					$query_run = mysqli_query($connection,$query);
        
            while($row = mysqli_fetch_array($query_run)){
                ?>
                <div class="card1">
                  <div class="text">
                    <p>Training ID: <b><?php echo $row['id']; ?></b></p> 
                    <div class="scrolls">
						<p>Name: <?php echo $row['name']; ?></p>
                        <p>Program: <?php echo $row['program']; ?></p>
                        <p>Start Date: <?php echo $row['date_start']; ?></p>
                        <p>Start Time: <?php echo $row['time_start']; ?></p>
                    </div> 
                    <button type="button" class = "edit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewprogressbar3" data-id ="<?php echo $row['id'];?>">
					View
					</button>
                  </div>
                </div>
				<?php };?>
                </div>
            </div>
        </div>
        <div class="accordion">
            <div class="progress-tab">
                <input type="checkbox" id="chck5"/>
                <label class="progress-label" for="chck5">Feedback</label>
                <div class="tab-content">
                    <?php
					$connection = mysqli_connect('sql6.freesqldatabase.com','sql6410152','BpVpCG11xT','sql6410152');
					$db = mysqli_select_db($connection,'sql6405286');
							
					$query = "SELECT * FROM application WHERE isComplete = '1' and rating = '0'";
					$query_run = mysqli_query($connection,$query);
        
            while($row = mysqli_fetch_array($query_run)){
                ?>
                <div class="card1">
                  <div class="text">
                    <p>Training ID: <b><?php echo $row['id']; ?></b></p> 
                    <div class="scrolls">
						<p>Name: <?php echo $row['name']; ?></p>
                        <p>Program: <?php echo $row['program']; ?></p>
                        <p>Start Date: <?php echo $row['date_start']; ?></p>
                        <p>Start Time: <?php echo $row['time_start']; ?></p>
                    </div>
				<button type="button" class = "edit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewmessage" data-id ="<?php echo $row['id'];?>">
					Message
				</button>
                </div>
                </div>
				<?php };?>
                </div>
                </div>
            </div>
        <div class="accordion">
            <div class="progress-tab">
                <input type="checkbox" id="chck6"/>
                <label class="progress-label" for="chck6">Completed Training</label>
                <div class="tab-content">
					<?php
					$connection = mysqli_connect('sql6.freesqldatabase.com','sql6410152','BpVpCG11xT','sql6410152');
					$db = mysqli_select_db($connection,'sql6405286');
							
					$query = "SELECT * FROM application WHERE isComplete = '1' and rating > '0'";
					$query_run = mysqli_query($connection,$query);
        
            while($row = mysqli_fetch_array($query_run)){
                ?>
                <div class="card1">
                  <div class="text">
                    <p>Training ID: <b><?php echo $row['id']; ?></b></p> 
                    <div class="scrolls">
						<p>Name: <?php echo $row['name']; ?></p>
                        <p>Program: <?php echo $row['program']; ?></p>
                        <p>Start Date: <?php echo $row['date_start']; ?></p>
                        <p>Start Time: <?php echo $row['time_start']; ?></p>	
                    </div> 
					<button type="button" class = "edit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewprogressbar4" data-id ="<?php echo $row['id'];?>">
					View
					</button>
                  </div>			
                </div>
				<?php };?>
                </div>
                </div>
            </div>
        <br/>
        <h2>Notifications</h2>
		<p class="left">Send the notification message through accordian card to specific client</p>
		
        <div class="notification-space">
            <p><?php
				$dayofweek = date("w");
				
				switch($dayofweek){
					case 1:
						echo "Please send notification to the client";
						break;
					case 2:
						echo "Please send notification to the client";
						break;
					case 3:
						echo "Please send notification to the client";
						break;
					case 4:
						echo "Please send notification to the client";
						break;
					case 5:
						echo "Please send notification to the client";
						break;
					case 6:
						echo "Please send notification to the client";
						break;
					case 7:
						echo "Please send notification to the client";
						break;
				}
			
			?></p>
        </div>
        <h2>Databases</h2>
        <p class="left">Push the button below to proceed to respective database</p>
        <div class="desc">
            <form method="post" action="viewdata.php">
                <input type="submit" name="confirm" value="Client Database"/>
            </form>
            <form method="post" action="viewtrainingapplicationdata.php">
                <input type="submit" name="confirm" value="Training Application Database"/>
            </form>
        </div>
    </section>
    <section>
        <?php include "chatadmin.php";?>
    </section>
  <?php include "footer.php"; ?>
 
  
</body>
  
	  <div class="modal fade design" id="viewprogressbar1" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">Progress Bar</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
				  <div class="modal-body">
				   <div>
						<p>Stage: <b>Training Application Submitted</b></p>
				  </div>
				  <div class="container">
					  <div class="progress">
						<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:40%">
						  40%
						</div>
					  </div>
				 </div>
				 <div>
					<p><br>Training Application has been <b>Submitted</b> </p>
					<p>You may proceed to <b>Approve</b> the application</p>
				</div>
					
				 </div>
			 
				  <div class="modal-footer">
					<button type="submit" class="btn btn-secondary" class = "edit" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#viewmessage">Message</button>
					<button type="submit" class="btn btn-secondary" class = "edit" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#viewupdatereconfirm">Update</button>
					<button type = "button" class = "btn btn-secondary"><a href = "viewtrainingapplicationdata.php" id ="DMButton">Training Application</a></button>
				  </div>  
			</div>
		  </div>
	</div>
	
	 <div class="modal fade design" id="viewprogressbar2" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">Progress Bar</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
				  <div class="modal-body">
				   <div>
						<p>Stage: <b>Payment</b></p>
				  </div>
				  <div class="container">
					  <div class="progress">
						<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%">
						  60%
						</div>
					  </div>
				 </div>
					<p><br><b>Payment</b> are to be made in this stage </p>
					<p><b>Proceed</b> to the <b>Next</b> stage if payment is done</p>
				 </div>
			 
				  <div class="modal-footer">
                    <form id="passDataForm" method="post" action = "" novalidate="novalidate" >
                        <input type = "text" id ="id0" name="id0" value="" readonly/>
                        <button type="button" name="passData" class="btn btn-secondary" class = "edit" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#viewproofcheck">Payment Proof</button>
                    </form>	
					<button type="submit" class="btn btn-secondary" class = "edit" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#viewmessage">Message</button>
					<button type="submit" class="btn btn-secondary" class = "edit" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#viewupdatereconfirm">Update</button>	
				  </div>  
			</div>
		  </div>
	</div>
	
	<div class="modal fade design" id="viewprogressbar3" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">Progress Bar</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
				  <div class="modal-body">
				   <div>
						<p>Stage: <b>To be Trained</b></p>
				  </div>
				  <div class="container">
					  <div class="progress">
						<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width:80%">
						  80%
						</div>
					  </div>
				 </div>
				 <div>
					<p><br>Training is <b> Waiting / in Process</b> currently </p>
					<p><b>Proceed</b> to the next stage once training is completed</p>
				</div>
					
				 </div>
			 
				  <div class="modal-footer">
					<button type="submit" class="btn btn-secondary" class = "edit" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#viewmessage">Message</button>
					<button type="submit" class="btn btn-secondary" class = "edit" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#viewupdatereconfirm">Update</button>
					<button type = "button" class = "btn btn-secondary"><a href = "viewtrainingapplicationdata.php" id ="DMButton">Training Application</a></button>	
				  </div>  
			</div>
		  </div>
	</div>
	
	<div class="modal fade design" id="viewprogressbar4" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">Progress Bar</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
				  <div class="modal-body">
				   <div>
						<p>Stage: <b>Training Completed</b></p>
				  </div>
				  <div class="container">
					  <div class="progress">
						<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
						  100%
						</div>
					  </div>
				 </div>
				 <div>
					<p><br><b>Please</b> refer to the <b>Training Application</b> database to<br><b>Check</b> the feedback</p>
				</div>
					<div class="modal-footer">
					<button type="submit" class="btn btn-secondary" class = "edit" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#viewmessage">Message</button>	
				  </div>
				 </div>
			</div>
		  </div>
	</div>
	
	
	<div class="modal fade design" id="viewupdatereconfirm" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">Reconfirmation</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
				  <form id="UpdateTrainingStatus" method="post" action="trainingapplicationdata.php">
                    <div class="modal-body">
					<div>Are you sure you want to update the training application to another stage?</div>
					
					  	<label for="id">Application ID</label>
                        <span class="labelcolons">:</span>
						<input type = "text" id ="id1" name="id" value="" readonly/>
						<input type = "hidden" id ="accept1" name="accept" value="" readonly/>
						<input type = "hidden" id ="paid1" name="paid" value="" readonly/>
						<input type = "hidden" id ="complete1" name="complete" value="" readonly/>
				  </div>
				  
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-secondary" name="updatetraining" class="btn btn-info">Confirm</button>
				  </div>
				  </form>
			</div>
		  </div>
		</div>
		
		<div class="modal fade design" id="viewmessage" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
			<h3 class="modal-title" id="exampleModalLabel">Message</h3>
			<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
				<form id="newNotificationform" method="post" action = "notificationprocess.php">
					<div class="modal-body">
					<div>What Message you want to send to the application below?</div>
					
					  	<label for="id">Application ID</label>
                        <span class="labelcolons">:</span>
						<input type = "text" id ="id3" name="id" value="" readonly/>
						<textarea id="newmessage" name="newmessage" rows="4" cols="50" placeholder="Enter Message"></textarea>
				  </div>
				  
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-secondary" name="send" class="btn btn-info">Confirm</button>
				  </div>
				  </form>
			</div>
		</div>
	</div>
		
		
    <div class="modal fade design" id="viewproofcheck" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">Validate Proof</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
				  <form id="paymentStatus" method="post" action="">
                    <div class="modal-body">					
					  	<label for="id">Application ID</label>
                        <span class="labelcolons">:</span>
						<input type = "text" id ="id2" name="id2" value="" readonly/>
                        <?php
                            $connection = mysqli_connect('sql6.freesqldatabase.com','sql6410152','BpVpCG11xT','sql6410152');
                            $db = mysqli_select_db($connection,'sql6405286');

                            $query = " SELECT * FROM application WHERE id='9'";
                            $query_run = mysqli_query($connection,$query);

                            while($row = mysqli_fetch_array($query_run)){
                                ?>
                        <p>Proof Display:</p>
                        <?php echo '<img src="data:image;base64,'.base64_encode($row['payment_proof']).'" alt="Evidence of payment" class="proof">'; ?>
                        <p>Click on the image to enlarge it.</p>
                        <?php
                            }
                        ?>
                </div>
				  
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-secondary" name="updatePayment" class="btn btn-info">Confirm</button>
				  </div>
				  </form>
			</div>
		  </div>
		</div>
</html>
