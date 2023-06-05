<?php
// Assuming you have already established a MySQL database connection
// MySQL database configuration
$host = 'localhost';
$username = 'recycle_user';
$password = 'recycle_user';
$database = 'recycle';

// Create a MySQL database connection
$connection = mysqli_connect($host, $username, $password, $database);

// Retrieve the form data
$email = $_POST['email'];
$password = $_POST['password'];
$fullName = $_POST['fullname'];
$phone = $_POST['phone'];

// Perform basic validation
if (empty($email) || empty($password) || empty($fullName) || empty($phone)) {
    echo "Please fill in all fields";
    exit;
}

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert the new user into the database
$query = "INSERT INTO users (email, password, full_name, phone) VALUES ('$email', '$hashedPassword', '$fullName', '$phone')";
$result = mysqli_query($connection, $query);

if ($result) {
    // Registration successful
    echo "Registration successful!";
    // Redirect to the login page or display a success message
    header("Location: index.php");
} else {
    // Error occurred
    echo "Error registering user: " . mysqli_error($connection);
}
?>
