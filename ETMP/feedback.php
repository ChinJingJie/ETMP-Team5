<?php include ('userdata.php');?>
<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <?php include "navigation.php";?>
    </header>
    <section>
        <h1>Feedback Form</h1>
        <form id="feedbackForm" method="post" action = "" enctype="multipart/form-data" novalidate="novalidate">     
	  <?php
		if(isset($_SESSION['name'])){
			$userData = getUsersData($_SESSION['name']);
			?>
	  <fieldset>	
        <legend>Details of Completed Training</legend>
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
		  <p>
		    <label for="phone">Training Name</label>
            <span class="labelcolon">:</span>
			<input type="text" id="phone" name="phone" value="<?php echo $userData['phone']?>" placeholder="0123456789" maxlength="10" readonly/>
		  </p>
      </fieldset>
	  <?php
		}
		?>
		
	  <fieldset>
		<legend>Feedback</legend>
		 <p>
		 <label for="rating" id ="rating" class="required rate">Rating</label>
		 </p>
		<div class="stars">
		  <form action="">
			<input class="star star-5" id="star-5" type="radio" name="star" value = "1"/>
			<label class="star star-5" for="star-5"></label>
			<input class="star star-4" id="star-4" type="radio" name="star" value = "2"/>
			<label class="star star-4" for="star-4"></label>
			<input class="star star-3" id="star-3" type="radio" name="star" value = "3"/>
			<label class="star star-3" for="star-3"></label>
			<input class="star star-2" id="star-2" type="radio" name="star" value = "4"/>
			<label class="star star-2" for="star-2"></label>
			<input class="star star-1" id="star-1" type="radio" name="star"value = "5" />
			<label class="star star-1" for="star-1"></label>
		  </form>
		</div>
          <p class="hLine1"></p>
          <p>
		    <label for="experience" id = "experiences"  class="required comment">Overall Experience</label>
			<textarea id="experience" name="experience" rows="4" cols="50" placeholder="Describe the Attractive and Uninteresting parts of the training"></textarea>
		  </p>
          <p>
		    <label for="improvement" class="required comment">Improvements</label>
			<textarea id="improvement" name="improvement" rows="4" cols="50" placeholder="Suggestions for improvements in future training"></textarea>
		  </p>
          <p>
		    <label for="TrainPerform" class="required comment">Comments on Trainer Performance</label>
			<textarea id="TrainPerform" name="TrainPerform" rows="4" cols="50" placeholder="What do you think about your trainer's performance"></textarea>
		  </p>  	  
      </fieldset> 
      <div class="button">

        <button type="submit" name="feedback" onclick="btnSelect('submit')">Submit</button>
        <button type="button"><a href="dashboard.php">Cancel</a></button>
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
