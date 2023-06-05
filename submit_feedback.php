

<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="css/alumni.css">
  <title>Alumni Feedback Form</title>
</head>

<body>
  <h1>Alumni Feedback Form</h1>
  <form action="submit_feedback.php" method="POST">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>
    <label for="batch">Batch:</label>
    <input type="number" id="batch" name="batch" min="1900" max="2099" required>
    <br><br>


    <label for="feedback">Feedback:</label><br>
    <textarea id="feedback" name="feedback" rows="5" cols="40" required></textarea><br><br>

    <input type="submit" value="Submit Feedback">
  </form>
</body>

</html>
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
    $feedback = $_POST['feedback'];

    // Prepare and execute the SQL query
    $query = "INSERT INTO alumni_feedback (name, email, batch, feedback) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$name, $email, $batch, $feedback]);

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
}
?>
