<!DOCTYPE html>
<html lang="en">

<?php include "header.php";?>
<body>
    <header>
        <?php include "navigationadmin.php";?>
    </header>
    <section>
        <h1>Training Course</h1>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">+ Add new course</button>
        <!-- Modal -->
        <div class="modal fade design" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog box">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title" id="staticBackdropLabel">Add New Training Course Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form id="addCourseForm" method="post" action = "addcourseprocess.php">
                <div class="modal-body left">
                  <div class="form-group">
                    <label for="addIMG">Cover Image:</label>
				    <input type="file" id="addIMG" name="addIMG"/>
                  </div>
                  <div class="form-group">
                    <label for="addNAME">Course Name:</label>
				    <input type="text" id="addNAME" name="addNAME" placeholder="course name" maxlength="25"/>
                  </div>
                  <div class="form-group">
                    <label for="addDESC">Description:</label>
				    <textarea id="addDESC" name="addDESC" rows="4" cols="50" placeholder="Enter short description and occupation that suits the course/program"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="addCAT">Category:</label>
				    <select name="addCAT" id="addCAT">
                        <option> Business </option>    
                        <option> Customer Services </option> 
                        <option> Environment </option>
                        <option> Healthcare </option>
                        <option> Science </option>         
                        <option> Technology </option>         
                        <option> Animals </option>         
                        <option> Others </option>
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="addTemp">Template:</label>
				    <input type="file" id="addTemp" name="addTemp"/>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" name="addNEW" class="btn btn-info">Add</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <button>Edit existing course</button>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop1">+ Delete existing course</button>
        <!-- Modal -->
        <div class="modal fade design" id="staticBackdrop1" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog box">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title" id="staticBackdropLabel">Delete Existing Training Course</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form id="deleteCourseForm" method="post" action = "addcourseprocess.php">
                <div class="modal-body left">
                  <div class="form-group">
                    <label for="addCAT">Program Name:</label>
				    <select name="addCAT" id="addCAT">
                        <!-- need to load from database -->
                        <option> Sample1 </option>    
                        <option> Sample2 </option> 
                        <option> Sample3 </option>
                      </select>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" name="addNEW" class="btn btn-info">Delete</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <h2>Course Listing</h2>
        <div class="row">
            <div class="card">
              <img src="images/couse_leadership.jpeg" alt="Course1">
              <div class="text">
                <p><b>Training name</b></p> 
                <p>training description in a few sentences</p> 
                <p><a href="#" target="_blank">training template link</a></p> 
              </div>
            </div>
            <div class="card">
              <img src="images/couse_leadership.jpeg" alt="Course2">
              <div class="text">
                <p><b>Training name1</b></p> 
                <p>training description in a few sentences 1</p> 
                <p><a href="#" target="_blank">training template link 1</a></p> 
              </div>
            </div>
            <div class="card">
              <img src="images/couse_leadership.jpeg" alt="Course3">
              <div class="text">
                <p><b>Training name2</b></p> 
                <p>training description in a few sentences 2</p> 
                <p><a href="#" target="_blank">training template link 2</a></p> 
              </div>
            </div>
            <div class="card">
              <img src="images/couse_leadership.jpeg" alt="Course4">
              <div class="text">
                <p><b>Training name3</b></p> 
                <p>training description in a few sentences 3</p> 
                <p><a href="#" target="_blank">training template link 3</a></p> 
              </div>
            </div>
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