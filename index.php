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
        * {
            background-color: #2e2e2e;
            color: #c9c9c9;
            font-family: Arial;
        }
    </style>
    <center>
        <b style="font-size: 64px">Message Board</b>
        <hr></hr>
    <form action="index.php" method="POST">
        <br></br>
        <input style="font-size: 24px" type="text" id="user_name" placeholder="Enter Username" name="user_name"></input>
        <br></br>
        <input style="font-size: 24px" type="text" id="user_input" placeholder="Enter Message" name="user_input" required></input>
        <br></br>
        <button style="font-size: 24px" type="submit">Submit</button>
    </form>
    </br>
    <form action="index.php" method="REFRESH"><button style="font-size: 24px">Refresh</button></form>
    <p style="font-size: 48px">Messages:</p>
    </center>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p style='font-size: 24px; position: relative; left: 20%;'>" . $row['name'] . ": " . $row['message'] . "</p>";
            header("refresh");
        }
    } else {
        echo "<p style='font-size: 24px; position: relative; left: 20%;'>No Messages Yet...</p>";
    }

    $conn->close();
    ?>
</body>
</html>
