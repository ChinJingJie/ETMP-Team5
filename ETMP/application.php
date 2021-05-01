<?php include ('userdata.php');?>
<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <?php include "navigation.php";?>
    </header>
    <section>
        <h1>Training Course Application Form</h1>
        <form id="applicationForm" method="post" action = "applicationprocess.php" enctype="multipart/form-data" novalidate="novalidate">     
	  <?php
		if(isset($_SESSION['name'])){
			$userData = getUsersData($_SESSION['name']);
			?>
	  <fieldset>	
        <legend>Details of Person In Charge</legend>
          <p>
		    <label for="picName">Full Name</label>
            <span class="labelcolon">:</span>
			<input type="text" id="picName" name="picName" value="<?php echo $userData['name']?>" placeholder="Profile name" maxlength="25" readonly/>
		  </p>
          <p>
		    <label for="email">Email</label>
            <span class="labelcolon">:</span>
			<input type="text" id="email" name="email" value="<?php echo $userData['email']?>" placeholder="KennyOmega29@Gmail.com" readonly/>
		  </p>
          <p>
		    <label for="phone">Phone Number</label>
            <span class="labelcolon">:</span>
			<input type="text" id="phone" name="phone" value="<?php echo $userData['phone']?>" placeholder="0123456789" maxlength="10" readonly/>
		  </p>
      </fieldset>
	  <?php
		}
		?>
		
	
	  <fieldset>
		<legend>Training Venue</legend>
          <p>
		    <label for="venue" class="required">Venue Name</label>
            <span class="labelcolon">:</span>
			<input type="text" id="venue" name="venue" placeholder="Sova Hall" maxlength="40"/>
		  </p>
          <p>
		    <label for="street" class="required">Street Address</label>
            <span class="labelcolon">:</span>
			<input type="text" id="street" name="address" placeholder="Jalan Sesame Street" maxlength="40"/>
		  </p>
          <p>
		    <label for="city" class="required">City/Town</label>
            <span class="labelcolon">:</span>
			<input type="text" id="city" name="city" placeholder="Kuching" maxlength="20"/>
		  </p>
          <p>
		    <label for="code" class="required">Postcode</label>
            <span class="labelcolon">:</span>
			<input type="text" id="code" name="postcode" placeholder="93300" maxlength="5"/>
		  </p>           
      </fieldset>
        
      <fieldset>   
        <legend>Training Course</legend>
        <p><label class="required">Training Program</label>
          <span class="labelcolon">:</span>
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
              <option>Others</option>
              <input type="text" id="dynamicName" style="display: none;" placeholder="program name" value="Example Name">
          </select>
        </p>
        <p><label class="required">Category</label>
          <span class="labelcolon">:</span>
          <select name="tcats" id="tcats" style="display:none;">
              <?php
                    $connection = mysqli_connect("sql6.freemysqlhosting.net","sql6405286","csc3XZRv7d");
                    $db = mysqli_select_db($connection,'sql6405286');

                    $query = " SELECT * FROM training ";
                    $query_run = mysqli_query($connection,$query);

                    while($row = mysqli_fetch_array($query_run)){
                        ?>
                        <option><?php echo $row['category']; ?></option>
                        <?php
                    }
              ?>
          </select>
          <input type="text" id="category" name="category" placeholder="Sports"/>
        </p>
        <p>
		  <label for="days" class="required">Training Start Date</label>
          <span class="labelcolon">:</span>
		  <input type="date" id="Stdays" name="Stdays"/>
        </p>
        <p>
          <label for="days" class="required">End Date</label>
          <span class="labelcolon">:</span>
		  <input type="date" id="Edays" name="Edays"/>
		</p>
        <p>
		  <label for="time" class="required">Training Start Time</label>
          <span class="labelcolon">:</span>
		  <input type="time" id="Stime" name="Stime"/>
        </p>
        <p>
          <label for="time" class="required">End Time</label>
          <span class="labelcolon">:</span>
		  <input type="time" id="Etime" name="Etime"/>
		</p>
        <p>
		  <label for="template" class="required">Training Template</label>
          <span class="labelcolon">:</span>
		  <input type="file" id="template" name="template" placeholder="URL link"/>
		</p>
        <p class="hLine1"></p>
        <p>
		  <label class="comment" for="comment">Remarks</label>
		  <br/>
		  <textarea id="comment" name="comment" rows="4" cols="50" placeholder="Enter remarks if any"></textarea>
		</p>           
      </fieldset>   
      <div class="button">
        <!--<input type="submit" name="booking" class="btn btn-primary" value="Booking"/>
        <input type="submit" name="save" class="btn btn-primary" value="Save"/>-->
        <button type="submit" name="booking" onclick="btnSelect('book')">Booking</button>
        <button type="submit" name="save" onclick="btnSelect('save')">Save</button>
        <button type="button"><a href="trainingcourse.php">Cancel</a></button>
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
