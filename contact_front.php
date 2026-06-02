<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="WhatsApp%20Image%202025-05-17%20at%2021.02.35_47633415.jpg"></link>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
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
            padding: 10px 0;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: 0px auto;
        }
        form {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="email"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: red;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;

            width: 100%;
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
            margin-top: 70px;
            margin-left: 10.3vw;
            font-weight: bold;
            font-size: 100%;
        }
    </style>
</head>
<body>

<header>
    <h1>Contact Us</h1>
</header>
<a href="home_front.php"><button class="back"> Back</button></a>
<div class="container">
    <form action="#" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" >

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" >

        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" >

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="5" ></textarea>

        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
