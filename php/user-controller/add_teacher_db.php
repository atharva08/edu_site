<?php

$t_id=$_POST['t_id'];
$t_name=$_POST['t_name'];
$t_email=$_POST['t_email'];

//echo "$path";
require"../../includes/dbconnect.php";

$query="select * from teacher where t_id = '$t_id' ";
$result = $conn->query($query);
$student_row=$result -> fetch_assoc();

//var_dump($result);

if($result->num_rows <= 0) {
  $sql= " INSERT INTO teacher (t_id,t_name,t_email) VALUES ('$t_id', '$t_name','$t_email')";
  $result = $conn->query($sql);
  var_dump($result);

  mysqli_close($conn);


  header("location: /edu_site/php/add_teacher.php?added=1");

}
else{
  header("location: /edu_site/php/add_teacher.php?already_exist=1");
}


 ?>
