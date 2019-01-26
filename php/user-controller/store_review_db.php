<?php
require"../../includes/dbconnect.php";


$course_name=$_POST['select_course'];
$s_id=$_POST['s_id'];
$review=$_POST['review'];

$query="select * from course where c_name = '$course_name' ";
$result = $conn->query($query);
$row=$result -> fetch_assoc();
$c_id=$row['c_id'];


$query="select * from takes where c_id = '$c_id' and s_id='$s_id' ";
$result = $conn->query($query);


if($result->num_rows > 0) {

              $query1="select * from review where c_id = '$c_id' and s_id='$s_id' ";
              $result1 = $conn->query($query1);
              //echo $result1->num_rows;
              if ($result1->num_rows > 0) {
                // update
                $sql2=" UPDATE review SET description = '$review' where c_id = '$c_id' and s_id='$s_id'";
                $result2 = $conn->query($sql2);
              }

              else {
                //insert

                $sql3= "INSERT INTO review (s_id,c_id,description) VALUES ('$s_id', '$c_id','$review')";
                $result3 = $conn->query($sql3);
                var_dump($result3);
              }

              header("location: /edu_site/php/give_review.php?success=1");
        }

else{

    header("location: /edu_site/php/give_review.php?course_not_taken=1");
}

?>
