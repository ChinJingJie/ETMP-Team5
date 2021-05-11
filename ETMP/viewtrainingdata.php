<?php 
//include "registrationadminprocess.php"; ?>

<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>

    <header>
        <?php include "navigationadmin.php";?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script>
        $(document).ready(function(){
          $(".edit").click(function(){
            $.ajax({url: "trainingeditdata.php?id="+$(this).data('id'), success: function(result){
               //result not empty
               if (result) {
                // assign result  to each label/ text
                var resu = JSON.parse(result);

                $("#id3").val(resu.id);
                $("#picture3").val(resu.pic);
                $("#tName3").val(resu.tname);
                $("#tDesc3").val(resu.tdesc);
                $("#tCat3").val(resu.category);
                $("#tTemp3").val(resu.tTemplate);
                $("#addBasePrice3").val(resu.base_price);
                $("#addDailyPrice3").val(resu.daily_price);

               }

            }});
          });
        });
		
    </script>
    </header>
    <section>
        <h1>Welcome to Expert Training Management Portal</h1>
        <h2>Search Data from Training Database by Training Name</h2>
		
		<form action="" method="POST" class="left">
			<input type ="text" name="tname" placeholder="Enter Training Name"/>
			<input type="submit" name="search" value="Search"/>
		</form>
        <p class="highlight">Result:</p>
        <div class="result">
			<table class="tables">
                <thead>
                    <tr>
                        <th>Picture</th>
                        <th>Training Name</th>
                        <th>Training Description</th>
                        <th>Training Category</th>
                        <th>Training Template</th>
                        <th>Selection</th>
                    </tr>
                </thead>
				<?php
				//connection or link to database
				$conn = mysqli_connect('sql6.freesqldatabase.com','sql6410152','BpVpCG11xT','sql6410152');
				$db = mysqli_select_db($conn, 'sql6405286');
				
				$sql = "SELECT id, pic, tname, tdesc, category, tTemplate, base_price, daily_price FROM training";
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
								<td><?php echo '<img src="data:image;base64,'.base64_encode($row['pic']).'" alt="Image" style="width: 100px; height: 100px;">'; ?></td>
								<td><?php echo $row['tname']; ?></td>
								<td><?php echo $row['tdesc']; ?></td>
								<td><?php echo $row['category']; ?></td>
								<td><?php echo $row['tTemplate']; ?></td>
								<td>
                                    <button type="button" class ="edit" data-bs-toggle="modal" data-bs-target="#editsavemodal" data-id ="<?php echo $row['id'];?>" >
                                    Edit
                                    </button>
								</td>
							</tr>
							<?php
							
						}
						break;
					}
					else
					{
							?>
							<tr>
								<td><?php echo '<img src="data:image;base64,'.base64_encode($row['pic']).'" alt="Image" style="width: 100px; height: 100px;">'; ?></td>
								<td><?php echo $row['tname']; ?></td>
								<td><?php echo $row['tdesc']; ?></td>
								<td><?php echo $row['category']; ?></td>
								<td><?php echo $row['tTemplate']; ?></td>
								<td>
                                    <button type="button" class ="edit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editsavemodal" data-id ="<?php echo $row['id'];?>">
                                    Edit
                                    </button>
								</td>
							</tr>
							<?php
					}
					
				}
				} else { echo "0 results"; }?>


	<div class="modal fade design" id="editsavemodal" tabindex="-1" data-bs-backdrop="static" aria-labelledby="exampleModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<h3 class="modal-title" id="exampleModalLabel">Edit</h3>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			  </div>
				<form id="EditTrainingForm" method="post" action="trainingdb.php" enctype="multipart/form-data">
				  <div class="modal-body">
				  
					<div class="form-group">
						<label for="id" class="required">Training ID</label>
                        <span class="labelcolons">:</span>
						<input type = "text"  name="id" id ="id3" value="" readonly/>
					</div>
					
					<div class="form-group">
						<label for="picture" class="required">Picture</label>
                        <span class="labelcolons">:</span>
						<input type = "file" name = "picture" id ="picture3" value=""/>
					</div>
					
					<div class="form-group">
						<label for="tName" class="required">Training Name</label>
                        <span class="labelcolons">:</span>
						<input type = "text" name = "tName" id ="tName3" value =""/>					
					</div>  
					
					<div class="form-group">
						<label for="tCat" class="required">Training Category</label>
                        <span class="labelcolons">:</span>
						<input type = "text" name ="tCat" id ="tCat3" value =""/>
					</div>
					  
					<div class="form-group">
						<label for="tTemp" class="required">Training Template</label>
                        <span class="labelcolons">:</span>
						<input type = "text" name = "tTemp" id ="tTemp3" value=""/>
					</div>  
                     
					<div class="form-group">
						<label for="addBaseP" class="required">Training Base Price</label>
                        <span class="labelcolons">:</span>
                        <input type="text" name="addBaseP" id="addBasePrice3" placeholder=""/>
                    </div>
					  
					<div class="form-group">
                        <label for="addDailyP" class="required">Training Daily Price</label>
                        <span class="labelcolons">:</span>
                        <input type="text" name="addDailyP" id="addDailyPrice3" placeholder=""/>
					</div>
					
                    <div class="form-group">
                        <div class="hLine1"></div>
                        <label class="labelling required" for="tDesc">Description</label>
                        <textarea id="tDesc3" name="tDesc" rows="4" cols="20" placeholder="Enter short description and occupation that suits the course/program"></textarea>
                      </div>
				  </div>
				 
				  <div class="modal-footer">
					<button type="submit" name="updatetrainingdata" class="btn btn-info">Update</button>
				  </div>

				</form>
			</div>
		  </div>
		</div>
				
			<?php
				//$conn->close();
				
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
