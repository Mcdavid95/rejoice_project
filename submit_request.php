<?php
// Assuming you have already established a MySQL database connection
// MySQL database configuration
$host = 'containers-us-west-183.railway.app';
$username = 'root';
$password = '4Lb6grVi4JOm1zKF8KvI';
$database = 'railway';
$port = '7949';

// Create a MySQL database connection
$connection = mysqli_connect($host, $username, $password, $database, $port);

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: index.php");
    exit;
}

// Retrieve the form data
$pickupDate = $_POST['pickup_date'];
$userID = $_SESSION['user_id'];
$partner_id = $_POST['partner_id'];

// Insert the recycle request into the database
$query = "INSERT INTO recycle_requests (created_date, user_id, recycle_partner_id, pickup_date)
          VALUES (NOW(), $userID, $partner_id, '$pickupDate')";

// Perform any additional validation or sanitization of the form data here

// // Insert the recycle request into the database
// $query = "INSERT INTO recycle_requests (created_date, user_id, pickup_date) VALUES (CURDATE(), '$userID', '$pickupDate')";
$result = mysqli_query($connection, $query);

if ($result) {
    // Success! Redirect to a confirmation page or display a success message
    header("Location: confirmation.php");
    exit;
} else {
    // Error occurred, display an error message or redirect to an error page
    echo "Error submitting recycle request: " . mysqli_error($connection);
}
?>
