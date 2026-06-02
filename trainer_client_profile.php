<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 15px;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        .profile-info {
            margin-bottom: 20px;
        }
        .profile-info p {
            margin: 5px 0;
        }
        .progress-section {
            margin-bottom: 20px;
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
        .communication {
            text-align: center;
        }
        .communication a {
            display: inline-block;
            background-color: red;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            margin-top: 10px;
        }

    </style>
    <link rel="icon" href="WhatsApp%20Image%202025-05-17%20at%2021.02.35_47633415.jpg"></link>

</head>
<body>

<header>
    <h1>Client Profile</h1>
</header>

<div class="container">
    <div class="profile-info">
        <h2>Profile Information</h2>
        <?php
        require_once 'client.php';
        session_start();
        $client = $_SESSION["arr".$_GET["id"]];
        $age = ((new client())->calculateAge($client["date_of_birth"]));
        $_SESSION["c_id"] = $client["id"];
        ?>
        <p><strong>Name:</strong> <?php echo $client["fname"].' '.$client["lname"]?></p>
        <p><strong>Age:</strong><?php echo $age?></p>
        <p><strong>Gender:</strong> <?php echo $client["gender"]?></p>
        <p><strong>phone number:</strong> <?php echo $client["phonenum"]?></p>
        <p><strong>Email:</strong> <?php echo $client["email"]?></p>
        <p><strong>Weight:</strong> <?php echo $client["weight"]?> kg</p>
        <p><strong>height:</strong> <?php echo $client["height"]?> </p>
        <p><strong>Waist Circumference:</strong> <?php echo $client["waist_cer"]?></p>
    </div>

    <div class="progress-section">

        <h2>Progress</h2>
        <div class="progress-bar">
            <div class="progress" style="width: 10%;"></div>
        </div>
    </div>

    <div class="communication">
        <a href="create_workout_plan.php?id=<?php echo$_GET["id"]?>">Create Workout Plan</a>
        <a href="create_nutritionPlan.php?id=<?php echo $_GET["id"]?>">Create Nutrition Plan</a>
        <a href="#">Send Message</a>
    </div>
</div>

</body>
</html>
