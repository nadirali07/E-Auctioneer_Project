<?php include 'header1.php';?>
<?php 
require 'db.php';
$username=$_SESSION['$username'];
if(isset($username)){ ?>

	<head>
		<style type="text/css">
			#myInput::placeholder {
				color: white;
			}
		</style>
	</head>

	<div class="container-fluid p-5 hero">
		<div class="container">
			<span class="text-white h5 pl-3">Dashboard/</span>
		</div>
	</div>



	<!-- dashboard start -->
	<div class="container">
		<div class="row">
			<div class="col">
				<p class="text-dark my-4">Welcome back, <b><?php echo $username;?></b></p>
			</div>
		</div>
		<!-- row -->
		<div class="row tm-content-row">
			<div class="col-12 tm-block-col">


				<div class="tm-block tm-block-taller tm-block-scroll" style="background-color: #4e5663;">
					<!-- bidding history -->
					<?php 

					$dashboard="SELECT * FROM `bidding` WHERE bowner='$username' OR busername='$username' ";
					$dashboard_res=mysqli_query($conn,$dashboard);
					?>
					<!-- bidding history -->
					<span class="h2 tm-block-title mb-4">Bidding List</span>


					<input id="myInput" type="text" placeholder="Search.." class="float-right mb-4 form-control validate col-lg-3 border-warning" style="border:1px solid; background-color:#5b6473;">
					<script>
						$(document).ready(function(){
							$("#myInput").on("keyup", function() {
								var value = $(this).val().toLowerCase();
								$("#myTable tr").filter(function() {
									$(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
								});
							});
						});
					</script>

					<table class="table" style="background-color: #656f80;">
						<thead style="background-color: #5b6473;">
							<tr>
								<th scope="col">BID NO.</th>
								<th scope="col">STATUS</th>
								<th scope="col">BIDDER</th>
								<th scope="col">OWNER</th>
								<th scope="col">PRODUCT NAME</th>
								<th scope="col">BID</th>
								<th scope="col">MAX BID</th>
								<th scope="col">BID DATE</th>
							</tr>
						</thead>
						<tbody id="myTable">
							<!-- bidding history fetch -->
							<?php 
							while ($d_row=mysqli_fetch_assoc($dashboard_res)) {
								$pid=$d_row['pid'];
								$chqry="SELECT * FROM `bidding` WHERE pid='$pid' ORDER BY bprice DESC";
								$chresult=mysqli_query($conn,$chqry);
								$chrow=mysqli_fetch_assoc($chresult);	
								?>

								<tr>
									<th scope="row"><b>#<?php echo $d_row['bno'];?></b></th>
									<td>
										<?php 
										$bowner=$d_row['bowner'];
										if ($username==$bowner) {?>
											<div class="tm-status-circle moving">
											</div>Selling
											<?php
										}
										else{?>
											<div class="tm-status-circle moving">
											</div>Buying
											<?php
										}
										?>
										
									</td>
									<td><b><?php echo $d_row['busername'];?></b></td>
									<td><b><?php echo $d_row['bowner'];?></b></td>
									<td><b><?php echo $d_row['pname'];?></b></td>
									<td><b>$<?php echo $d_row['bprice'];?></b></td>
									<td>$<?php echo $chrow['bprice'];?></td>
									<td><?php echo $d_row['bdate'];?></td>
								</tr>


								<?php
							}
							?>
							<!-- bidding history fetch -->
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	<!-- dashboard end -->
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<!-- https://jquery.com/download/ -->
<script src="js/moment.min.js"></script>
<!-- https://momentjs.com/ -->
<script src="js/Chart.min.js"></script>
<!-- http://www.chartjs.org/docs/latest/ -->
<script src="js/bootstrap.min.js"></script>
<!-- https://getbootstrap.com/ -->
<script src="js/tooplate-scripts.js"></script>
</body>

</html>
<?php include 'footer.php';?>

<?php }
else
{
	header('location:login.php');
	exit;
}?>

