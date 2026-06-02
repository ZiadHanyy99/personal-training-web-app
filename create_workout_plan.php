<?php
if(isset($_POST["subtn"])){
    session_start();


    // MySQL connection setting
    $servername = "localhost";
    $usernamee = "root"; // MySQL username
    $passwordd = "YOUR_DB_PASSWORD"; // MySQL password
    $database = "personal_training"; // MySQL database name

// Create connection
    $conn = new mysqli($servername, $usernamee, $passwordd, $database,8000);


// Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $stsmt = $conn->prepare("INSERT INTO client_workoutlogs(client_id, workoutLog_id) VALUES (?,?)");
    foreach ($_POST['workouts'] as $workout){
        $currwokout = explode(",",$workout);
        $stsmt->bind_param("ii",$_SESSION['c_id'],$currwokout[0]);
        $stsmt->execute();
    }

    $conn->close();
    header("Location: trainer_client_profile.php?id=$_GET[id]");
    exit();
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="WhatsApp%20Image%202025-05-17%20at%2021.02.35_47633415.jpg"></link>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Workout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .workout-log {
            display: inline-block;
            background-color: #f9f9f9;
            padding: 10px;
            border-radius: 5px;
            margin-right: 10px;
            cursor: pointer;
        }
        .workout-log:hover {
            background-color: #e0e0e0;
        }
        .workout-log input[type="checkbox"] {
            display: none;
        }
        .workout-log label {
            cursor: pointer;
            display: block;
            padding: 5px;
            border-radius: 5px;
        }
        .workout-log input[type="checkbox"]:checked + label {
            background-color: red;
            color: #fff;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: red;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
        }
        .btn:hover {
            background-color: black;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Create Workout</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label>Choose Workout Logs:</label>
            <?php
            session_start();
            require_once 'workoutLog.php';
            // Array of workout logs
            $workoutLogs = ((new workoutLog())->retrieveAllWorkoutLogs());
            // Loop through the array to generate checkboxes
            foreach ($workoutLogs as $workout) {
                $x = implode(",",$workout);
                echo '<div class="workout-log">';
                echo "<input type='checkbox' id='$workout[id]' name='workouts[]' value='$x'>";
                echo "<label for='$workout[id]'>$workout[name]</label>";
                echo '</div>';
            }
            ?>

        </div>
        <button type="submit" class="btn" name="subtn">Create Workout</button>
    </form>

</div>

</body>
</html>
