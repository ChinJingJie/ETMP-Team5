<?php include ('userdata.php');?>
<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <?php include "navigation.php";?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
	  $(".edit").click(function(){
		$.ajax({url: "dashboarddata.php?id="+$(this).data('id'), success: function(result){
		   //result not empty
		   if (result) {
			// assign result  to each label/ text
			var resu = JSON.parse(result);
			
			$("#id1").val(resu.id);
		   }
		 
		}});
	  });
	});

	</script>
    </header>
    <section>
        <h1>Welcome to Expert Training Management Portal</h1>
        <h2>Training Requisition in Progress</h2>
        <div class="accordion">
            <div class="progress-tab">
                <input type="checkbox" id="chck1"/>
                <label class="progress-label" for="chck1">Training Program Application</label>
                <div class="tab-content">
					 <?php
					if(isset($_SESSION['name'])){
						$userData = getUsersData($_SESSION['name']);
						$name = $userData['name'];
					}
					$connection = mysqli_connect("sql6.freemysqlhosting.net","sql6405286","csc3XZRv7d");
					$db = mysqli_select_db($connection,'sql6405286');
							
					$query = "SELECT * FROM application WHERE name = '$name' and isSubmitted = '1' 
					and isAccepted = '0' and isCancelled = '0'";
					$query_run = mysqli_query($connection,$query);
        
            while($row = mysqli_fetch_array($query_run)){
                ?>
                <div class="card">
                  <div class="text">
                    <p>Training ID: <b><?php echo $row['id']; ?></b></p> 
                    <div class="scrolls">
                        <p>Program: <?php echo $row['program']; ?></p>
                        <p>Start Date: <?php echo $row['date_start']; ?></p>
                        <p>Start Time: <?php echo $row['time_start']; ?></p>
                    </div> 
                    <button type="button" class = "edit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewprogressbar" data-id ="<?php echo $row['id'];?>">
					View
					</button>
                  </div>
                </div>
                </div>
			<?php };?>
            </div>
        </div>
        <div class="accordion">
            <div class="progress-tab">
                <input type="checkbox" id="chck3"/>
                <label class="progress-label" for="chck3">Payment</label>
                <?php
					if(isset($_SESSION['name'])){
						$userData = getUsersData($_SESSION['name']);
						$name = $userData['name'];
					}
					$connection = mysqli_connect("sql6.freemysqlhosting.net","sql6405286","csc3XZRv7d");
					$db = mysqli_select_db($connection,'sql6405286');
							
					$query = "SELECT * FROM application WHERE name = '$name' and isSubmitted = '1' 
					and isAccepted = '1' and isCancelled = '0' and isComplete ='0'";
					$query_run = mysqli_query($connection,$query);
        
            while($row = mysqli_fetch_array($query_run)){
                ?>
                <div class="card">
                  <div class="text">
                    <p>Training ID: <b><?php echo $row['id']; ?></b></p> 
                    <div class="scrolls">
                        <p>Program: <?php echo $row['program']; ?></p>
                        <p>Start Date: <?php echo $row['date_start']; ?></p>
                        <p>Start Time: <?php echo $row['time_start']; ?></p>
                    </div> 
                    <button type="button" class = "edit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewprogressbar" data-id ="<?php echo $row['id'];?>">
					View
					</button>
                  </div>
                </div>
                </div>
			<?php };?>
            </div>
        </div>
        <div class="accordion">
            <div class="progress-tab">
                <input type="checkbox" id="chck4"/>
                <label class="progress-label" for="chck4">To Be Trained</label>
                <div class="tab-content">
                    <p>Information of cards waiting for training to start after completing payment</p>
                </div>
            </div>
        </div>
        <div class="accordion">
            <div class="progress-tab">
                <input type="checkbox" id="chck5"/>
                <label class="progress-label" for="chck5">Feedback</label>
                <div class="tab-content">
                    <?php
					if(isset($_SESSION['name'])){
						$userData = getUsersData($_SESSION['name']);
						$name = $userData['name'];
					}
					$connection = mysqli_connect("sql6.freemysqlhosting.net","sql6405286","csc3XZRv7d");
					$db = mysqli_select_db($connection,'sql6405286');
							
					$query = "SELECT * FROM application WHERE name = '$name' and isComplete = '1'";
					$query_run = mysqli_query($connection,$query);
        
            while($row = mysqli_fetch_array($query_run)){
                ?>
                <div class="card">
                  <div class="text">
                    <p>Training ID: <b><?php echo $row['id']; ?></b></p> 
                    <div class="scrolls">
                        <p>Program: <?php echo $row['program']; ?></p>
                        <p>Start Date: <?php echo $row['date_start']; ?></p>
                        <p>Start Time: <?php echo $row['time_start']; ?></p>
                    </div> 
					<button type="button"><a href="feedback.php" onclick="storePrograms('<?php echo $row['id']; ?>')">Apply</a></button>
                  </div>
                </div>
                </div>
			<?php };?>
                </div>
            </div>
        </div>
        <div class="accordion">
            <div class="progress-tab">
                <input type="checkbox" id="chck6"/>
                <label class="progress-label" for="chck6">Cancelled Training</label>
                <div class="tab-content">
					<?php
					if(isset($_SESSION['name'])){
						$userData = getUsersData($_SESSION['name']);
						$name = $userData['name'];
					}
					$connection = mysqli_connect("sql6.freemysqlhosting.net","sql6405286","csc3XZRv7d");
					$db = mysqli_select_db($connection,'sql6405286');
							
					$query = "SELECT * FROM application WHERE name = '$name' and isCancelled = '1'";
					$query_run = mysqli_query($connection,$query);
        
            while($row = mysqli_fetch_array($query_run)){
                ?>
                <div class="card">
                  <div class="text">
                    <p>Training ID: <b><?php echo $row['id']; ?></b></p> 
                    <div class="scrolls">
                        <p>Program: <?php echo $row['program']; ?></p>
                        <p>Start Date: <?php echo $row['date_start']; ?></p>
                        <p>Start Time: <?php echo $row['time_start']; ?></p>
                    </div> 
                  </div>
                </div>
                </div>
			<?php };?>
                </div>
            </div>
        </div>
        <br/>
        <h2>Notifications</h2>
        <div class="notification-space">
            <p>No new updates.</p>
			<form method="post" action="feedback.php">
                <input type="submit" name="confirm" value="Feedback Form"/>
            </form>
        </div>
		
    </section>
    <section>
        <?php include "chat.php";?>
    </section>
  <?php include "footer.php"; ?>
  
  <div class="modal fade design" id="viewprogressbar" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">Progress Bar</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
				  <div class="modal-body">
				  
					
				 </div>
			 
				  <div class="modal-footer">
					<button type="submit" class="btn btn-secondary" class = "edit" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#viewcancelreconfirm">Cancel Training</button>	
				  </div>  
			</div>
		  </div>
	</div>	
	
	<div class="modal fade design" id="viewcancelreconfirm" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">Reconfirmation</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
				  <div class="modal-body">
				  <form id="EditTrainingApplicationForm" method="post" action="trainingapplicationdata.php">
					<div>Are you sure you want to cancel your training application?</div>
					
					  	<label for="id">Application ID</label>
                        <span class="labelcolons">:</span>
						<input type = "text" id ="id1" name="id" value="" readonly/>
					  
				  </div>
				  
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
					<button type="submit" class="btn btn-secondary" name="canceltraining" class="btn btn-info">Confirm</button>
				  </div>
				  </form>
			</div>
		  </div>
		</div>
  
</body>
  
</html>