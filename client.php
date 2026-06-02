<?php
require_once 'user.php';

class client extends user
{
    private $weight;
    private $height;
    private $waist_cer;
    private $trainer_id;
    private $bundle;

    public function __construct($fname = null, $lname = null, $gender = null, $username = null, $password = null, $email = null, $date_of_birth = null, $phonenum = null, $weight = null, $height = null, $waist_cer = null, $trainer_id = null, $bundle = null)
    {
        if ($fname != null && $lname != null && $gender != null && $username != null && $password != null && $email != null && $date_of_birth != null && $phonenum != null && $weight != null && $height != null && $waist_cer != null && $trainer_id != null && $bundle != null) {
            parent::__construct($fname, $lname, $gender, $username, $password, $email, $date_of_birth, $phonenum);
            $this->weight = $weight;
            $this->height = $height;
            $this->waist_cer = $waist_cer;
            $this->trainer_id = $trainer_id;
            $this->bundle = $bundle;
            $this->register();
        }
    }

    public function register()
    {
        // MySQL connection settings
        $servername = "localhost";
        $usernamee = "root"; // MySQL username
        $passwordd = "YOUR_DB_PASSWORD"; // MySQL password
        $database = "personal_training"; // MySQL database name

        // Create connection
        $conn = new mysqli($servername, $usernamee, $passwordd, $database, 8000);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepared statement to insert client data into the database
        $stmt = $conn->prepare("INSERT INTO client (username, password, fname, lname, gender, email, date_of_birth, phonenum, weight, height, waist_cer, trainer_id, bundle) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Bind all parameters
        $stmt->bind_param("ssssssssdddis", $this->username, $this->password, $this->fname, $this->lname, $this->gender, $this->email, $this->date_of_birth, $this->phonenum, $this->weight, $this->height, $this->waist_cer, $this->trainer_id, $this->bundle);

        // Execute the query
        $stmt->execute();

        // Fetch the ID of the newly inserted client
        $res = $conn->query("SELECT id FROM client WHERE username = '$this->username'");
        $this->setId(($res->fetch_row())[0]);

        // Close the connection
        $conn->close();
    }

    function usernameValidate($username)
    {
        // MySQL connection settings
        $servername = "localhost";
        $usernamee = "root"; // MySQL username
        $passwordd = "Ziad_salem99"; // MySQL password
        $database = "personal_training"; // MySQL database name

        // Create connection
        $conn = new mysqli($servername, $usernamee, $passwordd, $database, 8000);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if the username already exists
        $stmt = $conn->query("SELECT * FROM client WHERE username = '$username'");
        if ($stmt->num_rows == 0) {
            return false;
        }
        return true;
    }

    function resetPassword($username, $newPassword, $confirmNewPassword)
    {
        // MySQL connection settings
        $servername = "localhost";
        $usernamee = "root"; // MySQL username
        $passwordd = "Ziad_salem99"; // MySQL password
        $database = "personal_training"; // MySQL database name

        // Create connection
        $conn = new mysqli($servername, $usernamee, $passwordd, $database, 8000);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if the new password matches the confirm new password
        if ($newPassword != $confirmNewPassword) {
            $error_msg = "Passwords do not match!";
            include 'pass_reset2.php'; // You can improve this to handle errors more gracefully
            exit();
        }

        // Hash the new password before updating it
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the password in the database
        $conn->query("UPDATE client SET password = '$hashedPassword' WHERE username = '$username'");

        // Close the connection
        $conn->close();
    }

    function calculateAge($birthdate)
    {
        // Convert birthdate to a Unix timestamp
        $birthdateTimestamp = strtotime($birthdate);

        // Get the current date as a Unix timestamp
        $currentDateTimestamp = time();

        // Calculate the difference in seconds between the current date and the birthdate
        $differenceInSeconds = $currentDateTimestamp - $birthdateTimestamp;

        // Convert the difference to years
        $age = floor($differenceInSeconds / (365.25 * 24 * 60 * 60));

        return $age;
    }
}
