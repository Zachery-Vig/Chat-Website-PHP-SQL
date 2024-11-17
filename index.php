<?php
    include("server.php")
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Board</title>
</head>
<body>
    <style>
        
    </style>

    <h1>Message Board</h1>

    <!-- Form for submitting new messages -->
    <form action="index.php" method="POST">
        <input type="text" id="user_name" placeholder="Enter Username" name="user_name"></input>
        <input type="text" id="user_input" placeholder="Enter Message" name="user_input" required></input>
        <button type="submit">Submit</button>
    </form>
    <h1>Messages:</h1>
    <?php
    // Display messages if there are any
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<h2>" . $row['name'] . ": " . $row['message'] . "</h2>";
        }
    } else {
        echo "<h2>No Messages Yet...</h2>";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>