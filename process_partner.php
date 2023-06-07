<?php
// Assuming you have already established a MySQL database connection// MySQL database configuration
$host = 'containers-us-west-183.railway.app';
$username = 'root';
$password = '4Lb6grVi4JOm1zKF8KvI';
$database = 'railway';
$port = '7949';

// Create a MySQL database connection
$connection = mysqli_connect($host, $username, $password, $database, $port);

// Retrieve the form data
$partnerName = $_POST['partner_name'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];

// Perform basic validation
if (empty($partnerName) || empty($address) || empty($phone) || empty($email)) {
    echo "Please fill in all fields";
    exit;
}

// Insert the new Recycle Partner into the database
$query = "INSERT INTO recycle_partners (partner_name, address, phone, email) VALUES ('$partnerName', '$address', '$phone', '$email')";
$result = mysqli_query($connection, $query);

if ($result) {
    // Recycle Partner creation successful
    echo "Recycle Partner created successfully!";
    // Redirect to the dashboard page or display a success message

        // Redirect to a dashboard or homepage
        header("Location: dashboard.php");
} else {
    // Error occurred
    echo "Error creating Recycle Partner: " . mysqli_error($connection);
}
?>
