<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap');

        body {
            margin: 0;
            padding: 0;
            background-color: #24242C;
            font-family: 'League Spartan', sans-serif;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            box-sizing: border-box;
            white-space: pre-wrap;
        }

        .boxex {
            position: sticky;
            top: 0;
            z-index: 2;
            width: 100%;
            text-align: center;
            padding: 20px 0;
            background-color: #24242C;
        }

        .boxex h2 {
            color: white;
            margin: 0;
            font-size: 35px;
        }

        .spacer {
            height: 200px; /* Adjust this value for more or less space */
        }

        .image-container {
            position: fixed;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 100%;
            max-width: 1200px;
            height: auto;
            z-index: 1;
            pointer-events: none;
        }

        .image-container img {
            width: 100%;
            height: auto;
            max-height: 600px; /* Increase this value for a bigger image */
            object-fit: cover;
            transition: opacity 0.3s ease;
        }

        .infos {
            background-color: #1E1E22;
            border-radius: 10px;
            padding: 20px;
            width: 80%;
            max-width: 1200px;
            margin: 20px 0 40px 0; /* Added bottom margin for spacing */
            box-sizing: border-box;
            z-index: 3;
            position: relative;
            margin-top: 300px; /* Adjust to control how much space below the image */
        }

        .infos h3 {
            color: white;
            margin-top: 20px;
            font-size: xx-large;
        }

        .infos p {
            color: white;
            line-height: 1.6;
            font-size: x-large;
            font-weight: 300;
            margin: 0;
        }

        .infos a {
            color: #7C93C3;
            text-decoration: none;
            font-size: x-large;
            font-weight: 300;
            word-wrap: break-word;
        }

        hr {
            border: 0;
            border-top: 1px solid #7C93C3;
            margin: 20px 0;
        }

    </style>
</head>
<body>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$id = $_GET['id'];
$sql = "SELECT * FROM `info` WHERE id='$id'";

$res = mysqli_query($conn, $sql);

if (!$res) {
    die("Error in SELECT query: " . mysqli_error($conn));
}
$num = mysqli_num_rows($res);

// Fetch and display results
if ($num > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        echo "<div class='boxex'>
                <h2>" . $row['title'] . "</h2>
            </div>
            <div class='spacer'></div> 
            <div class='image-container'>
                <img src='img/card-12.jpg' id='fade-image'>
            </div>
            <div class='infos'>
                <h3>OVERVIEW</h3>
                <p>" . $row['overv'] . "</p>
                <hr>
                <h3>DESCRIPTION</h3>
                <p>" . $row['disc'] . "</p>
                <hr>
                <h3>PROJECT IDEAS</h3>
                <p>" . $row['choice'] . "</p>
                <hr>
                <h3>REFERENCE</h3>
                <a href='" . $row['ref'] . "'>" . $row['ref'] . "</a>
            </div>";
    }
}
?>

<script>
    // JavaScript to fade the image on scroll
    window.addEventListener('scroll', function() {
        var image = document.getElementById('fade-image');
        var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        var fadeStart = 0;
        var fadeEnd = 600; // Image height to determine when to fade out completely

        // Calculate opacity
        var opacity = 1;
        if (scrollTop >= fadeStart && scrollTop <= fadeEnd) {
            opacity = 1 - (scrollTop / fadeEnd);
        } else if (scrollTop > fadeEnd) {
            opacity = 0;
        }

        image.style.opacity = opacity;
    });
</script>

</body>
</html>
