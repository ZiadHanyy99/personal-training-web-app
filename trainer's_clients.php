<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="WhatsApp%20Image%202025-05-17%20at%2021.02.35_47633415.jpg"></link>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trainer's Clients</title>
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
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        .client-list {
            margin-top: 20px;
            list-style: none;
            padding: 0;
        }
        .client-item {
            background-color: #f9f9f9;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .client-item:hover {
            background-color: red;
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

<header>
    <h1>Trainer's Clients</h1>
</header>
<a href="trainer_dashboard.php"><button class="back"> Back</button></a>
<div class="container">
    <h2>Clients List</h2>
    <ul class="client-list">
        <?php
        include_once 'trainer.php';
        session_start();

        // Fetch clients from trainer class
        $clients = (new trainer())->viewClients($_SESSION['id']);

        // Loop through each client
        $i = 0;
        foreach ($clients as $client) {
            $_SESSION["arr"."$i"] = $client;


            // Generate a link for the client
            echo "<li class='client-item' onclick='window.location.href=\"trainer_client_profile.php?id=$i\"'>$client[fname] $client[lname]</li>";
            $i++;
        }
        ?>
    </ul>

</div>

</body>
</html>
