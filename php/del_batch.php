


<?php
require"../includes/dbconnect.php";

$deleted=false;
      if (array_key_exists('deleted',$_GET)){

              $deleted=true;
            }
$already_deleted=false;
      if (array_key_exists('already_deleted',$_GET)){

              $already_deleted=true;
              $added=false;
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
      <h2>DELETE BATCH</h2>
    </div>
    <form action="/edu_site/php/user-controller/del_batch_db.php" method="post">
      <div class="container  center-text" style="padding-right: 90px;padding-left: 20px;padding-top:40px;">
        <!--<div class="form-group row" style="margin-bottom: 30px;">
            <label for="name" class=" control-label col-sm-2 ">Student-id<span style="color:red">*</span></label>
            <div class="col-sm-10 ">
                <input type="name" class="form-control" id="name" placeholder="Enter unique-id"  style="width:650px;" required>
            </div>
        </div>-->

        <?php if($deleted){ ?>
                    <div class="">
                      <p center style="color:red;">Successfully deleted desired course!!</p>
                    </div>
        <?php } ?>

        <?php if($already_deleted){ ?>
                    <div class="">
                      <p center style="color:red;">NO SUCH BATCH IN DATABASE!!</p>
                    </div>
        <?php } ?>



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
                ?><option selected="selected">enter course to be deleted</option>
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

        <div class="custom-select row" style="margin-top:20px;">
          <label for="speaker_name" class="col-sm-2 col-form-label">Start Date<span style="color:red">*</span></label>
          <div class="col-sm-10">
            <input type="date" name="start_date" value="">
          </div>
      </div>

      <div class="custom-select row" style="margin-top:20px;">
        <label for="speaker_name" class="col-sm-2 col-form-label">End Date<span style="color:red">*</span></label>
        <div class="col-sm-10">
          <input type="date" name="end_date" value="">
        </div>
    </div>

    <div class="custom-select row" style="margin-top:20px;">
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



<div class="text-center">
<hr>
            <button class="btn btn-primary " type="submit" style="margin-bottom: 35px;">Submit</button>
</div>

  </body>
</html>
