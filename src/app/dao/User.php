<?php




use DB\SQL\Schema;



/**
 *
 * @author Vincent
 *        
 */
class User extends DAO implements UserDetails
{

    protected $table = 'user' , $fieldConf = [
        
        'name' => [
            'type' => Schema::DT_VARCHAR128,
            'nullable' => true,
            'default' => "",
            'index' => false,
            'unique' => false
        ],
        'firstName' => [
            'type' =>  Schema::DT_VARCHAR128,
            'nullable' => true,
            'default' => "",
            'index' => false,
            'unique' => false
        ],
        'dateOfBirth' => [
            'type' =>  Schema::DT_DATETIME,
            'nullable' => true,
            'default' => Schema::DF_CURRENT_TIMESTAMP,
            'index' => false,
            'unique' => false
        ],
        'email' => [
            'type' =>  Schema::DT_VARCHAR256,
            'nullable' => false,
            'default' => "default@free.fr",
            'index' => false,
            'unique' => true
        ],
        'userName' => [
            'type' =>  Schema::DT_VARCHAR256,
            'nullable' => true,
            'default' => "",
            'index' => false,
            'unique' => false
        ],
        'login' => [
            'type' =>  Schema::DT_VARCHAR256,
            'nullable' => false,
            'default' => "",
            'index' => false,
            'unique' => false
        ],
        'password' => [
            'type' =>  Schema::DT_VARCHAR512,
            'nullable' => false,
            'default' => "",
            'index' => false,
            'unique' => false
        ],
        'articles' => [
            'has-many'=>[Article::class,'author']
        ],
    ];

    /**
     *
     * @var integer
     */
    public $id = 0;

    /**
     *
     * @var string
     */
    public $name = "Itsumi";

    /**
     *
     * @var string
     */
    public $firstName = "Mario";

    /**
     *
     * @var DateTime
     */
    public $dateOfBirth ;

    /**
     *
     * @var string
     */
    public $email = "example@example.fr";

    /**
     * dictionnaire pour l'initialisation
     *
     * @var array
     */
    /**
     *
     * @var string
     */
    public $userName = "Mario";

    /**
     *
     * @var string
     */
    public $login = "Asheecret";

    /**
     *
     * @var string
     */
    public $password = "";
    /**
     * 
     * @var array
     */
    public $articles;

    public function __construct()
    {
        parent::__construct();
        $this->setDateOfBirth(DateTime::createFromFormat("Y-m-d", "2000-10-02"));
        
    }

    /**
     *
     * @param UserDTO $var
     * @return User
     */
    public static function make(UserDTO $var)
    {
        $new = new User();
        $new->setId($var->id);
        $new->setName($var->name);
        $new->setFirstName($var->firstName);

        $new->setEmail($var->email);
        $new->setDateOfBirth($var->dateOfBirth);
        return $new;
    }

    /**
     *
     * @param number $var
     */
    public function setId($var = 0)
    {
        if ($this->id == 0) {
            $this->id = $var;
        }
    }

    /**
     *
     * @param string $var
     */
    public function setName($var = "")
    {
        $this->name = $var;
    }

    /**
     *
     * @param string $var
     */
    public function setFirstName($var = "")
    {
        $this->firstName = $var;
    }

    /**
     * setter
     * date de naissance
     * à partir d'une date au format YYYY-mm-dd en numérique
     *
     * @param DateTime $var
     */
    public function setDateOfBirth($var)
    {
        $this->dateOfBirth = $var;
    }

    /**
     *
     * @param string $var
     */
    public function setEmail($var = "")
    {
        $this->email = $var;
    }

    /**
     *
     * @return number
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     *
     * @return DateTime
     */
    public function getDateOfBirth()
    {
        return $this->dateOfBirth;
    }

    /**
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPassword()
    {
        return $this->password;
    }
}

?>