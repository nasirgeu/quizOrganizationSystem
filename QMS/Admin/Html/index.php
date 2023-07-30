<!DOCTYPE html>
<html>

<head>
  <title>Login-Registration Form</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: -webkit-linear-gradient(45deg, #8386db 1%, #5057d8 44%, #383de0 65%, #383ee2 81%, #383ee2 81%, #161ae5 100%);
      filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#8386db', endColorstr='#161ae5', GradientType=1);
      margin: 0;
      padding: 0;
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .form-container {
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
      padding: 40px;
      width: 400px;
      max-width: 90%;
    }

    .form-container h2 {
      text-align: center;
      margin-top: 0;
      color: #333;
    }

    .form-container form {
      margin-top: 20px;
    }

    .form-container input[type="text"],
    .form-container input[type="email"],
    .form-container input[type="password"] {
      width: 100%;
      padding: 12px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      font-size: 16px;
      box-sizing: border-box;
    }

    .form-container button {
      width: 100%;
      padding: 12px;
      background-color: #4caf50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
    }

    .form-container button:hover {
      background-color: #45a049;
    }

    .form-container .message {
      text-align: center;
      margin-top: 15px;
    }

    .form-container .message a {
      color: #4caf50;
      text-decoration: none;
    }

    .form-container .message a:hover {
      text-decoration: underline;
    }

    /* Media queries for responsiveness */

    @media (max-width: 500px) {
      .container {
        width: 90%;
        margin: auto;
      }

      .form-container {
        width: 100%;
        padding: 20px;
      }

      .form-container h2 {
        font-size: 24px;
      }

      .form-container input[type="text"],
      .form-container input[type="email"],
      .form-container input[type="password"] {
        font-size: 14px;
      }

      .form-container button {
        font-size: 14px;
      }
    }
    .error-message {
    color: #ff0000;
    font-size: 14px;
    text-align: center;
    margin-top: 10px;
    display: none; /* Hide the error message by default */
  }

  .error-visible {
    display: block; /* Show the error message when this class is added */
  }
  </style>
</head>

<body>
<?php
// Database configuration
$servername = "localhost";
$adminEmail = "root";
$password = "";
$dbname = "tallyqms";

// Create a connection to the database
$conn = new mysqli($servername, $adminEmail, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user input
function sanitizeInput($input)
{
  $input = trim($input);
  $input = stripslashes($input);
  $input = htmlspecialchars($input);
  return $input;
}

// Form submission handling
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST["loginSubmit"])) {
    // Login form handling
    $adminEmail = sanitizeInput($_POST["adminEmail"]);
    $password = sanitizeInput($_POST["password"]);
    echo $password;

    // Validate login credentials against the database
    // Perform the necessary database queries and validation logic here
    // Example:
    $sql = "SELECT * FROM `admin` WHERE `adminEmail` = '$adminEmail' AND `password` = '$password'";
    $result = $conn->query($sql);
   

    if ($result->num_rows > 0) {
      session_start();
      session_set_cookie_params(0);
      ini_set('session.gc_maxlifetime', 5);
      $_SESSION['adminEmail'] = $adminEmail;
      header("Location: home.php");
      exit();
    } else {
      // Invalid login credentials, display error message
      $loginError = "Invalid adminEmail or password";
    }
  } elseif (isset($_POST["registerSubmit"])) {
    // Registration form handling
    $adminEmail = sanitizeInput($_POST["adminEmail"]);
    $email = sanitizeInput($_POST["useremail"]);
    $password = sanitizeInput($_POST["password"]);
    $confirmPassword = sanitizeInput($_POST["confirmPassword"]);

    // Validate and save user registration data into the database
    // Perform the necessary database queries and validation logic here
    // Example:
    $emailExistsQuery = "SELECT * FROM admin WHERE adminEmail = '$email'";
    $emailExistsResult = mysqli_query($conn, $emailExistsQuery);

    if ($emailExistsResult->num_rows > 0) {
      // Email already exists, display alert and prompt to login
      echo "<script>alert('Email already registered. Please login.');</script>";
    } elseif ($password === $confirmPassword) {
      // Passwords match, save the user registration data into the database
      $sql = "INSERT INTO admin (adminName, adminEmail, password) VALUES ('$adminEmail', '$email', '$password')";
      if ($conn->query($sql) === TRUE) {
        // Registration successful, display success message
        echo "<script>alert('Registration successful. Please login.');</script>";
      } else {
        // Error saving user data, display error message
        echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
      }
    } else {
      // Password and confirm password don't match, display error message
      echo "<script>alert('Password does not match.');</script>";
    }
  }
}
?>






  <div class="container">
    <div class="form-container">
      <div id="login-form" class="form">
        <h2>Login</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="email" name="adminEmail" placeholder="adminEmail" required autocomplete="off" >
          <input type="password" name="password" placeholder="Password" required autocomplete="off">
          <button type="submit" name="loginSubmit">Login</button>
          <p class="message">Not registered? <a href="#">Create an account</a></p>
          <?php if (isset($loginError)) {
            echo "<p class='error'>$loginError</p>";
          } ?>
        </form>
      </div>

      <div id="register-form" class="form">
        <h2>Register</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
          <input type="text" name="adminEmail" placeholder="Admin Name" required>
          <input type="email" name="useremail" placeholder="Email" required>
          <input type="password" name="password" placeholder="Password" required>
          <input type="password" name="confirmPassword" placeholder="Confirm Password" required>
          <button type="submit" name="registerSubmit">Register</button>
          <p class="message">Already registered? <a href="#">Login</a></p>
          <?php if (isset($registerError)) {
            echo "<p class='error'>$registerError</p>";
          } ?>
        </form>
      </div>
    </div>
  </div>

  <script>
     document.addEventListener("DOMContentLoaded", function () {
      var formContainer = document.getElementById("form-container");
      var loginForm = document.getElementById("login-form");
      var registerForm = document.getElementById("register-form");
      var registerLink = document.querySelector("#login-form .message a");
      var signInLink = document.querySelector("#register-form .message a");

      registerForm.style.display = "none"; // Hide the registration form initially

      registerLink.addEventListener("click", function (e) {
        e.preventDefault();
        loginForm.style.display = "none";
        registerForm.style.display = "block";
      });

      signInLink.addEventListener("click", function (e) {
        e.preventDefault();
        loginForm.style.display = "block";
        registerForm.style.display = "none";
      });
    });
  </script>
</body>

</html>
