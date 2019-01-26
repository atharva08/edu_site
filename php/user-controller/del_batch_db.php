<?php


$course_name=$_POST['select_course'];
$start_date=$_POST['start_date'];
$end_date=$_POST['end_date'];
$t_id=$_POST['select_teacher'];
echo "$course_name";

//echo "$path";

require"../../includes/dbconnect.php";

$query="select * from course where c_name = '$course_name' ";
$result = $conn->query($query);
$row =$result->fetch_assoc();
$c_id=$row['c_id'];
//var_dump($result);

if($result->num_rows > 0) {
              //  echo"record exists";


              $sql2="DELETE FROM takes where c_id='$c_id' and start_date='$start_date' and end_date='$end_date' and t_id='$t_id'";

              $r2= $conn->query($sql2);

              /*$sql10="SELECT * from takes where c_id='$c_id'";
              $r10=$conn->query($sql10);
              if($r10->num_rows <= 0){
              $sql1= " DELETE FROM course where c_name= '$course_name'";
              $r1 = $conn->query($sql1);
            }*/
/*
              $sql4="DELETE FROM review where c_id='$c_id'";
              $r4= $conn->query($sql4);
*/
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

                $sql11="DELETE from chat where c_id='$c_id' and start_date='$start_date' and end_date='$end_date'";
                $r11=$conn->query($sql11);
              //var_dump($result1);
              //mysqli_close($conn);
              //echo "$result1";
              header("location: /edu_site/php/del_course.php?deleted=1");
        }

else{

    header("location: /edu_site/php/del_course.php?already_deleted=1");
}

?>
