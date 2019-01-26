<?php

$s_id=$_POST['s_id'];
$course_name=$_POST['select_course'];
//echo "$course_name";

//echo "$path";

require"../../includes/dbconnect.php";

$query="select * from course where c_name = '$course_name' ";
$result = $conn->query($query);
$row=$result -> fetch_assoc();
$c_id=$row['c_id'];

$sql="select * from takes where c_id = '$c_id' and s_id='$s_id' ";
$result1 = $conn->query($sql);
//var_dump($result1);

if($result1->num_rows > 0) {
              //  echo"record exists";
              /*$sql2= " DELETE FROM student where s_id= '$s_id' ";
              $r2 = $conn->query($sql2);*/
              $sql1= " DELETE FROM takes where s_id= '$s_id' and c_id='$c_id' ";
              $r1 = $conn->query($sql1);

              $query="select count('s_id') as enrolled_no from takes where s_id='$s_id' ";
              $result=$conn -> query($query);
              $row = $result-> fetch_assoc();

              if($row['enrolled_no'] <=0)
              {
                $sql2= " DELETE FROM student where s_id= '$s_id' ";
                $r2 = $conn->query($sql2);
              }
              //var_dump($result1);
              //mysqli_close($conn);
              //echo "$result1";
              header("location: /edu_site/php/del_student.php?deleted=1");
        }

else{

    header("location: /edu_site/php/del_student.php?not_exist=1");
}

?>
