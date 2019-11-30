<?php
ob_start();
include 'header.php';
require 'db.php';

if (isset($_GET['id'])) {	
	$pid=$_GET['id'];
	$_SESSION['$pid']=$_GET['id'];
	$qry="SELECT * FROM `products` WHERE pid='$pid'";
	$result=mysqli_query($conn,$qry);
	$row=mysqli_fetch_assoc($result);
}
else
{
	$pid=$_SESSION['$pid'];
	$qry="SELECT * FROM `products` WHERE pid='$pid'";
	$bresult=mysqli_query($conn,$qry);
	$row=mysqli_fetch_assoc($bresult);

}

?>

<div class="container-fluid p-5 hero">
	<div class="container">
		<span class="text-white h5 pl-3"><?php echo $row['pcat'];?>/<?php echo $row['pname'];?></span>
	</div>
</div>
<div class="container rounded">
	<div class="row py-5">
		<div class="col-lg-6 text-dark">
			<img class="rounded-0 view_img mx-auto"  src="<?php echo $row['pimg'];?>" alt="<?php echo $row['pname'];?>">
			<span class="h3 pb-4">Description:</span>
			<p class="m-4 p-4" style="min-height: 100px; border:1px solid; border-color: #f5b22d;"><?php echo $row['pdes'];?></p>
			
		</div>
		<div class="col-lg-6 py-5">
			<u><span class="h4 text-uppercase "><?php echo $row['pname'];?></span></u>
			<hr class="my-4">
			<div class="container p-3 text-white" style="background-color: #4e5663;border-radius: 15px;" >
				<?php 
				$pid=$_SESSION['$pid'];
				$qry="SELECT * FROM `products` WHERE pid='$pid'";
				$bresult=mysqli_query($conn,$qry);
				$row=mysqli_fetch_assoc($bresult);

				

				$chqry="SELECT * FROM `bidding` WHERE pid='$pid' ORDER BY bprice DESC";
				$chresult=mysqli_query($conn,$chqry);
				$chrow=mysqli_fetch_assoc($chresult);


				?>
				<div>
					<span class="h6">Current Price: $<?php echo $chrow['bprice'];?></span>
				</div>
				<hr style="border-color: #757575;">
				<div>
					<span class="h6">Minimum Bid: $<?php echo $chrow['bprice']+1;?></span>
				</div>
				<hr style="border-color: #757575;">
				<?php

				// unset($username);
				if(isset($_SESSION['$username'])){ 
					$username=$_SESSION['$username'];
					$pname=$row['pname'];
					$checkqry="SELECT * FROM `bidding` WHERE busername='$username' && pname='$pname';";
					$checkresult=mysqli_query($conn,$checkqry);
					$row=mysqli_fetch_assoc($checkresult);
					$count=mysqli_num_rows($checkresult);

					$pid=$_SESSION['$pid'];
					$bqry="SELECT * FROM `products` WHERE pid='$pid'";
					$bresult=mysqli_query($conn,$bqry);
					$brow=mysqli_fetch_assoc($bresult);

					$uname=$brow['uname'];

					if ($username==$uname) {?>
						<div class="text-center">
							<span class="h6 text-warning">We Dont Allow You to Bid On your Own Product</span><br>
						</div>
						<?php
					}
					elseif ($count>0) {?>
						<div class="text-center">
							<span class="h6 text-warning">Your Bid Submitted</span><br>
							<!-- <span class="h6 text-warning">your Bid:</span> -->
							<input type="text" name="mybid" value="<?php echo $row['bprice'];?>" maxlength="8" size="8" class="m-3 p-1" disabled="disabled">

						</div>


						<?php	
					}
					else
						{?>
							<form action="" method="POST">
								<div>
									<span class="h6 text-warning">Enter your maximum bid:</span>
									<input type="number" name="mybid" id="mybid" placeholder="Your Bid" maxlength="8" size="8" class="m-3 p-1">
									<input type="submit" name="bidbtn" class="btn-warning" value="Place Bid" >
								</div>
							</form>

							<?php 
						}

					}
					else
						{?>
							<div class="text-center">
								<span class="h6 text-warning">Want to bid on this item?</span><br>
								<span class="h6 text-warning">An E-Auctioneer Account needed to place a bid</span><br>
								<a href="login.php" class="text-danger" style="border:1px solid">Login</a>
								<a href="register.php" class="text-danger" style="border:1px solid">Create account</a>
							</div>

							<?php

						}?>
					</div>
					<?php 
					$pid=$_SESSION['$pid'];
					$countq="SELECT COUNT(bno) As trow FROM `bidding` WHERE pid='$pid'";
					$countres=mysqli_query($conn, $countq);
					$count=mysqli_fetch_assoc($countres);

					$pid=$_SESSION['$pid'];
					$qry="SELECT * FROM `products` WHERE pid='$pid'";
					$bresult=mysqli_query($conn,$qry);
					$row=mysqli_fetch_assoc($bresult);
					

					?>
					<div class="pb-5">
						<span class="float-left pl-5">Total Bids:<?php echo $count['trow'];?></span>
						<span class="float-right pr-5">Ending Date : <b><?php echo $row['pdate'];?></b></span>
					</div>
					<div class="container mt-5">
						<span class="h4"><i class="fa fa-usd"></i>PAYMENT DETAILS</span>
						<hr>
						<span>Certified Check or Cash due at time of pickup.</span>


					</div>

				</div>

			</div>

		</div>

		<?php include 'footer.php';?>

		<!-- bidding query -->
		<?php 
		if (isset($_POST['bidbtn'])) {

			$pid=$_SESSION['$pid'];
			$qry="SELECT * FROM `products` WHERE pid='$pid'";
			$bresult=mysqli_query($conn,$qry);
			$row=mysqli_fetch_assoc($bresult);

			$pname = $row['pname'];
			$uname = $row['uname'];


			$chqry="SELECT * FROM `bidding` WHERE pname='$pname' ORDER BY bprice DESC";
			$chresult=mysqli_query($conn,$chqry);
			$chrow=mysqli_fetch_assoc($chresult);



			$bprice = $_POST['mybid'];
			
			$busername=$_SESSION['$username'];
			$prev=$chrow['bprice'];

			if ($bprice>$prev) {
				$bquery="INSERT INTO `bidding`(`busername`,`pid`, `pname`, `bprice`,`bowner`) VALUES ('$busername','$pid','$pname','$bprice','$uname')";
				$bres=mysqli_query($conn,$bquery);
				echo "<script type='text/javascript'>alert('Your Bid Submitted');</script>";
				if ($bres==TRUE) {
					
					header("location:product-view.php");
				}
				else {
					echo "<script type='text/javascript'>alert('error');</script>";
				}
			}
			else{
				echo "<script type='text/javascript'>alert('Please bid higher than current');</script>";

			}
			
		}

		?>
		<!-- bidding query -->




		


