<?php include 'header1.php'; ?>
<?php 
$username=$_SESSION['$username'];
if(isset($username)){ ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Auctioneer - Edit-Product</title>
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
  </head>

  <body style="font-family: 'Libre Baskerville', serif; background-color: white;">
   

   <div class="container-fluid p-5 hero">
      <div class="container">
        <span class="text-white h5 pl-3">Add Product/</span>
      </div>
    </div>


   <!-- add-product-start -->
   <div class="container tm-mt-big tm-mb-big">
    <div class="row">
      <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
        <div class=" tm-block tm-block-h-auto" style="background-color: #4e5663;">
          <div class="row">
            <div class="col-12">
              <h2 class="tm-block-title d-inline-block">Add Product</h2>
            </div>
          </div>
          <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
              <form action="add-product.php" method="post" class="tm-edit-product-form"
              enctype="multipart/form-data">
              <div class="form-group mb-3">
                <label
                for="pname"
                >Product Name
              </label>
              <input
              id="pname"
              name="pname"
              type="text"
              value=""
              class="form-control validate"
              style="background-color: #5b6473;"
              required
              />
            </div>
            <div class="form-group mb-3">
              <label
              for="description"
              >Description</label
              >
              <textarea                    
              class="form-control validate tm-small"
              rows="5"
              name="pdes" 
              id="pdes" 
              style="background-color: #5b6473;"
              required
              ></textarea>
            </div>
            <div class="form-group mb-3">
              <label
              for="category"
              >Category</label
              >
              <select
              class="custom-select tm-select-accounts"
              id="pcat" name="pcat" required style="background-color: #5b6473;"
              >
              <option>Select category</option>
              <option value="Automated Products">Automated Products</option>
              <option value="Beauty Products">Beauty Products</option>
              <option value="House Products">Home Products</option>
              <option value="Tech Products">Tech Products</option>
              <option value="Others">Others</option>
            </select>
          </div>
          <!-- <div class="row">
            <div class="form-group mb-3 col-xs-12 col-sm-6 mx-auto">
              <center><label
                for="expire_date"
                >Expire Date
              </label></center>
              <input
              id="pdate"
              name="pdate"
              type="date"
              value=""
              class="form-control validate"
              data-large-mode="true"
              style="background-color: #5b6473;"
              />
            </div>
          </div> -->

        </div>
        <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
          <div class="tm-product-img-edit mx-auto">
            <img src="images/images.png" id="imgupload" alt="Product image" width="300px" class="img-fluid d-block mx-auto">
          </div>
          <div class="custom-file mt-3 mb-3">
            <input id="fileInput" type="file" name="pimg" hidden="true" />
            <input
            type="button"
            class="btn btn-primary btn-block mx-auto"
            value="UPLOAD IMAGE NOW"
            id="upl"
            onclick="document.getElementById('fileInput').click();"
            />
          </div>
        </div>
        <!-- picture-preview-jquery -->
        <script>
          function readURL(input) {
            if (input.files && input.files[0]) {
              var reader = new FileReader();
              reader.onload = function(e) {
                $('#imgupload').attr('src', e.target.result);
              }

              reader.readAsDataURL(input.files[0]);
            }
          }
          $(document).ready(function(){
            $("#fileInput").change(function() {
              readURL(this);
            });
          });
        </script>
        <!-- picture-preview-jquery -->


        <div class="col-12">
          <button type="submit" name="psubmit" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
<!-- add-product-end -->

<script src="js/jquery-3.3.1.min.js"></script>
<!-- https://jquery.com/download/ -->
<script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
<!-- https://jqueryui.com/download/ -->
<script src="js/bootstrap.min.js"></script>
<!-- https://getbootstrap.com/ -->
<!-- <script>
  $(function() {
    $("#expire_date").datepicker({
      defaultDate: "10/22/2020"
    });
  });
</script> -->
</body>
</html>
<?php include 'footer.php';?>


<?php
require 'db.php';
if(isset($_POST['psubmit'])){
  $pname = $_POST['pname'];
  $pdes = $_POST['pdes'];
  $pcat = $_POST['pcat'];
  $uname = $_SESSION['$username'];
  
  $pimg =$_FILES["pimg"]["name"];
  $rr=$_FILES["pimg"]["tmp_name"];
  $upload_directory="images/".$pimg;
  $path=move_uploaded_file($rr, $upload_directory);
  $finalpath=$upload_directory;
  if ($pimg==NULL) {
    echo "<script type='text/javascript'>alert('Please attach Product image');</script>";

  }
  else
  {
    $qry="SELECT * FROM `products` WHERE pname='$pname'";
    $result=mysqli_query($conn,$qry);
    $count=mysqli_num_rows($result);
    if ($count>0) {
      echo "<script type='text/javascript'>alert('The product name already in use');</script>";
    }
    else
    {
      $query="INSERT INTO `products`(`pname`, `pdes`, `pcat`, `pimg`, `uname`) VALUES ('$pname','$pdes ','$pcat','$finalpath','$uname')";
      $res=mysqli_query($conn,$query);
      if($res==TRUE){
            // header("location:login.php");
            // exit;
        echo "<script type='text/javascript'>alert('You added new product..!');</script>";
      }
      else{
        echo "error";
      }
    }
  }

}
?>

<?php }
else
{
  header('location:login.php');
  exit;
}?>