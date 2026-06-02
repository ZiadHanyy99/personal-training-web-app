<?php
session_start();

// Dummy check for session vars to avoid errors
if (!isset($_SESSION['id']) || !isset($_SESSION['bundle'])) {
    die("You must be logged in to view this page.");
}

// Include required classes (replace with real logic if integrating)
require_once 'circularQueue.php';
require_once 'nutritionPlan.php';

$meals = (new nutritionPlan())->retrieveSpacificeClientMeals($_SESSION['id']);

$breakfast = $lunch = $dinner = $snack = [];

foreach ($meals as $meal) {
    if ($meal["type"] == "Breakfast") {
        $breakfast[] = $meal;
    } elseif ($meal["type"] == "Lunch") {
        $lunch[] = $meal;
    } elseif ($meal["type"] == "Dinner") {
        $dinner[] = $meal;
    } elseif ($meal["type"] == "Snack") {
        $snack[] = $meal;
    }
}

$breakfastQueue = new CircularQueue($breakfast);
$snackQueue = new CircularQueue($snack);
$lunchQueue = new CircularQueue($lunch);
$dinnerQueue = new CircularQueue($dinner);

$weeks = $_SESSION['bundle'] == 30 ? 4 : ($_SESSION['bundle'] == 60 ? 8 : 12);

$portions = ["Breakfast", "Snack", "Lunch", "Snack", "Dinner"];
?>

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
            background-image: url('desktop-wallpaper-best-5-gym-on-hip-gym-boys.jpg');
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
            font-weight: bold;
        }

        .nutrition-plan {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: flex-start;
            color: #2B2024;
            font-weight: bold;
        }

        .nutrition-plan h3 {
            margin-top: 0;
        }

        .meal-section {
            flex: 1;
            border: 2px solid #ccc;
            border-radius: 5px;
            padding: 5px;
            margin: 5px 10px;
        }

        .meal-list {
            padding: 0;
            list-style-type: none;
            color: #FD0054;
        }

        .meal-item {
            margin-bottom: 10px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px 0;
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

        h3 {
            color: #A80038;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Your Nutrition Plans</h2>

    <?php
    for ($week = 1; $week <= $weeks; $week++) {
        echo "<div class='nutrition-plan'>";
        echo "<h3>Week $week</h3>";

        foreach ($portions as $portion) {
            if ($portion == "Breakfast") {
                $queue = $breakfastQueue;
            } elseif ($portion == "Snack") {
                $queue = $snackQueue;
            } elseif ($portion == "Lunch") {
                $queue = $lunchQueue;
            } elseif ($portion == "Dinner") {
                $queue = $dinnerQueue;
            }

            echo "<div class='meal-section'>";
            echo "<h4>$portion</h4>";
            echo "<ul class='meal-list'>";
            $item = $queue->getNextItem();
            if ($item !== null && isset($item['name'])) {
                echo "<li class='meal-item'>{$item['name']}</li>";
            } else {
                echo "<li class='meal-item'>No meal available</li>";
            }
            echo "</ul>";
            echo "</div>";
        }

        echo "</div>";
    }
    ?>

    <a href="client_dashboard.php" class="btn">Back</a>
</div>

</body>
</html>
