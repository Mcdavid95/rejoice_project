<?php
session_start();

// Check if the user is not logged in
if (!isset($_SESSION['user_id'])) {
  header("Location: index.php");
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Recycling Application - View Recycle Partners</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      margin: 0;
      padding: 20px;
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

    h2 {
      color: #333;
    }

    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      padding: 12px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f5f5f5;
      color: #333;
    }

    tr:hover {
      background-color: #f9f9f9;
    }
  </style>
</head>
<body>
  <div class="navbar">
    <a href="dashboard.php">Dashboard</a>
    <a href="logout.php">Logout</a>
  </div>
  <h2>Recycle Partners</h2>
  <table>
    <tr>
      <th>Partner Name</th>
      <th>Address</th>
      <th>Phone</th>
      <th>Email</th>
    </tr>

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

    // Retrieve the Recycle Partners' data from the database
    $query = "SELECT * FROM recycle_partners";
    $result = mysqli_query($connection, $query);

    if ($result) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['partner_name'] . "</td>";
        echo "<td>" . $row['address'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "</tr>";
      }
    } else {
      // Error occurred
      echo "Error retrieving Recycle Partners: " . mysqli_error($connection);
    }
    ?>

  </table>
</body>
</html>
