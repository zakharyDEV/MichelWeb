<?php /*
if(basename($_SERVER['PHP_SELF']) != 'Successfull.php' && $_SERVER['HTTP_REFERER'] != 'Animations/Booting.html') {
    header("Location: Animations/Booting.html");
    exit();
}
*/?>

<?php

    session_start();
    define('TITLE',"Mihel"); 
    
    function strip_bad_chars( $input ){
        $output = preg_replace( "/[^a-zA-Z0-9_-]/", "", $input);
        return $output;
    }
    
    if(isset($_SESSION['userId']))
    {
        header("Location: loading.php");
        exit();
    }
    
    include 'includes/HTML-head.php';
?>  

<!DOCTYPE html>
<html>
<head>
  <title>Login Form</title>
  
</head>
<style>
    body {
      background-color: #202124;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      font-family: "Courier New", Courier, monospace;
      color: #ffffff;
    }

    .terminal {
      background-color: #000000;
      border-radius: 10px;
      width: 600px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.6);
    }

    .terminal-header {
      display: flex;
      justify-content: flex-start;
      align-items: center;
      margin-bottom: 15px;
    }

    .terminal-buttons {
      display: flex;
    }

    .terminal-button {
      width: 16px;
      height: 16px;
      border-radius: 50%;
      margin-right: 5px;
    }

    .terminal-button-red {
      background-color: #fc605b;
    }

    .terminal-button-yellow {
      background-color: #fdbc40;
    }

    .terminal-button-green {
      background-color: #34c749;
    }

    .terminal-body {
      display: flex;
      flex-direction: column;
    }

    .terminal-line {
      margin-bottom: 10px;
    }

    @keyframes terminal-loader {
      0% {
        content: ".";
      }
      25% {
        content: "..";
      }
      50% {
        content: "...";
      }
      75% {
        content: ".";
      }
    }

    .terminal-loading::after {
      content: ".";
      animation: terminal-loader 1s infinite;
    }

    .input-field {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
    }

    .input-field label {
      white-space: nowrap;
      margin-right: 10px;
    }

    .input-field input {
      flex-grow: 1;
      padding: 5px;
      font-family: "Courier New", Courier, monospace;
    }

    .input-field input:focus {
      outline: none;
    }

    .input-field input::placeholder {
      color: #fff;
      opacity: 0.5;
    }

    .btn {
      display: block;
      background-color: #007bff;
      color: #fff;
      border: none;
      padding: 10px;
      width: 100%;
      text-align: center;
      cursor: pointer;
      font-family: "Courier New", Courier, monospace;
      font-size: 16px;
    }

    .btn:hover {
      background-color: #0056b3;
    }

    .error-message {
      color: #e74c3c;
      margin-top: 10px;
      font-size: 14px;
    }

    .register-link {
      text-align: center;
      margin-top: 15px;
    }

    .register-link a {
      color: #fff;
      text-decoration: none;
      opacity: 0.8;
    }

    .register-link a:hover {
      opacity: 1;
    }
  </style>
<body>
  <div class="terminal">
    <div class="terminal-header">
      <div class="terminal-buttons">
        <div class="terminal-button terminal-button-red"></div>
        <div class="terminal-button terminal-button-yellow"></div>
        <div class="terminal-button terminal-button-green"></div>
      </div>
    </div>
    <div class="terminal-body">
      <div class="terminal-line">
        <span class="terminal-loading"></span>
      </div>
      <form method="post" action="includes/login.inc.php" class="form-inline justify-content-center">
        <div class="input-field">
          <label for="username">Username:</label>
          <input type="text" id="name" name="mailuid" class="form-control form-control-lg mr-1" placeholder="Username">
        </div>
        <div class="input-field">
          <label for="password">Password:</label>
          <input type="password" id="password" name="pwd" class="form-control form-control-lg mr-1" placeholder="Password">
        </div>
        <button type="submit" class="btn" name="login-submit">Login</button>
      </form>
      <div id="error-message" class="error-message">
        <!-- Display PHP error messages here -->
      </div>
      <div class="register-link">
        <a href="signup.php">Signup</a>
      </div>
    </div>
  </div>

  
</body>
<script>
    document.getElementById('login-form').addEventListener('submit', function(e) {
      e.preventDefault();
      var username = document.getElementById('username').value;
      var password = document.getElementById('password').value;

      if (username === 'admin' && password === 'admin') {
        // Redirect to dashboard
        window.location.href = 'loading.php';
      } else {
        // Show error message
        document.getElementById('error-message').textContent = 'Invalid username or password.';
      }
    });
  </script>
</html>