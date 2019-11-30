<?php include 'header.php';?>
<!-- slider-start -->
<div class="container-fluid">
	<div class="row" style="background-image: url('images/bg-1.jpg'); background-repeat: no-repeat;background-size: cover; height: 500px;">
		<div class="container my-auto mx-auto text-center">
			<h2 class=" text-white" style="font-size:30px;" >E-Auctioneer spot for purchasers and dealers to meet up and exchange nearly anything</h2>
			<u><a href="products.php" class="text-uppercase pr-3" style="color:#f5b22d; ">Let’s Get Selling!</a></u>
			<u><a href="buying.php" class="text-uppercase" style="color:#f5b22d; ">Let’s Get Buying!</a></u>
		</div>
	</div>
</div>
<!-- slider-end -->

<!-- product-block-start -->
<div class="container">
	<div class="row mx-auto mt-5">
		<h4 class="text-uppercase mx-auto" style="color:#4e5663; ">Bidding Product</h4>
	</div>
	<hr style="width: 100px;margin: 0px; border-top: 
	3px solid #4e5663" class="mx-auto mb-4">
	<div class="row my-5">


		<?php require 'db.php';
		$qry="SELECT * FROM `products` ORDER BY pid DESC";
		$result=mysqli_query($conn,$qry);
		while ($row=mysqli_fetch_assoc($result)){ 
			$uname=$row['uname'];
			$pid=$row['pid'];
			$uqry="SELECT * FROM `user-register` WHERE username='$uname' ";
			$uresult=mysqli_query($conn,$uqry);
			$urow=mysqli_fetch_assoc($uresult); 

			$chqry="SELECT * FROM `bidding` WHERE pid='$pid' ORDER BY bprice DESC";
			$chresult=mysqli_query($conn,$chqry);
			$chrow=mysqli_fetch_assoc($chresult);

			$countq="SELECT COUNT(bno) As trow FROM `bidding` WHERE pid='$pid'";
			$countres=mysqli_query($conn, $countq);
			$count=mysqli_fetch_assoc($countres);

			?>



			<div class="col-lg-3 mb-2">
				<input type="text" name="id" hidden="true" value="<?php echo $row['pid'] ?>">
				<!-- Card -->
				<div class="card promoting-card product">
					<a href="product-view.php?id=<?php echo $row['pid']; ?>" style="color: #4e5663;">
						<!-- Card content -->
						<div class="card-body d-flex flex-row">
							<!-- Avatar -->
							<img src="<?php echo $urow['image'] ?>" class="rounded-circle mr-3" height="50px" width="50px" alt="avatar">
							<!-- Content -->
							<div>
								<!-- Title -->
								<h4 class="card-title font-weight-bold mb-2" style="font-size:15px;"><?php echo $row['uname'] ?></h4>
								<!-- Subtitle -->
								<p class="card-text"><i class="fas fa-calendar-alt pr-2"></i><?php echo $row['pdate'] ?></p>
							</div>
						</div>
						<!-- Card image -->
						<div class="view overlay">
							<img class="card-img-top rounded-0 pimg mx-auto"  src="<?php echo $row['pimg'] ?>" alt="Card image cap" >

						</div>
						<!-- Card content -->
						<div class="card-body text-center ">
							<!-- Text -->
							<h6><?php echo $row['pname'] ?></h6>
							<p class="card-text" style="font-size:12px;">Bids: <?php echo $count['trow'];?></p>			
							<hr>
							<div class="card-body" style="font-size:12px;">
								<!-- <span class=""><i class="fa fa-time"></i> 3Hours,20min</span><br> -->
								<span class="font-weight-bold" style="font-size: 15px;">Max Bid: $<?php echo $chrow['bprice'];?></span>
							</div>
						</div>
					</a>
				</div>
				<!-- Card -->
			</div>

		<?php } ?>



	</div>
</div>

<!-- product-block-end -->
<!-- feedback -->
<div style="display: block; position: fixed; z-index: 1;right: 20px; bottom: 20px;">
	<a class="btn btn-warning rounded waves-effect waves-light" data-toggle="modal" data-target="#exampleModalCenter">FeedBack</a>
</div>


<!-- feedback -->


