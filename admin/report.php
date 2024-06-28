<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total Report</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add your custom CSS styles here */
    </style>
</head>
<body>
    <?php 
    include("../includes/header.php");
    include("../includes/connection.php");
    ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2" style="margin-left: -30px;">
                <?php include("sidenav.php"); ?>
            </div>

            <div class="col-md-10">
                <h5 class="text-center my-2">Total Report</h5>
                <?php
                $query = "SELECT * FROM report";
                $res = mysqli_query($connect, $query);

                if (mysqli_num_rows($res) < 1) {
                    echo "<p class='text-center'>No Report Yet</p>";
                } else {
                ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr> 
                                <th>ID</th>
                                <th>Title</th>
                                <th>Message</th>
                                <th>Username</th>
                                <th>Date Send</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($res)) {
                            ?>
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['title']; ?></td>
                                <td><?php echo $row['messagee']; ?></td>
                                <td><?php echo $row['username']; ?></td>
                                <td><?php echo $row['data_reg']; ?></td>
                            </tr>
                            <?php
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

    <!-- Bootstrap 5 JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
