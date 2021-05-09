<?php include ('userdata.php');?>
<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <?php include "navigation.php";?>
    </header>
    <section>
        <h1>Payment</h1>
        <form id="paymentForm" method="post" action = "" novalidate="novalidate">  
        <fieldset>
            <h2>How to pay?</h2>
            <p><b>Step 1:</b> Grab the back account information below and pay the money through Direct Bank In (ATM) or Online Transfer</p>
            <p><b>Bank Account details</b><br/>Account Name	: Swinburne Sarawak Sdn Bhd<br/>Bank Name	: CIMB Bank Berhad<br/>Account Number	: 80-0526998-9</p>
            
            <p><b>Step 2:</b> Upload the proof that the transaction is sucessful.</p>
            <p class="hLine1"></p>
            <p>
		      <label for="trainingID">Training ID</label>
              <span class="labelcolon">:</span>
			  <input type="text" id="trainingID" name="trainingID" value="" placeholder="Training ID" maxlength="25" readonly/>
		    </p>
            <p>
              <label for="payment" class="required">Proof of payment</label>
              <span class="labelcolon">:</span>
              <input type="file" id="payment" name="payment"/>
            </p>
            <div class="button">
                <input type="submit" name="proof" class="btn btn-primary" value="Submit"/>
                <input type="submit" name="cancellation" class="btn btn-primary" value="Cancel"/>
            </div>
          </fieldset>
        </form>
    <section>
        <?php include "chat.php";?>
    </section>
  <?php include "footer.php"; ?>
  
</body>
  
</html>