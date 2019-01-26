<?php
require"../includes/dbconnect.php";

$deleted=false;
      if (array_key_exists('deleted',$_GET)){

              $deleted=true;
            }
$not_exist=false;
      if (array_key_exists('not_exist',$_GET)){

              $not_exist=true;

          }

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="css/form-validation.css">-->
    <title></title>
  </head>
  <body>
    <div    style=" padding-left: 900px; margin-top: 20px;">
    <a  href="/edu_site/php/admin.php" style="border:solid ;padding-left: 12px;"><b >x&nbsp;&nbsp;</b></a>
  </div>
    <div class="text-center" >
      <h2>DELETE STUDENT</h2>
    </div>
    <form action="/edu_site/php/user-controller/del_student_db.php" method="post">
      <div class="container  center-text" style="padding-right: 90px;padding-left: 50px;padding-top:40px;">

        <?php if($deleted){ ?>
                    <div class="">
                      <p center style="color:red;">Successfully deleted desired course for student!!</p>
                    </div>
        <?php } ?>

        <?php if($not_exist){ ?>
                    <div class="">
                      <p center style="color:red;">NO SUCH RECORD IN DATABASE!!</p>
                    </div>
        <?php } ?>


        <div class="form-group row" style="margin-bottom: 30px;">
            <label for="name" class=" control-label col-sm-2 ">Student-id<span style="color:red">*</span></label>
            <div class="col-sm-10 ">
                <input type="name" class="form-control" id="name" placeholder="Enter student-id"  style="width:650px;" name="s_id" required>
            </div>
        </div>




      <div class="custom-select row" style="">
        <label for="speaker_name" class="col-sm-2 col-form-label">Course<span style="color:red">*</span></label>
        <div class="col-sm-10">

          <?php

                $sql="select c_name from course";
                $results = $conn ->query($sql);
              //  echo $results;
                //var_dump($results);
                echo '<select name="select_course" >';
                while($row =$results->fetch_assoc())
                {
                      //var_dump($row);
                       echo '<option values=' . $row["c_name"] . '>' . $row["c_name"] . '</option>';
                }
                ?><option selected="selected">enter course </option>
                <?php
                echo '</select>';
           ?>
          <!--<select>
            <option value="0">Select course</option>
            <option value="1">C</option>
            <option value="2">C++</option>
          </select>-->
        </div>
      </div>



<div class="text-center">
<hr>
            <button class="btn btn-primary " type="submit" style="margin-bottom: 35px;">Submit</button>
</div>
    </div>
  </body>
</html>
