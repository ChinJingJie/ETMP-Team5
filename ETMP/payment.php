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
        <form id="paymentForm" method="post" action = "paymentprocess.php" enctype="multipart/form-data"  novalidate="novalidate">
        <fieldset>
            <legend>How to pay?</legend>
            <p class="left1"><b class="white">Step 1:</b> Grab the back account information below and pay the money through Direct Bank In (ATM) or Online Transfer</p>
            <p class="left"><b class="white">Bank Account details</b><br/>Account Name	: Swinburne Sarawak Sdn Bhd<br/>Bank Name	: CIMB Bank Berhad<br/>Account Number	: 80-0526998-9</p>
            
            <p class="left1"><b class="white">Step 2:</b> Upload the proof that the transaction is sucessful.</p>
            <p class="hLine1"></p>
            <p>
		      <label for="trainingID">Training ID</label>
              <span class="labelcolon">:</span>
			  <input type="text" id="trainingID" name="trainingID" value="" placeholder="Training ID" maxlength="25" readonly/>
		    </p>
            <span id="paymentErr"></span>
            <p>
              <label for="payment" class="required">Proof of payment</label>
              <span class="labelcolon">:</span>
              <input type="file" id="newPayment" name="newPayment" accept="image/jpg,image/png,image/jpeg,application/pdf"/>
            </p>
            <script>
                //print name of file selected to upload and restric size to 25MB
                const input = document.getElementById('payment')
                input.addEventListener('change', (event) => {
                  const target = event.target
                    if (target.files && target.files[0]) {
                      const maxAllowedSize = 25 * 1024 * 1024;
                      if (target.files[0].size > maxAllowedSize) {
                        target.value = '';
                        document.getElementById("paymentErr").style.color = "red";
                        document.getElementById("paymentErr").textContent="Failed: File size exceed 25MB";        
                      }else{
                        document.getElementById("paymentErr").textContent="";
                      }
                  }
                })
            </script>
            <div class="button">
                <input type="submit" name="proof" class="btn btn-primary" value="Submit"/>
                <input type="submit" name="cancellation" class="btn btn-primary" value="Cancel"/>
            </div>
          </fieldset>
        </form>
    </section>
    <section>
        <?php include "chat.php";?>
    </section>
  <?php include "footer.php"; ?>
  
</body>
  
</html>