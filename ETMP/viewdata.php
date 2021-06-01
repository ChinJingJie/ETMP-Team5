<?php include "registrationadminprocess.php"; ?>
<?php include('admindata.php')?>

<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <?php include "navigationadmin.php";?>
    </header>
    <section>
        <h1>Client Database</h1>
        <h2>Search Data from Database by Name</h2>
		
		<form action="" method="POST" class="left">
			<input type ="text" name="name" placeholder="Enter Client Full Name"/>
			<input type="submit" name="search" value="Search"/>
		</form>
        <p class="highlight">Search result:</p>
        <div class="row justify-content-center tabClr">
            <table class="table">
            <?php
				//connection or link to database
				$conn = mysqli_connect('sql6.freesqldatabase.com','sql6416331','WBlQPE6vKx','sql6416331');
				$db = mysqli_select_db($conn, 'sql6416331');
					
				if(isset($_POST['search'])) {
					$name = $_POST['name'];
					$user_check_query = "SELECT * FROM users WHERE name = '$name'";
					$query_run = mysqli_query($conn, $user_check_query);
					
					
					while($row = mysqli_fetch_array($query_run))
					{
						?>
                        <thead>
                            <tr>
                                <th>Full Name </th>
                                <th>Email Address </th>
                                <th>Phone Number </th>
                                <th>Occupation </th>
                            </tr>
                        </thead>
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
        </div>
    </section>
    <section>
        <?php include "chatadmin.php";?>
    </section>
  <?php include "footer.php"; ?>
  
</body>
  
</html>
