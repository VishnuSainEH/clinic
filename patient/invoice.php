<?php  session_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Invoice</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
    include("../includes/header.php");
    include("../includes/connection.php");
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <?php 
                include("sidenav.php");
                ?>
            </div>

            <div class="col-md-10">
                <h5 class="text-center my-3">My Invoice</h5>
                <?php
                $pat = $_SESSION['patient'];
                $query = "SELECT * FROM patient WHERE username='$pat'";
                $res = mysqli_query($connect,$query);
                $row = mysqli_fetch_array($res);
                $fname = $row['firstname'];

                $querys = "SELECT * FROM income WHERE patient='$fname'";
                $ress= mysqli_query($connect,$querys);

                if(mysqli_num_rows($ress) < 1){
                    echo "<div class='alert alert-warning text-center' role='alert'>No Invoice</div>";
                } else {
                    ?>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr> 
                                    <th>ID</th>
                                    <th>Doctor</th>
                                    <th>Patient</th>
                                    <th>Date Discharge</th>
                                    <th>Amount Paid</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while($row = mysqli_fetch_array($ress)){
                                    echo "<tr>";
                                    echo "<td>".$row['id']."</td>";
                                    echo "<td>".$row['doctor']."</td>";
                                    echo "<td>".$row['patient']."</td>";
                                    echo "<td>".$row['date_dischange']."</td>";
                                    echo "<td>".$row['amount_paid']."</td>";
                                    echo "<td>".$row['description']."</td>";
                                    echo "<td><a href='view.php?id=".$row['id']."' class='btn btn-info'>View</a></td>";
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
