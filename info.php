<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');
        p {
            margin: 10px;
            font-family: "Inter", sans-serif;
        }
        body {
            background-color: #24242C;
        }
        .info p a{
            text-decoration-line: none;
            font-size: larger;
        }

        .boxex {
            color: white;
            background-color: rgba(126, 125, 125, 0.658);
            margin: 8px;
            font-size: 24px;
            border-radius: 25px;
            padding: 10px;
        }

        .info {
            height: 155px;
            width: 280px;
            padding: 20px;
            margin: 20px;
            border-radius: 25px;
            background-color:#1E1E22;
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            align-items: center;
        }

        .infos {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-around;
            max-height: 80vh;
            overflow-y: scroll;
           
        }

        .info:hover {
            transform: scale(0.9);
            box-shadow: 0 8px 16px rgba(239, 239, 239, 0.2);
        }

        ::-webkit-scrollbar {
            width: 7px;
            height: 5px;
            margin-right: 20px;
        }

        ::-webkit-scrollbar-track {
            background: #333;
        }

        ::-webkit-scrollbar-thumb {
            background: #888;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>

<body>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "project";
    $conn = mysqli_connect($servername, $username, $password, $database);
    if (!$conn) {
        echo "connection error";
        exit;
    }
    $id = $_GET['twoid'];
    $role = $_GET['role'];
    $sql = "SELECT * FROM `info` WHERE b_id=$id AND role='$role'";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        $title = $row['title'];
        echo '<div class="info">
            <p><a href="display_name.php?id=' . $row['id'] . '">' . $row['name'] . '</a></p>
        </div>';
    }
    
    ?>
</body>

</html>


                    