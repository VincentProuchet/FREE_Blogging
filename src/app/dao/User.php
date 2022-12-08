<?php

/**
 *
 * @author Vincent
 *        
 */
class User extends \DB\Cortex implements UserDetails
{
    protected
        $db = '';

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

    private static $dictionnary = array(
        'id',
        'name',
        'firstname',
        'dateofbirth',
        'email'
    );

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
     * @param array $var
     *            initialise automatiquement les propriètées
     *            de l'object en appellant chaque setter pour chaque
     *            clé reconnue dans le tableau
     *            les clés sont insenssibles à la casse
     */
    public function _set($var = [])
    {
        if (is_array($var)) {
            $var = array_change_key_case($var, CASE_LOWER);
            foreach ($var as $i) {
                switch ($i) {
                    case 'id':
                        $this->setId($i);
                        break;
                    case 'name':
                        $this->setName($i);
                        break;
                    case 'firstname':
                        $this->setFirstName($i);
                        break;
                    case 'dateOfBirth':
                        $this->setDateOfBirth($i);
                        break;
                    case 'email':
                        $this->setEmail($i);
                        break;
                    default:
                        '';
                }
            }
        }
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