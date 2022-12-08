<?php


class UserControler extends RestControler implements RestBase
{
    public function __construct(){
        User::setup();
    }
    
    public function get(\Base $sfw, array $args = [])
    {
        $response = json_encode(UserDTO::makePublic(new User()));
        
        $this->sendJson($response);
    }
    
    public function post(\Base $sfw, array $args = [])
    {
        $response = json_encode(UserDTO::make(new User()));
        
        $this->sendJson($response);
    }
    
    public function put(\Base $sfw, array $args = [])
    {
        $response = json_encode(UserDTO::make(new User()));
        
        $this->sendJson($response);
        
    }
    public function patch(Base $sfw, array $args = [])
    {
        $response = json_encode(UserDTO::make(new User()));
        
        $this->sendJson($response);
    }
    
    public function delete(\Base $sfw, array $args = [])
    {
        $response = json_encode(UserDTO::make(new User()));
        
        $this->sendJson($response);
    }
}

