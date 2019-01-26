<?php
$invalid_uname_pass=false;
      if (array_key_exists('invalid_uname_pass',$_GET)){

        $invalid_uname_pass=true;
      }


 ?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Signin </title>

    <!-- Bootstrap core CSS -->
    <link href="/edu_site/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/edu_site/css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" style="border: solid;border-color: blue;"  method="post"  action="/edu_site/php/user-controller/on_click_login.php">
      <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">


      <?php if($invalid_uname_pass){ ?>
            <div class="">
              <p center style="color:red;">Incorrect username or password!!!</p>
            </div>
          <?php } ?>


      <div    style=" padding-left: 265px;">
      <a  href="/edu_site/php/index.php" style="border:solid ;padding-left: 12px;"><b >x&nbsp;&nbsp;</b></a>
    </div>
      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>


      <div style="margin-bottom:20px;">
        <label for="inputEmail" class="sr-only">username</label>
        <input type="input" id="inputEmail" name="username" class="form-control" placeholder="Username" required >
      </div>
      <div>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
      </div>

      <button class="btn btn-lg btn-primary btn-block" name="submit" type="submit">Login</button>

    </form>
  </body>
</html>
