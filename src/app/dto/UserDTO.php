<?php


class UserDTO
{
    /**
     *
     * @var integer
     */
    public $id = 0;
    
    public $name = "";
    
    public $firstName = "";
    
    public $dateOfBirth = "1900/01/01";
    
    public $email = "example@example.fr";
    
    public function __construct($user){
        
        if(get_class($user)== get_class(new User())){
           $this->id=  $user->getId();
           $this->name = $user->getName();
           $this->firstName = $user->getFirstName();
           $this->dateOfBirth = $user->getDateOfBirth();
           $this->email = $user->getEmail();
        }
    }
}

