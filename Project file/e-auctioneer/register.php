

<!doctype html>
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
  <title>Registration-E-Auctioneer</title>
</head>
<body style="font-family: 'Libre Baskerville', serif; background-color: white;">
  <?php include 'header.php'?>
  <?php require 'db.php';
  $img="images/images.png";



  ?>

  <!-- hero-start -->
  <div class="jumbotron jumbotron-fluid hero">
    <div class="container" >
      <h1 class="display-5 text-white text-center">Create Your Free Registration Account</h1>
    </div>
  </div>
  <!-- hero-end -->

  <!-- new-form-start -->
  <div class="container my-4" style="background-color: #4e5663;">
    <form action="register.php" method="POST"  enctype="multipart/form-data">
      <div class="text-center tm-block-title text-warning py-4"><small ><b>ALL FIELDS REQUIRED Unless otherwise noted</b></small>
      </div>
      <div class="row my-5 pt-2">


        <div class="col-lg-4">
          <div class="form-group col-md-12 float-left">
            <div class="tm-product-img-edit mx-auto">
              <img src="<?php echo $img;?>" id="imgupload" alt="Product image" width="350px" class="img-fluid d-block mx-auto">
            </div>
            <div class="custom-file mt-3 mb-3">
              <input id="fileInput" type="file" name="image" hidden="true" />
              <input
              type="button"
              class="btn btn-primary btn-block mx-auto"
              value="UPLOAD IMAGE NOW"
              id="upl"
              onclick="document.getElementById('fileInput').click();"
              />
            </div>
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

                // $('#fileInput').change(function() {
                //   var filename = $('#fileInput').val();
                //   alert(filename);
                //   $('#imgupload').attr("src", filename);
                // });
                $('#cpassword').keyup(function(){
                  var pas=$('#password').val();
                  var cpas=$('#cpassword').val();
                  if (pas!=cpas) {
                    $('.show_err').html("**Password Not Match**");
                    return false;
                  }
                  else
                  {
                    $('.show_err').html(" ");
                    return true;
                  }
                });

               //  $("#agreements").click(function(event){
               //   event.preventDefault();
               //   $('#sub').removeAttr("disabled");
               // });
               $('#agreements').click(function(){
                if ($('#agreements').is(":checked"))
                {
                  $('#sub').removeAttr("disabled", "disabled");
                }
                else{
                  $('#sub').attr("disabled", "disabled");}

                });
               

             });
           </script>
         </div>
       </div>


       <div class="col-lg-8">
        <div class="form-group col-lg-6 float-left">
          <label for="fname">First Name</label>
          <input type="text" class="form-control" id="fname"  name="fname" style="background-color: #656f80;" required>
        </div>
        <div class="form-group col-lg-6 float-right">
          <label for="lname">Last Name</label>
          <input type="text" class="form-control" id="lname" name="lname" style="background-color: #656f80;" required>
        </div>
        <div class="form-group col-lg-6 float-left">
          <label for="email">Email Address</label>
          <input type="email" class="form-control" id="email" name="email" style="background-color: #656f80;" required>
        </div>
        <div class="form-group col-lg-6 float-right">
          <label for="username">Create username</label>
          <input type="text" class="form-control" id="username" name="username" style="background-color: #656f80;" required>
        </div>
        <div class="form-group col-lg-6 float-left">
          <label for="password">Create your Password:</label>
          <input type="password" class="form-control" id="password" name="password" style="background-color: #656f80;" required>
        </div>
        <div class="form-group col-lg-6 float-right">
          <label for="cpassword">Confirm your Password:</label>
          <input type="password" class="form-control" id="cpassword" name="cpassword" style="background-color: #656f80;" required>
          <div class="text-warning show_err">
            
          </div>
        </div>
        <div class="form-group col-lg-6 float-left">
          <label for="cname">Company Name <small><b>*Optional</b> </small><small> (Example: Acme Township)</small></label>
          <input type="text" class="form-control" id="cname" name="cname" style="background-color: #656f80;">
        </div>
        <div class="form-group col-lg-6 float-right">
          <label for="address">your House Address</label>
          <textarea class="form-control" id="address" name="address" rows="2" style="background-color: #656f80;" required></textarea>
        </div>

      </div>
    </div>
    <div class="row pb-5">

      <div class="col-12 col-md-6 mx-auto text-white text-center">
        <label class="text-center">
          <input type="checkbox" id="agreements" name="agreements">
          <span>&nbsp;I agree to E-Auctioneer's <a data-toggle="modal" data-target="#terms"><b><u>Terms &amp; Conditions</u></b></a></span></label>
        <div class="form-group col-12 col-md-12">
          <input
          type="submit"
          name="register"
          value="Create My Account"
          id="sub"
          class="btn btn-primary btn-block text-uppercase" 
          disabled
          >
        </div>
      </div>
      <!-- insert user register data -->
      <?php
      if(isset($_POST['register'])){

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword=$_POST['cpassword'];
        $cname = $_POST['cname'];
        $address = $_POST['address'];
        $image =$_FILES["image"]["name"];
        $rr=$_FILES["image"]["tmp_name"];
        $upload_directory="images/".$image;
        $path=move_uploaded_file($rr, $upload_directory);
        $finalpath=$upload_directory;
        if ($password==$cpassword) {

          
            $qry="SELECT * FROM `user-register` WHERE username='$username' OR email='$email' ";
            $result=mysqli_query($conn,$qry);
            $count=mysqli_num_rows($result);
            if ($count>0) {
              echo "<script type='text/javascript'>alert('This Username Or email Already exist..!');</script>";
            }
            else{

            $query="INSERT INTO `user-register`(`fname`, `lname`, `email`, `username`, `password`, `cname`, `address`, `image`) VALUES ('$fname','$lname','$email','$username','$password','$cname','$address','$finalpath')";
            $res=mysqli_query($conn,$query);
            if($res==TRUE){
            // header("location:login.php");
            // exit;
              echo "<script type='text/javascript'>alert('Your Account Create Successfully..!');</script>";
            }
            else{
              echo "error";
            }
            }

          


        }
        else{
          echo "<script type='text/javascript'>alert('Password Not Match');</script>";
        }


      }
      ?>
      <!-- Modal -->
      <div class="modal fade" id="terms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header ">
              <h5 class="modal-title" id="exampleModalLongTitle">E-Auctioneer's Terms &amp; Conditions</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body text-dark">
              <h4>E-Auctioneer-BIDDING:</h4>

              <p>Bidding on an item indicates your intent to purchase that item and is considered a legally binding contract between yourself and the seller of the item. Bids cannot be canceled once they are submitted. Upon receiving notification that you are the winning bidder you are obligated to purchase the item and pay the buyer's final sale fee.</p>

              <p><strong>PLEASE NOTE:</strong> Bids placed with less than 2 minutes will extend the auction for 2 minutes from the point of the last bid until no bids are received for the remaining time.</p>

              <p><strong>PLEASE NOTE:</strong> All auctions are subject to the terms and conditions of the seller and municibid.com, LLC. The governing bodies (sellers) have the right to reject any and all bids for any reason. Acceptance of winning bid generally will occur at the next official meeting of the governing body. The auction is not official until the governing body acts on the result. The high bidder is the bidder with the highest bid at the close of the auction even if the high bid is not more than the minimum bid increment.</p>

              <p>FAILURE TO HONOR YOUR WINNING BID MAY BE CONSIDERED FRAUD AND WILL BE PROSECUTED TO THE FULL EXTENT OF THE LAW. YOU MAY ALSO FACE CIVIL ACTION BY THE SELLING GOVERNMENT ENTITY AND/OR MUNICIBID.COM, LLC.</p>

              <p><strong>FAIR WARNING ALL SALES ARE FINAL.</strong> You are legally obligated to pay for your item per the terms of the seller if you are the high bidder at the close of auction. If you do not pay for your item, you will not receive a refund of your buyer's final sale fee, you will no longer be permitted to bid on municibid.com and will be subject to a penalty of 40% of the winning bid amount. If your credit card is declined for insufficient funds, you will be charged a $50 fee.</p>

              <p>ZERO TOLERANCE POLICY FOR BIDDERS WHO DO NOT HONOR THEIR WINNING BID: IF WE ARE NOTIFIED BY THE SELLER THAT APPROPRIATE MEASURES WERE TAKEN TO CONTACT THE WINNING BIDDER AND THE WINNING BIDDER HAS STILL NOT COME FORTH, THE WINNING BIDDER WILL BE REMOVED FROM MUNICIBID.COM 10 DAYS AFTER RECEIVING A NOTICE FROM MUNICIBID.COM REGARDING THE NON-PAYMENT. DURING THE 10 DAYS THE BIDDER'S ACCOUNT WILL BE DISABLED. IF WITHIN THE 10 DAYS PAYMENT ARRANGEMENTS ARE MADE WITH THE SELLING ENTITY, THE BIDDER'S ACCOUNT WILL BE REACTIVATED AND WILL HAVE ONE STRIKE AGAINST IT. IF WE NEED TO CONTACT THE BIDDER AGAIN FOR A FUTURE NON-PAYMENT, THE BIDDER WILL BE REMOVED.</p>

              <p><strong>PLEASE NOTE:</strong> For security reasons, all Credit Card information will be erased for users who have not logged in or placed a bid in 30 days.</p>

              <h4>DENIAL OF SERVICE:</h4>

              <p>municibid.com, LLC;&nbsp;reserves the right to refuse service to anyone for any reason. This right will be exercised when it becomes evident a user is in some way abusing the system.</p>

              <h4>TERMS OF SERVICE:</h4>

              <p>This comprises the entire agreement between the;&nbsp;Seller / Bidder;&nbsp;and municibid.com, LLC and supersedes all other agreements. By registering and participating as a user you are indicating your consent to be bound by this agreement.</p>

              <h4>DISCLAIMER:</h4>

              <p>EXCEPT AS SPECIFIED HEREIN, THE SERVICES ON THIS WEBSITE ARE PROVIDED SOLELY ON AN "AS IS" BASIS. MUNICIBID.COM, LLC HEREBY DISCLAIMS ALL EXPRESS OR IMPLIED REPRESENTATIONS, WARRANTIES, GUARANTEES, AND CONDITIONS, INCLUDING BUT NOT LIMITED TO ANY IMPLIED WARRANTIES OR CONDITIONS OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE, TITLE AND NON-INFRINGEMENT, EXCEPT TO THE EXTENT THAT SUCH DISCLAIMERS ARE HELD TO BE LEGALLY INVALID IN YOUR JURISDICTION. YOU ASSUME ALL RESPONSIBILITY FOR DETERMINING WHETHER THE PRODUCTS/SERVICES ARE SUFFICIENT FOR YOUR PURPOSES.;&nbsp;MUNICIBID.COM,;&nbsp;LLC;&nbsp;DOES NOT MAKE ANY REPRESENTATIONS, WARRANTIES, GUARANTEES, OR CONDITIONS AS TO THE QUALITY, SUITABILITY, ACCURACY, OR COMPLETENESS OF ANY OF THE PRODUCTS/SERVICES CONTAINED ON THE WEBSITE.</p>

              <h4>LIMITATION OF LIABILITY:</h4>

              <p>MUNICIBID.COM, LLC;&nbsp;SHALL NOT BE LIABLE FOR ANY DIRECT OR INDIRECT DAMAGES SUFFERED AS A RESULT OF PURCHASING OR SELLING ITEMS ON THIS WEBSITE. IN NO EVENT SHALL MUNICIBID.COM, LLC BE LIABLE FOR ANY DIRECT, INDIRECT, PUNITIVE, SPECIAL, INCIDENTAL, OR CONSEQUENTIAL DAMAGES (INCLUDING BUT NOT LIMITED TO LOSS OF BUSINESS, REVENUE, PROFITS, USE, DATA OR OTHER ECONOMIC ADVANTAGE), HOWEVER ARISING, WHETHER IN AN ACTION OF CONTRACT, NEGLIGENCE OR OTHER TORTIOUS ACTION, ARISING OUT OF OR IN CONNECTION WITH THE USE OR PERFORMANCE OF INFORMATION AVAILABLE FROM THIS WEBSITE, EVEN IF MUNICIBID.COM, LLC HAS BEEN PREVIOUSLY ADVISED OF THE POSSIBILITY OF SUCH DAMAGE. YOU AGREE TO HOLD SITE OWNER HARMLESS FROM, AND YOU COVENANT NOT TO TAKE ANY LEGAL OR OTHER ACTION AGAINST SITE OWNER, ASSERTING ANY CLAIMS BASED ON OR RELATED TO THE USE OF THIS WEBSITE.</p>

              <h4>GENERAL USE PROVISIONS:</h4>

              <p>This site is provided only as a venue for bidders and auction posters. municibid.com, LLC. is not involved in the actual transaction between these parties and assumes no control or liability over any issues that may arise as a result of this transaction. Government agencies (sellers) agree not to accept sealed bids when items are posted for auction on municibid.com. Bidders and Sellers shall not engage in activities intended to avoid municibid.com fees.</p>

              <h4>INTELLECTUAL PROPERTY:</h4>

              <p>All materials provided on this Website, including but not limited to information, documents, products, logos, graphics, images, auctions, and services are the wholly owned and copyrighted work of municibid.com, LLC and/or its Third Party Providers. None of the materials posted herein may be copied, reproduced, distributed, republished, downloaded, displayed, posted or transmitted in any form or by any means, including but not limited to electronic, mechanical, photocopying, recording, or other means, without the prior express written permission of Municibid.com, LLC or the appropriate Third Party Provider. You may not "mirror" any materials contained on this Website on any other server or site without SITE OWNER's prior written consent. In order to register on this site you must provide your true name and a valid email address.</p>

              <h4>PLEASE AGAIN NOTE:;&nbsp; All auctions are subject to the terms and conditions of the seller and Municibid.com, LLC.;&nbsp; The governing bodies (sellers) have the right to reject any and all bids for any reason.;&nbsp; Acceptance of winning bid;&nbsp;generally will occur at the next official meeting of the governing body.</h4>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary btn-block" data-dismiss="modal">Close</button>

            </div>
          </div>
        </div>
      </div>

    </div>
  </form>


</div>
<!-- new-form-end -->

<?php include 'footer.php';?>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>