<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to the login page if the user is not logged in
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Dashboard</title>
</head>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 20px;
    }

    h2 {
      color: #333;
    }

    form {
      background-color: #fff;
      border: 1px solid #ccc;
      padding: 20px;
      margin-bottom: 20px;
    }

    label {
      display: block;
      margin-bottom: 10px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: 100%;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 4px;
      margin-bottom: 10px;
    }

    input[type="submit"],
    button {
      background-color: #4CAF50;
      color: #fff;
      border: none;
      padding: 10px 20px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 14px;
      cursor: pointer;
      border-radius: 4px;
    }

    input[type="submit"]:hover,
    button:hover {
      background-color: #45a049;
    }

    p {
      margin-bottom: 10px;
    }

    /* Responsive Styling */
    @media (max-width: 768px) {
      form {
        padding: 10px;
      }

      input[type="submit"],
      button {
        font-size: 12px;
      }
    }

    .dashboard-form input[type="submit"] {
      background-color: #4CAF50;
      color: white;
      border: none;
      padding: 10px 20px;
      text-decoration: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .dashboard-content {
      text-align: center;
    }

    .dashboard-buttons {
      margin-top: 20px;
    }

    .dashboard-buttons a {
      display: inline-block;
      margin: 5px;
      padding: 10px 20px;
      background-color: #4CAF50;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
    }
    .dashboard-form input[type="text"],
    .dashboard-form input[type="date"],
    .dashboard-form select {
      width: 30%;
      padding: 10px;
      margin-right: 1rem;
      margin-bottom: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }
    .navbar {
      background-color: #f2f2f2;
      padding: 10px;
      display: flex;
      justify-content: flex-end;
    }

    .navbar a {
      margin-right: 10px;
      color: #333;
      text-decoration: none;
      padding: 5px 10px;
      border-radius: 3px;
      transition: background-color 0.3s ease;
    }

    .navbar a:hover {
      background-color: #ddd;
    }

    @media screen and (max-width: 600px) {
      .dashboard-buttons a {
        display: block;
        margin: 10px auto;
      }
      .dashboard-form select {
        width: 100%;
        max-width: 100%;
      }
    }
  </style>
<body>
  <div class="navbar">
    <a href="dashboard.php">Dashboard</a>
    <a href="logout.php">Logout</a>
  </div>
  <h2>Welcome to the Dashboard</h2>

  <!-- Display any dashboard content or functionality here -->
<div class="dashboard-content">
<form class="dashboard-form" action="submit_request.php" method="POST">
  <label for="pickup_date">Pickup Date:</label>
  <input type="date" id="pickup_date" name="pickup_date" required>
  <select name="partner_id" required>
        <option value="">Select Partner</option>
        <?php
        // Assuming you have already established a MySQL database connection
        $host = 'localhost';
        $username = 'recycle_user';
        $password = 'recycle_user';
        $database = 'recycle';

        // Create a MySQL database connection
        $connection = mysqli_connect($host, $username, $password, $database);

        // Retrieve the Recycle Partners from the database
        $query = "SELECT * FROM recycle_partners";
        $result = mysqli_query($connection, $query);

        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            echo "<option value='" . $row['partner_id'] . "'>" . $row['partner_name'] . "</option>";
          }
        } else {
          // Error occurred
          echo "Error retrieving Recycle Partners: " . mysqli_error($connection);
        }
        ?>

  <input type="submit" value="Submit Request">
</form>
    <div class="dashboard-buttons">
      <a href="create_partner.php">Create Recycle Partner</a>
      <a href="view_partners.php">View Recycle Partners</a>
      <a href="view_requests.php">View Recycle Requests</a>
    </div>
  </div>
</body>
</html>
