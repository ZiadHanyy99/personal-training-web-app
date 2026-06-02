<?php


class nutritionPlan
{
    private $id;
    private static $nextid = 1;
    private $description;
    private $meal_plan;
    private $client_id;


    public function __construct($description = null, $meal_plan=null,$client_id=null)
    {
        if ($description != null && $meal_plan != null && $client_id != null) {
            $this->id = self::$nextid;
            self::$nextid++;
            $this->description = $description;
            $this->meal_plan = $meal_plan;
            $this->client_id = $client_id;
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

// Insert new nutrition plan info into nutritionplan table
        $stmt = $conn->prepare("INSERT INTO nutritionplan (id, description, client_id) VALUES (?, ?, ?)");

// Bind params for nutritionplan table
        $stmt->bind_param("iss", $this->id, $this->description, $this->client_id);

// Execute the nutritionplan query
        $stmt->execute();

// Prepare statement for inserting into nutritionplan_meal table
        $stmt2 = $conn->prepare("INSERT INTO nutritionplan_meal (nutritionPlan_id, meal_id) VALUES (?, ?)");

// Iterate through meal plan and insert each meal into nutritionplan_meal table
        foreach ($this->meal_plan as $meal) {
            $stmt2->bind_param("ii", $this->id, $meal[0]);
            $stmt2->execute();
        }


// Close connection
        $conn->close();

    }
    public function retrieveSpacificeClientMeals($id)
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
        $result = $conn->query("SELECT personal_training.meal.id, name, description, type, calories, protein, carbs, fats
FROM meal WHERE id IN
(SELECT personal_training.nutritionplan_meal.meal_id
FROM nutritionplan_meal
WHERE nutritionPlan_id IN
(SELECT personal_training.nutritionplan.id
FROM nutritionplan
WHERE client_id = '$id'))");

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



    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getMealPlan()
    {
        return $this->meal_plan;
    }

    public function setMealPlan($meal_plan)
    {
        $this->meal_plan = $meal_plan;
    }

}

?>