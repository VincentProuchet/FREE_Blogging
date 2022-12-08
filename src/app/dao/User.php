<?php
use DB\SQL\Schema;

/**
 *
 * @author Vincent
 *        
 */
class User extends \DB\Cortex implements UserDetails
{

    protected $db = 'DB', $table = 'users',$primary = 'id', $fluid = true, $fieldConf = [
        
        'name' => [
            'type' => \DB\SQL\Schema::DT_VARCHAR128,
            'nullable' => true,
            'default' => "",
            'index' => false,
            'unique' => false
        ],
        'firstName' => [
            'type' => \DB\SQL\Schema::DT_VARCHAR128,
            'nullable' => true,
            'default' => "",
            'index' => false,
            'unique' => false
        ],
        'dateOfBirth' => [
            'type' => \DB\SQL\Schema::DT_DATETIME,
            'nullable' => true,
            'default' => Schema::DF_CURRENT_TIMESTAMP,
            'index' => false,
            'unique' => false
        ],
        'email' => [
            'type' => \DB\SQL\Schema::DT_VARCHAR256,
            'nullable' => false,
            'default' => "default@free.fr",
            'index' => false,
            'unique' => true
        ],
        'userName' => [
            'type' => \DB\SQL\Schema::DT_VARCHAR256,
            'nullable' => true,
            'default' => "",
            'index' => false,
            'unique' => false
        ],
        'login' => [
            'type' => \DB\SQL\Schema::DT_VARCHAR256,
            'nullable' => false,
            'default' => "",
            'index' => false,
            'unique' => false
        ],
        'password' => [
            'type' => \DB\SQL\Schema::DT_VARCHAR512,
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
    private $id = 0;

    /**
     *
     * @var string
     */
    private $name = "Itsumi";

    /**
     *
     * @var string
     */
    private $firstName = "Mario";

    /**
     *
     * @var DateTime
     */
    private $dateOfBirth = null;

    /**
     *
     * @var string
     */
    private $email = "example@example.fr";

    /**
     * dictionnaire pour l'initialisation
     *
     * @var array
     */
    /**
     *
     * @var string
     */
    private $userName = "Mario";

    /**
     *
     * @var string
     */
    private $login = "Asheecret";

    /**
     *
     * @var string
     */
    private $password = null;
    /**
     * 
     * @var array
     */
    private $articles;

    public function __construct()
    {
        $this->setDateOfBirth("2004-10-02");
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
     * @param string $var
     */
    public function setDateOfBirth($var = "")
    {
        $this->dateOfBirth = DateTime::createFromFormat("Y-m-d", $var);
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