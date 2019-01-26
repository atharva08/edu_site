<?php


$username=$_POST['username'];
$password=$_POST['password'];

require"../../includes/dbconnect.php";

$query="select * from admin where admin_username='$username' and admin_password = '$password' ";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result) == 1) {
              header("location: /edu_site/php/admin.php");
            }
else {

              //$error = "Your UserName or Password is invalid !!";
              //echo "$error";
              header("location: /edu_site/php/login.php?invalid_uname_pass=1");
      }



 ?>
