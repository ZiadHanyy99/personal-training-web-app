<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="WhatsApp%20Image%202025-05-17%20at%2021.02.35_47633415.jpg"></link>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
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
        .container {
            width: 400px;
           margin: 0px auto;
            background-color: rgba(255, 255, 255, 0.2);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 1);
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: red;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 8vw;
        }
        input[type="submit"]:hover {
            background-color: black;
        }
        #username{
            font-weight: bold;
        }
        #password{
            font-weight: bold;
        }
        .back:hover {
            background-color: black;
        }
        .back {
            background-color: red;
            color: #fff;
            padding: 10px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20vh;
            margin-left: 39vw;
            font-weight: bold;
            font-size: 80%;
        }
    </style>
</head>
<body>
<a href="client_signin_front.php"><button class="back"> Back</button></a>
<div class="container">
    <h1>Trainer Sign In</h1>
    <form action="signin_back.php" method="POST">
        <?php if(isset($error_msg)) { ?>
            <p style="color: red;"><?php echo $error_msg; ?></p>
        <?php } ?>
        <input type="hidden" name="form_type" value="form2">
        <label for="username" id="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password" id="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="Sign In">
    </form>
</div>

</body>
</html>



