
<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Patient Dashboard</title>
</head>
<body>

<?php

include("../includes/header.php");
include("../includes/connection.php");

?>
    
    <div class="container-fulid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php
                    include("sidenav.php");
                    ?>
                </div>
                <div class="col-md-10">
                    <h5 class=" text-info my-3">Patient Dashboard</h5>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3 bg-info mx-2" style="height: 150px;">
                        <div class="col-md-12">
                            <div class="row">
                            <div class="col-md-8">
                                <h5 class="text-white my-4">My Profile</h5>

                            </div>
                            <div class="col-md-4">
                                <a href="profile.php">
                                    <i class="fa fa-user-circle fa-3x my-4" style="color: white;"></i>
                                </a>
                            </div>
                        </div>
                        </div>
                        
                        </div>
                            <div class="col-md-3 bg-warning mx-2" style="height: 150px;">
                            <div class="col-md-12">
                            <div class="row">
                            <div class="col-md-8">
                                <h5 class="text-white my-4">Book Appiontment</h5>

                            </div>
                            <div class="col-md-4">
                                <a href="appointment.php">
                                    <i class="fa fa-calendar fa-3x my-4" style="color: white;"></i>
                                </a>
                            </div>
                        </div>
                        </div>
                        </div>
                            <div class="col-md-3 bg-success mx-2" style="height: 150px;">
                            <div class="col-md-12">
                            <div class="row">
                            <div class="col-md-8">
                                <h5 class="text-white my-4">My Invoice</h5>

                            </div>
                            <div class="col-md-4">
                                <a href="invoice.php">
                                    <i class="fas fa-file-invoice-dollar fa-3x my-4" style="color: white;"></i>
                                </a>
                            </div>
                        </div>
                        </div></div>
                        </div>
                    </div>

                    <?php
                    if(isset($_POST['send'])){
                        $title = $_POST['title'];
                        $message = $_POST['message'];

                        if(empty($title)){
                            echo "<script>alert('Enter Title')</script>";

                        }
                        elseif(empty($message)){
                            echo "<script>alert('Enter Message')</script>";

                        }
                        else
                        {
                            $user = $_SESSION['patient'];

                            $query ="INSERT INTO report( title, messagee, username, data_reg) VALUES('$title','$message','$user',NOW())";
                            $res = mysqli_query($connect,$query);

                            if($res){
                                echo "<script>alert('You have Sent Report Successfully')</script>";

                            }
                        }
                    }
                    
                    
                    ?>



                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6 jumbotron bg-info my-5">
                                <h5 class="text-center my-2">Send A Report</h5>
                                <form action="" method="post">
                                    <label for="">Title</label>
                                    <input type="text"
                                    name="title"
                                    autocomplete="off"
                                    class="form-control"
                                    placeholder="Enter Title of the report">

                                    <label for="">Message</label>
                                    <input type="text"
                                    name="message"
                                    autocomplete="off"
                                    class="form-control"
                                    placeholder="Enter Message">
                                    
                                    <input type="submit" value="Send Report" name="send" class="btn btn-success my-2">
                                    
                                </form>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</body>
</html>