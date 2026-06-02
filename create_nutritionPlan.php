<?php
require_once "nutritionPlan.php";
session_start();


// Initialize $i with 0 if it's not set in the session
if (!isset($_SESSION['i'])) {
    $_SESSION['i'] = 0;
    $_SESSION["allmeals"] = array();
}

// Check if the form is submitted to add a meal
if(isset($_POST['add_meal'])) {
    // Store the selected option in the session with the key 'op' followed by the current value of $i
   $currmeal = explode(',', $_POST["option"]);
    $_SESSION["op".$_SESSION['i']] = $currmeal;
    $_SESSION["allmeals"][] = $currmeal;


    // Increment $i
    $_SESSION['i']++;
}

// Check if the form is submitted to submit the plan
if(isset($_POST['submit'])) {
  new nutritionPlan($_POST['description'],$_SESSION["allmeals"],($_SESSION["arr".$_GET["id"]])['id']);

    for ($j = 0; $j < $_SESSION['i']; $j++) {
        unset($_SESSION["op".$j]);
    }
    $_SESSION['i'] = 0;
    $_SESSION["allmeals"] = array();
    header("Location: trainer_client_profile.php?id=$_GET[id]");
   exit();


}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" href="WhatsApp%20Image%202025-05-17%20at%2021.02.35_47633415.jpg"></link>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Nutrition Plan</title>
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
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .btn {
            padding: 10px;
            background-color: red;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            margin-right: 10px;
        }
        .btn:hover {
            background-color: black;
        }
        .meal-box {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-top: 20px;
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
me<div class="container">
    <h2>Create Nutrition Plan</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="meal_plan">Meal Plan</label>
            <select id="meal_plan" name="option">
                <?php
                require_once 'meal.php';
                $meals = ((new meal())->retrieveAllMeals());
                foreach ($meals as $meal){

                    // "implode" convert the array to one string
                    echo "<option value=".implode(",",$meal).";>$meal[name]</option>";
                }?>
             </select>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4"></textarea>
        </div>
        <button type="submit" class="btn" name="add_meal">Add Meal</button>
        <button type="submit" class="btn" name="submit">Submit Plan</button>
    </form>

    <div class="meal-box">
        <h3>Selected Meals</h3>
        <?php
        if(isset($_POST['add_meal'])) {

            // Output the selected options stored in the session
            for ($j = 0; $j < $_SESSION['i']; $j++) {
                echo "<p>" . ($_SESSION["op" . $j][1]) . "</p>";
            }
        }
        ?>
    </div>
</div>
</body>
</html>
