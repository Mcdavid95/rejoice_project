
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
  <title>Recycling Application - View Requests</title>
  <style>
    /* CSS styles here */
    .request-table {
      width: 100%;
      border-collapse: collapse;
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

    .request-table th,
    .request-table td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    .request-table th {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <div class="navbar">
    <a href="dashboard.php">Dashboard</a>
    <a href="logout.php">Logout</a>
  </div>
  <h2>View Recycle Requests</h2>
  <table class="request-table">
    <tr>
      <th>Request ID</th>
      <th>Pickup Date</th>
      <th>Recycle Partner</th>
    </tr>
    <?php
    // Assuming you have already established a MySQL database connection
    // MySQL database configuration
    $host = 'localhost';
    $username = 'recycle_user';
    $password = 'recycle_user';
    $database = 'recycle';

    // Create a MySQL database connection
    $connection = mysqli_connect($host, $username, $password, $database);

    // Retrieve the recycle requests from the database
    $query = "SELECT r.request_id, r.pickup_date, p.partner_name
              FROM recycle_requests r
              INNER JOIN recycle_partners p ON r.recycle_partner_id = p.partner_id
              WHERE r.user_id = $_SESSION[user_id]";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['request_id'] . "</td>";
        echo "<td>" . $row['pickup_date'] . "</td>";
        echo "<td>" . $row['partner_name'] . "</td>";
        echo "</tr>";
      }
    } else {
      echo "<tr><td colspan='5'>No recycle requests found</td></tr>";
    }
    ?>
  </table>
</body>
</html>
