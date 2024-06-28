<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>clinic Management System</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">


</head>

<body>

<nav class="navbar navbar-expand-lg navbar-info bg-info">

<h5 class="text-white">Clinic Management System</h5>

<button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
    aria-controls="offcanvasNavbar">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="navbar-nav ms-auto me-3">
            <?php 
            session_start();
            if(isset($_SESSION['admin']) || isset($_SESSION['doctor']) || isset($_SESSION['patient'])) {
                $user = isset($_SESSION['admin']) ? $_SESSION['admin'] : (isset($_SESSION['doctor']) ? $_SESSION['doctor'] : $_SESSION['patient']);
                echo '
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">'.$user.'</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="logout.php">Logout</a>
                </li>';
            } else {
                echo '
                <li class="nav-item">
                    <a class="nav-link text-black" href="index.php">Home</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link text-black" href="adminlogin.php">Admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" href="doctorlogin.php">Doctor</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-black" href="patientlogin.php">Patient</a>
                </li>';
            }
            ?>
        </ul>
        
    </div>
</div>
</nav>
    <!-- Header -->
    <header class="bg-grey text-white py-1">
        <div class="container text-center">
            <h1>Welcome to VitalLife Clinic</h1>
            <p class="lead" >We are dedicated to providing high-quality healthcare services.</p>
        </div>
    </header>
    <section id="banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="main-slider" class="carousel slide"  data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/Baneer.jpg" class="d-block w-100" width="100" height="450" alt="..." opacity="0.5">
                                    <div class="carousel-caption d-none d-md-block " style="color:  black;">
                                        <h5>Health Releif </h5>
                                        <p>The pains of all less times are perfect</p>
                                    </div>
                                </div>
                                <div class="carousel-item" >
                                    <img src="img/Banerr.jpg" class="d-block w-100" width="100" height="450"  alt="..." opacity="0.5">
                                    <div class="carousel-caption d-none d-md-block"  style="color: black; ">
                                        <h5>BETTER CARE</h5>
                                        <p>The customer will be tricked, they will be followed.</p>
                                    </div>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#main-slider" data-bs-slide="prev" style="color: black;">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#main-slider" data-bs-slide="next" style="color: black">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>  
    <!-- Services -->
   
    <section id="services" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card" >
                    <div class="card-body" style="color: black;">
                    <img src="img/primary.jpg" alt="Team Member 1" class="card-img-top">
                        <h3 class="card-title">General Healthcare</h3>
                         <p class="card-text">Health care, or healthcare, is the improvement of health via the prevention, diagnosis, treatment, amelioration or cure of disease, illness, injury, and other physical and mental impairments in people.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body" style="color: black;">
                    <img src="img/kid.jpg" alt="Team Member 1" class="card-img-top">
                        <h3 class="card-title">Dental Services</h3>
                         <p class="card-text">Tooth Decay. Restorative Dental Material Types. Inlays, On-lays & Veneers. Dental Crowns and Bridges. Root Canal. Dental Fillings  The dental services definition refers maintaining the oral hygiene.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body" style="color: black;">
                    <img src="img/pedia.jpg" alt="Team Member 1" class="card-img-top" height="278">
                        <h3 class="card-title">Pediatric Care</h3>
                        <p class="card-text">Pediatric care and caring your baby. Our caring pediatric clinicians are very skilled and passionate about what they do. </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    <!-- Team -->
    <section id="team" class="py-5">
        <div class="container">
            <h2>Our Team</h2>
            <div class="row">
             <?php
             
             
include("includes/connection.php");

$r = $connect->query("SELECT * FROM doctors WHERE statuss != 'Rejected'");
while($row=$r->fetch_array()){
             ?>
            <div class="col-md-4">
                    <div class="card">
                        <div class="card-body" style="color: black;">
                        <img src="doctor/img/<?php echo $row[12];?>" alt="Team Member 1" class="card-img-top">
                            <h5 class="card-title"><?php echo $row[1];?></h5>
                            <p class="card-text">General Practitioner</p>
                        </div>
                    </div>
                </div>
<?php } ?>
                
                </div>
            </div>
        </div>
    </section>

    <!-- Contact --><section id="contact" class="py-5">
    <div class="container">
        <h2>Contact Us</h2>
        <div class="row">
            <div class="col-md-6">
                <h4>Location</h4>
                <p>123 Keshavnagar, Udaipur, Udaipur</p>
                <h4>Phone</h4>
                <p>91+ 456-7890</p>
                <h4>Email</h4>
                <p>Vishu@gmail.com</p>
            </div>
            <div class="col-md-6">
                <h2>About us</h2>
                <p>Co-creating good health. Good health happens when patients have a close relationship with their care team. Not just at once-a-year check-ups, but all year round - from annual check-ups to sports physicals to virtual visits, to short phone check-ins, online plan updates, and everything in between.</p>
            </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="bg-dark text-white text-center py-4">
    <div class="container">
        <h4>Design & Developed By Vishnu Sain and Vishwraj Singh</h4>
        <i class="fab fa-facebook fa-2x mx-2"></i>
        <i class="fab fa-instagram fa-2x mx-2"></i>
        <i class="fab fa-whatsapp fa-2x mx-2"></i>
        <i class="fab fa-twitter fa-2x mx-2"></i>
    </div>
    
</footer>

</nav>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>