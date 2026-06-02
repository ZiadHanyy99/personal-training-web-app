<?php



class user
{
    protected $id;
    private static $nextid = 1;
    protected $fname;
    protected $lname;
    protected $gender;
    protected $username;
    protected $password;
    protected $email;
    protected $role;
    protected $date_of_birth;
    protected $phonenum;

    public function __construct($fname, $lname, $gender, $username, $password, $email, $date_of_birth, $phonenum)
    {
        $this->id = self::$nextid;
        self::$nextid++;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->gender = $gender;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->date_of_birth = $date_of_birth;
        $this->phonenum = $phonenum;
    }


    public function getPhonenum()
    {
        return $this->phonenum;
    }

    public function setPhonenum($phonenum)
    {
        $this->phonenum = $phonenum;
    }


    public function getId()
    {
        return $this->id;
    }


    public function setId($id)
    {
        $this->id = $id;
    }


    public function getFname()
    {
        return $this->fname;
    }


    public function setFname($fname)
    {
        $this->fname = $fname;
    }

    /**
     * @return mixed
     */
    public function getLname()
    {
        return $this->lname;
    }

    /**
     * @param mixed $lname
     */
    public function setLname($lname)
    {
        $this->lname = $lname;
    }

    /**
     * @return mixed
     */
    public function getGender()
    {
        return $this->gender;
    }

    /**
     * @param mixed $gender
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role)
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getDateOfBirth()
    {
        return $this->date_of_birth;
    }

    /**
     * @param mixed $date_of_birth
     */
    public function setDateOfBirth($date_of_birth)
    {
        $this->date_of_birth = $date_of_birth;
    }


}