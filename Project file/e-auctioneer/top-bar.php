<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="css/templatemo-style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
	<script src="https://kit.fontawesome.com/c866fb0b6f.js" crossorigin="anonymous"></script>
	<title>E-Auctioneer-Just Bid it.</title>
</head>
<body style="font-family: 'Libre Baskerville', serif; background-color: white;">


	<!-- top-bar-start -->
	<div class="container-fluid bg-warning p-1">
		<div class="container" style="color: #4e5663;">
			<div class="row">
				<div class="col-lg-12">
					
					<a href="#" style="color: #4e5663;" class="pr-3"><i class="fa fa-phone "></i> Contact Us</a>
					<a href="#" style="color: #4e5663;"><i class="fa fa-info-circle "></i> About Us</a>
					
					<?php 
					session_start();
					
					if(isset($_SESSION['$username'])){?>

						<div class="float-right">
						<div class="box">
							<span  style="color: #4e5663; cursor: pointer;"><?php echo $_SESSION['$username'];?></span>
							<i class="fas fa-users-cog"></i>
						</div>
						<div class="position-absolute bg-warning mt-1 lid text-center" style="z-index: 1; margin-right: 100px; ">
							<a href="myaccount.php" class="btn btn-warning text-white" >DashBoard <i class="fas fa-tachometer-alt "></i></a>
							<a href="products.php" class="btn btn-warning text-white" >My Products <i class="fas fa-cart-plus "></i></a>
							<form method="POST">
							<button name="logout" class="btn btn-warning text-white">Logout <i class="fa fa-user-plus "></i></button></form>
						</div>
						<?php

					 if (isset($_POST['logout'])) {
						

						unset($_SESSION['$username']);
							header('location:login.php');
							exit;
						# code...
					} ?>
						<script>
							$('.lid').hide();
							jQuery('.box').hover(function() {
								$('.lid').show();
							});
							jQuery('.lid').hover(function() {
								$('.lid').show();
							},
							function() {
								jQuery('.lid').hide();
							});
						</script>
					</div>


					<?php
					}
					else
						{?>
							<div class="float-right">
								<div class="box">
									<span  style="color: #4e5663; cursor: pointer;">Login/Register </span>
									<i class="fa fa-user "></i>
								</div>
								<div class="position-absolute bg-warning mt-1 lid text-center" style="z-index: 1; ">
									<a href="login.php" class="btn btn-warning text-white" >Login <i class="fa fa-sign-in "></i></a>
									<a href="register.php" class="btn btn-warning text-white">Register <i class="fa fa-user-plus "></i></a>
								</div>
								<script>
									$('.lid').hide();
									jQuery('.box').hover(function() {
										$('.lid').show();
									});
									jQuery('.lid').hover(function() {
										$('.lid').show();
									},
									function() {
										jQuery('.lid').hide();
									});
								</script>
							</div>
						<?php }
						?>



					</div>
				</div>
			</div>
		</div>
	<!-- top-bar-end -->