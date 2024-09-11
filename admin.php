<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Dashboard</title>
    <link rel="stylesheet" href="dashboard.css"> 
   
</head>
<body>
    <h1>Project Dashboard</h1>
    <form method="POST">
        <div>
            <label for="title">Enter title of the project:</label>
            <input type="text" id="title" name="title">
        </div>
        <div>
            <label for="overv">Enter overview of the project:</label>
            <textarea id="overv" name="overv"></textarea>
        </div>
        <div>
            <label for="disc">Write description of your project:</label>
            <textarea id="disc" name="disc" wrap:"hard"></textarea>
        </div>
        <div>
            <label for="choice">Mention different projects:</label>
            <textarea id="choice" name="choice" wrap:"hard"></textarea>
        </div>
        <div>
            <label for="ref">Mention references:</label>
            <textarea id="ref" name="ref" wrap:"hard"></textarea>
        </div>
        <div>
            <label for="name">Enter the project name:</label>
            <input type="text" id="name" name="name">
        </div>
        <div>
            <label for="role">Role:</label>
            <select id="role" name="role" required>
                <option value=""></option>
                <option value="intro">Intro</option>
                <option value="minor">Minor</option>
                <option value="major">Major</option>
            </select>
        </div>
        <div>
            <label for="role">Branch:</label>
            <select id="role" name="role" required>
                <option value=""></option>
                <option value="CSE">COMPUTER SCIENCE</option>
                <option value="ECE">ELECTRICAL AND COMMUNICATION</option>
                <option value="EEE">ELECTRICAL AND ELECTRONIC</option>
                <option value="MECH">MECHANICAL</option>
                <option value="CIVIL">CIVIL</option>
                <option value="AIML">AI/ML</option>
                <option value="CHEM">CHEMICAL</option>
            </select>
        </div>
        <div>
    <label for="role">Branch code:</label>
    <select id="role" name="role" required>
        <option value="" disabled selected>Select 1 for CSE, 2 for E&C, 3 for EEE, 4 for AIML, 5 for MECH, 6 for CIVIL, 7 for CHEM</option>
        <option value="CSE">1</option>
        <option value="ECE">2</option>
        <option value="EEE">3</option>
        <option value="MECH">4</option>
        <option value="CIVIL">5</option>
        <option value="AIML">6</option>
        <option value="CHEM">7</option>
    </select>
</div>


        <button type="submit">Submit</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $overv = $_POST['overv'];
        $disc = $_POST['disc'];
        $choice = $_POST['choice'];
        $ref = $_POST['ref'];
        $role = $_POST['role'];
        $name = $_POST['name'];
        $id=$_POST['id'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "project";
        $connection = mysqli_connect($servername, $username, $password, $database);

        if (!$connection) {
            die("The database is not connected: " . mysqli_connect_error());
        } 
        else 
        {
            echo "Connection successful.<br>";
            $title = nl2br(mysqli_real_escape_string($connection, $title));
            $overv = nl2br(mysqli_real_escape_string($connection, $overv));
            $disc = nl2br(mysqli_real_escape_string($connection, $disc));
            $choice = nl2br(mysqli_real_escape_string($connection, $choice));
            $ref = nl2br(mysqli_real_escape_string($connection, $ref));
            $role = nl2br(mysqli_real_escape_string($connection, $role));
            $name = nl2br(mysqli_real_escape_string($connection, $name));

            $insert = "INSERT INTO `details` (`title`, `name`, `overv`, `disc`, `choice`, `ref`, `role`) VALUES ('$title','$name','$overv','$disc','$choice','$ref','$role')";
            $res = mysqli_query($connection, $insert);

            if (!$res) {
                die("The data was not inserted: " . mysqli_error($connection));
            } else {
                echo "Inserted successfully.";
            }
        }
        mysqli_close($connection);
    }
    ?>
</body>
</html>
