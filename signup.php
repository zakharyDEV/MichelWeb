<?php

    session_start();
    define('TITLE',"Signup | Michel");
    
    if(isset($_SESSION['userId']))
    {
        header("Location: index.php");
        exit();
    }
    include 'includes/HTML-head.php';
?>
<html>
<head>
  <title>Register Form</title>
  <link rel="stylesheet" href="CSS/signupstyles.css">
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


<?php
                            
                            if(isset($_GET['error']))
                            {
                                if($_GET['error'] == 'emptyfields')
                                {
                                    echo '<div class="alert alert-danger" role="alert">
                                            <strong>Error: </strong> Fill In All The Fields
                                          </div>';
                                }
                                else if ($_GET['error'] == 'invalidmailuid')
                                {
                                    echo '<div class="alert alert-danger" role="alert">
                                            <strong>Error: </strong> Please enter a valid email and user name
                                          </div>';
                                }
                                else if ($_GET['error'] == 'invalidmail')
                                {
                                    echo '<div class="alert alert-danger" role="alert">
                                            <strong>Error: </strong> Please enter a valid email
                                          </div>';
                                }
                                else if ($_GET['error'] == 'invaliduid')
                                {
                                    echo '<div class="alert alert-danger" role="alert">
                                            <strong>Error: </strong> Please enter a valid user name
                                          </div>';
                                }
                                else if ($_GET['error'] == 'passwordcheck')
                                {
                                    echo '<div class="alert alert-danger" role="alert">
                                            <strong>Error: </strong> Passwords donot match
                                          </div>';
                                }
                                else if ($_GET['error'] == 'usertaken')
                                {
                                    echo '<div class="alert alert-danger" role="alert">
                                            <strong>Error: </strong> This User name is already taken
                                          </div>';
                                }
                                else if ($_GET['error'] == 'invalidimagetype')
                                {
                                    echo '<div class="alert alert-danger" role="alert">
                                            <strong>Error: </strong> Invalid image type 
                                          </div>';
                                }
                                else if ($_GET['error'] == 'imguploaderror')
                                {
                                    echo '<div class="alert alert-danger" role="alert">
                                            <strong>Error: </strong> Image upload error, please try again
                                          </div>';
                                }
                                else if ($_GET['error'] == 'imgsizeexceeded')
                                {
                                    echo '<div class="alert alert-danger" role="alert">
                                            <strong>Error: </strong> Image too large
                                          </div>';
                                }
                                else if ($_GET['error'] == 'sqlerror')
                                {
                                    echo '<div class="alert alert-danger" role="alert">
                                            <strong>Website Error: </strong> Contact admin to have the issue fixed
                                          </div>';
                                }
                            }
                            else if (isset($_GET['signup']) == 'success')
                            {
                                echo '<div class="alert alert-success" role="alert">
                                        <strong>Signup Successful</strong> Please Login from the login menu
                                      </div>';
                            }
                        ?>
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
      <form id="signup-form" action="includes/signup.inc.php" method='post' 
                                  enctype="multipart/form-data">
        <div class="input-field">
          <label for="name">Username</label>
          <input type="text" class="form-control" id="name" name="uid" placeholder="Username" maxlength="25">
        </div>
        <div class="input-field">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="mail" placeholder="Email">
        </div>
        <div class="input-field">
          <label for="pwd">Password</label>
          <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password">
        </div>
        <div class="input-field">
          <label for="pwd-repeat">Confirmation</label>
          <input type="password" class="form-control" id="pwd-repeat" name="pwd-repeat" placeholder="Repeat Password">
        </div>
        <input type="submit" class="btn btn-light btn-lg" name="signup-submit" value="Signup">
        <div id="error-message" class="error-message"></div>
      </form>
      <div class="register-link">
        <a href="login.php">Back to Login</a>
      </div>
    </div>
  </div>


        <script src="JS/jquery.min.js"></script>
        <script src="JS/bootstrap.min.js" ></script>
        
                            <script>
                                $('#blah').attr('src', 'uploads/default.png');
                                function readURL(input) {

                                    if (input.files && input.files[0]) {
                                      var reader = new FileReader();

                                      reader.onload = function(e) {
                                        $('#blah').attr('src', e.target.result);
                                      }

                                      reader.readAsDataURL(input.files[0]);
                                    }
                                  }

                                  $("#imgInp").change(function() {
                                    readURL(this);
                                  });
                                  
                                  
                            </script>
</body>
</html>