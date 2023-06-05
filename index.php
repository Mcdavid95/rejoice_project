
<!DOCTYPE html>
<html>
<head>
  <title>Recycling Application</title><style>
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
  <script>
    function showLoginForm() {
      document.getElementById("loginForm").style.display = "block";
      document.getElementById("signupForm").style.display = "none";
    }

    function showSignupForm() {
      document.getElementById("signupForm").style.display = "block";
      document.getElementById("loginForm").style.display = "none";
    }
  </script>
</head>
<body>
  <div class="navbar">
    <a href="dashboard.php">Dashboard</a>
    <a href="logout.php">Logout</a>
  </div>
  <h2>Login</h2>
  <form id="loginForm" action="login.php" method="POST">
    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Password:</label>
    <input type="password" name="password" required>

    <button type="submit">Login</button>
  </form>

  <h2>Signup</h2>
  <form id="signupForm" action="signup.php" method="POST">
    <label>Email:</label>
    <input type="email" name="email" required>

    <label>Password:</label>
    <input type="password" name="password" required>

    <label>Full Name:</label>
    <input type="text" name="fullname" required>

    <label>Phone:</label>
    <input type="text" name="phone" required>

    <button type="submit">Signup</button>
  </form>

  <p>Don't have an account? <a href="#" onclick="showSignupForm()">Signup here</a>.</p>
  <p>Already have an account? <a href="#" onclick="showLoginForm()">Login here</a>.</p>
  <!-- <div class="dashboard-content">
    Add your dashboard content here
    <h3>Recycle Request</h3>
    <form action="submit_request.php" method="POST">
      Recycle request form fields here
      <input type="submit" value="Submit Request">
    </form>
  </div> -->
</body>
</html>