<!-- comments-start -->
<div class="card text-center border-0">
	<div class="card-header h4 border-0" style="background-color:#f5b22d;">
		Customer's feedback
	</div>
	<div id="demo" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ul class="carousel-indicators">
			<li class="bg-dark" data-target="#demo" data-slide-to="0" class="active"></li>
			<li class="bg-dark" data-target="#demo" data-slide-to="1"></li>
			<li class="bg-dark" data-target="#demo" data-slide-to="2"></li>
		</ul>
		<!-- The slideshow -->
		<?php 
		$sliderqry="Select * from feedback";
		$sliderresult=mysqli_query($conn,$sliderqry);
		
		$i=1;
		?>
		<div class="carousel-inner">
			<?php

			for($i=1;$i<=3;$i++){
				$srows=mysqli_fetch_array($sliderresult);


				$feedback=$srows['feedback'];
				$username=$srows['username'];
				$date=$srows['date'];

				if($i==1) {?>
					<div class="carousel-item active">
						<div class="card-body">
							<h5 class="card-title"><?php echo $username; ?></h5>
							<p class="card-text " style="margin:0vw 10vw;" > <?php echo $feedback; ?></p>
							<div class="card-footer text-muted bg-white border-0 pb-5">
								<?php echo $date; ?>
							</div>
						</div>
					</div>
				<?php }
				else{?>
					<div class="carousel-item">
						<div class="card-body">
							<h5 class="card-title"><?php echo $username; ?></h5>
							<p class="card-text" style="margin:0vw 10vw;"> <?php echo $feedback; ?></p>
							<div class="card-footer text-muted bg-white border-0 pb-5">
								<?php echo $date; ?>
							</div>
						</div>
					</div>
					<?php }} ?>
				</div>

				<!-- Left and right controls -->
				<a class="carousel-control-prev" href="#demo" data-slide="prev">
					<i class="fa fa-chevron-left text-dark"></i>
				</a>
				<a class="carousel-control-next" href="#demo" data-slide="next">
					<i class="fa fa-chevron-right text-dark"></i>
				</a>

			</div>
		</div>








		<!-- modal for feedback -->

		<!-- Modal -->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header bg-warning">
						<h5 class="modal-title text-dark" id="exampleModalCenterTitle">E-Auctioneer FeedBack</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php 
					if (isset($_SESSION['$username'])) {
						$username=$_SESSION['$username'];
						$chq="SELECT * FROM `feedback` WHERE username='$username'";
						$chres=mysqli_query($conn,$chq);
						$count=mysqli_num_rows($chres);
						if ($count>0) {?>
							<div class="modal-body text-center">
								<span class="h5 text-danger">Thank You For Submitting Your FeedBack For E-Auctioneer.</span><br>
								<i class="far fa-smile fa-3x text-danger " ></i>

							</div>
							<div class="modal-footer mx-auto">

							</div>
							<?php
						}
						else
							{?>
								<form action="index.php" method="POST">
									<div class="modal-body">
										<div class="form-group">
											<label for="feedback" class="text-dark">Your FeedBack:</label>
											<textarea class="form-control text-dark text-center" rows="5" name="feedback" id="feedback" style="background-color: #D2D5D7;"></textarea>
											<span class="badge badge-warning">-<?php echo $_SESSION['$username'];?></span>
										</div>

									</div>
									<div class="modal-footer mx-auto">

										<button type="submit" name="fsubmit" class="btn btn-outline-danger rounded waves-effect waves-light">Submit</button>
										<?php 
										if (isset($_POST['fsubmit'])) {
											$feedback=$_POST['feedback'];
											$username=$_SESSION['$username'];
											$feedq="INSERT INTO `feedback`( `username`, `feedback`) VALUES ('$username','$feedback')";
											$feedres=mysqli_query($conn,$feedq);
											if ($feedres==TRUE) {
												echo
												"<script type='text/javascript'>
												alert('Thank For Your FeedBack');
												</script>";
												echo "<script type='text/javascript'>
												window.location.replace('index.php');
												</script>";
											}
										}
										?>
									</div>
								</form>

								<?php
							}	
						}
						else
							{?>
								<div class="modal-body text-center">
									<span class="h5 text-danger">Please Login/Register To Submit Your Review About E-Auctioneer</span><br>
									<i class="far fa-smile fa-3x text-danger " ></i>

								</div>
								<div class="modal-footer mx-auto">
									<a href="login.php" class="btn btn-outline-danger rounded waves-effect waves-light">Login</a>
									<a href="register.php" class="btn btn-outline-warning rounded waves-effect waves-light">Register</a>
								</div>

								<?php
							}
							?>

						</div>
					</div>
				</div>

				<!-- modal for feedback -->

















				<!-- comment-ends -->
				<?php include 'footer.php';?>