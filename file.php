<!DOCTYPE html>
<html>
<head>
    <title>File & Error Handling</title>
    <style>
        .log { background: #eee; padding: 15px; font-family: monospace; border: 1px solid #ccc; }
        .error { color: red; font-weight: bold; }
        .success { color: green; }
    </style>
</head>
<body>
    <h2>System File Handler</h2>
    <?php
    $filename = "lab_report.txt";

    // 1. Error Handling with Try-Catch
    try {
        echo "<h3>Attempting File Operations...</h3>";
        
        // Check if file exists
        if (!file_exists($filename)) {
            throw new Exception("Warning: File '$filename' does not exist yet. Creating it now...");
        }

        // 2. File Writing
        $file = fopen($filename, "a"); // 'a' for append
        if (!$file) {
            throw new Exception("Permission Denied: Cannot open file for writing.");
        }
        $data = "Log Entry: " . date("Y-m-d H:i:s") . "\n";
        fwrite($file, $data);
        fclose($file);
        echo "<p class='success'>Data appended successfully.</p>";

    } catch (Exception $e) {
        echo "<p class='error'>" . $e->getMessage() . "</p>";
    } finally {
        echo "<p>File operation attempt finished.</p>";
    }

    // 3. File Reading
    echo "<h3>Current File Content:</h3>";
    echo "<div class='log'>";
    if (file_exists($filename)) {
        $content = file_get_contents($filename);
        echo nl2br(htmlspecialchars($content));
    } else {
        echo "File is empty.";
    }
    echo "</div>";
    ?>
</body>
</html>