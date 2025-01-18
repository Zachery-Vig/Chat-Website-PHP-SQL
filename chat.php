<!DOCTYPE html>
<?php
include_once("server.php")
?>

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
        form {
            display: inline; /* Or inline-block */
        }
        button {
            margin-right: 15px;
        }
    </style>
    <center>
    <b style="font-size: 64px">Message Board</b>
    <hr></hr>
    <?php
    if ($tablename == "messages1"){
        echo "<h2>Current Message Board: Message Board 1</h2>";
    } 
    else if ($tablename == "messages2"){
        echo "<h2>Current Message Board: Message Board 2</h2>";
    }
    else if ($tablename == "messages3"){
        echo "<h2>Current Message Board: Message Board 3</h2>";
    }
    ?>
    <form action="server.php" method="POST">
        <br></br>
        <input style="font-size: 24px" type="text" id="user_name" placeholder="Enter Username" name="user_name"></input>
        <br></br>
        <input style="font-size: 24px; width: 700px;" type="text" id="user_input" placeholder="Enter Message" name="user_input" required></input>
        <br></br>
        <button style="font-size: 24px" type="submit" id="submit_button">Submit</button>
    </form>
    <button onclick="location.href = 'chat.php';" style="font-size: 24px">Refresh</button>
    <button onclick="location.href = 'index.php';" style="font-size: 24px">Back</button>
    <br></br>
    <br></br>
    <b style="font-size: 48px">Messages:</b>
    </center>
    <br>
    <div style="text-align: center;">
    <div style="display: inline-block; text-align: left;">
    <div style="border: 5px solid black; width: 800px; padding: 30px; background-color: rgb(165, 165, 165);">
    <br>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p style='font-size: 24px; background-color: rgb(165, 165, 165); color: rgb(0,0,0);'>" . $row['timestamp'] . ": " . $row['name'] . ": " . $row['message'] . "</p>";
        }
    } else {
        echo "<p style='font-size: 24px; color: rgb(0,0,0);'>No Messages Yet...</p>";
    }

    $conn->close();
    ?>
    </div>
    </div>
    </div>
    </hr>
    <script>
        //Auto saves and loads last name used to local storage.
        window.onload = function() {
            const storedName = localStorage.getItem('user_name');
            if (storedName) {
                document.getElementById('user_name').value = storedName;
            }
        }
        document.getElementById('submit_button').addEventListener('click', function() {
            localStorage.setItem('user_name', document.getElementById('user_name').value);
        });
    </script>
</body>
</html>
