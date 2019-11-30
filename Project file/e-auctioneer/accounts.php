<?php include 'header1.php';?>
<?php 
$username=$_SESSION['$username'];
if(isset($username)){ ?>
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
  </head>

  <body id="reportsPage" style="font-family: 'Libre Baskerville', serif; background-color: white;">
    
    <!-- account-add -->
    <div class="container-fluid p-5 hero">
      <div class="container">
        <span class="text-white h5 pl-3">Accounts/</span>
      </div>
    </div>

    <!-- account-query -->
    <?php
    require 'db.php';
    $username = $_SESSION['$username'];
    $qry="SELECT * FROM `user-register` WHERE username='$username'";
    $result=mysqli_query($conn,$qry);
    $row=mysqli_fetch_assoc($result);
    ?>


    <!-- account-query -->

    <div class="container mt-5">
    <!-- row -->
    <div class="row tm-content-row">
    <div class="tm-block-col tm-col-avatar">
    <div class="tm-block tm-block-avatar" style="background-color: #4e5663;">
    <h2 class="tm-block-title">Your Profile</h2>
    <div class="tm-avatar-container">
    <img
    src="<?php echo $row['image'];?>"
    alt="Profile"
    class="tm-avatar img-fluid mb-4"
    />
    </div>
    <!-- <button class="btn btn-primary btn-block text-uppercase">
    Upload New Photo
    </button> -->
    </div>
    </div>
    <div class="tm-block-col tm-col-account-settings">
    <div class=" tm-block tm-block-settings" style="background-color: #4e5663;">
    <h2 class="tm-block-title">Account Settings</h2>
    <form action="" class="tm-signup-form row">
    <div class="form-group col-lg-6">
    <label for="name">Account Name</label>
    <input
    id="name"
    name="name"
    type="text"
    class="form-control validate"
    value="<?php echo $row['fname']." ".$row['lname'];?>"
    style="background-color: #656f80;" 
    readonly
    />
    </div>
    <div class="form-group col-lg-6">
    <label for="email">Account Email</label>
    <input
    id="email"
    name="email"
    type="email"
    value="<?php echo $row['email'] ?>"
    class="form-control validate"
    style="background-color: #656f80;"
    readonly
    />
    </div>
    <div class=" form-group col-lg-6 ">
    <label for="password">Password</label>
    <input
    id="idpassword"
    name="password"
    type="password"
    class="form-control validate"
    value="<?php echo $row['password'] ?>"
    style="background-color: #656f80;"
    disabled="true"
    />
    <!-- <div class="input-group-prepend float-right ">
    <input class="btn btn-outline-warning py-0 mt-1 mr-1" onclick="myFunction()" value="Edit Password" style="cursor: pointer;" >
    </div> -->
    </div>
    <script>
    function myFunction() {
      document.getElementById("idpassword").disabled = false;
    }
    </script>
    <div class="form-group col-lg-6">
    <label for="phone">username</label>
    <input
    id="username"
    name="username"
    type="text"
    class="form-control validate"
    style="background-color: #656f80;"
    value="<?php echo $row['username'] ?>"
    disabled="true"
    />
    </div>
    
    <div class="form-group col-lg-6">
    <label for="address">House Address</label>
    <textarea class="form-control" id="address" rows="2" style="background-color: #656f80;"><?php echo $row['address'] ?></textarea>
    </div>
    <div class="form-group col-lg-6">
    <label class="tm-hide-sm">&nbsp;</label>
    <!-- <button
    type="submit"
    class="btn btn-primary btn-block text-uppercase"
    >
    Update Your Profile
    </button> -->
    </div>
    <div class="col-12">
    <!-- <button
    type="submit"
    class="btn btn-primary btn-block text-uppercase"
    >
    Delete Your Account
    </button> -->
    </div>
    </form>
    </div>
    </div>
    </div>
    </div>
    <!-- account-end -->
    </div>
    <?php include 'footer.php';?>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
  </body>
  </html>

<?php }
else
{
  header('location:login.php');
  exit;
}?>
