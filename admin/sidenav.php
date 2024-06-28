<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Side Nav</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add custom CSS styles here */
        .list-group {
            height: 94vh; /* Adjust height as needed */
        }
        .list-group-item {
            font-size: 1.2rem; /* Adjust font size as needed */
        }
    </style>
</head>

<body>
    <!-- Side Nav -->
    
    <div class="list-group bg-info">
        <a href="index.php" class="list-group-item list-group-item-action bg-info text-center text-white">Dashboard</a>
        <a href="profile.php" class="list-group-item list-group-item-action bg-info text-center text-white">Profile</a>
        <a href="admin.php" class="list-group-item list-group-item-action bg-info text-center text-white">Administrators</a>
        <a href="doctor.php" class="list-group-item list-group-item-action bg-info text-center text-white">Doctors</a>
        <a href="patient.php" class="list-group-item list-group-item-action bg-info text-center text-white">Patient</a>
    </div>
    <!-- End Side Nav -->

    <!-- Bootstrap JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
