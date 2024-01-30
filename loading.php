<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Home Page</title>
    <link rel="stylesheet" href="CSS/loadingstyles.css">
    <link rel="stylesheet" href="JS/loading.js.js">
    
</head>

<body>
    <div class="terminal">
        <div class="terminal-header">
            <div class="terminal-buttons">
                <span class="terminal-button terminal-button-red"></span>
                <span class="terminal-button terminal-button-yellow"></span>
                <span class="terminal-button terminal-button-green"></span>
            </div>
        </div>
        <div class="terminal-body">
            <div class="terminal-line">Welcome to AI Terminal Interface</div>
            <div class="terminal-line">Loading AI functionalities<span class="terminal-loading"></span></div>
            <div class="terminal-line">Please wait<span class="terminal-loading"></span></div>
        </div>
    </div>

    
</body>
<script>
    setTimeout(() => {
        window.location.href = "Home.php";
    }, 3000);
    </script>

</html>