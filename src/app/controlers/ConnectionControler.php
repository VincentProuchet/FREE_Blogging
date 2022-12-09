<?php

class ConnectionControler extends \RestControler
{

    private $db;
    private $db_mapper;
    private $auth;
    private $credentialTable = 'users';

    public function __construct()
    {
        $this->db = Base::instance()->get('DB');
        $this->db_mapper = new \DB\SQL\Mapper($this->db, $this->credentialTable);
        $this->auth = new Auth($this->db_mapper, [
            'id' => 'email',
            'pw' => 'password'
        ]);
    }

    public function login(Base $sfw, array $args = [])
    {
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        if ($this->auth->login($username,md5($password))) {
           $this->sendJson(json_encode(new UserDTO()));
            // login
        } else {        
            // reject
            echo 'connection rejected <br> password '.$password.'  = '.md5($password);
        }
    }

    public function logout(Base $sfw, array $args = [])
    {
        echo "logged out";
    }
}

