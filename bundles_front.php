<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="WhatsApp%20Image%202025-05-17%20at%2021.02.35_47633415.jpg"></link>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Trainer Website</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            /* Set background image */
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
        section {
            padding: 20px;
            margin: 20px auto;
            width: 80%;
            background-color: #f9f9f9;
            border-radius: 10px;
        }
        .bundle-selection {
            display: flex;
            margin: 0px auto;
            justify-content: space-between;
            background-color: rgba(255, 255, 255, 0.5); /* Adjust the alpha value (0.5) to control transparency */
        }

        .bundle-box {
            flex: 0 0 30%; /* Adjust the width of each box */
            background-color: rgba(255, 255, 255, 0.5);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            height: 700px; /* Adjust the height as needed */
        }
        .bundle-duration {
            font-size: 50px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .bundle-details {
            font-size: 18px;
        }
        .bundle-image {
            margin: 5px;
            border: 10px;
            border-radius: 10px;
        }
        .back:hover{
            background-color: black ;
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
    <h1>Personal Trainer Website</h1>
</header>
<a href="home_front.php"><button class="back"> Back</button></a>
<section class="bundle-selection">

    <div class="bundle-box">
        <div class="bundle-duration">1 Month</div>
        <div class="bundle-details">Customized workout and nutrition plan for 3 months.</div>
        <div class="bundle-details">Weekly check-ins and progress tracking.</div>
        <div class="bundle-image"><a href="register.php?bund=30"><img src="img_1.png" height="600" width="450"></a></div>
    </div>
    <div class="bundle-box">
        <div class="bundle-duration">2 Months</div>
        <div class="bundle-details">Customized workout and nutrition plan for 6 months.</div>
        <div class="bundle-details">Bi-weekly check-ins and progress tracking.</div>
        <div class="bundle-image"><a href="register.php?bund=60"><img src="img_1.png" height="600" width="450"></a></div>
    </div>
    <div class="bundle-box">
        <div class="bundle-duration">3 Months</div>
        <div class="bundle-details">Customized workout and nutrition plan for 1 year.</div>
        <div class="bundle-details">Monthly check-ins and progress tracking.</div>
        <div class="bundle-image"><a href="register.php?bund=90r"><img src="img_1.png" height="600" width="450"></a></div>
    </div>
</section>

</body>
</html>
