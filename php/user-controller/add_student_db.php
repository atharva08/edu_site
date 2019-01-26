<?php


$s_id=$_POST['s_id'];
$s_name=$_POST['s_name'];
$s_email=$_POST['s_email'];
$s_phone1=$_POST['s_phone'];
$s_phone=doubleval($s_phone1);
$t_id=$_POST['select_teacher'];

//var_dump($s_phone);
$start_date=$_POST['start'];
$end_date=$_POST['end'];
$c_name=$_POST['select_course'];



//echo "$path";
require"../../includes/dbconnect.php";

$query="select * from student where s_id = '$s_id' ";
$result = $conn->query($query);
$student_row=$result -> fetch_assoc();

//var_dump($result);

if($result->num_rows > 0) {
              //  echo"record exists";
              if($s_id==$student_row['s_id'] and $s_name==$student_row['s_name'] and $s_email==$student_row['email'] and $s_phone==$student_row['contact']){




                          $sql= "select c_id from course where c_name='$c_name'";
                          $result = $conn->query($sql);
                          $row=$result -> fetch_assoc();//3 steps for finding c_id
                          $cid=$row['c_id'];
                          $query="select * from takes where c_id='$row[c_id]' and s_id='$s_id' and start_date='$start_date' and end_date='$end_date'";
                          $result1 = $conn->query($query);

                          echo var_dump($result1->num_rows);
                          if($result1->num_rows > 0) {
                            //  echo"record exists";
                             header("location: /edu_site/php/add_student.php?already_exist=1");
                            }
                            else{
                                $sql2= "INSERT INTO takes (s_id,c_id,start_date,end_date,t_id) VALUES ('$s_id', '$cid','$start_date','$end_date','$t_id')";
                                $result2 = $conn->query($sql2);
                                header("location: /edu_site/php/add_student.php?added=1");
                              }
                              //header("location: /edu_site/php/add_student.php?added=1");
                    }
              else{
                header("location: /edu_site/php/add_student.php?error=1");
              }

        }
else{
        //echo "no records of this name";
        //echo $topics;
        $sql1= " INSERT INTO student (s_id,s_name,email,contact) VALUES ('$s_id', '$s_name','$s_email',$s_phone)";
        $result1 = $conn->query($sql1) ;



        $sql= "select c_id from course where c_name='$c_name'";
        $result3 = $conn->query($sql);
        $row=$result3-> fetch_assoc();
        $cid=$row['c_id'];


        $sql2= " INSERT INTO takes (s_id,c_id,start_date,end_date,t_id) VALUES ('$s_id', '$cid','$start_date','$end_date','$t_id')";
        $result2 = $conn->query($sql2);
        var_dump($result2);

        mysqli_close($conn);


        header("location: /edu_site/php/add_student.php?added=1");
}

?>
