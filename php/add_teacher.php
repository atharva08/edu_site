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
      <h2>ADD TEACHER</h2>
    </div>
    <form action="/edu_site/php/user-controller/add_teacher_db.php" method="post">
      <div class="container  center-text" style="padding-right: 90px;padding-left: 50px;padding-top:40px;">

        <?php if($already_exist){ ?>
              <div class="">
                <p center style="color:red;">Entered teacher-id or teacher already exists!!</p>
              </div>
      <?php } ?>


      <?php if($added){ ?>
                  <div class="">
                    <p center style="color:red;">Added teacher Successfully!!</p>
                  </div>
      <?php } ?>


        <div class="form-group row" style="margin-bottom: 30px;">
            <label for="" class=" control-label col-sm-2 ">Teacher-id<span style="color:red">*</span></label>
            <div class="col-sm-10 ">
                <input type="t_id" class="form-control" id="" placeholder="Enter teacher-id"  style="width:650px;" name="t_id" required>
            </div>
        </div>
      <div class="form-group row" style="    margin-bottom: 30px;">
          <label for="" class="col-sm-2 col-form-label">Teacher Name<span style="color:red">*</span></label>
          <div class="col-sm-10">
              <input type="text" class="form-control" id="" placeholder="Teacher name" style="width:650px;" name="t_name" required>
          </div>
      </div>

      <div class="form-group row" style="    margin-bottom: 30px;">
          <label for="" class="col-sm-2 col-form-label">Email<span style="color:red">*</span></label>
          <div class="col-sm-10">
              <input type="email" class="form-control" id="" placeholder="email" style="width:650px;" name="t_email" required>
          </div>
      </div>

      <div class="text-center">
      <hr>
                  <button class="btn btn-primary " type="submit" style="margin-bottom: 35px;">Submit</button>
      </div>

    </form>
        </body>
</html>
