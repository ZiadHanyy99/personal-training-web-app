<?php

class exercise
{
    private $id;
    private static $nextid = 1;
    private $name;
    private $description;
    private $muscle_targeted;
    private $sets;
    private $repetitions;


    public function __construct($name = null, $description= null, $muscle_targeted= null, $sets= null, $repetitions= null)
    {
        if($name!= null&& $description!= null&& $muscle_targeted!= null&& $sets!= null&& $repetitions!= null){
        $this->id = self::$nextid;
        self::$nextid++;
        $this->name = $name;
        $this->description = $description;
        $this->muscle_targeted = $muscle_targeted;
        $this->sets = $sets;
        $this->repetitions = $repetitions;
        $this->savetoDB();
    }
}

    private function savetoDB()
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

// Insert new user's info values to info table in the DB
        $stmt = $conn->prepare("INSERT INTO exercise (name,description,muscle_targeted,sets,repetitions) VALUES (?,?,?,?,?)");

// Bind all the params to its locations
        $stmt->bind_param("sssss", $this->name, $this->description, $this->muscle_targeted, $this->sets, $this->repetitions);

// Execute all the queries in the right order
        $stmt->execute();

        $res = $conn->query("SELECT id FROM exercise WHERE name = '$this->name'");
        $this->setId(($res->fetch_row())[0]);


// Close connection
        $conn->close();
    }

    public function retrieveAllExercises()
    {
        // MySQL connection setting
        $servername = "localhost";
        $usernamee = "root"; // MySQL username
        $passwordd = "18SYDasd$"; // MySQL password
        $database = "personal_training"; // MySQL database name

// Create connection
        $conn = new mysqli($servername, $usernamee, $passwordd, $database);

// Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

// Insert new user's info values to info table in the DB
        $result = $conn->query("SELECT * FROM exercise");

        // Close connection
        $conn->close();

        return $result->fetch_all(1);

    }


    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getMuscleTargeted()
    {
        return $this->muscle_targeted;
    }

    public function setMuscleTargeted($muscle_targeted)
    {
        $this->muscle_targeted = $muscle_targeted;
    }

    public function getSets()
    {
        return $this->sets;
    }

    public function setSets($sets)
    {
        $this->sets = $sets;
    }

    public function getRepetitions()
    {
        return $this->repetitions;
    }

    public function setRepetitions($repetitions)
    {
        $this->repetitions = $repetitions;
    }


}

?>