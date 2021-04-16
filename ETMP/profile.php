<?php include ('userdata.php');?>
<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <?php include "navigation.php";?>
    </header>
    <section>
        <h1>My Profile</h1>
        <div class="tab">
            <button class="tablinks" onclick="openTab(event, 'Info')">Basic Information</button>
            <button class="tablinks" onclick="openTab(event, 'Password')">Password</button>
            <button class="tablinks" onclick="openTab(event, 'History')">Training History</button>
        </div>

        <?php
		if(isset($_SESSION['name'])){
			$userData = getUsersData($_SESSION['name']);
			?>
        <div id="Info" class="tabcontent">	
		<div class="modal fade design" id="editprofilemodal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">Edit Profile</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  <form id="adminProfileEditForm" method="post" action="profileclientfunction.php">
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
						<input type="text" id="phone" name="phoneno" value="<?php echo $userData['phone']?>" placeholder="0123456789" maxlength="11"/>
					</div>
					  
					<div class="form-group">
						<label for="occupation">Occupation:</label>
						<select name="occupations" id="occupation">
                        <option> Student </option>  
                        <option> Teacher </option>  
                        <option> Businessman </option>  
                        <option> Scientist </option>         
                        <option> Programmer </option>         
                        <option> Environmentalist </option>         
                        <option> Others </option>         
                    </select>
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
		
		<div class="modal fade" id="deleteprofilemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
					<label for="name">Occupation:</label>
					<?php echo $userData['occupation'];?>
				</p>
			</fieldset>
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editprofilemodal">
			  Edit Profile
			</button>
			<button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteprofilemodal">
			  Delete
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
    </section>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <div class="sticky">
        <a href="#">
	       <i class="fa fa-comment"></i>
        </a>
    </div>
  <?php include "footer.php"; ?>
  
</body>
  
</html>