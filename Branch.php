<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project-X</title>
    <link rel="stylesheet" href="BranchDesign.css">

</head>

<body>
    
    <p>Project-X</p>
    <h1>CHOOSE BRANCH</h1>
    <div class="container">
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "project";
        $conn = mysqli_connect($servername, $username, $password, $database);
        if (!$conn) {
            echo "connection error";
        }
        $sql = "SELECT * FROM `branch`";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['b_id'];
            $name = $row['b_name'];
            $disc = $row['b_text'];

            echo '<div class="card">
            <img src="img/card-' . $id . '.jpg" alt="Card Image">
            <h5 class="card-title">' . $name . '</h5>
            <p class="card-text" >' . $disc . '</p>
            <div class="btn">
            <a href="ProSelection.php?branch_id=' . $id . '" class="btn btn-primary">Explore ></a>
            </div>
        </div>';
        }
        ?>

        
    </div>
</body>

</html>