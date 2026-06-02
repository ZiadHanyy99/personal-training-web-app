<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="WhatsApp%20Image%202025-05-17%20at%2021.02.35_47633415.jpg"></link>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Client Profile</title>
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
            padding: 15px;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 10px auto;
            padding: 20px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 1);
        }
        h2 {
            color: #333;
        }
        .profile-image {
            text-align: center;
            margin-bottom: 20px;
        }
        .profile-image img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }
        .info-section {
            margin: -11px auto;
        }
        .info-section h2 {
            margin-bottom: 10px;
        }
        .info-card {
            background-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 1);
            padding: 20px ;
            border-radius: 5px;
            margin: 13px auto;
        }
        .edit-btn {
            background-color: red;
            color: #fff;
            padding: 10px 20px;
            margin-top: 20px;
            margin-left: 33vw;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            cursor: pointer;
        }
        .edit-btn:hover{
            background-color: black;
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
            margin-top: 40px;
            margin-left: 28vw;
            font-weight: bold;
            font-size: 100%;
        }
        .bold{
            font-weight: bold;
        }
    </style>
</head>
<body>

<header>
    <h1>Client Profile</h1>
</header>
<a href="client_dashboard.php"><button class="back"> Back</button></a>
<div class="container">
    <div class="profile-image">
        <img src="../../../personal_trainer_java/src/main/webapp/tree-736885_1280.jpg" alt="Profile Image">
    </div>

    <div class="info-section">

        <div class="info-card">
            <?php
            require_once 'client.php';
            session_start();
                $age = ((new client())->calculateAge($_SESSION["date_of_birth"]));

            ?>
            <p class="bold">Name: <?php echo $_SESSION["fname"]." ".$_SESSION["lname"]; ?></p>
            <p class="bold">Age: <?php echo $age; ?></p>
            <p class="bold">Gender: <?php echo $_SESSION["gender"]; ?></p>
            <p class="bold">Email: <?php echo $_SESSION["email"]; ?></p>
            <p class="bold">Phone Number: +2<?php echo $_SESSION["phonenum"]; ?></p>
            <p class="bold">Weight: <?php echo $_SESSION["weight"]; ?> kg</p>
            <p class="bold">Height: <?php echo $_SESSION["height"]; ?> cm</p>
            <p class="bold">Waist Cercomfrance: <?php echo $_SESSION["waist_cer"]; ?> cm</p>

        </div>
        <a href="edit_profile_front.php" class="edit-btn">Edit Personal Info</a>
    </div>
</div>

</body>
</html>
