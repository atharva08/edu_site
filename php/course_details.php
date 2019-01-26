<?php
require"../includes/dbconnect.php";
$c_name=$_GET['c_name'];
$query="SELECT * from course where c_name='$c_name'";
$result=$conn -> query($query);
$row=$result -> fetch_assoc();
$c_name=$row['c_name'];
$topics=$row['topics_covered'];

 ?>

<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>BE-COMPETENT</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

  <!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,800" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700" rel="stylesheet">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<!-- Animate.css -->
	<link rel="stylesheet" href="../css/my_css.css">
	<link rel="stylesheet" href="../css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="../css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="../css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="../css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="../css/owl.carousel.min.css">
	<link rel="stylesheet" href="../css/owl.theme.default.min.css">

	<!-- Flaticons  -->
	<link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="../css/style.css">

	<!-- Modernizr JS -->
	<script src="../js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>

    <nav class="colorlib-nav" role="navigation">
			<div class="upper-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-4">
							<p>Welcome to BE-COMPETENT</p>
						</div>

					</div>
				</div>
			</div>
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div id="colorlib-logo"><a href="/edu_site/php/index.php">BE-COMPETENT</a></div>
						</div>
						<div class="col-md-9 text-right menu-1">
							<ul>
								<li><a href="/edu_site/php/index.php">Home</a></li>

									<li class="active"><a href="/edu_site/php/courses.php">Courses</a></li>
								<li><a href="/edu_site/contact.html">Contact</a></li>
								<li><a href="/edu_site/php/give_review.php">Review</a></li>
								<li><a href="/edu_site/php/login.php">Login</a></li>
                <li><a href="/edu_site/chat/php/student_login.php">Student-Login</a></li>
                <li><a href="/edu_site/chat/php/teacher_login.php">Teacher-Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>

		</nav>

    <div class="colorlib-loader"></div>

 <aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(../images/blog-5.jpg); background-size: ;">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1> <?php echo $c_name; ?></h1>
				   					<h2><span>Course | <?php echo $c_name; ?></span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

;


    <div class="container">



      <div class="col-md-12 animate-box">
        <div class="classes">

          <div class="desc">
            <h3 class="text-center" ><p style="color:red;"><?php echo $c_name; ?></p></h3>
            <div class="text-center">
              <p class="" style="color:red;">DESCRIPTION: </p>
              <p style="color:red;"><?php echo nl2br($topics); ?></p>

            </div>

          </div>
        </div>
      </div>
    </div>











    <script src="../js/jquery.min.js"></script>
  	<!-- jQuery Easing -->
  	<script src="../js/jquery.easing.1.3.js"></script>
  	<!-- Bootstrap -->
  	<script src="../js/bootstrap.min.js"></script>
  	<!-- Waypoints -->
  	<script src="../js/jquery.waypoints.min.js"></script>
  	<!-- Stellar Parallax -->
  	<script src="../js/jquery.stellar.min.js"></script>
  	<!-- Flexslider -->
  	<script src="../js/jquery.flexslider-min.js"></script>
  	<!-- Owl carousel -->
  	<script src="../js/owl.carousel.min.js"></script>
  	<!-- Magnific Popup -->
  	<script src="../js/jquery.magnific-popup.min.js"></script>
  	<script src="../js/magnific-popup-options.js"></script>
  	<!-- Counters -->
  	<script src="../js/jquery.countTo.js"></script>
  	<!-- Main -->
  	<script src="../js/main.js"></script>

  	</body>
  </html>
