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
			<table cellpadding="0" cellspacing="0" >
				<tr class="top" >
					<td colspan="2" class = "invoiceTablePart1">
						<table class = "invoiceFirstTable">
							<tr class = "ITopTable">
								<td class="title">
									<img src="images/company_logo.png" style="width: 100%; max-width: 300px" />
								</td>

								<td class = "iDetails">
									<br>
									<p id = "invoiceID"></p>
									<p id = "Cdate"></p>
								</td>
							</tr>
						</table>
					</td>
				</tr>

				<tr class="information">
					<td colspan="2" class = "invoiceTablePart2">
						<table >
							<tr>
								<td>
								<br>
									<p id= "invLoc1">Swinburne University of Technology</p>
									<p id= "invLoc2">Jalan Simpang Tiga<p/>
									<p id= "invLoc3">93350 Kuching, Sarawak, Malaysia</p>
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
					<td>Program</td>

					<td>Price</td>
				</tr>

				<tr class="item">
					<td id ="trainingProgram2"></td>
					<td id = "trainingProgramPrice"></td>
				</tr>

				<tr class="item">
					<td id = "trainingLength"></td>
					<td id = "trainingDailyPrice"></td>
				</tr>
				<tr class="total">
					<td id = "EmptyInvoiceBox"></td>
					<td id ="trainingTotalPrice"></td>
				</tr>
			</table>
		</div>
		
    </section>
  <?php include "footer.php"; ?>
</body>
  
</html>