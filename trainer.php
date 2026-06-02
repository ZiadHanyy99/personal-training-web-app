<?php
require_once 'user.php';

class trainer extends user
{
    private $specialization;
    private $experience;
    private $bio;


    public
    function __construct($fname = null, $lname = null, $gender = null, $username = null, $password = null, $email = null, $date_of_birth = null, $phonenum = null, $specialization = null, $experience = null, $bio = null)
    {
        if($fname != null&&$lname != null&& $gender != null&& $username != null&& $password != null&& $email != null&& $date_of_birth != null&& $phonenum != null && $specialization != null && $experience != null&& $bio != null) {
            parent::__construct($fname, $lname, $gender, $username, $password, $email,$date_of_birth, $phonenum);
            $this->specialization = $specialization;
            $this->experience = $experience;
            $this->bio = $bio;
        }
    }

    function viewClients($id)
    {
        // MySQL connection setting
        $servername = "localhost";
        $usernamee = "root"; // MySQL username
        $passwordd = "YOUR_DB_PASSWORD"; // MySQL password
        $database = "personal_training"; // MySQL database name

// Create connection
        $conn = new mysqli($servername, $usernamee, $passwordd, $database,8000);


// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
       $result = $conn->query("SELECT * FROM CLIENT WHERE trainer_id = '$id'");
        $conn->close();
        return $result->fetch_all(1);
    }

    function viewTrainers()
    {
        // MySQL connection setting
        $servername = "localhost";
        $usernamee = "root"; // MySQL username
        $passwordd = "Ziad_salem99"; // MySQL password
        $database = "personal_training"; // MySQL database name

// Create connection
        $conn = new mysqli($servername, $usernamee, $passwordd, $database,8000);


// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $result = $conn->query("SELECT id,fname,lname FROM trainer");
        $conn->close();
        return $result->fetch_all(1);
    }




}

?>