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
            <button class="tablinks" onclick="openTab(event, 'Delete')">Delete Account</button>
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
						<input type="text" id="phone" name="phoneno" value="<?php echo $userData['phone']?>" placeholder="0123456789" maxlength="11"/>
					</div>
					  
					<div class="form-group">
						<label for="occupation" class="required">Occupation</label>
                        <span class="labelcolons">:</span>
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
					<label class="labeldetails">Occupation</label>
                    <span class="labelcolon">:</span>
                    <span class="details"><?php echo $userData['occupation'];?></span>
				</p>
			</fieldset>
			<button type="button" data-bs-toggle="modal" data-bs-target="#editprofilemodal">
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
			<form id="changepwsd" method="post" action="profileclientfunction.php" novalidate>
				<input type="text" id="pwsd" name="pwsd" placeholder="old password" maxlength="25"/>
				<br/>
				<input type="text" id="pwsd2" name="pwsd2" placeholder="new password" maxlength="25"/>
				<br/>
				<input type="text" id="pwsd3" name="pwsd3" placeholder="re-enter new password" maxlength="25"/>
				<br/>
				<input type="submit" name="confirmpass" value="Confirm"/>
			</form>
        </div>
		<?php
		}
		?>

        <div id="History" class="tabcontent">
             <?php
					if(isset($_SESSION['name'])){
						$userData = getUsersData($_SESSION['name']);
						$name = $userData['name'];
					}
					$connection = mysqli_connect('sql6.freesqldatabase.com','sql6410152','BpVpCG11xT','sql6410152');
					$db = mysqli_select_db($connection,'sql6405286');
							
					$query = "SELECT * FROM application WHERE name = '$name' and isComplete = '1' and rating != '0'";
					$query_run = mysqli_query($connection,$query);
        
            while($row = mysqli_fetch_array($query_run)){
                ?>
                <div class="card2">
                  <div class="text">
                    <p>Training ID: <b><?php echo $row['id']; ?></b></p> 
						<div class="scroll">
							<p class="label">Name: <?php echo $row['name']; ?></p>
							<p class="label">Program: <?php echo $row['program']; ?></p>
							<p class="label">Category: <?php echo $row['category']; ?></p>
							<p class="label">Start Date: <?php echo $row['date_start']; ?></p>
							<p class="label">Start Time: <?php echo $row['time_start']; ?></p>
							<p class="label">Rating: <?php echo $row['rating']; ?> stars</p>
							<p class="label">Overall Experience: <?php echo $row['overall_experience']; ?></p>
							<p class="label">Improvements: <?php echo $row['improvements']; ?></p>
							<p class="label">Comments on Trainer Performance: <?php echo $row['comments_on_trainer_performance']; ?></p>
						</div>
					</div>
                </div>
			<?php };?>
        </div>
		
		
		<?php
		if(isset($_SESSION['name'])){
			$userData = getUsersData($_SESSION['name']);
			?>
		<div id="Delete" class="tabcontent">
		
		<div class="modal fade design" id="deleteprofilemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static" >
		  <div class="modal-dialog">
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
        <?php include "chat.php";?>
    </section>
  <?php include "footer.php"; ?>
  
</body>
  
</html>