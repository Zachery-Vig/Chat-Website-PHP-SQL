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
    </br>
    <form action="server.php" method="POST">
        <button style="font-size: 24px" type="submit" name="table_select_button" value="messages1">Message Board 1</button>
        <br></br>
        <button style="font-size: 24px" type="submit" name="table_select_button" value="messages2">Message Board 2</button>
        <br></br>
        <button style="font-size: 24px" type="submit" name="table_select_button" value="messages3">Message Board 3</button>
    </form>
    </center>
</body>
</html>