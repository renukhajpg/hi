<!DOCTYPE html>
<html>
<head>
    <title>PHP Core Lab</title>
    <style>
        body { font-family: Arial; padding: 30px; background: #fdfdfd; }
        .php-output { background: #333; color: #0f0; padding: 15px; border-radius: 5px; }
    </style>
</head>
<body>
    <h2>PHP and HTML Integration</h2>
    <form method="POST">
        Enter your Name: <input type="text" name="uname">
        <input type="submit" value="Greet Me">
    </form>

    <div class="php-output">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['uname']);
        if (empty($name)) {
            echo "Please enter a name above.";
        } else {
            echo "<h3>Server Response:</h3>";
            echo "Hello, " . strtoupper($name) . "!<br>";
            echo "The server time is: " . date("h:i:sa") . "<br>";
            echo "Your IP Address is: " . $_SERVER['REMOTE_ADDR'];
        }
    } else {
        echo "Waiting for user input...";
    }
    
    // Demonstrate a Loop in PHP
    echo "<h4>Loop Demonstration:</h4>";
    for($x = 1; $x <= 5; $x++) {
        echo "Iteration Number: $x <br>";
    }
    ?>
    </div>
</body>
</html>