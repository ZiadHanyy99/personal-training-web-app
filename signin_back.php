<?php
session_start();
// MySQL connection setting
$servername = "127.0.0.1";
$usernamee = "root"; // MySQL username
$passwordd = "YOUR_DB_PASSWORD"; // MySQL password
$database = "personal_training"; // MySQL database name

// Create connection
$conn = new mysqli($servername, $usernamee, $passwordd, $database,8000);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if($_POST['form_type'] == "form2"){
    $dbname = "trainer";
    $filepath = "trainer_dashboard.php";
    $filename = "trainer_signin_front.php";
}else{
    $dbname = "client";
    $filepath = "client_dashboard.php";
    $filename = "client_signin_front.php";
}

$x=array("dbname"=>"$dbname","filepath"=>"$filepath","filename"=>"$filename");

// Get the parameters
 $username = strtolower(trim($_POST["username"]));
 $pass = strtolower(trim($_POST["password"]));

// Create a prep stmt to use it to get the username and pass form the DB
    $stmt = $conn->prepare("SELECT * FROM $x[dbname] WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $pass);
    $stmt->execute();
    $result = $stmt->get_result();

// Check if the query return with a record
    if ($result->num_rows == 1){
//        unset($_SESSION["form_type"]);
        $row = $result->fetch_assoc();
        foreach ($row as $key => $value){
            $_SESSION[$key] = $value;
        }
        header("Location: $x[filepath]");
        exit();
    } else {

// Create a prep stmt to use it to get the username form the DB
        $stmt = $conn->prepare("SELECT * FROM client WHERE username = ? ");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

// Check if the query return with a record
        if ($result->num_rows == 1) {
            $error_msg = "Invalid password. Please try again.";
            include "$x[filename]";
            exit();

        } else {

            $error_msg = "Invalid username. Please try again.";
            include "$x[filename]";
            exit();
        }

}

    $conn->close();


?>





