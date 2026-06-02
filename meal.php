<?php

class meal
{
    private $id;
    private static $nextid = 1;
    private $name;
    private $description;
    private $type;
    private $calories;
    private $protein;
    private $carbs;
    private $fats;


    public function __construct($name = null, $description= null, $type= null, $calories= null, $protein= null, $carbs= null, $fats= null)
    {
     if($name != null&& $description!= null&& $type!= null&& $calories!= null&& $protein!= null&& $carbs!= null&& $fats!= null){
        $this->id = self::$nextid;
        self::$nextid++;
        $this->name = $name;
        $this->description = $description;
        $this->type = $type;
        $this->calories = $calories;
        $this->protein = $protein;
        $this->carbs = $carbs;
        $this->fats = $fats;
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
        $stmt = $conn->prepare("INSERT INTO meal (name,description,type,calories,protein,carbs,fats) VALUES (?,?,?,?,?,?,?)");

// Bind all the params to its locations
        $stmt->bind_param("sssssss", $this->name, $this->description, $this->type, $this->calories, $this->protein, $this->carbs, $this->fats);

// Execute all the queries in the right order
        $stmt->execute();
        $res = $conn->query("SELECT id FROM meal WHERE name = '$this->name'");
        $this->setId(($res->fetch_row())[0]);

// Close connection
        $conn->close();
    }

    public function retrieveAllMeals()
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
        $result = $conn->query("SELECT * FROM meal");

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

    public static function getNextid()
    {
        return self::$nextid;
    }

    public static function setNextid($nextid)
    {
        self::$nextid = $nextid;
    }

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
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getCalories()
    {
        return $this->calories;
    }

    /**
     * @param mixed $calories
     */
    public function setCalories($calories)
    {
        $this->calories = $calories;
    }

    /**
     * @return mixed
     */
    public function getProtein()
    {
        return $this->protein;
    }

    /**
     * @param mixed $protein
     */
    public function setProtein($protein)
    {
        $this->protein = $protein;
    }

    /**
     * @return mixed
     */
    public function getCarbs()
    {
        return $this->carbs;
    }

    /**
     * @param mixed $carbs
     */
    public function setCarbs($carbs)
    {
        $this->carbs = $carbs;
    }

    /**
     * @return mixed
     */
    public function getFats()
    {
        return $this->fats;
    }

    /**
     * @param mixed $fats
     */
    public function setFats($fats)
    {
        $this->fats = $fats;
    }


}