<?php
if(isset($_POST['submit'])){

    require_once 'client.php';
    session_start();
    $a = new client();
    $username = $_SESSION['username'];
    $x = $_POST["oldPassword"];
    $c = $_POST["newPassword"];
    if($x == $c) {
        if ($a->usernameValidate($username)) {
            $a->resetPassword($username, $x, $c);
            header("Location: client_signin_front.php");
            exit();
        } else {
            $error_msg = "incorrect username";
            include 'pass_reset1.php';
            exit();

        }
    }else{
        echo "error";
    }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        /* Reset some default browser styles */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        /* Style the body */
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('desktop-wallpaper-best-5-gym-on-hip-gym-boys.jpg'); /* Replace 'background.jpg' with the path to your image */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        /* Style the container */
        .container {
            padding: 20px;
            border-radius: 8px;
            max-width: 400px;
            width: 100%;
            background-color: rgba(255, 255, 255, 0.2);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 1);
            margin-bottom: 10vh;
        }

        /* Style the heading */
        h2 {
            text-align: center;
            color: black;
            margin-bottom: 20px;
        }

        /* Style the form */
        form {
            display: flex;
            flex-direction: column;
        }

        /* Style the label */
        label {
            margin-bottom: 5px;

        }

        /* Style the input */
        input[type="password"] {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Style the button */
        button {
            background-color: red;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            margin-bottom: 10px;
        }

        /* Button hover effect */
        button:hover {
            background-color: black;
        }
        #newPassword{
            color: black;
            font-weight: bold;
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
            font-weight: bold;
            font-size: 100%;
            margin-bottom: 47vh;
            margin-left: 20px;

        }

    </style>
</head>
<body>
<a href="client_signin_front.php"><button class="back"> Back</button></a>
<div class="container">
    <h2>Reset Password</h2>
    <form action="#" method="POST">
        <?php if(isset($error_msg)) { ?>
            <p style="color: red;"><?php echo $error_msg; ?></p>
        <?php } ?>
        <label for="newPassword" id="newPassword">New Password :</label>
        <input type="password" id="oldPassword" name="oldPassword" placeholder="Enter your new password" required>
        <label for="newPassword" id="newPassword">confirm new password</label>
        <input type="password" id="newPassword" name="newPassword" placeholder="confirm password" required>
        <button type="submit" name="submit">Reset Password</button>
    </form>
</div>
</body>

</html>
