<?php
require_once "workoutLog.php";
session_start();


// Initialize $i with 0 if it's not set in the session
if (!isset($_SESSION['i'])) {
    $_SESSION['i'] = 0;
    $_SESSION["allexercises"] = array();
}

// Check if the form is submitted to add a meal
if(isset($_POST['add_workoutlog'])) {
    // Store the selected option in the session with the key 'op' followed by the current value of $i
    $currexercise = explode(',', $_POST["option"]);
    $_SESSION["op".$_SESSION['i']] = $currexercise;
    $_SESSION["allexercises"][] = $currexercise;


    // Increment $i
    $_SESSION['i']++;
}

// Check if the form is submitted to submit the plan
if(isset($_POST['submit'])) {
    new workoutLog($_POST['name'],$_POST['weights'],$_POST['duration'],$_SESSION["allexercises"]);

    for ($j = 0; $j < $_SESSION['i']; $j++) {
        unset($_SESSION["op".$j]);
    }
    $_SESSION['i'] = 0;
    $_SESSION["allexercises"] = array();
    $message = "Workout added sucessfully";
    include 'trainer_dashboard.php';
//    header("Location: trainer_dashboard.php");
    exit();


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="WhatsApp%20Image%202025-05-17%20at%2021.02.35_47633415.jpg"></link>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Nutrition Plan</title>
    <style>
        /* Reset some default styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('desktop-wallpaper-best-5-gym-on-hip-gym-boys.jpg'); /* Replace 'background.jpg' with the path to your image */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        /* Style the container */
        .container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Style the heading */
        h2 {
            color: #333;
            text-align: center;
        }

        /* Style the form group */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group select,
        .form-group textarea,
        .form-group input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        /* Style the buttons */
        .btn {
            padding: 10px;
            background-color: red;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            margin-right: 10px;
        }

        .btn:hover {
            background-color: black;
        }

        /* Style the meal box */
        .meal-box {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-top: 20px;
        }
        .back {
            background-color: red;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 30px;
            margin-left: 9vw;
            font-weight: bold;
            font-size: 100%;
        }
    </style>
</head>
<body>
<a href="trainer_dashboard.php"><button class="back"> Back</button></a>
<div class="container">
    <h2>WorkoutLog Entry Form</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="exercise_plan">Exercise Plan</label>
            <select id="exercise_plan" name="option">
                <?php
                require_once 'exercise.php';
                $exercises = ((new exercise())->retrieveAllExercises());
                foreach ($exercises as $exercise){

                    // "implode" convert the array to one string
                    echo "<option value=".implode(",",$exercise).";>$exercise[name]</option>";
                }?>
            </select>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name">
                <label for="weights">weights</label>
                <input type="text" name="weights">
                <label for="duration">duration</label>
                <input type="text" name="duration">

            </div>
        </div>
        <button type="submit" class="btn" name="add_workoutlog">Add Workout log</button>
        <button type="submit" class="btn" name="submit">Submit </button>
    </form>

    <div class="meal-box">
        <h3>Selected Exercises</h3>
        <?php
        if(isset($_POST['add_workoutlog'])) {
            // Output the selected options stored in the session
            for ($j = 0; $j < $_SESSION['i']; $j++) {
                echo "<p>" . ($_SESSION["op" . $j][1]) . "</p>";
            }
        }
        ?>
    </div>
</div>
</body>
</html>
