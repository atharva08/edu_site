<?php
require"../includes/dbconnect.php";

if ($conn -> connect_error){
  die($conn -> connect_error); //exits from program
}
else{
  $query_enquiry="select count('email') as count_no from enquiry ";
  $results_enquiry=$conn -> query($query_enquiry);
  $row_enquiry = $results_enquiry-> fetch_assoc();

  $query_course="select count('c_id') as course_no from course ";
  $results_course=$conn -> query($query_course);
  $row_course = $results_course-> fetch_assoc();

  $query_enrolled="select count('s_id') as enrolled_no from takes ";
  $results_enrolled=$conn -> query($query_enrolled);
  $row_enrolled = $results_enrolled-> fetch_assoc();


  $query_review="select count('s_id') as total_reviews from review ";
  $results_review=$conn -> query($query_review);
  $row_review = $results_review-> fetch_assoc();

  $query_teacher="select count('t_id') as total_teachers from teacher ";
  $results_teacher=$conn -> query($query_teacher);
  $row_teacher = $results_teacher-> fetch_assoc();

  $no_of_batch= " SELECT DISTINCT start_date,end_date,t_id,c_id from takes ";
  $result_batch=$conn -> query($no_of_batch);
  $total_batch=$result_batch->num_rows;
}
 ?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="../css/main.css">
		<link rel="stylesheet" href="../css/w3.css">
		<link rel="stylesheet" href="../css/logout.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>Dashboard</title>


    </head>
    <body>
		<aside>
            <figure>
                <div id="avatar"></div>
                <figcaption>Admin</figcaption>
            </figure>
            <img src="/edu_site/images/C.jpg">
            <nav>
                <ul>
                    <li><a class="w3-white">Dashboard</a></li>
					          <li><a href="#log" id="myBtn">Logout</a></li>
                </ul>
            </nav>
		</aside>
		<main>
			<div>
				<div class="w3-third w3-section">
					<ul class="w3-ul w3-white w3-hover-shadow">
					<li class="w3-blue w3-large w3-padding-16">Registered  Students</li>
          <li class="w3-padding-16 w3-center w3-light-grey"><p><?php echo ($row_enrolled['enrolled_no']); ?></p>

				<li class="w3-light-grey w3-padding-16">
				  <a href="/edu_site/php/show_all_details.php" class="w3-bar-item w3-black w3-button">Details</a>
				</li>
				</ul>
				</div>

				<div class="w3-third w3-section" style="padding-left:10px;">
					<ul class="w3-ul w3-white w3-hover-shadow">
					<li class="w3-blue w3-large w3-padding-16">Courses Available</li>
					<li class="w3-padding-16 w3-center w3-light-grey"><p><?php echo ($row_course['course_no']); ?></p>
				</li>
				<li class="w3-light-grey w3-padding-16">
				  <a href="/edu_site/php/show_all_courses.php" class="w3-bar-item w3-black w3-button">Details</a>
				</li>
				</ul>
				</div>

			</div>
      <div class="w3-third w3-section" style="padding-left:10px;">
        <ul class="w3-ul w3-white w3-hover-shadow">
          <li class="w3-blue w3-large w3-padding-16">View Enquiry</li>
          <li class="w3-padding-16 w3-center w3-light-grey"><p><?php echo ($row_enquiry['count_no']); ?></p>

            <li class="w3-light-grey w3-padding-16">
              <a href="/edu_site/php/show_all_enquiry.php" class="w3-bar-item w3-black w3-button">Details</a>
            </li>
          </ul>
        </div>



      <div style="height:180px;">
        <div class="w3-third w3-section" style="height:180px;">
          <ul class="w3-ul w3-white w3-hover-shadow">
          <li class="w3-blue w3-large w3-padding-16">Add Student</li>
          <li class="w3-light-grey w3-padding-16">
            <a href="/edu_site/php/add_student.php" class="w3-bar-item w3-black w3-button">Add Student</a>
          </li>
          <li class="w3-light-grey w3-padding-16">
            <a href="/edu_site/php/del_student.php" class="w3-bar-item w3-black w3-button ">Delete Student</a>
          </li>
           </p></a></li>
          </ul>
        </div>

        <div class="w3-third w3-section" style="padding-left:10px;height:180px !important;">
          <ul class="w3-ul w3-white w3-hover-shadow">
          <li class="w3-blue w3-large w3-padding-16"> Update Courses</li>
          <li class="w3-light-grey w3-padding-16">
            <a href="/edu_site/php/add_course.php" class="w3-bar-item w3-black w3-button">Add Course</a>
          </li>
          <li class="w3-light-grey w3-padding-16">
            <a href="/edu_site/php/del_course.php" class="w3-bar-item w3-black w3-button">Delete Course</a>
          </li>
          <!--<li class="w3-light-grey w3-padding-16">
            <a href="/edu_site/php/del_batch.php" class="w3-bar-item w3-black w3-button ">Delete a Batch</a>
          </li>-->
          </ul>
        </div>

        <div class="w3-third w3-section" style="padding-left:10px;">
          <ul class="w3-ul w3-white w3-hover-shadow">
          <li class="w3-blue w3-large w3-padding-16">View Review</li>
          <li class="w3-padding-16 w3-center w3-light-grey"><p><?php echo ($row_review['total_reviews']); ?></p>

        <li class="w3-light-grey w3-padding-16">
          <a href="/edu_site/php/show_all_reviews.php" class="w3-bar-item w3-black w3-button">Details</a>
        </li>
        </ul>
        </div>
      </div>

      <div style="height:180px;">
        <div class="w3-third w3-section" style="height:180px;">
          <ul class="w3-ul w3-white w3-hover-shadow">
          <li class="w3-blue w3-large w3-padding-16">Teacher</li>
          <li class="w3-light-grey w3-padding-16">
            <a href="/edu_site/php/add_teacher.php" class="w3-bar-item w3-black w3-button">Add Teacher</a>
          </li>
          <li class="w3-light-grey w3-padding-16">
            <a href="/edu_site/php/del_teacher.php" class="w3-bar-item w3-black w3-button ">Delete Teacher</a>
          </li>
           </p></a></li>
          </ul>
        </div>

        <div class="w3-third w3-section" style="padding-left:10px;">
          <ul class="w3-ul w3-white w3-hover-shadow">
          <li class="w3-blue w3-large w3-padding-16">View Teacher</li>
          <li class="w3-padding-16 w3-center w3-light-grey"><p><?php echo ($row_teacher['total_teachers']);?></p>

        <li class="w3-light-grey w3-padding-16">
          <a href="/edu_site/php/show_all_teachers.php" class="w3-bar-item w3-black w3-button">Details</a>
        </li>
        </ul>
        </div>
      </div>

      </div>

      <div class="w3-third w3-section" style="padding-left:10px;">
        <ul class="w3-ul w3-white w3-hover-shadow">
        <li class="w3-blue w3-large w3-padding-16">Batches</li>
        <li class="w3-padding-16 w3-center w3-light-grey"><p><?php echo $total_batch; ?></p>

      <li class="w3-light-grey w3-padding-16">
        <a href="/edu_site/php/show_batch_details.php" class="w3-bar-item w3-black w3-button">Batch Details</a>
      </li>
      <li class="w3-light-grey w3-padding-16">
        <a href="/edu_site/php/del_batch.php" class="w3-bar-item w3-black w3-button ">Delete a Batch</a>
      </li>
      </ul>
      </div>




		</main>
		<div id="log" class="modal">
		  <!-- Modal content -->
		  <div class="modal-content">
			<div class="modal-body w3-transparent">
			<span class="close w3-text-red">&times;</span>
			  <p class="w3-large">Are you sure you want to logout?</p>
			  <br><br>
			</div>
			<div class="modal-footer">
			<a href="/edu_site/php/index.php" class="w3-padding-16 w3-bar-item w3-red w3-button" style="width:50%; padding-right:0px;">Confirm</a>
			<a  class="w3-bar-item w3-light-grey w3-button w3-padding-16" style="width:48%; padding-left:0px; padding-right:0px;" href="admin.php">Cancel</a>
			</div>
		  </div>

		</div>

		<script>

            (function() {
                var menu = document.querySelector('ul'),
                    menulink = document.querySelector('img');

                menulink.addEventListener('click', function(e) {
                    menu.classList.toggle('active');
                    e.preventDefault();
                });
            })();

        </script>
		<script>
		// Get the modal
		var modal = document.getElementById('log');

		// Get the button that opens the modal
		var btn = document.getElementById("myBtn");

		// Get the <span> element that closes the modal
		var span = document.getElementsByClassName("close")[0];

		// When the user clicks the button, open the modal
		btn.onclick = function() {
			modal.style.display = "block";
		}

		// When the user clicks on <span> (x), close the modal
		span.onclick = function() {
			modal.style.display = "none";
		}

		// When the user clicks anywhere outside of the modal, close it
		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}
</script>


	</body>
</html>
