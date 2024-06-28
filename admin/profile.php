<?php  

session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title>
</head>
<body>

<?php  
include('../includes/header.php');
include('../includes/connection.php');
$ad = $_SESSION['admin'];
$query = "SELECT * FROM admin WHERE username = '$ad'";

$res = mysqli_query($connect,$query);

while ($row = mysqli_fetch_array($res))
{
    $username = $row['username'];
    $profiles = $row['profilee'];
}
?>
<div class="container-fluid">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-2" style="margin-left:-30px ;">
                <?php 
                
                include('sidenav.php');
                
                ?>
            </div>
            <div class="col-md-10">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <h4> <?php  echo $username ;?></h4>
                            <?php
                            
                            if(isset($_POST['update']))
                            {
                                $profile = $_FILES['profilee']['name'];
                                if(empty($profile))
                                {

                                }
                                else
                                {
                                    $query = "UPDATE admin SET profilee='$profile' WHERE username ='$ad'";
                                    $res = mysqli_query($connect,$query);
                                    if ($res) {
                                        move_uploaded_file($_FILES['profilee']['tmp_name'],"img/$profile");
                                        header("location:profile.php");
                                    } 
                                    
                                }
                            }
                            
                            ?>

                           <form method="POST" enctype="multipart/form-data">
                           <div class="form-control" style="height: 300px; width: 50%;overflow: hidden;">

                        <?php echo "<img src='img/$profiles'  class='col-md-12'  ;
                         a>" ?>
                           </div>
                        <br><br>

                        <div class="form-group">
                            <label>UPDATE PROFILE </label>
                            <input type="file" name="profilee" class="form-control">
                        </div>
                        <br>
                        <input type="submit" name="update" value="UPDATE" class="btn btn-success">
                        
                        </form>
                        </div>
                        <div class="col-md-6">
                            <?php
                            if(isset($_POST['change']))
                        {
                            $uname = $_POST['uname'];
                            if(empty($uname))
                            {
                                

                            }
                            else
                            {
                                $query = "UPDATE admin SET username = '$uname' WHERE username ='$ad'";

                                $res =mysqli_query($connect,$query);
                               

                                if($res)
                                {
                                   
                                    $_SESSION['admin'] = $uname;
                                    
                                }
                               

                            }
                            
                        }
                            
                            
                            ?>
                            <form method="POST">
                                <label class="text-info my-4">Change Username</label>
                                <input type="text" name="uname" class="form-control" autocomplete="off"><br>
                                <input type="submit" name="change" class="btn btn-success" value="Change" >
                            </form>
                            <br>
                            
                            <?php 
                            
                            if(isset($_POST['update_pass']))
                            {
                                $old_pass = $_POST['old_pass'];
                                $new_pass = $_POST['new_pass'];
                                $con_pass = $_POST['con_pass'];
                                $error = array();

                                $query = "SELECT * FROM admin WHERE username ='$ad'";

                                $old = mysqli_query($connect,$query);

                                $row = mysqli_fetch_array($old);
                                $pass = $row['passwordd'];



                                if(empty($old_pass))
                                {
                                    $error['p']="Please Enter Old Password"; 

                                }
                                elseif(empty($new_pass))
                                {
                                    $error['p'] = "Please Enter New Password";

                                }
                                elseif(empty($con_pass))
                                {
                                    $error['p'] = "Confirm Password";
                                }
                                elseif($old_pass !=$pass)
                                {
                                    $error['p']="Invalid Old Passwword ";
                                }
                                elseif($new_pass != $con_pass)
                                {
                                    $error['p'] = "Not Match";
                                }

                                if(count($error)==0)
                                {
                                    $query = "UPDATE admin SET passwordd = '$new_pass' WHERE username='$ad'";
                                    mysqli_query($connect,$query);

                                }
                               


                            }
                            if(isset($error['p']))
                            {
                                $e = $error['p'];
                                $show = "<h5 class='text-center alert alert-danger'>$e</h5>";
                            }
                            else
                            
                            {
                                $show="";
                            }
                            
                            
                            ?>

                            <form action="" method="post">
                                <h5 class="text-center my-4 text-info">Change Password</h5>
                                <div><?php echo $show;?></div>
                                <div class="form-group">
                                    <label>Old Password</label>
                                    <input type="password" name="old_pass" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" name="new_pass" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input type="password" name="con_pass" class="form-control">
                                </div>

                                <input type="submit" class="btn btn-info"
                                 name="update_pass" value="Update Password">



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