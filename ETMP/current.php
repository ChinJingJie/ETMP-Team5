<?php include "sessionstart.php";?>
<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
<?php include "navigation.php";?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
	$(document).ready(function(){
	  $(".view").click(function(){
		$.ajax({url: "applicationdata.php?id="+$(this).data('id'), success: function(result){
		   //result not empty
		   if (result) {
			// assign result  to each label/ text
			console.log(result);
			var res = JSON.parse(result);
	
			$("#id").html(res.id);
			if (res.accepted == 0) {
				$("#status").html('pending');
				}else {
					$("#status").html('accepted');
					};
			$("#name").html(res.name);
			$("#phone").html(res.phone);
			$("#email").html(res.email);
			$("#venue").html(res.venue);
			$("#address").html(res.address);
			$("#city").html(res.city);
			$("#postcode").html(res.postcode);
			$("#program").html(res.program);
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
		$.ajax({url: "savedapplicationdata.php?id="+$(this).data('id'), success: function(result){
		   //result not empty
		   if (result) {
			// assign result  to each label/ text
			var resu = JSON.parse(result);
			
			$("#id1").val(resu.id);
			$("#name1").val(resu.name);
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
	  $(".delete").click(function(){
		$.ajax({url: "savedapplicationdata.php?id="+$(this).data('id'), success: function(result){
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
        <h1>Current Training Course</h1>
        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'Booking')">Booking</button>
            <button class="tablinks" onclick="openTab(event, 'Saved')">Saved</button>
        </div>
        
		<?php
		if(isset($_SESSION['name'])){
			?>
		<div id="Booking" class="tabcontent">
		<div class="modal fade design" id="viewbookingmodal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">Booking</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
				  <div class="modal-body">
				  
					<div class="form-group">
						<label for="id">Application ID:</label>
						<label id ="id" value=""/>
					</div>
					
					<div class="form-group">
						<label for="name">Full Name:</label>
						<label id ="name" value =""/>
					</div>
					
					<div class="form-group">
						<label for="phone">Phone Number:</label>
						<label id ="phone" value ="">				
					</div>  
					
					<div class="form-group">
						<label for="email">Email Address:</label>
						<label id ="email" value ="">
					</div>
					
					<div class="form-group">
						<label for="venue">Venue:</label>
						<label id ="venue" value ="">
					</div>
					  
					<div class="form-group">
						<label for="address">Address:</label>
						<label id ="address" value=""/>
					</div>
					    
					<div class="form-group">
						<label for="city">City:</label>
						<label id ="city" value=""/>
					</div>
					  
					<div class="form-group">
						<label for="postcode">Postcode:</label>
						<label id ="postcode" value ="">
					</div>
					  
					<div class="form-group">
						<label for="program">Program:</label>
						<label id ="program" value ="">
					</div>
					  
					<div class="form-group">
						<label for="category">Category:</label>
						<label id ="category" value ="">
					</div>
					  
					<div class="form-group">
						<label for="date_start">Date Start:</label>
						<label id ="Sdate" value ="">
					</div>
					  
					<div class="form-group">
						<label for="date_end">Date End:</label>
						<label id ="Edate" value ="">
					</div>
					  
					<div class="form-group">
						<label for="time_start">Time Start:</label>
						<label id ="Stime" value ="">
					</div>
					  
					<div class="form-group">
						<label for="time_end">Time End:</label>
						<label id ="Etime" value ="">
					</div>
					  
					<div class="form-group">
						<label for="template">Template:</label>
						<label id ="template" value ="">
					</div>
					  
					<div class="form-group">
						<label for="remarks">Remarks:</label>
						<label id ="remarks" value ="">
					</div>
					
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				  </div>
			</div>
		  </div>
		</div>
            <?php
			$conn = mysqli_connect('sql6.freemysqlhosting.net','sql6405286','csc3XZRv7d','sql6405286');
			$name = $_SESSION['name'];
			$book_query = "SELECT * FROM application WHERE  name='$name' and isComplete=1";
			$result = mysqli_query($conn, $book_query);
			?>
			
			<div class="row justify-content-center">
				<table class="table">
					<thead>
						<tr>
							<th>Status</th>
							<th>Name</th>
							<th>Venue</th>
							<th>Program</th>
							<th>Date Start</th>
							<th colspan="1">View</th>
						</tr>
					</thead>
					<?php
					while($row = mysqli_fetch_assoc($result)): ?>
						<tr>
							<td>
								<?php if(($row['isAccepted']) == 0 ){
									echo "Pending";
									}else {
										echo "Accepted";
									};
								?>
							</td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $row['venue'];?></td>
							<td><?php echo $row['program'];?></td>
							<td><?php echo $row['date_start'];?></td>
							<td>
							<button type="button" class="view" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#viewbookingmodal" data-id ="<?php echo $row['id'];?>">
							  View
							</button>
							</td>
						</tr>
					<?php endwhile;?>
					
					
				</table>
			</div>
			
        </div>
		
		<!-- saved -->
        <div id="Saved" class="tabcontent">

		<div class="modal fade design" id="editsavedmodal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">Saved Application</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  
			  <form id="editsavedapplication" method="post" action = "applicationprocess.php" enctype="multipart/form-data" >
				  <div class="modal-body">
				  
					<div class="form-group">
						<label for="id">Application ID:</label>
						<input type = "text" id ="id1" name="id" value="" readonly/>
					</div>
					
					<div class="form-group">
						<label for="name">Full Name:</label>
						<input type = "text" id ="name1" value ="" readonly/>
					</div>
					
					<div class="form-group">
						<label for="phone">Phone Number:</label>
						<input type = "text" id ="phone1" value ="" readonly/>
					</div>  
					
					<div class="form-group">
						<label for="email">Email Address:</label>
						<input type = "text" id ="email1" value ="" readonly/>
					</div>
					
					<div class="form-group">
						<label for="venue">Venue:</label>
						<input type = "text" id ="venue1" name="venue" value =""/>
					</div>
					  
					<div class="form-group">
						<label for="address">Address:</label>
						<input type = "text" id ="address1" name="address" value=""/>
					</div>
					    
					<div class="form-group">
						<label for="city">City:</label>
						<input type = "text" id ="city1" name="city" value=""/>
					</div>
					  
					<div class="form-group">
						<label for="postcode">Postcode:</label>
						<input type = "text" id ="postcode1" name="postcode" value =""/>
					</div>
					  
					<div class="form-group">
						<label for="program">Program:</label>
						<select name="tcourse" id="tcourse" onchange="dynamicTextBox(this)">
							  <?php
									$connection = mysqli_connect("sql6.freemysqlhosting.net","sql6405286","csc3XZRv7d");
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
							  <input type="text" id="dynamicName" style="display: none;">
						</select>
					</div>
					  
					<div class="form-group">
						<label for="category">Category:</label>
						<input type = "text" id ="category1" name="category" value =""/>
					</div>
					  
					<div class="form-group">
						<label for="date_start">Date Start:</label>
						<input type = "date" id ="Sdate1" name="Stdays" value =""/>
					</div>
					  
					<div class="form-group">
						<label for="date_end">Date End:</label>
						<input type = "date" id ="Edate1" name="Edays" value =""/>
					</div>
					  
					<div class="form-group">
						<label for="time_start">Time Start:</label>
						<input type = "time" id ="Stime1" name="Stime" value =""/>
					</div>
					  
					<div class="form-group">
						<label for="time_end">Time End:</label>
						<input type = "time" id ="Etime1" name="Etime" value =""/>
					</div>
					  
					<div class="form-group">
						<label for="template">Template:</label>
						<input type = "file" id ="template1" name="template" value =""/>
					</div>
					  
					<div class="form-group">
						<label for="remarks">Remarks:</label>
						<input type = "text" id ="remarks1" name="comment" value =""/>
					</div>
					
				  </div>
				  
				  <div class="modal-footer">
					<button type="submit" name="bookfromsaved" class="btn btn-primary" >Booking</button>
					<button type="submit" name="resave" class="btn btn-primary" >Save</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				  </div>
				  </form>
			</div>
		  </div>
		</div>
		
		
		<div class="modal fade" id="deletesavedmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">Delete Saved Application</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  <form id="deletesavedapplication" method="post" action = "applicationprocess.php" >
				  <div class="modal-body">
					Are you sure?
					<div class="form-group">
						<label for="id">Application ID:</label>
						<input type = "text" id ="id2" name="id" value="" readonly/>
					</div>
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
					<button type="submit" name="delete" class="btn btn-danger">Yes</button>
				  </div>
			  </form>
			</div>
		  </div>
		</div>
		
            <?php
			$conn = mysqli_connect('sql6.freemysqlhosting.net','sql6405286','csc3XZRv7d','sql6405286');
			$name = $_SESSION['name'];
			$book_query = "SELECT * FROM application WHERE  name='$name' and isComplete=0";
			$result = mysqli_query($conn, $book_query);
			?>
			
			<div class="row justify-content-center">
				<table class="table">
					<thead>
						<tr>
							<th>Status</th>
							<th>Name</th>
							<th>Venue</th>
							<th>Program</th>
							<th>Date Start</th>
							<th colspan="2">Actions</th>
						</tr>
					</thead>
					<?php
					while($row = mysqli_fetch_assoc($result)): ?>
						<tr>
							<td>
								<?php if(($row['isComplete']) == 0 ){
									echo "Incomplete";
									}
								?>
							</td>
							<td><?php echo $row['name'];?></td>
							<td>
								<?php 
									if(empty($row['venue'])){
										echo "NULL";
									}else{
										echo $row['venue'];
									}
								?>
							</td>
							<td>
								<?php 
									if(empty($row['program'])){
										echo "NULL";
									}else{
										echo $row['program'];
									}
								?>
							</td>
							<td>
								<?php 
									if(empty($row['date_start'])){
										echo "NULL";
									}else{
										echo $row['date_start'];
									}
								?>
							</td>
							<td>
							<button type="button" class="edit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editsavedmodal" data-id ="<?php echo $row['id'];?>">
							  Edit
							</button>
							<button type="button" class="delete" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletesavedmodal" data-id ="<?php echo $row['id'];?>">
							  Delete
							</button>
							</td>
						</tr>
					<?php endwhile;?>
					
					
				</table>
			</div>
        </div>
		<?php
		}
		?>
		
    </section>
    <div class="sticky">
        <a href="#">
	       <i class="fa fa-comment"></i>
        </a>
    </div>
  <?php include "footer.php"; ?>

</body>
  
</html>