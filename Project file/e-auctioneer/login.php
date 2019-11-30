
<?php 
ob_start();
include 'header.php';?>
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
    <title>E-Auctioneer-Just Bid it.</title>
</head>
<body style="font-family: 'Libre Baskerville', serif; background-color: white;">
    <!-- login-start -->
    <div style="background-image: url('images/login-bg.jpg'); background-repeat: no-repeat;background-size: cover;">
        <div class="container col-12 col-md-4 py-5">
            <div class="card card-login mx-auto text-center">
                <div class="card-header mx-auto bg-transparent border-0">
                    <span> <img src="images/logo.png" class="w-100" alt="Logo"> </span><br/>
                    <h5 class="text-dark text-center bg-warning py-2 font-weight-bold">Welcome Back!</h5>
                    <span>Please enter your Credentials</span>

                </div>
                <div class="card-body">
                    <form action="login.php" method="post">
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-warning"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Username" >
                        </div>

                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-warning"><i class="fa fa-key"></i></span>
                            </div>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <small>
                                <button type="button" class="btn btn-primary text-danger mt-2 float-left p-0 bg-transparent border-0" data-toggle="modal" data-target="#exampleModalCenter">Forget Password..?</button>
                            </small>
                        </div>




                        <div class="form-group">
                            <small><a href="register.php" class="float-left text-danger mt-2 ml-3">Create Account</a></small>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="login" id="login" value="Login" class="btn btn-outline-warning float-right">
                        </div>

                    </form>
                    <!-- login query start here -->
                    <?php
                    require 'db.php';
                   
                   
                    if(isset($_POST['login'])) {
                        $username = $_POST['username'];
                        $password = $_POST['password'];

                        $qry="SELECT * FROM `user-register` WHERE username='$username' && password='$password' ";
                        $result=mysqli_query($conn,$qry);
                        $count=mysqli_num_rows($result);
                        if ($count>0) {
                            // echo "<script type='text/javascript'>alert('Login successfully');</script>";
                            $_SESSION['$username'] = $username;
                            header("location:myaccount.php");
                            ob_end_flush();
                            exit;
                            // $_SESSION['$username'] = $username;
                            // echo "<script type='text/javascript'>
                            // window.location.replace('myaccount.php');
                            // </script>";

                        }
                        else
                        {
                           echo "<script type='text/javascript'>alert('Incorrect username or Password..!');</script>"; 
                        }
                    }




                    ?>
                    <!-- login query ends here -->
                </div>
            </div>
        </div>
    </div>
    <!-- login-end -->


    <?php include 'footer.php';?>



<!-- model added for forget password -->


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
<div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p id="msg">You can reset your password here.</p>
                  <div class="panel-body">
    
                    <form action="" method="post">
    
                      <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-warning"><i class="fa fa-user"></i></span>
                            </div>
                            <input type="text" name="nusername" id="nusername" class="form-control bg-light text-dark" placeholder="Username" required>
                        </div>
                        <div class="input-group form-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text bg-warning"><i class="fa fa-key"></i></span>
                            </div>
                            <input type="password" name="npassword" id="npassword" class="form-control bg-light text-dark" placeholder="New Password" required>
                        </div>
                      <div class="form-group">
                        <input name="reset" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div> 
                    </form>
                    <?php 
                    require 'db.php';
                    if (isset($_POST['reset'])) {
                        $username=$_POST['nusername'];
                        $npassword=$_POST['npassword'];
                        $chq="SELECT * FROM `user-register` WHERE username='$username'";
                        $chres=mysqli_query($conn,$chq);
                        $chcount=mysqli_num_rows($chres);
                        

                        if ($chcount>0) {
                            $updateq="UPDATE `user-register` SET `password`='$npassword' WHERE username='$username'";
                            $upres=mysqli_query($conn,$updateq);
                            if ($upres==TRUE) {
                                echo "<script type='text/javascript'>alert('Your Password Is Reset..!');</script>";
                            }

                        }
                        else
                        {
                            echo "<script type='text/javascript'>alert('Username Does Not Exist..!');</script>";
                        }
                    }

                    ?>
    
                  </div>
                </div>
              </div>


      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>





<!-- model added for forget password -->
