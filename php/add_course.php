<?php

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
      <h2>ADD Course</h2>
    </div>
    <form action="/edu_site/php/user-controller/add_course_db.php" method="post" enctype="multipart/form-data">
      <div class="container  center-text" style="padding-right: 90px;padding-left: 50px;padding-top:40px;">

        <?php if($already_exist){ ?>
              <div class="">
                <p center style="color:red;">Course name or ID already exists!!</p>
              </div>
      <?php } ?>


      <?php if($added){ ?>
                  <div class="">
                    <p center style="color:red;">Successfully added your new course!!</p>
                  </div>
      <?php } ?>




        <div class="form-group row" style="margin-bottom: 30px;">
            <label for="" class=" control-label col-sm-2 "> Course Id<span style="color:red">*</span></label>
            <div class="col-sm-10 ">
                <input type="name" class="form-control" id="" placeholder="Enter course id"  style="width:650px;" name="c_id" required>
            </div>
        </div>
      <div class="form-group row" style="    margin-bottom: 30px;">
          <label for="" class="col-sm-2 col-form-label">Course Name<span style="color:red">*</span></label>
          <div class="col-sm-10">
              <input type="text" class="form-control" id="" placeholder="Course name" style="width:650px;" name="c_name" required>
          </div>
      </div>

      <div class="form-group row" style="    margin-bottom: 30px;">
          <label for="" class="col-sm-2 col-form-label " >Topics Covered<span style="color:red">*</span></label>
          <div class="col-sm-10">
              <textarea type="" class="form-control " id="" placeholder="Enter topics to be covered" style="width:650px; height: 164px;" name="topics" required></textarea>
          </div>
      </div>


  



<div class="text-center">
<hr>
            <button class="btn btn-primary " type="submit" style="margin-bottom: 35px;">Submit</button>
</div>
    </div>
  </body>
</html>
