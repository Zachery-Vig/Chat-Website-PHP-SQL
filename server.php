<?php

session_start();

ini_set('display_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "none";
$dbname = "message_board";

// Connects to db
$conn = new mysqli($servername, $username, $password, $dbname);

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Checks if post request was from initial message table selection if so set tablename var, if not do regular post request.
    if (isset($_POST['table_select_button'])) {
        $_SESSION['tablename'] = $_POST['table_select_button'];
    } else {
        $user_name = htmlspecialchars($_POST['user_name']);
        $user_input = htmlspecialchars($_POST['user_input']);

        // If no name is entered sets name to anonymous
        if (empty($user_name)) {
            $user_name = "anonymous";
        }

        //Defaults to the first table
        $tablename = isset($_SESSION['tablename']) ? $_SESSION['tablename'] : "messages1";

        //Inserts data into specified database table
        $stmt = $conn->prepare("INSERT INTO " . $tablename . " (name, message) VALUES (?, ?)");
        $stmt->bind_param("ss", $user_name, $user_input);
        $stmt->execute();
        $stmt->close();
    }

    //Sends user back to chat page
    header("Location: chat.php");
    exit();
}

// Use the session-stored table name for displaying messages
$tablename = isset($_SESSION['tablename']) ? $_SESSION['tablename'] : "messages1";  // Default to "messages"

// Retrieve all messages from the database for the selected table
$sql = "SELECT name, message, timestamp FROM " . $tablename . " ORDER BY timestamp DESC";
$result = $conn->query($sql);

?>