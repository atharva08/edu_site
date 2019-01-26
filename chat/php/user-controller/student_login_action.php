<?php


$s_id=$_POST['s_id'];
$course=$_POST['select_course'];
$startdate=$_POST['start'];
$enddate=$_POST['end'];
//echo" $s_id  ,  $course  ,$startdate   ,$enddate"
require"../../../includes/dbconnect.php";

$sql= "select c_id from course where c_name='$course'";
$result = $conn->query($sql);
$row=$result -> fetch_assoc();//3 steps for finding c_id
$cid=$row['c_id'];


$query="select * from takes where s_id='$s_id' and c_id = '$cid' and start_date='$startdate' and end_date='$enddate' ";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result) == 1) {
              var_dump($result);
              session_start();
              $_SESSION["s_id"] = $s_id;
              $_SESSION["c_id"] = $cid;
              $_SESSION["start_date"] =$startdate;
              $_SESSION["end_date"] = $enddate;
              header("location: /edu_site/chat/php/chat.php");
            }
else {
              var_dump($result);
              //$error = "Your UserName or Password is invalid !!";
              //echo "$error";
              header("location: /edu_site/chat/php/student_login.php?invalid=1");
      }



 ?>
