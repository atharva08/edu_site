<?php
require"../includes/dbconnect.php";

$success=false;
      if (array_key_exists('success',$_GET)){

        $success=true;

      }

$course_not_taken=false;
      if (array_key_exists('course_not_taken',$_GET)){

              $course_not_taken=true;

            }

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

	<div class="colorlib-loader"></div>

	<div id="page">
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
							<div id="colorlib-logo"><a href="#">BE-COMPETENT</a></div>
						</div>
						<div class="col-md-9 text-right menu-1">
							<ul>
								<li ><a href="/edu_site/php/index.php">Home</a></li>

									<li><a href="/edu_site/php/courses.php">Courses</a></li>
								<li ><a href="/edu_site/contact.html">Contact</a></li>
                <li class="active"><a href="/edu_site/php/give_review.php">Review</a></li>
								<li><a href="/edu_site/php/login.php">Login</a></li>
                <li><a href="/edu_site/chat/php/student_login.php">Student-Login</a></li>
                <li><a href="/edu_site/chat/php/teacher_login.php">Teacher-Login</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero">
			<div class="flexslider">
				<ul class="slides">
			   	<li style="background-image: url(../images/img_bg_2.jpg);">
			   		<div class="overlay"></div>
			   		<div class="container-fluid">
			   			<div class="row">
				   			<div class="col-md-6 col-sm-12 col-md-offset-3 slider-text">
				   				<div class="slider-text-inner text-center">
				   					<h1>Your experience with Us</h1>
				   					<h2><span><a href="index.html">Home</a> | Review</span></h2>
				   				</div>
				   			</div>
				   		</div>
			   		</div>
			   	</li>
			  	</ul>
		  	</div>
		</aside>

		<div id="colorlib-contact">
			<div class="container">
				<div class="row">

					<div class="col-md-10 col-md-offset-1 animate-box">
						<h2>your experience with us</h2>
						<form action="/edu_site/php/user-controller/store_review_db.php" method="POST">
							<?php if($success){ ?>
			              <div class="">
			                <p center style="color:red;">YOUR REVIEW IS RECORDED!!</p>
			              </div>
			      <?php } ?>


			      <?php if($course_not_taken){ ?>
			                  <div class="">
			                    <p center style="color:red;">YOU HAVE NOT ENROLLED FOR THIS COURSE!!</p>
			                  </div>
			      <?php } ?>

							<div class="row form-group">
								<div class="col-md-12">
									<!-- <label for="email">Email</label> -->
									<input type="text" id="email" class="form-control" placeholder="Your student-id" name="s_id" required>
								</div>
							</div>
							<div class="form-group col-md-12">
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
						 </div>

              <!--<div class="row form-group">
								<div class="col-md-12">
									<input type="text" id="email" class="form-control" placeholder="course-name">
								</div>
							</div>-->

							<div class="row form-group">
								<div class="col-md-12">
									<!-- <label for="message">Message</label> -->
									<textarea  id="message" cols="30" rows="10" class="form-control" placeholder="Say something about us" name="review" required></textarea>
								</div>
							</div>
							<div class="form-group">
								<input type="submit" value="Submit Review" class="btn btn-primary">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>





		<footer id="colorlib-footer">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-6 colorlib-widget">
						<h4>About Eskwela</h4>
						<p>Far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics</p>
						<p>
							<ul class="colorlib-social-icons">
								<li><a href="#"><i class="icon-twitter"></i></a></li>
								<li><a href="#"><i class="icon-facebook"></i></a></li>
								<li><a href="#"><i class="icon-linkedin"></i></a></li>
								<li><a href="#"><i class="icon-dribbble"></i></a></li>
							</ul>
						</p>
					</div>


					<div class="col-md-6 colorlib-widget">
						<h4>Contact Info</h4>
						<ul class="colorlib-footer-links">
							<li>291 South 21th Street, <br> Suite 721 New York NY 10016</li>
							<li><a href="tel://1234567920"><i class="icon-phone"></i> + 1235 2355 98</a></li>
							<li><a href="mailto:info@yoursite.com"><i class="icon-envelope"></i> info@yoursite.com</a></li>
							<li><a href="http://luxehotel.com"><i class="icon-location4"></i> yourwebsite.com</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="copy">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center">
							<p>
	<!--							<small class="block">&copy;  Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.
	Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
	Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0.
	</small><br>
								<small class="block">Demo Images: <a href="http://unsplash.co/" target="_blank">Unsplash</a>, <a href="http://pexels.com/" target="_blank">Pexels</a></small>
							</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	-->
	<!-- jQuery -->
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
