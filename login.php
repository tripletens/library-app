
<?php
	 session_start();
	 
	require('admin/logics.php');
    
    if(isset($_POST['submit'])){
        
        $staff_id = $_POST['staff_id'];
        
        $password = $_POST['password'];
        
        $passwordhash = md5($password);
        
        $error = "";
        //check if fields are empty 
        
        if(!empty($staff_id) && !empty($password)){
            //perform advanced checks 
            //call check class
            $checkobject = new checks();
            
            $staff_checks = $checkobject->inputs($staff_id);
            
            $password_checks = $checkobject->inputs($password);
            
            //check if user exists in db 
            $user = new user();
            if($staff_checks && $password_checks){
                if($user->user_exists($staff_id)){
                    //check email and password with  the one in db 
                    if($user->login($staff_id,$passwordhash)){
                        $user_row = mysqli_fetch_assoc($user->login($staff_id,$passwordhash));
                       		
                           $_SESSION['staff_id'] = $user_row['staff_id'];
                           $_SESSION['first_name'] = $user_row['first_name'];
                           $_SESSION['last_name'] = $user_row['last_name'];
                            $_SESSION['phone'] = $user_row['phone'];
                             $_SESSION['email'] = $user_row['email'];
                              $_SESSION['level'] = $user_row['level'];
                               $_SESSION['step'] = $user_row['step'];

                           $_SESSION['unit'] = $user_row['unit'];
                           $_SESSION['authority'] = $user_row['authority'];
                            $_SESSION['rank'] = $user_row['rank'];
                           $_SESSION['campus'] = $user_row['campus'];
                       

                    	if ($user->rank_login($staff_id)) {
                    		# code...
                    		// `id`, `staff_id`, `first_name`, `last_name`, `phone`, `email`, `level`, `step`, `unit`, `authority`, `rank`, `campus`, `password`, `cpassword`, `date` FROM `register_user`
                    		

                    		$row = $user->rank_login($staff_id);
                    		   if($row == 'Librarian'){
					                echo "<script>window.location.href = 'admin/staff/pages/index.php'</script>";
					            }else if($row == 'unit head'){
					                echo "<script>window.location.href = 'admin/unithead/pages/index.php'</script>";
					            }else if($row == 'staff'){
					                echo "<script>window.location.href = 'admin/staff/pages/index.php';</script>";
					            }
                    		$error = "<script> alert('Successfully Authenticated'); </script>";
                    	}else{
                    		$error = "<script> alert('An Error Occured'); </script>";
                    	}
                        
                        
                    }else{
                        $error = "<span class='alert alert-danger'>Staff Id/Password Combination Error. Contact Admin</span>";
                    }
                }else{
                    $error = "<span class='alert alert-danger'>Staff Not Registered. Contact Admin</span>";
                }
            }
            
            
        }else{
            $error = "<span class='alert alert-danger'>All fields Required</span>";
        }
    }

?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html lang="eng">

<head>
	<title>Best Study an Education Category Bootstrap Responsive Website Template | Login :: w3layouts</title>
	<!-- meta-tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Soft Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //meta-tags -->
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- font-awesome -->
	<link href="css/font-awesome.css" rel="stylesheet">
	<!-- fonts -->
	<link href="//fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
</head>

