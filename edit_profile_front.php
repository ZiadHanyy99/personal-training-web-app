<?php
session_start();
if(isset($_POST['submit'])){

    // MySQL connection setting
    $servername = "localhost";
    $usernamee = "root"; // MySQL username
    $passwordd = "18SYDasd$"; // MySQL password
    $database = "personal_training"; // MySQL database name

    // Create connection
    $conn = new mysqli($servername, $usernamee, $passwordd, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare("UPDATE client SET fname = ?, lname = ?, username = ?, email = ?, password = ?, date_of_birth = ?, phonenum = ? where id = ?");
    $stmt->bind_param("sssssssi",$_POST['fname'],$_POST['lname'],$_POST['username'],$_POST['email'],$_POST['password'],$_POST['date_of_birth'],$_POST['phonenum'],$_SESSION['id']);
    $stmt->execute();
    $conn->close();
    header("Location: client_signin_front.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="WhatsApp%20Image%202025-05-17%20at%2021.02.35_47633415.jpg"></link>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Personal Info</title>
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
            margin: 0px auto;
            padding: 20px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 1);
        }
        h2 {
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="email"],
        .form-group input[type="password"],
        .form-group select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        .btn-submit {
            background-color: red;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 35vw;
        }
        .btn-submit:hover{
            background-color: black;
        }
        .back:hover {
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
            margin-left: 28.5vw;
            font-weight: bold;
            font-size: 100%;
        }
    </style>
</head>
<body>

<header>
    <h1>Edit Personal Info</h1>
</header>
<a href="client_profile.php"><button class="back"> Back</button></a>
<div class="container">
    <form action="" method="post">
        <div class="form-group">

            <label for="fname">First Name</label>
            <input type="text" id="fname" name="fname" required>
        </div>
        <div class="form-group">
            <label for="lname">Last Name:</label>
            <input type="text" id="lname" name="lname" required>
        </div>
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date of Birth:</label>
            <input type="date" id="date_of_birth" name="date_of_birth" required>
        </div>
        <div class="form-group">
            <label for="phonenum">Phone Number:</label>
            <input type="text" id="phonenum" name="phonenum" required>
        </div>
        <button type="submit" class="btn-submit" name="submit">Save Changes</button>
    </form>
</div>



</body>
</html>
