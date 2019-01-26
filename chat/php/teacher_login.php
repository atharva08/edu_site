<?php
require"../../includes/dbconnect.php";

$invalid=false;
      if (array_key_exists('invalid',$_GET)){

        $invalid=true;
      }


 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/edu_site/css/bootstrap.min.css">
    <!--<link rel="stylesheet" href="css/form-validation.css">-->
    <title></title>
  </head>
  <body>
    <div    style=" padding-left: 900px; margin-top: 20px;">
    <a  href="/edu_site/php/index.php" style="border:solid ;padding-left: 12px;"><b >x&nbsp;&nbsp;</b></a>
  </div>
    <div class="text-center" >
      <h2>TEACHER LOGIN</h2>
    </div>
    <form action="/edu_site/chat/php/user-controller/teacher_login_action.php" method="post">
      <div class="container  center-text" style="padding-right: 90px;padding-left: 50px;padding-top:40px;">

        <?php if($invalid){ ?>
              <div class="">
                <p center style="color:red;">You are not teaching in this batch!!</p>
              </div>
        <?php } ?>


        <div class="form-group row" style="margin-bottom: 30px;">
            <label for="" class=" control-label col-sm-2 ">Teacher-id<span style="color:red">*</span></label>
            <div class="col-sm-10 ">
                <input type="name" class="form-control" id="" placeholder="Enter student-id"  style="width:650px;" name="t_id" required>
            </div>
        </div>

      <div class="custom-select row" style="margin-bottom:30px;">
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

      <div class="form-group row" style="  margin-bottom: 30px">
          <label for="" class="col-sm-2 col-form-label">Start Date<span style="color:red">*</span></label>
          <div class="col-sm-10">
              <input type="date" class="form-control" id="" placeholder="start date" style="width:650px;" name="start" required>
          </div>
      </div>

      <div class="form-group row" style="    margin-bottom: 30px;">
          <label for="" class="col-sm-2 col-form-label">End Date<span style="color:red">*</span></label>
          <div class="col-sm-10">
              <input type="date" class="form-control" id="" placeholder="end date" style="width:650px;" name="end" required>
          </div>
      </div>

<div class="text-center">
<hr>
            <button class="btn btn-primary " type="submit" style="margin-bottom: 35px;">Submit</button>
</div>
    </div>
  </body>
</html>
