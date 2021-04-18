<?php include('registrationadminprocess.php')?>

<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <?php include "navigationadmin.php";?>
    </header>
    <section>
        <h1>Welcome to Expert Training Management Portal</h1>
        <h2>Overview of Training Requisition In Charged</h2>
		
        <div class="accordion">
            <div class="progress-tab">
                <input type="checkbox" id="chck1"/>
                <label class="progress-label" for="chck1">Training Program Application</label>
                <div class="tab-content">
                    <p>Information of cards after submit form before itinerary generated</p>
                </div>
            </div>
        </div>
        <div class="accordion">
            <div class="progress-tab">
                <input type="checkbox" id="chck2"/>
                <label class="progress-label" for="chck2">Training Program Confimation</label>
                <div class="tab-content">
                    <p>Information of cards waiting the itinerary to be confirmed</p>
                </div>
            </div>
        </div>
        <div class="accordion">
            <div class="progress-tab">
                <input type="checkbox" id="chck3"/>
                <label class="progress-label" for="chck3">Payment</label>
                <div class="tab-content">
                    <p>Information of cards waiting for payment to be made and validated</p>
                </div>
            </div>
        </div>
        <div class="accordion">
            <div class="progress-tab">
                <input type="checkbox" id="chck4"/>
                <label class="progress-label" for="chck4">To Be Trained</label>
                <div class="tab-content">
                    <p>Information of cards waiting for training to start after completing payment</p>
                </div>
            </div>
        </div>
        <div class="accordion">
            <div class="progress-tab">
                <input type="checkbox" id="chck5"/>
                <label class="progress-label" for="chck5">Feedback</label>
                <div class="tab-content">
                    <p>Information of cards waiting for feedback after training ends</p>
                </div>
            </div>
        </div>
        <div class="accordion">
            <div class="progress-tab">
                <input type="checkbox" id="chck6"/>
                <label class="progress-label" for="chck6">Completed Training</label>
                <div class="tab-content">
                    <p>Information of cards that filled the feedback and considered as completed whole training process</p>
                </div>
            </div>
        </div>
        <br/>
        <h2>Notifications Sent</h2>
        <p class="newmsg"><a>+ Add new notification</a></p>
        <div class="notification-space">
            <p>No history.</p>
        </div>
	<br/>
	<h2>Client Database</h2>
	<p>To view the Client's data, push the button below</p>
        <form method="post" action="viewdata.php">
		<input type="submit" name="confirm" value="Click Here"/>
	</form>
	<h3>Training Application Database</h3>
	<p>To view all the training Application submitted, push the button below</p>
        <form method="post" action="viewtrainingapplicationdata.php">
			<input type="submit" name="confirm" value="Click Here"/>
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
