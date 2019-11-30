<?php
ob_start();
 include 'header.php';?>
<?php $pcat=$_GET['category'];
require 'db.php';

?>

<div class="container-fluid p-5 hero">
	<div class="container">
		<span class="text-white h5 pl-3"><?php echo $pcat;?>/</span>
	</div>
</div>

<!-- product-block-start -->
<div class="container">
	<div class="row my-5">


		<?php 
		$qry="SELECT * FROM `products` WHERE pcat='$pcat'";
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


	<?php include 'footer.php';?>
