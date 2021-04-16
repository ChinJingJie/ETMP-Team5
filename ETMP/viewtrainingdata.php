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
			<input type ="text" name="tname" placeholder="Enter Training Name"/>
			<input type="submit" name="search" value="Search"/>
		</form>
		<center>
			<table>
				<tr>
					<th>ID</th>
					<th>Picture</th>
					<th>Training Name</th>
					<th>Training Description </th>
					<th>Training Category</th>
					<th>Training Template </th>
				</tr> <br>
				<?php
				//connection or link to database
				$conn = mysqli_connect('sql6.freemysqlhosting.net','sql6405286','csc3XZRv7d');
				$db = mysqli_select_db($conn, 'sql6405286');
				
				$sql = "SELECT id, pic, tname, tdesc, category, tTemplate FROM training";
				$result = $conn->query($sql);
				if ($result->num_rows > 0) {
				// output data of each row
				while($row = $result->fetch_assoc()) {
					if(isset($_POST['search'])) {
						$tname = $_POST['tname'];
						$user_check_query = "SELECT * FROM training WHERE tname = '$tname'";
						$query_run = mysqli_query($conn, $user_check_query);
							
						while($row = mysqli_fetch_array($query_run))
						{
							?>
							<tr>
								<td><?php echo $row['id']; ?></td>
								<td><?php echo '<img src="data:image;base64,'.base64_encode($row['pic']).'" alt="Image" style="width: 100px; height: 100px;">'; ?></td>
								<td><?php echo $row['tname']; ?></td>
								<td><?php echo $row['tdesc']; ?></td>
								<td><?php echo $row['category']; ?></td>
								<td><?php echo $row['tTemplate']; ?></td>
							</tr>
							<?php
							
						}
						break;
					}
					else
					{
						echo "<tr><td>" . $row["id"]. "</td><td>" . '<img src="data:image;base64,'.base64_encode($row['pic']).'" alt="Image" style="width: 100px; height: 100px;">'. "</td><td>". $row["tname"]. "</td>
						<td>" . $row["tdesc"]. "</td><td>" . $row["category"]. "</td><td>" . $row["tTemplate"]. "</td></tr>";
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
