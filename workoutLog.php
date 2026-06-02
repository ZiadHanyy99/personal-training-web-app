<?php

class workoutLog
{
    private $id;
    private static $nextid = 1;
    private $name;
    private $exercises_performed;
    private $weights;
    private $duration;

    public function __construct($name=null, $weights=null, $duration=null,$exercises_performed=null)
    {
        if($name!=null && $exercises_performed!=null && $weights!=null && $duration!=null){
            $this->id = self::$nextid;
            self::$nextid++;
            $this->name = $name;
            $this->weights = $weights;
            $this->duration = $duration;
            $this->exercises_performed = $exercises_performed;
            $this->saveDb();
        }
    }
    private function saveDb()
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
        $stmt1 = $conn->prepare("INSERT INTO workoutlog (name,weights,duration) VALUES (?,?,?)");
        $stmt2 = $conn->prepare("INSERT INTO workout_exercise (workout_id, exercise_id) VALUES (?,?)");

// Bind all the params to its locations
        $stmt1->bind_param("sss", $this->name,$this->weights,$this->duration);
        // Execute all the queries in the right order
        $stmt1->execute();
        $res = $conn->query("SELECT id FROM workoutlog WHERE name = '$this->name'");
        $this->setId(($res->fetch_row())[0]);
        foreach ($this->exercises_performed as $exercise){
            $stmt2->bind_param("ii",$this->id,$exercise[0]);
            $stmt2->execute();
        }

// Close connection
        $conn->close();

    }


    public function retrieveAllWorkoutLogs()
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

// Insert new user's info values to info table in the DB
        $result = $conn->query("SELECT * FROM workoutlog");

        // Close connection
        $conn->close();

        return $result->fetch_all(1);

    }
    public function retrieveSpacificeClientWorkoutLogs($id)
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

// Insert new user's info values to info table in the DB
        $result = $conn->query("SELECT  workoutlog.name,workoutlog.id,workoutlog.weights FROM workoutlog WHERE id IN (SELECT client_workoutlogs.workoutLog_id FROM client_workoutlogs WHERE client_workoutlogs.client_id = '$id')");

        // Close connection
        $conn->close();

        return $result->fetch_all(1);

    }




    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */

    /**
     * @return mixed
     */
    public function getExercisesPerformed()
    {
        return $this->exercises_performed;
    }

    /**
     * @param mixed $exercises_performed
     */
    public function setExercisesPerformed($exercises_performed)
    {
        $this->exercises_performed = $exercises_performed;
    }

    /**
     * @return mixed
     */
    public function getWeights()
    {
        return $this->weights;
    }

    /**
     * @param mixed $weights
     */
    public function setWeights($weights)
    {
        $this->weights = $weights;
    }

    /**
     * @return mixed
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param mixed $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }


}