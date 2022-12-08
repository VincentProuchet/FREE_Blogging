<?php

/**
 *
 * @author Vincent
 *        
 */
interface UserDetails
{

    
    /**
     * @return string
     */
    public function getUserName();
    

    /**
     * @return string
     */
    public function getLogin();
    

    /**
     * @return string
     */
    public function getPassword();
   

    /**
     * @param string $userName
     */
    public function setUserName($userName);
   

    /**
     * @param string $login
     */
    public function setLogin($login);
   

    /**
     * @param string $password
     */
    public function setPassword($password);
    

}
