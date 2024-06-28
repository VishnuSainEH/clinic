<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Patient Details</title>
</head>
<body>

<?php
include("../includes/header.php");
include("../includes/connection.php");

// Check if ID is provided in URL
if(isset($_GET['id'])){
    $id = $_GET['id'];

    // Fetch patient details from the database
    $query = "SELECT * FROM patient WHERE id='$id'";
    $res = mysqli_query($connect, $query);

    if(mysqli_num_rows($res) > 0){
        $row = mysqli_fetch_array($res);
?>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2" style="margin-left: -30px;">
                    <?php include("sidenav.php"); ?>
                </div>
                <div class="col-md-10">
                    <h5 class="text-center my-4">View Patient Details</h5>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <?php
                                // Display patient profile image if available
                                if(!empty($row['profilee']) && file_exists("../patient/img/".$row['profilee'])) {
                                    echo "<img src='../patient/img/".$row['profilee']."' class='col-md-12 my-2' height='250p'>";
                                }
                                ?>
                                <table class="table table-bordered">
                                    <tr>
                                        <th class="text-center" colspan="2">Details</th>
                                    </tr>
                                    <tr>
                                        <td>Firstname</td>
                                        <td><?php echo $row['firstname'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Surname</td>
                                        <td><?php echo $row['surname'] ?></td>
                                    </tr>
                                    <!-- Add other patient details here -->
                                </table>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
    } else {
        echo "<p>No patient found with the provided ID.</p>";
    }
} else {
    echo "<p>No patient ID provided.</p>";
}
?>

</body>
</html>
