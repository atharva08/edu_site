<?php
require"../includes/dbconnect.php";

if ($conn -> connect_error){
  die($conn -> connect_error); //exits from program
}
else{
  $query_review= " select * from review ";
  $results_review=$conn -> query($query_review);


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
                    <li><a href="/edu_site/php/admin.php">Dashboard</a></li>
					          <li><a href="#log" id="myBtn">Logout</a></li>
                </ul>
            </nav>
		</aside>
<main>

  <div class="container">
    <table class="w3-table-all w3-hoverable">
    <h2>ALL COURSES</h2>
    <thead>
      <tr class="w3-light-grey">
      <th>student-id</th>
      <th>student-name</th>
      <th>contact</th>
      <th>email</th>
      <th>course-name</th>
      <th>review</th>



      </tr>
    </thead>
       <?php $count=0; ?>
      <?php
        while ($row_review=$results_review -> fetch_assoc()){
          $student_id=$row_review['s_id'];
          $course_id=$row_review['c_id'];
          $query_student="select * from student where s_id= '$student_id'";
          $results_student=$conn -> query($query_student);
          $row_student=$results_student -> fetch_assoc();

          $query_course="select * from course where c_id= '$course_id'";
          $results_course=$conn -> query($query_course);
          $row_course=$results_course -> fetch_assoc();

      ?>
      <tr>
        <td><?php echo($row_review['s_id']); ?></td>
        <td><?php echo($row_student['s_name']); ?></td>
        <td><?php echo($row_student['contact']); ?></td>
        <td><?php echo($row_student['email']); ?></td>
        <td><?php echo($row_course['c_name']); ?></td>
        <td><?php echo($row_review['description']); ?></td>


        <?php $count++; ?>
      </tr>

      <?php } ?>

    </table>
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
