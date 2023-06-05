<?php
// MySQL database configuration
$host = 'localhost';
$username = 'recycle_user';
$password = 'recycle_user';
$database = 'recycle';

// Create a MySQL database connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check the connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}
// Retrieve the form data
$email = $_POST['email'];
$password = $_POST['password'];

// Perform basic validation
if (empty($email) || empty($password)) {
    echo "Please fill in all fields";
    exit;
}

// Query the user table to check if the email and password match
$query = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) == 1) {
    $user = mysqli_fetch_assoc($result);
    $hashedPassword = $user['password'];

    // Verify the password
    if (password_verify($password, $hashedPassword)) {
        // Authentication successful
        // Start the user session or set a session variable to indicate the user is logged in
        session_start();
        $_SESSION['user_id'] = $user['user_id'];

        // Redirect to a dashboard or homepage
        header("Location: dashboard.php");
        exit;
    }
}

// Authentication failed
echo "Invalid email or password";
?>
