<?php
if(isset($_POST['submit'])){

    require_once 'meal.php';

    // Make a new object from meal class with the sent parameters
    $new_meal = new meal($_POST["name"], $_POST["description"]
        , $_POST["type"], $_POST["calories"], $_POST["protein"]
        , $_POST["carbs"], $_POST["fats"]);
    $message = "Meal added successfully";
    include 'trainer_dashboard.php';
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="WhatsApp%20Image%202025-05-17%20at%2021.02.35_47633415.jpg"></link>

    <title>Food Entry Form</title>
    <style>
        /* Reset some default styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background-image: url('desktop-wallpaper-best-5-gym-on-hip-gym-boys.jpg'); /* Replace 'background.jpg' with the path to your image */
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
        }

        /* Style the form fieldset */
        form fieldset {
            width: 400px;
            margin: 100px auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        /* Style the heading */
        h1 {
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }

        /* Style the table and table elements */
        form table {
            width: 100%;
            text-align: left;
        }

        form table tr {
            margin-bottom: 10px;
        }

        form table td {
            padding: 8px 0;
        }

        form label {
            font-weight: bold;
            display: block;
        }

        form input[type="text"],
        form select {
            width: 100%;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        form input[type="submit"] {
            display: block;
            width: 100px;
            padding: 10px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin: 20px auto 0;
        }

        form input[type="submit"]:hover {
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
</head>
<body>
<a href="trainer_dashboard.php"><button class="back"> Back</button></a>
<form action="" method="post">
    <fieldset>
        <h1>Meal Entry Form</h1>
        <table>
            <tr>
                <td>
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="description">Description:</label>
                    <input type="text" id="description" name="description" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="calories">Calories:</label>
                    <input type="text" id="calories" name="calories" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="protein">Protein:</label>
                    <input type="text" id="protein" name="protein" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="carbs">Carbs:</label>
                    <input type="text" id="carbs" name="carbs" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="fats">Fats:</label>
                    <input type="text" id="fats" name="fats" required>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="type">Type:</label>
                    <select id="type" name="type">
                        <option value="Breakfast">Breakfast</option>
                        <option value="Lunch">Lunch</option>
                        <option value="Dinner">Dinner</option>
                        <option value="Snack">Snack</option>
                    </select>
                </td>
            </tr>
        </table>
        <input type="submit" value="Submit" name="submit">
    </fieldset>
</form>

</body>
</html>
