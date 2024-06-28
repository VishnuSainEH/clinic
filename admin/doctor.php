<?php  
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Doctors</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
    include('../includes/header.php');
    include('../includes/connection.php');
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" style="margin-left: -30px;">
                <?php include('sidenav.php'); ?>
            </div>

            <div class="col-md-10">
                <h5 class="text-center py-3">
                    Total Doctors
                </h5>

                <?php 
                $query = "SELECT * FROM doctors WHERE statuss ='Approved' ORDER BY data_reg ASC ";
                $res = mysqli_query($connect,$query);

                $output ="";
                $output .="
                <table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Firstname</th>
                        <th>Surname</th>
                        <th>Username</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>Salary</th>
                        <th>Date Registered</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>";

                if(mysqli_num_rows($res) < 1){
                    $output .="
                    <tr>
                        <td colspan='10' class='text-center'>No job Request yet.</td>
                    </tr>";
                }

                while($row = mysqli_fetch_array($res)){
                    $output .="
                    <tr>
                        <td>".$row['id']."</td>
                        <td>".$row['firstname']."</td>
                        <td>".$row['surname']."</td>
                        <td>".$row['username']."</td>
                        <td>".$row['gender']."</td>
                        <td>".$row['phone']."</td>
                        <td>".$row['country']."</td>
                        <td>".$row['salary']."</td>
                        <td>".$row['data_reg']."</td>
                        <td>
                            <a href='edit.php?id=".$row['id']."' class='btn btn-info'>Edit</a>
                        </td>
                    </tr>";
                }

                $output .="</tbody></table>";
                echo $output;
                ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
