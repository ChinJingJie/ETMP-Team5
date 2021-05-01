<?php include('admindata.php')?>
<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <?php include "navigationadmin.php";?>
	</header>
    <section>
        <h1>My Profile</h1>
        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'Info')">Basic Information</button>
            <button class="tablinks" onclick="openTab(event, 'Password')">Password</button>
            <button class="tablinks" onclick="openTab(event, 'History')">Training History</button>
			<button class="tablinks" onclick="openTab(event, 'Delete')">Delete Account</button>
        </div>
		
		<?php
		if(isset($_SESSION['name'])){
			$userData = getUsersData($_SESSION['name']);
			?>
        <div id="Info" class="tabcontent">	
		<div class="modal fade design" id="editprofilemodal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">Edit Profile</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  <form id="adminProfileEditForm" method="post" action="profileadminfunction.php">
				  <div class="modal-body">
					<div class="form-group">
						<label for="name">Full Name:</label>
						<input type="text" id="name" name="name" value="<?php echo $_SESSION['name']?>" placeholder="full name" maxlength="25"/>
					</div>
					  
					<div class="form-group">
						<label for="email">Email Address:</label>
						<input type="text" id="email" name="email" value="<?php echo $userData['email']?>" placeholder="Your email"/>
					</div>
					  
					<div class="form-group">
						<label for="phone">Phone Number:</label>
						<input type="text" id="phone" name="phone" value="<?php echo $userData['phone']?>" placeholder="0123456789" maxlength="11"/>
					</div>
					  
					<div class="form-group">
						<label for="staffid">Staff ID:</label>
						<input type="text" id="staffid" name="staffid" value="<?php echo $userData['staffid']?>" placeholder="staff ID" maxlength="25"/>
					</div>
				
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
					<button type="submit" name="updateprofile" class="btn btn-info">Update</button>
				  </div>
			 </form>
			</div>
		  </div>
		</div>
		
			<fieldset>
				<p>
					<label for="name">Name:</label>
					<?php echo $userData['name'];?>
				</p>
				<p>
					<label for="name">Email:</label>
					<?php echo $userData['email'];?>
				</p>
				<p>
					<label for="name">Phone Number:</label>
					<?php echo $userData['phone'];?>
				</p>
				<p>
					<label for="name">Staff ID:</label>
					<?php echo $userData['staffid'];?>
				</p>
			</fieldset>
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editprofilemodal">
			  Edit Profile
			</button>
		<?php
		}
		?>
		
        </div>

        <div id="Password" class="tabcontent">
            <p>allow changing of password</p> 
        </div>

        <div id="History" class="tabcontent">
            <p>Display training History</p>
        </div>
		
		<?php
		if(isset($_SESSION['name'])){
			$userData = getUsersData($_SESSION['name']);
			?>
		<div id="Delete" class="tabcontent">
		
		<div class="modal fade design" id="deleteprofilemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">Delete Profile</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  <form id="admindeleteProfile" method="post" action="profileclientfunction.php">
				  <div class="modal-body">
					Are you sure?
				  </div>
				  <div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
					<button type="submit" name="delete" class="btn btn-primary">Yes</button>
				  </div>
			  </form>
			</div>
		  </div>
		</div>
		
		<fieldset>
            <p><b>Delete Account</b></p>
			<p>***NOTE***<br> All deleted data will not be able to be restored</p>
		</fieldset>
			<button type="button" class="btn-danger" data-bs-toggle="modal" data-bs-target="#deleteprofilemodal">
			  Delete
			</button>
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