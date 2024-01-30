
<?php

    session_start();
    include_once 'includes/dbh.inc.php';
    define('TITLE',"Home| Michel");

    $companyName = "Michel";
    
    function strip_bad_chars( $input ){
        $output = preg_replace( "/[^a-zA-Z0-9_-]/", "", $input);
        return $output;
    }
    
    if(!isset($_SESSION['userId']))
    {
        header("Location: login.php");
        exit();
    }
    
    include 'includes/HTML-head.php';
?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Terminal</title>
    
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

        /* navbar.css */
/* navbar.css */
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
            <li class="navbar-item"><a href="settings.php">Settings</a></li>
        </ul>
    </nav>
            
       
    <div class="terminal">
        <div class="terminal-header">
            <div class="terminal-buttons">
                <span class="terminal-button terminal-button-red"></span>
                <span class="terminal-button terminal-button-yellow"></span>
                <span class="terminal-button terminal-button-green"></span>
            </div>
        </div>
        <div class="terminal-body" id="terminal-body">
            <div class="terminal-line">Welcome to AI Terminal Interface</div>
            <div class="terminal-line">AI functionalities Loaded<span class="terminal-loading"></span></div>
            <div class="terminal-line">Help for help<span class="terminal-loading"></span></div>
        </div>
        <div class="terminal-input">
            <span>$</span>
            <input type="text" id="command-input">
        </div>
    </div>


    
</body>

<script>
    const terminalBody = document.getElementById("terminal-body");
    const commandInput = document.getElementById("command-input");

    commandInput.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            const command = commandInput.value;
            const commandLine = document.createElement("div");
            commandLine.classList.add("command-line");
            commandLine.innerHTML = "<span style='color: cyan'>$</span> " + command;
            terminalBody.appendChild(commandLine);
            commandInput.value = "";

            // Call the function to process the command
            processCommand(command);
        }
    });

    function processCommand(command) {
        const commandList = {
            "help": () =>
                "Here are the available commands:\n- help: Display the list of commands\n- echo: Output the input text\n- clear: Clear the terminal\n- cd: Redirect to specified page",
            "echo": (text) => text,
            "clear": () => (terminalBody.innerHTML = ""),
            "cd": (page) => {
                const pageMapping = {
                    "Home": "Home.php",
                    "Api": "api.php",
                    "Settings": "settings.php",
                };
                const pageName = page.charAt(0).toUpperCase() + page.slice(1);
                const pageUrl = pageMapping[pageName];

                if (pageUrl) {
                    window.location.href = pageUrl;
                    return "Redirecting to " + pageName;
                } else {
                    return "Page not found: " + pageName;
                }
            },
        };

        const commandParts = command.trim().split(" ");
        const commandName = commandParts[0];
        const commandArgs = commandParts.slice(1);

        const outputLine = document.createElement("div");
        outputLine.classList.add("command-line");

        if (commandName in commandList) {
            const output = commandList[commandName](...commandArgs);
            outputLine.innerHTML = output;
        } else {
            outputLine.innerHTML = "Command not found: " + commandName;
        }

        terminalBody.appendChild(outputLine);
        terminalBody.scrollTop = terminalBody.scrollHeight;
    }
</script>
</html>