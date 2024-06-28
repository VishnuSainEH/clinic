<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <?php 
        include('../includes/header.php');
        include('../includes/connection.php');
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <?php include("sidenav.php"); ?>
            </div>
            <div class="col-md-10">
                <h4 class="my-4 text-info text-center">Admin Dashboard</h4>

                <div class="row">
                    <div class="col-md-3">
                        <div class="bg-success text-white p-3 my-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <?php
                                    $ad = mysqli_query($connect,"SELECT * FROM admin ");
                                    $num = mysqli_num_rows($ad);
                                ?>
                                <div>
                                    <h5 class="my-2" style="font-size: 30px;"><?php echo $num;?></h5>
                                    <h5>Total Admin</h5>
                                </div>
                                <div class="py-3">
                                    <a href="#"><i class="fas fa-users-cog fa-3x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="bg-info text-white p-3 my-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <?php
                                    $res = "SELECT * FROM doctors WHERE statuss='Approved'";
                                    $doctor = mysqli_query($connect,$res);
                                    $num2 = mysqli_num_rows($doctor);
                                ?>
                                <div>
                                    <h5 class="my-2" style="font-size: 30px;"><?php echo $num2?></h5>
                                    <h5>Total Doctors</h5>
                                </div>
                                <div class="py-3">
                                    <a href="doctor.php"><i class="fas fa-user-md fa-3x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="bg-warning text-white p-3 my-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <?php
                                    $query = "SELECT * FROM patient";
                                    $res= mysqli_query($connect,$query);
                                    $pnum = mysqli_num_rows($res);
                                ?>
                                <div>
                                    <h5 class="my-2" style="font-size: 30px;"><?php echo $pnum; ?></h5>
                                    <h5>Total Patients</h5>
                                </div>
                                <div class="py-3">
                                    <a href="patient.php"><i class="fas fa-procedures fa-3x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="bg-danger text-white p-3 my-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <?php
                                    $query = "SELECT * FROM report";
                                    $res= mysqli_query($connect,$query);
                                    $rnum = mysqli_num_rows($res);
                                ?>
                                <div>
                                    <h5 class="my-2" style="font-size: 30px;"><?php echo $rnum?></h5>
                                    <h5>Total Reports</h5>
                                </div>
                                <div class="py-3">
                                    <a href="report.php"><i class="fas fa-flag fa-3x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="bg-warning text-white p-3 my-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <?php 
                                    $job = mysqli_query($connect,"SELECT * FROM doctors WHERE statuss='Pendding'");
                                    $num = mysqli_num_rows($job);
                                ?>
                                <div>
                                    <h5 class="my-2" style="font-size: 30px;"><?php echo $num;?></h5>
                                    <h5>Total Job Requests</h5>
                                </div>
                                <div class="py-3">
                                    <a href="job_request.php"><i class="fas fa-book-open fa-3x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="bg-success text-white p-3 my-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <?php
                                    $query ="SELECT sum(amount_paid) as profit FROM income";
                                    $res = mysqli_query($connect,$query);
                                    $row = mysqli_fetch_array($res);
                                    $income = $row['profit'];
                                ?>
                                <div>
                                    <h5 class="my-2" style="font-size: 30px;">Rs.<?php echo $income ?></h5>
                                    <h5>Total Income</h5>
                                </div>
                                <div class="py-3">
                                    <a href="income.php"><i class="fas fa-money-check-alt fa-3x"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
