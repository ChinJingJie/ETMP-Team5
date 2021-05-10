<?php include ('userdata.php');?>
<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <?php include "navigation.php";?>
    </header>
    <section>
        <h1>Welcome to Expert Training Management Portal</h1>
        <h2>Training Requisition in Progress</h2>
		<br><br>
		
        <div class="invoice-box">
			<table cellpadding="0" cellspacing="0">
				<tr class="top">
					<td colspan="2">
						<table>
							<tr>
								<td class="title">
									<img src="images/company_logo.png" style="width: 100%; max-width: 300px" />
								</td>

								<td>
									Invoice #: 123<br />
									<p id = "Cdate"></p>
									Due: February 1, 2015
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2">
						<table>
							<tr>
								<td>
									Swinburne University of Technology<br />
									Jalan Simpang Tiga<br />
									93350 Kuching, Sarawak, Malaysia
								</td>

								<td>
									<p id ="trainingID"></p>
									<p id ="trainingName"></p>
									<p id ="trainingProgram"></p> 
									<p id ="trainingStartDate"></p>
								    <p id ="trainingEndDate"></p>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="heading">
					<td>Payment Method</td>

					<td>Check #</td>
				</tr>

				<tr class="details">
					<td>Check</td>

					<td>1000</td>
				</tr>

				<tr class="heading">
					<td>Item</td>

					<td>Price</td>
				</tr>

				<tr class="item">
					<td>Website design</td>

					<td>$300.00</td>
				</tr>

				<tr class="item">
					<td>Hosting (3 months)</td>

					<td>$75.00</td>
				</tr>

				<tr class="item last">
					<td>Domain name (1 year)</td>

					<td>$10.00</td>
				</tr>

				<tr class="total">
					<td></td>

					<td>Total: $385.00</td>
				</tr>
			</table>
		</div>
		
    </section>
  <?php include "footer.php"; ?>
</body>
  
</html>