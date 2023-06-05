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
  <title>Recycling Application - Create Recycle Partner</title>
  
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
  </style>
</head>
<body>
  <div class="navbar">
    <a href="dashboard.php">Dashboard</a>
    <a href="logout.php">Logout</a>
  </div>
  <h2>Create Recycle Partner</h2>
  <form action="process_partner.php" method="POST">
    <label>Partner Name:</label>
    <input type="text" name="partner_name" required>

    <label>Address:</label>
    <input type="text" name="address" required>

    <label>Phone:</label>
    <input type="text" name="phone" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <input type="submit" value="Create Partner">
  </form>
</body>
</html>
