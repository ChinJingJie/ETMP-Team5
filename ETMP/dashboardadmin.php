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
		<div class="content">
			<?php if (isset($_SESSION['success'])): ?>
				<div class="error success">
					<h3>
						<?php
							//echo $_SESSION['success'];
							//unset($_SESSION['success']);
						?>
					</h3>
				</div>
			<?php endif ?>
		
			<?php if (isset($_SESSION["name"])): ?>
				<p>Welcome <strong><?php echo $_SESSION['name']; ?></strong></p>
			<?php endif ?>
		</div>
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
    </section>
    <div class="sticky">
        <a href="#">
	       <i class="fa fa-comment"></i>
        </a>
    </div>
  <?php include "footer.php"; ?>
  
</body>
  
</html>