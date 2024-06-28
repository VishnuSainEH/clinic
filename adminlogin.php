<?php 
session_start();
include("includes/connection.php");

if(isset($_POST['login']))
 {
     $username = $_POST['uname'];
     $password = $_POST['pass'];

     $error = array();

     $query =  "SELECT * FROM adminn WHERE username = ' $username' AND passwordd = '$password' ";
     $result = mysqli_query($connect,$query);


     if (empty($username))
     {
         $error['admin'] = "Enter Username";
     }
     elseif(empty($password))
     {
         $error['admin'] ="Enter Password;"; 
     }

     if (count($error)==0)
     {
         $query =  "SELECT * FROM adminn WHERE username ='$username' AND passwordd = '$password' ";
         $result = mysqli_query($connect,$query);

         if (mysqli_num_rows($result))
         {
            echo "<script> alert ('You have Login As an admin')</script>";
            $_SESSION['admin'] = $username;
            header("Location:admin/index.php");
             exit();

         }

         else
         {
             echo "<script> alert ('Invalid Username or Password')</script>";
         }
     }

 }
                            if (isset($error['admin']))
                           {
                               $e = $error['admin'];
                               $show ="<h5 class='text-center alert alert-danger'>$e</h5>";
                           }
                           else 
                           {
                               $show = "";
                           }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.2.1/css/bootstrap.min.css">
    <style>
        body {
            background-image: url(img/ad.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }

        .container {
            margin-top: 20px;
        }

        .jumbotron {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
        }

        .jumbotron img {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <?php include("includes/header.php") ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="jumbotron">
                    <img src="img/admin.jpg" class="img-fluid" alt="Admin Image">
                    <form method="POST">
                        <?php echo $show; ?>
                        <div class="form-group">
                            <label for="uname">Username</label>
                            <input type="text" name="uname" id="uname" class="form-control" autocomplete="on" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" name="pass" id="pass" class="form-control" placeholder="Enter Password">
                        </div>
                        <button type="submit" name="login" class="btn btn-success btn-block">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
