<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <?php include "navigation.php";?>
    </header>
    <section>
        <h1>Training Course Application Form</h1>
        <form id="applicationForm" method="post" action="mailto:expertdotcom@hotmail.com" novalidate="novalidate">        
	  <fieldset>	
        <legend>Details of Person In Charge</legend>
          <p>
		    <label for="picName">Full Name:</label>
			<input type="text" id="picName" name="picName" placeholder="Profile name" maxlength="25"/>
		  </p>
          <p>
		    <label for="email">Email:</label>
			<input type="text" id="email" name="email" placeholder="KennyOmega29@Gmail.com"/>
		  </p>
          <p>
		    <label for="phone">Phone Number:</label>
			<input type="text" id="phone" name="phone" placeholder="0123456789" maxlength="10"/>
		  </p>
      </fieldset>
	
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
          <select name="products" id="product">
              <option>Training 1</option>
              <option>Training 2</option>
              <option>Training 3</option>
          </select>
        </p>
        <p><label>Category:</label>
          <input type="text" id="category" placeholder="Sports" readonly/>
        </p>
        <p>
		  <label for="days">Training Start Date:</label>
		  <input type="date" id="days" name="days"/>
          <label for="days">End Date:</label>
		  <input type="date" id="days" name="days"/>
		</p>
        <p>
		  <label for="time">Training Start Time:</label>
		  <input type="time" id="time" name="time"/>
          <label for="time">End Time:</label>
		  <input type="time" id="time" name="time"/>
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
        <input type="submit" value="Booking"/>
        <button>Save</button>
        <button>Cancel</button>
        <?php include "enquiry_processr.php"; ?>
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