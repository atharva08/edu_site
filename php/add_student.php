<?php
require"../includes/dbconnect.php";
$already_exist=false;
      if (array_key_exists('already_exist',$_GET)){

        $already_exist=true;
        $added=false;
      }

$added=false;
      if (array_key_exists('added',$_GET)){

              $added=true;
              $already_exist=false;
            }

$error=false;
      if (array_key_exists('error',$_GET)){

              $error=true;

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
      <h2>ADD STUDENT</h2>
    </div>
    <form action="/edu_site/php/user-controller/add_student_db.php" method="post">
      <div class="container  center-text" style="padding-right: 90px;padding-left: 50px;padding-top:40px;">


        <?php if($already_exist){ ?>
              <div class="">
                <p center style="color:red;">Entered student has already taken this course!!</p>
              </div>
      <?php } ?>


      <?php if($added){ ?>
                  <div class="">
                    <p center style="color:red;">Student enrolled for course Successfully!!</p>
                  </div>
      <?php } ?>

      <?php if($error){ ?>
                  <div class="">
                    <p center style="color:red;">Entered wrong details of existing students!!</p>
                  </div>
      <?php } ?>





        <div class="form-group row" style="margin-bottom: 30px;">
            <label for="" class=" control-label col-sm-2 ">Student-id<span style="color:red">*</span></label>
            <div class="col-sm-10 ">
                <input type="name" class="form-control" id="" placeholder="Enter student-id"  style="width:650px;" name="s_id" required>
            </div>
        </div>
      <div class="form-group row" style="    margin-bottom: 30px;">
          <label for="" class="col-sm-2 col-form-label">Student Name<span style="color:red">*</span></label>
          <div class="col-sm-10">
              <input type="text" class="form-control" id="" placeholder="student name" style="width:650px;" name="s_name" required>
          </div>
      </div>

      <div class="form-group row" style="    margin-bottom: 30px;">
          <label for="" class="col-sm-2 col-form-label">Email<span style="color:red">*</span></label>
          <div class="col-sm-10">
              <input type="email" class="form-control" id="" placeholder="students-email" style="width:650px;" name="s_email" required>
          </div>
      </div>

      <div class="form-group row" style="    margin-bottom: 30px;">
          <label for="" class="col-sm-2 col-form-label">Phone<span style="color:red">*</span></label>
          <div class="col-sm-10">
              <input type="tel" class="form-control" id="" placeholder="students contact no" style="width:650px;" name="s_phone" pattern="^\d{10}$" required>
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


      <div class="custom-select row" style="margin-bottom:30px;">
        <label for="speaker_name" class="col-sm-2 col-form-label">Teacher<span style="color:red">*</span></label>
        <div class="col-sm-10">


          <?php

                $sql="select t_id from teacher";
                $results = $conn ->query($sql);
              //  echo $results;
                //var_dump($results);
                echo '<select name="select_teacher" >';
                while($row =$results->fetch_assoc())
                {
                      //var_dump($row);
                       echo '<option values=' . $row["t_id"] . '>' . $row["t_id"] . '</option>';
                }
                ?><option selected="selected">enter teacher </option>
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
