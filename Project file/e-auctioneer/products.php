<?php
include 'header1.php';
$username=$_SESSION['$username'];
if(isset($username)){ ?>


  <div class="container-fluid p-5 hero">
    <div class="container">
      <span class="text-white h5 pl-3">Products/</span>
    </div>
  </div>


  <!-- product-start -->
  <div class="container mt-5">
    <div class="row tm-content-row">
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 tm-block-col">
        <div class="tm-block tm-block-products" style="background-color: #4e5663;">
          <div class="tm-product-table-container">
            <table class="table table-hover tm-table-small tm-product-table" style="background-color: #656f80;">
              <thead style="background-color: #5b6473;">
                <tr>
                  <th scope="col">PRODUCT NAME</th>
                  <th scope="col">TOTAL BIDS</th>
                  <th scope="col">Highest BID$</th>
                  <th scope="col">Issued On</th>
                  <th scope="col">&nbsp;</th>
                </tr>
              </thead>
              <tbody >
                <?php
                require 'db.php';
                $uname = $_SESSION['$username'];
                $qry="SELECT * FROM `products` WHERE uname='$uname'";
                $result=mysqli_query($conn,$qry);

                while ($row=mysqli_fetch_assoc($result)){ 
                  $pid=$row['pid'];
                  $countq="SELECT COUNT(bno) As trow FROM `bidding` WHERE pid='$pid'";
                  $countres=mysqli_query($conn, $countq);
                  $count=mysqli_fetch_assoc($countres);

                  $chqry="SELECT * FROM `bidding` WHERE pid='$pid' ORDER BY bprice DESC";
                  $chresult=mysqli_query($conn,$chqry);
                  $chrow=mysqli_fetch_assoc($chresult);

                  ?>
                  <form action="products.php" method="POST">
                    <tr>
                      <td><input type="text" name="pname" class="tm-product-name text-white bg-transparent border-0" value="<?php echo $row['pname'] ?>" readonly ></td>
                      <td><input type="text" name="tbids" class="tm-product-name text-white bg-transparent border-0" value="<?php echo $count['trow'];?>" readonly>
                      </td>
                      <td><input type="text" name="hbid" class="tm-product-name text-white bg-transparent border-0" value="$<?php echo $chrow['bprice'];?>" readonly>
                      </td>
                      <td><input type="text" name="pdate" class="tm-product-name text-white bg-transparent border-0" value="<?php echo $row['pdate'] ?>" readonly>
                      </td>
                      <td><button type="submit" name="pdel" class="tm-product-delete-link" ><i class="fa fa-trash tm-product-delete-icon"></i></button>
                      </td>
                    </tr>
                  <?php }?>

                </tbody>
              </table>
            </div>
            <!-- table container -->
            <a
            href="add-product.php"
            class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
          </div>
        </div>
      </div>
    </div>
    <!-- product-end -->


    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
      $(function() {
        $(".tm-product-name").on("click", function() {
          window.location.href = "edit-product.php";
        });
      });
    </script>
  </body>
  </html>
  <?php include 'footer.php';?>

  <?php
  if(isset($_POST['pdel'])) {
    $pname=$_POST['pname'];
    $deleteQ = "DELETE FROM `products` WHERE pname='$pname'";
    $delres=mysqli_query($conn,$deleteQ);
    if($delres==TRUE){

      echo "<script type='text/javascript'>
      window.location.replace('products.php');
      </script>";
      
    } 
  } ?>


<?php }
else
{
  header('location:login.php');
  exit;
}?>

