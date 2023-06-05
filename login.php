<?php
        // Create connections
        $conn1 = new mysqli("localhost", "root", "", "admission");


        if (isset($_POST['login'])) {
            $query = "SELECT * FROM `admin_login` WHERE `admin_id` = '$_POST[userid]' AND `admin_pass` = '$_POST[pass]'";
            $result = mysqli_query($conn1, $query);
            if (mysqli_num_rows($result) == 1) {
                session_start();
                $_SESSION['AdminLoginId']=$_POST['userid'];
                header("location: dash.php");
            } else {
                echo "<script>alert('incorrect password')</script>";
            }
        }
        $conn1->close();
        ?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <title>Login page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="css/login.css">
    <script src='https://code.jquery.com/jquery-2.2.4.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js'></script>
    <script src="js/login.js"></script>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <img src=img/logo.png width="110" alt="MIT">
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.html" class="nav-item nav-link ">Home</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Courses</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="CSE.html" class="dropdown-item">CSE</a>
                            <a href="others.html" class="dropdown-item ">Others</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Alumni</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="alumni.php" class="dropdown-item">Alumni Portal</a>
                            <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404</a>
                        </div>
                    </div>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                </div>
                <a href="admission.php" class="btn btn-primary rounded-0 py-4 px-lg-5 d-none d-lg-block">Admission<i
                        class="fa fa-arrow-right ms-3"></i></a>
            </div>
        </nav>
        <!-- Navbar End -->
        <div class="wrapper">
            <form method="POST" id="formvalidate">
                <div class="input-group">
                    <input class="form-control" placeholder="USERNAME" name="userid" id="userName" type="text" />
                    <span class="lighting"></span>
                </div>
                <div class="input-group">
                    <input class="form-control" placeholder="PASSWORD" name="pass" type="password" />
                    <span class="lighting"></span>
                </div>

                <button type="submit" name="login" id="login">Login</button>
                <div class="clearfix supporter">
                    <div class="pull-left remember-me">
                        <input id="rememberMe" type="checkbox">
                        <label for="rememberMe">Remember Me</label>
                    </div>
                    <a class="forgot pull-right" href="#">Forgot Password?</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">

                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Quick Links</h5>
                    <a class="btn btn-link text-white-50" href="about.html">About Us</a>
                    <a class="btn btn-link text-white-50" href="contact.php">Contact Us</a>
                    <a class="btn btn-link text-white-50" href="alumni.php">Our Alumni</a>
                    <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                    <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Contact</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Beed Bypass Road, Satara Parisar,
                        Aurangabad - 431010, Maharashtra, India</p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+Ph.: +91-240-2375135, 164, 171 Fax:
                        +91-240-2376154
                    </p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>info@mit.asia</p>
                    <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href="https://twitter.com/gsmmitsocial"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://www.facebook.com/Aurangabad.mit"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://www.youtube.com/channel/UClc1veMASwz_ArTo5WfT85g"><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href="https://www.linkedin.com/in/g-s-mandal-s-marathwada-institute-of-technology-aurangabad-306458214"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="copyright">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a class="border-bottom" href="#">MIT</a>, All Right Reserved. Designed By <a
                            class="border-bottom" href="https://github.com/Sha1kh4">SKAD</a>
                    </div>
                    <div class="col-md-6 text-center text-md-end">
                        <div class="footer-menu">
                            <a href="">Home</a>
                            <a href="login.php">Admin Login</a>

                            <a href="">Help</a>
                            <a href="">FQAs</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    
<?php
// Create connections
$conn1 = new mysqli("localhost", "root", "", "admission");


if (isset($_POST['login'])) {
    $query = "SELECT * FROM `admin_login` WHERE `admin_id` = '$_POST[userid]' AND `admin_pass` = '$_POST[pass]'";
    $result = mysqli_query($conn1, $query);
    if (mysqli_num_rows($result) == 1) {
        header("location: dash.php");
        $_SESSION['AdminLoginId'] = $_POST['userid'];
    } else {
        echo "<script>alert('incorrect password')</script>";
    }
}
$conn1->close();
?>
</body>

</html>
