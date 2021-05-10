<?php include "registrationadminprocess.php"; ?>

<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <?php include "navigationadmin.php";?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
	  $(".view").click(function(){
		$.ajax({url: "applicationdata.php?id="+$(this).data('id'), success: function(result){
		   //result not empty
		   if (result) {
			// assign result  to each label/ text
			var res = JSON.parse(result);
			
			$("#id").html(res.id);
			if (res.accepted == 1) {
				$("#status").html('accepteds');
			}
			
			else
			{
				$("#status").html('submitteds');
			};
			
			if (res.paid == 1) {
				$("#status").html('Paids');
			};
			
			if (res.completed == 1) {
				$("#status").html('Completes');
			};
			
			if (res.cancelled == 1) {
				$("#status").html('Cancelleds');
			};
			
			
			$("#name").html(res.name);
			$("#phone").html(res.phone);
			$("#email").html(res.email);
			$("#venue").html(res.venue);
			$("#address").html(res.address);
			$("#city").html(res.city);
			$("#postcode").html(res.postcode);
			if (res.program == "1") {
				$("#status").html('Others');
				}else {
					$("#program").html(res.program);
			};
			
			$("#category").html(res.category);
			$("#Sdate").html(res.date_start);
			$("#Edate").html(res.date_end);
			$("#Stime").html(res.time_start);
			$("#Etime").html(res.time_end);
			$("#template").html(res.template);
			$("#remarks").html(res.remarks);
			
		   }
		 
		}});
	  });
	});
	
	$(document).ready(function(){
	  $(".edit").click(function(){
		$.ajax({url: "edittrainingapplicationadmindata.php?id="+$(this).data('id'), success: function(result){
		   //result not empty
		   if (result) {
			// assign result  to each label/ text
			var resu = JSON.parse(result);
			
			$("#id1").val(resu.id);
			$("#fName1").val(resu.name);
			$("#phone1").val(resu.phone);
			$("#email1").val(resu.email);
			$("#venue1").val(resu.venue);
			$("#address1").val(resu.address);
			$("#city1").val(resu.city);
			$("#postcode1").val(resu.postcode);
			$("#tcourse").val(resu.program);
			$("#category1").val(resu.category);
			$("#Sdate1").val(resu.date_start);
			$("#Edate1").val(resu.date_end);
			$("#Stime1").val(resu.time_start);
			$("#Etime1").val(resu.time_end);
			$("#template1").val(resu.template);
			$("#remarks1").val(resu.remarks);
			
		   }
		 
		}});
	  });
	});
	
	$(document).ready(function(){
	  $(".generate").click(function(){
		$.ajax({url: "edittrainingapplicationadmindata.php?id="+$(this).data('id'), success: function(result){
		   //result not empty
		   if (result) {
			// assign result  to each label/ text
			var resu = JSON.parse(result);
			
			$("#id2").val(resu.id);
			
		   }
		 
		}});
	  });
	});
	
	</script>
    </header>
    <section>
        <h1>Welcome to Expert Training Management Portal</h1>
        <h2>Search Data from Training Application Database by Name</h2>
		
		<form action="" method="POST" class="left">
			<input type ="text" name="Taname" placeholder="Enter Client Name"/>
			<input type="submit" name="search" value="Search"/>
		</form>
		<p class="highlight">Result:</p>
        <div class="result">
			<table class = "table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pending</th>
                        <th>Client Name </th>
                        <th>Phone </th>
                        <th>Venue</th>
                        <th>Program</th>
                        <th>Start Date</th>
                        <th>Selection</th>
		            </tr>
                </thead>
		
                <?php 
                //connection or link to database
                $conn = mysqli_connect('sql6.freesqldatabase.com','sql6410152','BpVpCG11xT','sql6410152');
                $db = mysqli_select_db($conn, 'sql6405286');
                $sql = "SELECT id, isAccepted, isSubmitted, isSubmitted, isPaid, isComplete, isCancelled, name, email, phone, venue, street, city, postcode, program, category,
                date_start, date_end, time_start, time_end, template, remarks FROM application";
                $result = $conn->query($sql);	
                ?>	
		
		        <?php 
				while($row = $result->fetch_assoc()) {
				if(isset($_POST['search'])) {
					$taname = $_POST['Taname'];
					$isSubmitted = 1;
					$user_check_query = "SELECT * FROM application WHERE name = '$taname' and isSubmitted = $isSubmitted";			
					$query_run = mysqli_query($conn, $user_check_query);	
					
					while($row = mysqli_fetch_array($query_run))
					{
						?>
				        <tr>
				            <td>
				            <?php 
								echo $row['id'];
                            ?>
				            </td>
				            <td>
				            <?php 
                            if(($row['isAccepted']) == 0 ){
								if(($row['isSubmitted']) == 1 ){
									$status = "Submitted";
								}
								
				            }else {
								$status = "Accepted";
				            };
							
							if(($row ['isPaid']) == 1 ){
								$status = "Paid";
							}
							
							if(($row ['isComplete']) == 1 ){
								$status = "Completed";
							}
							
							if(($row ['isCancelled']) == 1 ){
								$status = "Cancelled";
							}
							echo $status;
				            ?>
				            </td>
				            <td><?php echo $row['name']; ?></td>
				            <td><?php echo $row['phone']; ?></td>
				            <td><?php echo $row['venue']; ?></td>
				            <td><?php 
				            if($row['program'] == "1")
				            {
								echo "Others"; 
				            }
				            else
				            {
                                echo $row['program']; 
				            }	
				            ?>
				            </td>
				            <td><?php echo $row['date_start']; ?></td>
				            <td>
								<button type="submit" class = "view" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewapplicationmodal" data-id ="<?php echo $row['id'];?>">
								View
								</button>
								<button type="button" class ="edit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editsavedmodal" data-id ="<?php echo $row['id'];?>">
								Edit
								</button>
								<button type="submit" class ="generate" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#generatemodal" data-id ="<?php echo $row['id'];?>">
								Generate
								</button>
				            </td>
				        </tr>
				        <?php
							
					}
						break;
				}
				else
				{	
					if($row['isSubmitted'] == 1)
					{
						
					?>
					
				<tr>
					<td>
						<?php 
						echo $row['id']; ?>
						</td>
						<td>
						<?php 
						 if(($row['isAccepted']) == 0 ){
								if(($row['isSubmitted']) == 1 ){
									$status = "Submitted";
								}
								
				            }else {
								$status = "Accepted";
				            };
							
							if(($row ['isPaid']) == 1 ){
								$status = "Paid";
							}
							
							if(($row ['isComplete']) == 1 ){
								$status = "Completed";
							}
							
							if(($row ['isCancelled']) == 1 ){
								$status = "Cancelled";
							}
							
							echo $status;
							?>
							</td>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['phone']; ?></td>
							<td><?php echo $row['venue']; ?></td>
							<td><?php 
								if($row['program'] == "1")
								{
									echo "Others"; 
								}
								else
								{
									echo $row['program']; 
								}
								
								?>
							</td>
							<td><?php echo $row['date_start']; ?></td>
							<td>
							<button type="submit" class = "view" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewapplicationmodal" data-id ="<?php echo $row['id'];?>">
							View
							</button>
							<button type="button" class ="edit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editsavedmodal" data-id ="<?php echo $row['id'];?>">
							Edit
							</button>
							<button type="submit" class ="generate" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#generatemodal" data-id ="<?php echo $row['id'];?>">
							Generate
							</button>
					</td>
				</tr>
							
						<?php
					}
					}

				};
				?>
		
		<?php 
		
		?>
		
	<div class="modal fade design" id="viewapplicationmodal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">View</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
				  <div class="modal-body">
				  
					<div class="form-group">
						<label for="id">Application ID</label>
                        <span class="labelcolons">:</span>
						<label class="content" id ="id" value=""/>

					</div>
					
					<div class="form-group">
						<label for="status">Status</label>
                        <span class="labelcolons">:</span>
						<label class="content" id ="status" value=""/>
					</div>
					
					<div class="form-group">
						<label for="name">Full Name</label>
                        <span class="labelcolons">:</span>
						<label class="content" id ="name" value =""/>
					</div>
					
					<div class="form-group">
						<label for="phone">Phone Number</label>
                        <span class="labelcolons">:</span>
						<label class="content" id ="phone" value =""/>				
					</div>  
					
					<div class="form-group">
						<label for="email">Email Address</label>
                        <span class="labelcolons">:</span>
						<label class="content" id ="email" value =""/>
					</div>
					
					<div class="form-group">
						<label for="venue">Venue</label>
                        <span class="labelcolons">:</span>
						<label class="content" id ="venue" value =""/>
					</div>
					  
					<div class="form-group">
						<label for="address">Address</label>
                        <span class="labelcolons">:</span>
						<label class="content" id ="address" value=""/>
					</div>
					
					<div class="form-group">
						<label for="city">City</label>
                        <span class="labelcolons">:</span>
						<label class="content" id ="city" value =""/>
					</div>
					  
					<div class="form-group">
						<label for="postcode">Postcode</label>
                        <span class="labelcolons">:</span>
						<label class="content" id ="postcode" value =""/>
					</div>
					  
					<div class="form-group">
						<label for="program">Program</label>
                        <span class="labelcolons">:</span>
						<label class="content" id ="program" value =""/>
					</div>
					  
					<div class="form-group">
						<label for="category">Category</label>
                        <span class="labelcolons">:</span>
						<label class="content" id ="category" value =""/>
					</div>
					  
					<div class="form-group">
						<label for="date_start">Date Start</label>
                        <span class="labelcolons">:</span>
						<label class="content" id ="Sdate" value =""/>
					</div>
					  
					<div class="form-group">
						<label for="date_end">Date End</label>
                        <span class="labelcolons">:</span>
						<label class="content" id ="Edate" value =""/>
					</div>
					  
					<div class="form-group">
						<label for="time_start">Time Start</label>
                        <span class="labelcolons">:</span>
						<label class="content" id ="Stime" value =""/>
					</div>
					  
					<div class="form-group">
						<label for="time_end">Time End</label>
                        <span class="labelcolons">:</span>
						<label class="content" id ="Etime" value =""/>
					</div>
					  
					<div class="form-group">
						<label for="template">Template</label>
                        <span class="labelcolons">:</span>
						<label class="content" id ="template" value =""/>
					</div>
					  
					<div class="form-group">
						<label for="remarks">Remarks</label>
                        <span class="labelcolons">:</span>
						<label class="content" id ="remarks" value =""/>
					</div>

				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				  </div>
				  
			</div>
		  </div>
		</div>
		
		<div class="modal fade design" id="editsavedmodal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">Edit</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
				<form id="EditTrainingApplicationForm" method="post" action="trainingapplicationdata.php">
				  <div class="modal-body">
				  
					<div class="form-group">
						<label for="id">Application ID</label>
                        <span class="labelcolons">:</span>
						<input type = "text" id ="id1" name="id" value="" readonly/>
					</div>
					
					<div class="form-group">
						<label for="name">Full Name</label>
                        <span class="labelcolons">:</span>
						<input type = "text" name = "fName" id ="fName1" value ="" readonly/>
					</div>
					
					<div class="form-group">
						<label for="phone">Phone Number</label>
                        <span class="labelcolons">:</span>
						<input type = "text" name = "phone" id ="phone1" value ="" readonly/>					
					</div>  
					
					<div class="form-group">
						<label for="email">Email Address</label>
                        <span class="labelcolons">:</span>
						<input type = "text" name = "email" id ="email1" value ="" readonly/>
						
					</div>
					
					<div class="form-group">
						<label for="venue">Venue</label>
                        <span class="labelcolons">:</span>
						<input type = "text" name ="venue" id ="venue1" value =""/>
						
					</div>
					  
					<div class="form-group">
						<label for="address">Address</label>
                        <span class="labelcolons">:</span>
						<input type = "text" name = "address" id ="address1" value=""/>
						
					</div>
					
					<div class="form-group">
						<label for="address">City</label>
                        <span class="labelcolons">:</span>
						<input type = "text" name = "city" id ="city1" value=""/>
						
					</div>
					  
					<div class="form-group">
						<label for="postcode">Postcode</label>
                        <span class="labelcolons">:</span>
						<input type = "text" name ="postcode" id ="postcode1" value =""/>
						
					</div>
					  
					<div class="form-group">
						<label for="program">Training Program</label>
                        <span class="labelcolons">:</span>
						<input type="hidden" id="oriprogram" name="oriprogram" value="">
						<select name="tcourse" id="tcourse" onchange="dynamicTextBox(this)">
							  <?php
									$connection = mysqli_connect('sql6.freesqldatabase.com','sql6410152','BpVpCG11xT','sql6410152');
									$db = mysqli_select_db($connection,'sql6405286');

									$query = " SELECT * FROM training ";
									$query_run = mysqli_query($connection,$query);

									while($row = mysqli_fetch_array($query_run)){
									?>
									<option><?php echo $row['tname']; ?></option>
									<?php
								}
							  ?>
						  <option value="1">Others</option>
						</select>
					</div>
					  
					<div class="form-group">
						<label for="category">Category</label>
                        <span class="labelcolons">:</span>
						<input type = "text" name = "category" id ="category1" value =""/>
						
					</div>
					  
					<div class="form-group">
						<label for="date_start">Date Start</label>
                        <span class="labelcolons">:</span>
						<input type = "date" name = "Sdate" id ="Sdate1" value =""/>
						
					</div>
					  
					<div class="form-group">
						<label for="date_end">Date End</label>
                        <span class="labelcolons">:</span>
						<input type = "date" name = "Edate" id ="Edate1" value =""/>
						
					</div>
					  
					<div class="form-group">
						<label for="time_start">Time Start</label>
                        <span class="labelcolons">:</span>
						<input type = "time" name = "Stime" id ="Stime1" value =""/>
						
					</div>
					  
					<div class="form-group">
						<label for="time_end">Time End</label>
                        <span class="labelcolons">:</span>
						<input type = "time" name = "Etime" id ="Etime1" value =""/>
						
					</div>
					  
					<div class="form-group">
						<label for="template">Template</label>
                        <span class="labelcolons">:</span>
                        <input type="file" id="template1" name="template"/>
					</div>
					  
					<div class="form-group">
                        <div class="hLine1"></div>
						<label for="remarks" class="labelling">Remarks</label>
                        <textarea id="remarks1" name="remarks" rows="4" cols="20" placeholder="Enter remarks if any"></textarea>
					</div>
				  </div>
				 
				  <div class="modal-footer">
					<button type="submit" name="updatetrainingapplication" class="btn btn-info">Update</button>
				  </div>

				</form>
			</div>
		  </div>
		</div>
		
		<div class="modal fade design" id="generatemodal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">Generate this application to PDF?</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
				<form id="GeneratePDF" method="post" action="generatepdf.php">
				  <div class="modal-body">
				  
					<div class="form-group">
						<label for="id">Application ID</label>
                        <span class="labelcolons">:</span>
						<input type = "text" id ="id2" name="id2" value="" readonly/>
					</div>
					
				  </div>
				 
				  <div class="modal-footer">
					<button type="submit" name="generatepdf" class="btn btn-info">Generate PDF</button>
				  </div>

				</form>
			</div>
		  </div>
		</div>
		
        <?php
            $conn->close();
        ?>
        </table>
        </div>
    </section>
    <section>
        <?php include "chat.php";?>
    </section>
  <?php include "footer.php"; ?>
  
</body>
  
</html>
