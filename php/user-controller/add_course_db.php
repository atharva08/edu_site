<?php


$c_id=$_POST['c_id'];
$c_name=$_POST['c_name'];
$topics=$_POST['topics'];

require"../../includes/dbconnect.php";

$query="select * from course where c_name = '$c_name' or c_id='$c_id' ";
$result = $conn->query($query);
//var_dump($result);

if($result->num_rows > 0) {
              //  echo"record exists";
              header("location: /edu_site/php/add_course.php?already_exist=1");
        }
else{
        //echo "no records of this name";
        //echo $topics;
        $sql= " INSERT INTO course (c_id,c_name,topics_covered) VALUES ('$c_id', '$c_name','$topics')";
        $result1 = $conn->query($sql);


        header("location: /edu_site/php/add_course.php?added=1");
}

?>
