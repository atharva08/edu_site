<?php

$t_id=$_POST['select_teacher'];

require"../../includes/dbconnect.php";

$query="select * from teacher where t_id = '$t_id' ";
$result = $conn->query($query);
//var_dump($result1);

if($result->num_rows > 0) {
              //  echo"record exists";
              $sql1= " DELETE FROM teacher where t_id= '$t_id'";
              $r1 = $conn->query($sql1);
              $sql2="DELETE FROM takes where t_id='$t_id'";
              $r2=$conn->query($sql2);

              $sql3="SELECT * FROM student ";
              $r3= $conn->query($sql3);
                while($row1 =$r3->fetch_assoc())
                {
                  $s_id=$row1['s_id'];


                  $sql6="SELECT * FROM  takes where s_id='$s_id'";
                  $r6= $conn->query($sql6);
                  //var_dump($r6);
                  if($r6->num_rows <= 0)
                  {
                    $sql5="DELETE FROM student where s_id='$s_id' ";
                    $r5= $conn->query($sql5);
                    //var_dump($r5);


                  }

                }



              header("location: /edu_site/php/del_teacher.php?deleted=1");
}
else{
  header("location: /edu_site/php/del_teacher.php?not_exist=1");
}
