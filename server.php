<?php
// Enable error reporting for debugging (if needed)
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection settings
$servername = "localhost";
$username = "root";    // MySQL username
$password = "your_password";  // Your MySQL password
$dbname = "message_board"; // Database name

// Create a new connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the connection was successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_name = htmlspecialchars($_POST['user_name']);
    $user_input = htmlspecialchars($_POST['user_input']);
    if ($user_name == Null) {
        $user_name = "anonymous";
    }

    $stmt = $conn->prepare("INSERT INTO messages (name, message) VALUES (?, ?)");

    $stmt->bind_param("ss", $user_name,$user_input);

    $stmt->execute();

    $stmt->close();
}

// Retrieve all messages from the database
$sql = "SELECT name, message, timestamp FROM messages ORDER BY timestamp DESC";
$result = $conn->query($sql);
?>