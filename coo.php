<?php
// Start session at the very top
session_start();

// Handle Logout
if(isset($_GET['logout'])) {
    session_destroy();
    header("Location: session_cookies.php");
}

// Set a Cookie for Theme if not set
if(!isset($_COOKIE['theme'])) {
    setcookie("theme", "Dark-Mode", time() + (86400 * 30), "/"); 
}

// Handle Login Simulation
if(isset($_POST['login'])) {
    $_SESSION['user'] = $_POST['username'];
    $_SESSION['start_time'] = time();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sessions & Cookies</title>
</head>
<body style="padding:40px; font-family:sans-serif;">
    <h2>Session & Cookie Management</h2>

    <?php if(isset($_SESSION['user'])): ?>
        <div style="border: 1px solid green; padding: 20px;">
            <h3>Welcome, <?php echo $_SESSION['user']; ?>!</h3>
            <p>You logged in at: <?php echo date("H:i", $_SESSION['start_time']); ?></p>
            <p>Preference Cookie: <?php echo $_COOKIE['theme'] ?? "Loading..."; ?></p>
            <a href="?logout=1">Logout</a>
        </div>
    <?php else: ?>
        <form method="POST">
            Username: <input type="text" name="username" required>
            <button type="submit" name="login">Login</button>
        </form>
        <p>No active session found. Please login.</p>
    <?php endif; ?>

    <hr>
    <h4>Technical Notes:</h4>
    <ul>
        <li>Sessions are stored on the server.</li>
        <li>Cookies are stored in the user's browser.</li>
        <li>Current Session ID: <?php echo session_id(); ?></li>
    </ul>
</body>
</html>