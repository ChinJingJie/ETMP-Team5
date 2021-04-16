<?php include "registrationadminprocess.php"; ?>

<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <?php include "navigationadmin.php";?>
    </header>
    <section>
        <h1>Welcome to Expert Training Management Portal</h1>
        <h2>Search Data from Training Application Database by Name</h2>
		
		<form action="" method="POST">
			<input type ="text" name="taname" placeholder="Enter Training Application Name"/>
			<input type="submit" name="search" value="Search"/>
		</form>
		<center>
			<table>
				<tr>
					<th>ID</th>
					<th>Training Accepted</th>
					<th>Training Completed</th>
					<th>Training Name </th>
					<th>Email</th>
					<th>Phone </th>
					<th>Venue</th>
					<th>Street</th>
					<th>City</th>
					<th>Postcode</th>
					<th>Program</th>
					<th>Category</th>
					<th>Start Date</th>
					<th>End Date</th>
					<th>Start Time</th>
					<th>End Time</th>
					<th>Template</th>
					<th>Remarks</th>
				</tr> <br>
				<?php
				//connection or link to database
				$conn = mysqli_connect('sql6.freemysqlhosting.net','sql6405286','csc3XZRv7d');
				$db = mysqli_select_db($conn, 'sql6405286');
				
				$sql = "SELECT id, isAccepted, isComplete, name, email, phone, venue, street, city, postcode, program, category,
						date_start, date_end, time_start, time_end, template, remarks FROM application";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					if(isset($_POST['search'])) {
						$taname = $_POST['taname'];
						$user_check_query = "SELECT * FROM application WHERE name = '$taname'";
						$query_run = mysqli_query($conn, $user_check_query);
							
						while($row = mysqli_fetch_array($query_run))
						{
							?>
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td>
								<?php if($row['isAccepted'] == 0)
								{
									echo "Yes"; 
								}
								else
								{
									echo "No"; 
								}
								?>
								</td>
								<td>
								<?php if($row['isComplete'] == 0)
								{
									echo "Yes"; 
								}
								else
								{
									echo "No"; 
								}
								?>
								</td>
								<td><?php echo $row['name']; ?></td>
								<td><?php echo $row['email']; ?></td>
								<td><?php echo $row['phone']; ?></td>
								<td><?php echo $row['venue']; ?></td>
								<td><?php echo $row['street']; ?></td>
								<td><?php echo $row['city']; ?></td>
								<td><?php echo $row['postcode']; ?></td>
								<td><?php echo $row['program']; ?></td>
								<td><?php echo $row['category']; ?></td>
								<td><?php echo $row['date_start']; ?></td>
								<td><?php echo $row['date_end']; ?></td>
								<td><?php echo $row['time_start']; ?></td>
								<td><?php echo $row['time_end']; ?></td>
								<td><?php echo $row['template']; ?></td>
								<td><?php echo $row['remarks']; ?></td>
							</tr>
							<?php
							
						}
						break;
					}
					else
					{
						echo "<tr><td>" . $row["id"]. "</td><td>". $row["isAccepted"]. "</td>
						<td>" . $row["isComplete"]. "</td><td>" . $row["name"]. "</td><td>" . $row["email"]. "</td>
						<td>" . $row["phone"]. "</td><td>" . $row["venue"]. "</td><td>" . $row["street"]. "</td>
						<td>" . $row["city"]. "</td><td>" . $row["postcode"]. "</td><td>" . $row["program"]. "</td>
						<td>" . $row["category"]. "</td><td>" . $row["date_start"]. "</td><td>" . $row["date_end"]. "</td>
						<td>" . $row["time_start"]. "</td><td>" . $row["time_end"]. "</td><td>" . $row["template"]. "</td>
						<td>" . $row["remarks"]. "</td></tr>";
					}
					
				}
				echo "</table>";
				} else { echo "0 results"; }
				$conn->close();
				?>
			</table>
		</center>
		
    <div class="sticky">
        <a href="#">
	       <i class="fa fa-comment"></i>
        </a>
    </div>
  <?php include "footer.php"; ?>
  
</body>
  
</html>
