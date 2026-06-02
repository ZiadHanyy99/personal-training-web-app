<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer Dashboard</title>
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
        .header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        h2 {
            color: #333;
        }
        .profile-info {
            margin-bottom: 20px;
        }
        .profile-info label {
            font-weight: bold;
        }
        .profile-info p {
            margin: 5px 0;
        }
        .action-buttons {
            text-align: center;
        }
        .action-buttons button {
            padding: 10px 20px;
            margin: 0 10px;
            border: none;
            border-radius: 5px;
            background-color: red;
            color: #fff;
            cursor: pointer;
        }
        .action-buttons button:hover {
            background-color: black;
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
    <link rel="icon" href="WhatsApp%20Image%202025-05-17%20at%2021.02.35_47633415.jpg"></link>

</head>
<body>
<div class="header">
    <h1>Trainer Dashboard</h1>
</div>
<a href="trainer_signin_front.php"><button class="back"> Sign out</button></a>
<?php
if(!isset($_SESSION)){
session_start();
}
?>

<div class="container">
    <h3 style="color: #00ff00"><?php if(isset($message))echo $message?></h3>
    <h2>Profile Information</h2>

    <div class="profile-info">
        <label>Name:</label>
        <p><?php echo $_SESSION["fname"].' '.$_SESSION["lname"]?></p>
        <label>Email:</label>
        <p><?php echo $_SESSION["email"]?></p>
        <label>Specialization:</label>
        <p><?php echo $_SESSION["specialization"]?></p>
        <label>Experience:</label>
        <p><?php echo $_SESSION["experience"]?></p>
    </div>
    <div class="action-buttons">
        <a href="trainer's_clients.php"><button>View Clients</button></a>
        <a href="create_meal.php"><button>Add meal</button></a>
        <a href="create_exercise.php"><button>Add Exercise</button></a>
        <a href="create_workoutlog.php"><button>Add Workout Log</button></a>
    </div>
</div>


</body>
</html>
