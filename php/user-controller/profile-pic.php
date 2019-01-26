<?php
$c_name=$_GET['c_name'];
require"../includes/dbconnect.php";

$sql="select * from course where c_name='$c_name'";
$result=$sql->query($sql);
$row=$result->fetch_assoc();
$pic_path=$row['course_pic_path'];
$contents=file_get_contents($pic_path);
header('Contenr-Type:image/jpg');
echo $contents;

 ?>
