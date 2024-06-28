<?php
session_start();
include("includes/connection.php");

if(isset($_POST['login'])){
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    if(empty($uname)){
        echo "<script>alert('Enter Username')</script>";
    }
    elseif(empty($pass)){
        echo "<script>alert('Enter Password')</script>";
    }
    else{
        $query = "SELECT * FROM patient WHERE username='$uname' AND passwordd='$pass'";
        $res = mysqli_query($connect, $query);
        if(mysqli_num_rows($res) == 1){
            header("Location: patient/index.php");
            $_SESSION['patient'] = $uname;
        }
        else {
            echo "<script>alert('Invalid Account')</script>";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login Page</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.2.1/css/bootstrap.min.css">
    <style>
        body {
            background-image: url(img/pa.jpg);
            background-repeat: no-repeat;
            background-size: cover;
        }
        .jumbotron {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 30px;
        }
        .form-group {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <?php include("includes/header.php"); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 my-5">
                <div class="jumbotron">
                <img src="doctor/img/patient-portal.jpg" class="rounded mx-auto d-block"  alt="patient Image" width="50%" >
                
                    <h5 class="text-center text-info mb-4">Patient Login</h5>
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="uname">Username</label>
                            <input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Enter Username">
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Enter Password">
                        </div>
                        <button type="submit" name="login" class="btn btn-info btn-block">Login</button>
                        <p class="mt-3">Don't have an account? <a href="paccount.php">Click here</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
