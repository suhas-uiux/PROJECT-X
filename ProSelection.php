<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Psel.css">
    <style>
.cardcontainer {
    padding-top: 20px;
    gap: 35px; /* Moderate gap between cards */
    display: flex;
    justify-content: center; /* Center the cards within the container */
    align-items: center;
    flex-wrap: wrap; /* Allow cards to wrap to the next line */
    max-width: 1060px; /* Set max-width slightly more than two card widths + gap */
    margin: 0 auto; /* Center the container */
}

.container {
    border: 2px solid black;
    height: 250px; /* Moderate height */
    width: 491px; /* Moderate width */
    background-color: aliceblue;
    display: flex;
    align-items: center;
    border-radius: 24px;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin-bottom: 15px;
}

img {
    width: 350px; /* Adjusted width */
    height: 100%; /* Ensure image height fills the container */
    object-fit: cover;
    border-radius: 24px 0 0 24px; /* Ensure image fits within the rounded corners */
}

a {
    text-align: left;
    background-color: aliceblue;
    font-size: large; /* Moderate font size */
    text-decoration: none;
    color: black;
    padding: 15px;
    width: 100%; /* Ensure text takes full width */
    box-sizing: border-box;
}

.container:hover {
    transform: scale(1.05);
    box-shadow: 0 8px 16px rgba(239, 239, 239, 0.2);
}



    </style>
</head>

<body>

    <center>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "project";
        $conn = mysqli_connect($servername, $username, $password, $database);
        if (!$conn) {
            echo "connection error";
        }
        $id = $_GET['branch_id'];
        $sql = "SELECT * FROM `branch` WHERE b_id=$id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['b_id'];
            $name = $row['b_name'];
            $disc = $row['b_text'];
            echo '<h1>' . $name . '  Projects </h1>';
        }
        ?>
        <p1>Here the projects are categorized based on the categories, which help in gaining the
            understanding regarding the technology used and helps in working out with the projets.
        </p1>

    </center>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "project";
    $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
        echo "connection error";
    }

    $id = $_GET['branch_id'];
    $sql = "SELECT * FROM `info` WHERE b_id=$id";
    $result = mysqli_query($conn, $sql);

    $displayed = false;

    while ($row = mysqli_fetch_assoc($result)) {

        $title = $row['title'];
        $role = $row['role'];

        if (!$displayed) {
            echo '
            
           <div class="cardcontainer">
            <div class="container">
        <img src="img/card-8.png" alt="Introductory Project Image" style="float: left;">
        <a href="info.php?role=intro&twoid='.$id.' ?>" >Introductory <br/>Project</a>
    </div>
    <div class="container">
    <img src="img/card-9.png" alt="Introductory Project Image">
    <a href="info.php?role=minor&twoid='.$id.' " >Minor</br> Project</a>
    </div>
    <div class="container">
    <img src="img/card-10.png" alt="Introductory Project Image">
    <a href="info.php?role=major&twoid='.$id.' " >Major</br> Project</a>
    </div>
    <div class="container">
    <img src="img/card-11.png" alt="Introductory Project Image">
    <a href="">Personal</br> Project</a>
    </div>
            </div>
           
        ';
            $displayed = true;
        }
    }
    ?>
</body>
<!-- 
</html>
<div class="cards">
            <div class="cards-container">
                <div class="outer">
                    <div class="inner"><img src="img/card-8.png"></div>
                    <a href="info.php?role=intro&twoid=<?php echo $id; ?>"style=" background-color: transparent;
                    font-size: 28px;
                    text-decoration: none;
                    color: black;padding-left:6px; ">Introductory<br/> Projects</a>
                </div>
                <div class="outer">
                    <div class="inner"></div>
                    <a href="info.php?role=intro&twoid=<?php echo $id; ?>"style=" background-color: transparent;
                    font-size: 28px;
                    padding: 47px;
                    text-decoration: none;
                    color: black;padding-left:6px; ">Minor<br/> Projects</a>
                </div>
                <div class="outer">
                    <div class="inner"></div>
                    <a href="info.php?role=intro&twoid=<?php echo $id; ?>"style=" background-color: transparent;
                    font-size: 28px;
                    padding: 47px;
                    text-decoration: none;
                    color: black;padding-left:6px; ">Major<br/> Projects</a>
                </div>
                <div class="outer">
                    <div class="inner"></div>
                    <a href="info.php?role=intro&twoid=<?php echo $id; ?>"style=" background-color: transparent;
                    font-size: 28px;
                    padding: 47px;
                    text-decoration: none;
                    color: black;padding-left:6px; ">Personal<br/> Projects</a>
                </div>
            </div>
        </div> -->