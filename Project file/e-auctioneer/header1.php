<?php ob_start() ;?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>E-Auctioneer - Account</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
	<!-- https://fonts.google.com/specimen/Roboto -->
	<link rel="stylesheet" href="css/fontawesome.min.css">
	<!-- https://fontawesome.com/ -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- https://getbootstrap.com/ -->
	<link rel="stylesheet" href="css/templatemo-style.css">
	<link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Libre+Baskerville:400,700&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
</head>

<body id="reportsPage" style="font-family: 'Libre Baskerville', serif; background-color: white;">
	<?php include 'top-bar.php';?>
	

	<!-- user-navbar-start -->
	<div class="" id="home">
		<nav class="navbar navbar-expand-xl navbar-dark" style="background-color:white; height: auto;">
			<div class="container p-0">
				<a class="navbar-brand" href="index.php">
					<h1 class="tm-site-title mb-1"><img src="images/logo.png" width="220px"></h1>
				</a>
				<button class="navbar-toggler ml-auto mr-2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<i class="fa fa-bars tm-nav-icon text-dark"></i>
		</button>

			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mx-auto ">
					<li class="nav-item">
						<a class="nav-link d-lg-inline text-dark" href="index.php">
							<i class="fa fa-home"></i> Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link  d-lg-inline text-dark" href="myaccount.php">
								<i class="fas fa-tachometer-alt "></i> Dashboard
								<span class="sr-only">(current)</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link d-lg-inline text-dark" href="products.php">
								<i class="fa fa-shopping-cart"></i>
								Products
							</a>
						</li>

						<li class="nav-item">
							<a class="nav-link d-lg-inline text-dark" href="accounts.php">
								<i class="fa fa-user"></i>
								Accounts
							</a>
						</li>
					</ul>
					
				</div>
			</div>
		</nav>
		<!-- user-navbar-end -->