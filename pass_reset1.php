<?php
session_start(); // Start the session

if(isset($_POST['submit'])) {
    $_SESSION['username'] = $_POST['username']; // Store the username in the session
    header("Location: pass_reset2.php"); // Redirect to pass_reset2.php
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <style>
        /* Reset default browser styles */
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
            margin-bottom: 20vh;
            margin-right: 6vw;
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
        input[type="text"] {
            padding: 10px;
            margin-bottom: 40px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Style the button */
        button {
            background-color: blue;
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
            background-color: darkblue;
        }
        input[type="submit"]{
            background-color: red;
            color: white;
            cursor: pointer;
        }
        input[type="submit"]:hover{
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
           /* margin-top: 0vh;
            margin-right: 90vw;*/
            font-weight: bold;
            font-size: 100%;
            margin-bottom: 47vh;

        }

    </style>
</head>

<body>
<a href="client_signin_front.php"><button class="back"> Back</button></a>
<div class="container">
    <h2>Reset Password</h2>
    <form action="" method="POST">
        <?php if(isset($error_msg)) { ?>
            <p style="color: red;"><?php echo $error_msg; ?></p>
        <?php } ?>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" placeholder="Enter The User name" required>

        <input type="submit" name="submit" value="Next">
    </form>
</div>
</body>

</html>