<body>
	<!-- header -->
	<div class="header-top">
		<div class="container">
			<div class="bottom_header_left">
				<p>
					<span class="fa fa-map-marker" aria-hidden="true"></span>New Kampshire Mshinon, USA
				</p>
			</div>
			<div class="bottom_header_right">
				<div class="bottom-social-icons">
					<a class="facebook" href="#">
						<span class="fa fa-facebook"></span>
					</a>
					<a class="twitter" href="#">
						<span class="fa fa-twitter"></span>
					</a>
					<a class="pinterest" href="#">
						<span class="fa fa-pinterest-p"></span>
					</a>
					<a class="linkedin" href="#">
						<span class="fa fa-linkedin"></span>
					</a>
				</div>
				<div class="header-top-righ">
					<a href="login.php">
						<span class="fa fa-sign-out" aria-hidden="true"></span>Login</a>
				</div>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<?php require('topbar.php');?>
	<!-- banner -->
	<div class="inner_page_agile">

	</div>
	<!--//banner -->
	<!-- short-->
	<div class="services-breadcrumb">
		<div class="inner_breadcrumb">
			<ul class="short_ls">
				<li>
					<a href="index.html">Home</a>
					<span>| |</span>
				</li>
				<li>Login</li>
			</ul>
		</div>
	</div>
	<!-- //short-->
	<div class="register-form-main">
		<div class="container">
			<div class="title-div">
				<h3 class="tittle">
					<span>L</span>ogin
					<span>F</span>orm
				</h3>
				<div class="tittle-style">

				</div>
			</div>
			<div class="login-form">
				<form action="" method="post">
					<div class="">
						<p>User Name </p>
						<input type="text" class="name" name="staff_id" required="" />
					</div>
					<div class="">
						<p>Password</p>
						<input type="password" class="password" name="password" required="" />
					</div>
					<label class="anim">
						<input type="checkbox" class="checkbox">
						<span> Remember me ?</span>
					</label>
					<div class="login-agileits-bottom wthree">
						<h6>
							<a href="#">Forgot password?</a>
						</h6>
					</div>
					<input type="submit" value="Login" name="submit">
					<?php 
						if(isset($error)){
							echo $error;
						}
					?>
					<div class="register-forming">
						<p>To Register New Account --
							<a href="register.html">Click Here</a>
						</p>
					</div>
				</form>
			</div>

		</div>
	</div>

	<!-- footer -->
	<div class="mkl_footer">
		<div class="sub-footer">
			<div class="container">
				<div class="mkls_footer_grid">
					<div class="col-xs-4 mkls_footer_grid_left">
						<h4>Location:</h4>
						<p>educa mfdflimbg 1235, Ipswich,
							<br> Foxhall Road, USA</p>
					</div>
					<div class="col-xs-4 mkls_footer_grid_left">
						<h4>Mail Us:</h4>
						<p>
							<span>Phone : </span>001 234 5678</p>
						<p>
							<span>Email : </span>
							<a href="mailto:info@example.com">mail@example.com</a>
						</p>
					</div>
					<div class="col-xs-4 mkls_footer_grid_left">
						<h4>Opening Hours:</h4>
						<p>Working days : 8am-10pm</p>
						<p>Sunday
							<span>(closed)</span>
						</p>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="botttom-nav-allah">
					<ul>
						<li>
							<a href="index.html">Home</a>
						</li>
						<li>
							<a href="about.html">About Us</a>
						</li>
						<li>
							<a href="courses.html">Courses</a>
						</li>
						<li>
							<a href="join.html">Join Us</a>
						</li>
						<li>
							<a href="contact.html">Contact Us</a>
						</li>
					</ul>
				</div>
				<!-- footer-button-info -->
				<div class="footer-middle-thanks">
					<h2>Thanks For watching</h2>
				</div>
				<!-- footer-button-info -->
			</div>
		</div>
		<div class="footer-copy-right">
			<div class="container">
				<div class="allah-copy">
					<p>© 2018 Best Study. All rights reserved | Design by
						<a href="http://w3layouts.com/">W3layouts</a>
					</p>
				</div>
				<div class="footercopy-social">
					<ul>
						<li>
							<a href="#">
								<span class="fa fa-facebook"></span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="fa fa-twitter"></span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="fa fa-rss"></span>
							</a>
						</li>
						<li>
							<a href="#">
								<span class="fa fa-vk"></span>
							</a>
						</li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--/footer -->

	<!-- js files -->
	<!-- js -->
	<script src="js/jquery-2.1.4.min.js"></script>
	<!-- bootstrap -->
	<script src="js/bootstrap.js"></script>
	<!-- smooth scrolling -->
	<script src="js/SmoothScroll.min.js"></script>
	<script src="js/move-top.js"></script>
	<script src="js/easing.js"></script>
	<!-- here stars scrolling icon -->
	<script>
		$(document).ready(function () {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //here ends scrolling icon -->
	<!-- smooth scrolling -->
	<!-- //js-files -->

</body>

</html>