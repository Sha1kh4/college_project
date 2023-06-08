<?php
// Update the following variables with your database credentials
$host = 'localhost';
$dbname = 'asd';
$username = 'root';
$password = '';

$isSubmitted = false; // Initialize the flag variable

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  try {
    // Establish a database connection using PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Enable PDO error mode
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get the submitted form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $batch = $_POST['batch'];
    $branch = $_POST['branch'];
    $feedback = $_POST['feedback'];

    // Prepare and execute the SQL query
    $query = "INSERT INTO alumni_feedback (name, email, batch,branch, feedback) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$name, $email, $batch,$branch, $feedback]);

    // Check if the feedback was successfully inserted
    if ($stmt->rowCount() > 0) {
      $isSubmitted = true; // Set the flag variable to true
    } else {
      echo "Sorry, there was an error submitting your feedback. Please try again.";
    }
  } catch (PDOException $e) {
    // Handle any database connection errors
    echo "Database connection failed: " . $e->getMessage();
  }
}?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Alumni</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">

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
    <link rel="stylesheet" href="css/alumni.css">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar Start -->
        <nav class="navbar navbar-expand-lg bg-white navbar-light shadow sticky-top p-0">
            <a href="index.html" class="navbar-brand d-flex align-items-center text-center py-0 px-4 px-lg-5">
                <img src = img/logo.png width="110" alt="MIT">
            </a>
            <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto p-4 p-lg-0">
                    <a href="index.html" class="nav-item nav-link">Home</a>
                    <a href="about.html" class="nav-item nav-link">About</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Courses</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="CSE.html" class="dropdown-item">CSE</a>
                            <a href="others.html" class="dropdown-item">Others</a>
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link active dropdown-toggle" data-bs-toggle="dropdown">Alumni</a>
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

        <!-- Header Starts -->
        <div class="container-xxl py-5 bg-dark page-header mb-5">
            <div class="container my-5 pt-5 pb-4">
                <h1 class="display-3 text-white mb-3 animated slideInDown">CSE</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Alumni</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Alumni Portal</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- Header End -->
        <!-- Feedback form starts -->
        <form action="alumni.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="batch">Batch:</label>
            <input type="number" id="batch" name="batch" min="1900" max="2099" required>&nbsp; &nbsp; &nbsp;   
            <label for="branch">Branch:</label>
            <select id="branch" name="branch" required>
        <option value="">Select Branch</option>
        <option value="Computer Science">Computer Science</option>
        <option value="Civil Engineering">Civil Engineering</option>
    </select>
            <br><br>


            <label for="feedback">Feedback:</label><br>
            <textarea id="feedback" name="feedback" rows="5" cols="40" required></textarea><br><br>

            <input type="submit" value="Submit Feedback">
        </form>
        <?php if ($isSubmitted): ?>
    <p>Feedback submitted successfully!</p>
  <?php endif; ?>
        <!-- Feedback form ends -->
        <!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">

                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Quick Links</h5>
                        <a class="btn btn-link text-white-50" href="about.html">About Us</a>
                        <a class="btn btn-link text-white-50" href="contact.php">Contact Us</a>
                        <a class="btn btn-link text-white-50" href="alumni.php">Our Alumni</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5 class="text-white mb-4">Contact</h5>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Beed Bypass Road, Satara Parisar, Aurangabad - 431010, Maharashtra, India</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+Ph.: +91-240-2375135, 164, 171 Fax: +91-240-2376154
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
                            &copy; <a class="border-bottom" href="#">MIT</a>, All Right Reserved.


                            Designed By <a class="border-bottom" href="https://github.com/Sha1kh4">SKAD</a>
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
</body>

</html>
