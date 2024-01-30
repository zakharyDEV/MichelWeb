<?php

    session_start();
    require 'includes/dbh.inc.php';
    
    define('TITLE',"Settings | Michel");
    
    if(!isset($_SESSION['userId']))
    {
        header("Location: login.php");
        exit();
    }
    
    if(isset($_GET['id']))
    {
        $userid = $_GET['id'];
    }
    else
    {
        $userid = $_SESSION['userId'];
    }
    
    $sql = "select * from users where idUsers = ".$userid;
    $stmt = mysqli_stmt_init($conn);    
    
    if (!mysqli_stmt_prepare($stmt, $sql))
    {
        die('SQL error');
    }
    else
    {
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);
    }
    
    include 'includes/HTML-head.php';   
?> 
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Settings Page</title>
  
</head>
<style>
    /* CSS styling for the terminal */
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
      position: relative;
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
      height: 300px;
      overflow-y: auto;
      padding-right: 10px;
      margin-bottom: 10px;
    }
    
    .terminal-line {
      margin-bottom: 10px;
    }
    
    .terminal-input {
      display: flex;
      align-items: center;
    }
    
    .terminal-input input {
      background-color: transparent;
      border: none;
      outline: none;
      font-family: "Courier New", Courier, monospace;
      color: #ffffff;
      margin-left: 5px;
      width: 100%;
    }
    .navbar {
            background-color: #000000;
            height: 50px;
            display: flex;
            justify-content: center;
            width: 100%;
            position: fixed;
            top: 0;
        }

        .navbar-menu {
            list-style-type: none;
            display: flex;
            margin: 0;
            padding: 0;
        }

        .navbar-item {
            margin-left: 20px;
        }

        .navbar-item a {
            text-decoration: none;
            color: #ffffff;
            font-size: 18px;
            font-weight: bold;
        }

        .navbar-item a:hover {
            color: #34c749;
        }
  </style>

<body>
<nav class="navbar">
        <ul class="navbar-menu">
            <li class="navbar-item"><a href="Home.php">Home</a></li>
            <li class="navbar-item"><a href="api.php">API</a></li>
            <li class="navbar-item"><a href="Settings.php">Settings</a></li>
        </ul>
    </nav>
  <div class="terminal">
    <div class="terminal-header">
      <div class="terminal-buttons">
        <div class="terminal-button terminal-button-red"></div>
        <div class="terminal-button terminal-button-yellow"></div>
        <div class="terminal-button terminal-button-green"></div>
      </div>
    </div>
    <div class="terminal-body">
      <div class="terminal-line">Username: <?php echo $user['username']; ?></div>
      <div class="terminal-line">Email: <?php echo $user['email']; ?></div>
      <div class="terminal-line">
        <a href="includes/logout.inc.php">Logout</a>
      </div>
      <div class="terminal-line">
        <a href="change_password.php">Change Password</a>
      </div>
      <div class="terminal-line">
        <a href="delete_account.php">Delete Account</a>
      </div>
    </div>
    <div class="terminal-input">
      <input type="text">
    </div>
  </div>

  <script src="script.js"></script>
</body>

</html>