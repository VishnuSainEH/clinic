<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Appointment</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
<?php
include("../includes/header.php");
include("../includes/connection.php");
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2" style="margin-left: -30px;">
            <?php
            include("sidenav.php");
            ?>
        </div>

        <div class="col-md-10">
            <h5 class="text-center my-3">Book Appointment</h5>
            <?php
            $pat = $_SESSION['patient'];
            $query = "SELECT * FROM patient WHERE username ='$pat'";
            $res = mysqli_query($connect,$query);

            $row = mysqli_fetch_array($res);

            $firstname = $row['firstname'];
            $surname = $row['surname'];
            $gender = $row['gender'];
            $phone = $row['phone'];

            if(isset($_POST['book'])){
                $date = $_POST['date'];
                $doctor = $_POST['doctor'];
                $sym = $_POST['sym'];

                if(empty($sym)){

                }
                else{
                    $query = "INSERT INTO appointment(firstname,surname,gender,phone,appointment_date, doctor
                    ,symptoms, statuss)
                     VALUES('$firstname','$surname','$gender','$phone','$date','$doctor','$sym','Pending')";

                     $res = mysqli_query($connect,$query);

                     if($res){
                         echo "<script>alert('You have Booked an Appointment')</script>";
                     }
                }
            }
            ?>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6 jumbotron bg-success">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="date">Appointment Date</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                            <div clas="form-group">
                                <label for="doctor" class="form-label">Doctor</label>
                                <select name="doctor" class="form-control" required>
                                    <option value="">Select Your Doctor</option>
                                        <?php
                    include("../includes/connection.php");
                    
            $r=mysqli_query($connect,"select * from doctors");
            
            while($row=mysqli_fetch_array($r))

            echo "<option value='$row[1]-$row[2]'>$row[1]-$row[2]</option>";
                                        ?>
                      
                                </select>
        </div>
                                <div class="form-group">
                                <label for="sym">Symptoms</label>
                                <input type="text" name="sym" class="form-control" autocomplete="off" placeholder="Enter Symptoms">
                            </div>
                            <button type="submit" name="book" class="btn btn-info my-3">Book Appointment</button>
                        </form>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap 5 Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
