<?php
session_start();
require_once 'nutritionPlan.php';
if(isset($_POST['logout'])) {
    // Unset session variables
    session_unset();
    // Destroy the session
    session_destroy();
    // Redirect to login page
    header("Location: client_signin_front.php");
    exit;
}
$meals = ((new nutritionPlan())->retrieveSpacificeClientMeals($_SESSION['id']));
$protein = 0;
$carbs  = 0;
$fats  = 0;
$calories = 0;
foreach ($meals as $meal){
    $protein+=(int)$meal["protein"];
    $carbs+=(int)$meal["carbs"];
    $fats+=(int)$meal["fats"];
    $calories+=(int)$meal["calories"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="WhatsApp%20Image%202025-05-17%20at%2021.02.35_47633415.jpg"></link>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Client Dashboard</title>
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
        header {
            background-color: #333;
            color: #fff;
            padding: 5px;
            text-align: center;

        }
        nav {
            background-color: #444;
            padding: 10px;
            text-align: center;
        }
        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 10px;
        }
        .profile-img {
            position: absolute;
            top: 25px;
            right: 17px;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            overflow: hidden;
        }
        .profile-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 20px;

        }
        .jumbotron h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }
        .jumbotron p {
            font-size: 20px;
        }
        .stats-section {
            background-color: #f9f9f9;
            padding: 20px;
            text-align: center;
            border-radius: 5px;
            margin-bottom: 20px;
            background-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 1);
        }
        .stats-section h2 {
            margin-bottom: 20px;
        }
        .stat-boxes {
            display: flex;
            justify-content: center;
            background-color: rgba(255, 255, 255, 0.2);
            /*box-shadow: 0 2px 4px rgba(0, 0, 0, 1);*/
        }
        .stat-box {
            background-color: #fff;
            padding: 20px;
            margin: 0 10px;
            border-radius: 5px;
            flex: 1;
            background-color: rgba(255, 255, 255, 0.2);
            /*box-shadow: 0 2px 4px rgba(0, 0, 0, 1);*/
        }
        .stat-box h3 {
            margin-bottom: 10px;
        }
        .stat-box p {
            margin: 5px 0;
        }
        .progress-bar {
            width: 100%;
            background-color: #ddd;
            height: 20px;
            border-radius: 5px;
            margin-bottom: 10px;
            overflow: hidden;
        }
        .progress {
            background-color: red;
            height: 100%;
            border-radius: 5px;
        }
        .back:hover{
            background-color: black;
        }
        .back {
            background-color: red;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 0px;
            margin-right: 90vw;
            font-weight: bold;
            font-size: 100%;
        }

    </style>
</head>
<body>

<header>
    <h1>Client Dashboard</h1>
    <div class="profile-img">
        <a href="client_profile.php">
            <img src="../../../personal_trainer_java/src/main/webapp/tree-736885_1280.jpg" alt="Profile Image">
        </a>
    </div>

    <h4 style="color: white;text-align: end;font-size: 20px">Profile</h4>
    <form method="post" action="">
        <input type="submit" name="logout" value="Sign Out" class="back">
    </form>
<!--    <a href="client_signin_front.php"><button class="back"> sign out</button></a>-->
</header>
<nav>
    <a href="client_view_WorkoutPlan.php">Workout Plan</a>
    <a href="client_view_NutritionPlan.php">Nutrition plan</a>
    <a href="chat_front.php">Communication</a>
</nav>


<div class="container">
    <div class="stats-section">
        <div class="stat-boxes">
            <div class="stat-box">
                <h3>Current Weight</h3>
                <p><?php echo $_SESSION["weight"]; ?>Kg</p>
            </div>
            <div class="stat-box">
                <h3>Daily Calories Needed</h3>
                <p><?php echo $calories;?> kcal</p>
            </div>
            <div class="stat-box">
                <h3>Daily Macronutrients</h3>
                <p>Protein:<?php echo $protein; ?>g</p>
                <p>Carbs: <?php echo $carbs; ?>g</p>
                <p>Fats: <?php echo $fats; ?>g</p>
            </div>
            <div class="stat-box">
                <h3>Your Bundle</h3>
                <p><?php echo $_SESSION["bundle"]; ?></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="stats-section">
            <h2>Your Statistics</h2>
            <div class="progress-bar">
                <div class="progress" style="width: 80%;"></div>
            </div>
            <div class="progress-bar">
                <div class="progress" style="width: 40%;"></div>
            </div>
            <div class="progress-bar">
                <div class="progress" style="width: 80%;"></div>
            </div>
        </div>
    </div>
</body>
</html>
