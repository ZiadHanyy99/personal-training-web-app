<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Trainer Website</title>
    <link rel="icon" href="WhatsApp%20Image%202025-05-17%20at%2021.02.35_47633415.jpg"></link>
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
            padding: 20px;
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
        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 0 ;
        }
        .jumbotron {

            background-size: cover;
            color: #fff;
            text-align: center;
            padding: 100px 0;
            margin-bottom: 20px;
        }
        .jumbotron h1 {
            font-size: 48px;
            margin-bottom: 20px;
        }
        .jumbotron p {
            font-size: 20px;
        }
        .about-section {
            background-color: rgba(255, 255, 255, 0.5);
            padding: 40px 20px;
            text-align: center;
            border-radius: 5px;
        }
        .about-section h2 {
            margin-bottom: 20px;
        }
        .about-section p {
            font-size: 18px;
        }
        .services-section {
            background-color: rgba(255, 255, 255, 0.5);
            padding: 40px 20px;
            text-align: center;
            border-radius: 5px;
        }
        .services-section h2 {
            margin-bottom: 20px;
        }
        .service {
            margin-bottom: 30px;
        }
        .service img {
            width: 150px;
            border-radius: 50%;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>
<header>
    <h1>Personal Trainer Website</h1>
</header>
<nav>
    <a href="about_front.php">About</a>
    <a href="bundles_front.php">Services</a>
    <a href="contact_front.php">Contact</a>
    <a href="register.php">Register</a>
    <a href="client_signin_front.php">Sign In</a>
</nav>
<div class="container">
    <div class="jumbotron">
        <h1 name = "home_maintitle" id="home_maintitle" class="home_maintitle"> Welcome to Our Fitness World</h1>
        <p name = "home_maintitle_parg" id="home_maintitle_parg" class="home_maintitle_parg">Your journey to a healthier life starts here!</p>
    </div>
    <div class="about-section">
        <h2>About Us</h2>
        <p>We are dedicated to helping you achieve your fitness goals through personalized training programs and expert guidance. Our team of certified trainers is committed to your success.</p>
    </div>
    <div class="services-section">
        <h2>Our Services</h2>
        <div class="service">

            <h3>Personalized Training</h3>
            <p>Customized workout plans tailored to your fitness goals and needs.</p>
        </div><br>
        <div class="service">

            <h3>Nutritional Guidance</h3>
            <p>Expert advice on healthy eating habits and meal plan
            </p>
        </div>
    </div>
</div>
</body>
</html>