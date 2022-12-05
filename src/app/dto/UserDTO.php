<?php


class UserDTO 
{
    /**
     *
     * @var integer
     */
    public $id = 0;
    /**
     * 
     * @var string
     */
    public $name = "";
    /**
     * 
     * @var string
     */
    public $firstName = "";
    /**
     * 
     * @var string
     */
    public $dateOfBirth = "";
    /**
     * 
     * @var string
     */
    public $email = "";
    /**
     * 
     * @var string
     */
    public $username = "";
    /**
     * 
     * @var string
     */
    public $password = "";
    /**
     * 
     * @var string
     */
    public $repassword = "";
   /**
    * créer une instance du DTO depuis un User
    * @param User $user
    * @return UserDTO
    */
    public static function make(User $user){
        
        $new = new UserDTO();
        $new->id=  $user->getId();
        $new->name = $user->getName();
        $new->firstName = $user->getFirstName();
        $new->dateOfBirth = $user->getDateOfBirth();
        $new->email = $user->getEmail();
        return $new;        
    }
}

