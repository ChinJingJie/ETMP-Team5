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
        <h2>Search Data from Database by Name</h2>
		
		<form action="" method="POST">
			<input type ="text" name="name" placeholder="Enter Client Full Name"/>
			<input type="submit" name="search" value="Search"/>
		</form>
		<center>
			<table>
				<tr>
					<th>Full Name </th>
					<th>Email Address </th>
					<th>Phone Number </th>
					<th>Occupation </th>
				</tr> <br>
				<?php
				//connection or link to database
				$conn = mysqli_connect('sql6.freemysqlhosting.net','sql6405286','csc3XZRv7d');
				$db = mysqli_select_db($conn, 'sql6405286');
					
				if(isset($_POST['search'])) {
					$name = $_POST['name'];
					$user_check_query = "SELECT * FROM users WHERE name = '$name'";
					$query_run = mysqli_query($conn, $user_check_query);
						
					while($row = mysqli_fetch_array($query_run))
					{
						?>
						<tr>
							<td><?php echo $row['name']; ?></td>
							<td><?php echo $row['email']; ?></td>
							<td><?php echo $row['phone']; ?></td>
							<td><?php echo $row['occupation']; ?></td>
						</tr>
						<?php
					}
				}
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
