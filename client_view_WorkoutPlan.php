<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="WhatsApp%20Image%202025-05-17%20at%2021.02.35_47633415.jpg"></link>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Workout Plans</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('desktop-wallpaper-best-5-gym-on-hip-gym-boys.jpg'); /* Replace 'background.jpg' with the path to your image */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 1);
        }
        h2 {
            color: black;
            text-align: center;
        }
        .workout-plan {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
            color: wheat;
        }
        .workout-plan h3 {
            margin-top: 0;
        }
        h3{
            color: #A80038;
        }
        .workout-plan ul {
            list-style-type: none;
            padding: 0;
        }
        .workout-plan ul li {
            margin-bottom: 5px;
        }
        .btn {
            display: block;
            width: 100%;
            padding: 10px 0 10px;
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
    <h2>Your Workout Plans</h2>
    <?php
    session_start();
    $weeks = 0;
    if ($_SESSION['bundle'] == 30){
        $weeks = 4;
    }elseif ($_SESSION['bundle'] == 60){
        $weeks = 8;
    }else{
        $weeks = 12;
    }

    require_once 'workoutLog.php';
    require_once 'circularQueue.php';

    // Retrieve workout logs for a specific client (assuming retrieveSpacificeClientWorkoutLogs(1) returns an array of workout logs)
    $workoutLogs = (new workoutLog())->retrieveSpacificeClientWorkoutLogs($_SESSION['id']);

    // Create a circular queue with the workout logs
    $circularQueue = new CircularQueue($workoutLogs);

    // Define the days and their corresponding workout types
    $days = ['Saturday', 'Monday', 'Wednesday', 'Friday'];

    // Define the number of weeks


    // Iterate through each week
    for ($week = 1; $week <= $weeks; $week++) {
        echo "<div class='workout-plan'>";
        echo "<h3>Week $week</h3>";
        echo "<ul>";

        // Iterate through each day
        foreach ($days as $day) {
            // Get the next workout from the circular queue
            $workout = $circularQueue->getNextItem();

            // Output the day and the corresponding workout type
            echo "<li>$day: {$workout['name']}</li>";
        }

        echo "</ul>";
        echo "</div>";
    }

    ?>


    <a href="client_dashboard.php" class="btn">Back</a>
</div>

</body>
</html>
