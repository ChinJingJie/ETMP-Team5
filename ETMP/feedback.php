<?php include ('feedbackdata.php');?>
<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <?php include "navigation.php";?>
    </header>
    <section>
        <h1>Feedback Form</h1>
        <form id="feedbackForm" method="post" action = "feedbackprocess.php" novalidate="novalidate" >     
	  <?php
		if(isset($_SESSION['name'])){
			$applicationData = getApplicationData($_SESSION['name']);
			?>
	  <fieldset>	
          <p>
		    <label for="trainingID">Training ID</label>
            <span class="labelcolon">:</span>
			<input type="text" id="trainingID" name="trainingID" class="text-center" value="" placeholder="Training ID" maxlength="25" readonly/>
		  </p>
		 <p>
		 <label for="rating" id ="rating" class="text-center aline">Rating</label>
		 </p>
		<div class="stars aline2">
			<input class="star star-1" id="star-1" type="radio" name="star" value = "5"/>
			<label class="star star-1" for="star-1"></label>
			<input class="star star-2" id="star-2" type="radio" name="star" value = "4"/>
			<label class="star star-2" for="star-2"></label>
			<input class="star star-3" id="star-3" type="radio" name="star" value = "3"/>
			<label class="star star-3" for="star-3"></label>
			<input class="star star-4" id="star-4" type="radio" name="star" value = "2"/>
			<label class="star star-4" for="star-4"></label>
			<input class="star star-5" id="star-5" type="radio" name="star"value = "1" />
			<label class="star star-5" for="star-5"></label>
		</div>
          <p>
		    <label for="experience" class="text-center aline">Overall Experience</label>
			<textarea id="experience" name="experience" class="aline1" rows="4" cols="50" placeholder="Describe the Attractive and Uninteresting parts of the training"></textarea>
		  </p>
          <p>
		    <label for="improvement" class="text-center aline">Improvements</label>
			<textarea id="improvement" name="improvement" class="aline1" rows="4" cols="50" placeholder="Suggestions for improvements in future training"></textarea>
		  </p>
          <p>
		    <label for="TrainPerform" class="text-center aline">Comments on Trainer Performance</label>
			<textarea id="TrainPerform" name="TrainPerform" class="aline1" rows="4" cols="50" placeholder="What do you think about your trainer's performance"></textarea>
		  </p>  
	  <?php
		}
		?>		  
      </fieldset>
		<input type="submit" name = "feedbacksubmit" value ="Submit"/>
        <button type="button"><a href="dashboard.php">Cancel</a></button>
	</form>
    </section>
    <section>
        <?php include "chat.php";?>
    </section>
  <?php include "footer.php"; ?>
  
</body>
  
</html>
