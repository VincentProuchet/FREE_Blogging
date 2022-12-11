<?php


/**
 * Classe de transfert de données
 * pour les données de l'utilisateur connecté
 * @author Vincent
 *
 */
class UserDTO
{

    /**
     * id dans la base de données
     * @var integer
     */
    public $id = 0;

    /**
     * nom de famille
     * @var string
     */
    public $name = "";

    /**
     * prénom
     * @var string
     */
    public $firstName = "";

    /**
     * date de naissance
     * @var DateTime
     */
    public $dateOfBirth ;

    /**
     * email
     * @var string
     */
    public $email = "";

    /**
     * nom d'utilisateur
     * @var string
     */
    public $username = "";

    /**
     * nouvel identifiant  de connexion  
     * @var string
     */
    public $login = "";

    /**
     * mot de passe actuel
     * ne doit être utilisé que 
     * lors d'un changement de mot de passe 
     * @var string
     */
    public $password ="";
    /**
     * nouveau mot de passe
     * @var string
     */
    public $newPassword = "";

    /**
     * confirmation du nouveau mot de passe
     * @var string
     */
    public $rePassword = "";

    /**
     * créer une instance du DTO depuis un User
     *
     * @param User $user
     * @return UserDTO
     */
    public static function make(User $user)
    {
        $new = new UserDTO();
        $new->id = $user->getId();
        $new->name = $user->getName();
        $new->firstName = $user->getFirstName();
        $new->dateOfBirth = $user->getDateOfBirth();
        $new->email = $user->getEmail();
        $new->username = $user->getUserName();
        
        return $new;
    }
    /**
     * Instance des UserDTO 
     * contenant moins de données personnelle que l'originale
     * faite pour limiter les données personnelles transmisent aux tiers
     * @param User $user
     */
    public static function makePublic(User $user){
        $new = new UserDTO();
        $new->id = $user->getId();
        $new->username = $user->getUserName();
        return $new;
    }
}

