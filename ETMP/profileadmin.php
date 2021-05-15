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
			<button class="tablinks" onclick="openTab(event, 'Delete')">Delete Account</button>
        </div>
		
		<?php
		if(isset($_SESSION['name'])){
			$userData = getUsersData($_SESSION['name']);
			?>
        <div id="Info" class="tabcontent">	
		<div class="modal fade design" id="editprofilemodal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
			<div class="modal-content">
			  <div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">Edit Profile</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
			  <form id="adminProfileEditForm" method="post" action="profileadminfunction.php">
				  <div class="modal-body">
					<div class="form-group">
						<label for="name" class="required">Full Name</label>
                        <span class="labelcolons">:</span>
						<input type="text" id="name" name="name" value="<?php echo $_SESSION['name']?>" placeholder="full name" maxlength="25"/>
					</div>
					  
					<div class="form-group">
						<label for="email" class="required">Email Address</label>
                        <span class="labelcolons">:</span>
						<input type="text" id="email" name="email" value="<?php echo $userData['email']?>" placeholder="Your email"/>
					</div>
					  
					<div class="form-group">
						<label for="phone" class="required">Phone Number</label>
                        <span class="labelcolons">:</span>
						<input type="text" id="phone" name="phone" value="<?php echo $userData['phone']?>" placeholder="0123456789" maxlength="11"/>
					</div>
					  
					<div class="form-group">
                        <label for="staffid" class="required">Staff ID</label>
                        <span class="labelcolons">:</span>
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
				<p class="label">
					<label class="labeldetails">Name</label>
                    <span class="labelcolon">:</span>
                    <span class="details"><?php echo $userData['name'];?></span>
				</p>
				<p class="label">
					<label class="labeldetails">Email</label>
                    <span class="labelcolon">:</span>
                    <span class="details"><?php echo $userData['email'];?></span>
				</p>
				<p class="label">
					<label class="labeldetails">Phone Number</label>
                    <span class="labelcolon">:</span>	
                    <span class="details"><?php echo $userData['phone'];?></span>
				</p>
                <p class="label">
					<label class="labeldetails">Staff ID</label>
                    <span class="labelcolon">:</span>
                    <span class="details"><?php echo $userData['staffid'];?></span>
				</p>
			</fieldset>
			<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editprofilemodal">
			  Edit Profile
			</button>
		<?php
		}
		?>
		
        </div>

        <?php
		if(isset($_SESSION['name'])){
			$userData = getUsersData($_SESSION['name']);
		?>
        <div id="Password" class="tabcontent">
		
			<p>Change Password</p>
			<?php include"errors.php";?>
			<form id="changepwsd" method="post" action="profileadminfunction.php" novalidate>
				<input type="password" id="pwsd" name="pwsd" placeholder="old password" maxlength="25"/>
                <span class ="eye" onclick="showPwsd()">
                    <i id="hide1" class="fa fa-eye"></i>
                    <i id="hide2" class="fa fa-eye-slash"></i>
                </span>
				<br/>
				<input type="password" id="pwsd2" name="pwsd2" placeholder="new password" maxlength="25"/>
                <span class ="eye" onclick="showPwsd2()">
                    <i id="hide3" class="fa fa-eye"></i>
                    <i id="hide4" class="fa fa-eye-slash"></i>
                </span>
				<br/>
				<input type="password" id="pwsd3" name="pwsd3" placeholder="re-enter new password" maxlength="25"/>
                <span class ="eye" onclick="showPwsd3()">
                    <i id="hide5" class="fa fa-eye"></i>
                    <i id="hide6" class="fa fa-eye-slash"></i>
                </span>
				<br/>
				<input type="submit" name="confirmpass" value="Confirm"/>
			</form>
        </div>
		<?php
		}
		?>

        <div id="History" class="tabcontent">
            <p>Display training History</p>
        </div>
		
		<?php
		if(isset($_SESSION['name'])){
			$userData = getUsersData($_SESSION['name']);
			?>
		<div id="Delete" class="tabcontent">
		
		<div class="modal fade design" id="deleteprofilemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
		  <div class="modal-dialog modal-lg">
			<div class="modal-content">
			  <div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">Delete Account</h3>
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
            <p class="deleteAcc"><b>Delete Account</b></p>
            <p class="deleteAccWarn">***NOTE***</p>
            <p class="deleteAccWarn">All deleted data will not be able to be restored</p>
		</fieldset>
			<button type="button" class="btn-danger" data-bs-toggle="modal" data-bs-target="#deleteprofilemodal">
			  Delete
			</button>
        </div>
		<?php
		}
		?>
		
    </section>
    <section>
        <?php include "chatadmin.php";?>
    </section>
  <?php include "footer.php"; ?>	
	
</body>
  
</html>