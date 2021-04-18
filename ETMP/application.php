<?php include ('userdata.php');?>
<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body onload="autoProductName()">
    <header>
        <?php include "navigation.php";?>
    </header>
    <section>
        <h1>Training Course Application Form</h1>
        <form id="applicationForm" method="post" action = "applicationprocess.php" enctype="multipart/form-data" novalidate="novalidate" onSubmit="if(!confirm('Proceed to form submission?')){return false;}">     
	  <?php
		if(isset($_SESSION['name'])){
			$userData = getUsersData($_SESSION['name']);
			?>
	  <fieldset>	
        <legend>Details of Person In Charge</legend>
          <p>
		    <label for="picName">Full Name:</label>
			<input type="text" id="picName" name="picName" value="<?php echo $userData['name']?>" placeholder="Profile name" maxlength="25" readonly/>
		  </p>
          <p>
		    <label for="email">Email:</label>
			<input type="text" id="email" name="email" value="<?php echo $userData['email']?>" placeholder="KennyOmega29@Gmail.com" readonly/>
		  </p>
          <p>
		    <label for="phone">Phone Number:</label>
			<input type="text" id="phone" name="phone" value="<?php echo $userData['phone']?>" placeholder="0123456789" maxlength="10" readonly/>
		  </p>
      </fieldset>
	  <?php
		}
		?>
		
	
	  <fieldset>
		<legend>Training Venue</legend>
          <p>
		    <label for="venue">Venue Name:</label>
			<input type="text" id="venue" name="venue" placeholder="Sova Hall" maxlength="40"/>
		  </p>
          <p>
		    <label for="street">Street Address:</label>
			<input type="text" id="street" name="address" placeholder="Jalan Sesame Street" maxlength="40"/>
		  </p>
          <p>
		    <label for="city">City/Town:</label>
			<input type="text" id="city" name="city" placeholder="Kuching" maxlength="20"/>
		  </p>
          <p>
		    <label for="code">Postcode:</label>
			<input type="text" id="code" name="postcode" placeholder="93300" maxlength="5"/>
		  </p>           
      </fieldset>
        
      <fieldset>   
        <legend>Training Course</legend>
        <p><label>Training Program:</label>
          <select name="tcourse" id="tcourse" onchange="programSelection(this)">
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
              <input type="text" id="dynamicName" style="display: none;" placeholder="program name">
          </select>
        </p>
        <p><label>Category:</label>
          <input type="text" id="category" name="category" placeholder="Sports"/>
        </p>
        <p>
		  <label for="days">Training Start Date:</label>
		  <input type="date" id="Stdays" name="Stdays"/>
          <label for="days">End Date:</label>
		  <input type="date" id="Edays" name="Edays"/>
		</p>
        <p>
		  <label for="time">Training Start Time:</label>
		  <input type="time" id="Stime" name="Stime"/>
          <label for="time">End Time:</label>
		  <input type="time" id="Etime" name="Etime"/>
		</p>
        <p>
		  <label for="template">Training Template:</label>
		  <input type="file" id="template" name="template"/>
		</p>
        <p>
		  <label class="comment" for="comment">Remarks</label>
		  <br/>
		  <textarea id="comment" name="comment" rows="4" cols="50" placeholder="Enter remarks if any"></textarea>
		</p>           
      </fieldset>   
      <div class="button">
        <input type="submit" name="booking" class="btn btn-primary" value="Booking"/>
        <input type="submit" name="save" class="btn btn-secondary" value="Save"/>
        <input type="submit" name="cancel" class="btn btn-danger" value="Cancel"/>
      </div>
	</form>
    </section>
    <div class="sticky">
        <a href="#">
	       <i class="fa fa-comment"></i>
        </a>
    </div>
  <?php include "footer.php"; ?>
  
</body>
  
</html>
