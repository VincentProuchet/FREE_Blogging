<?php


class UserControler extends RestControler implements RestBase
{
    public function get(\Base $sfw, array $args = [])
    {
        $db=new DB\SQL(
            'mysql:host=localhost;port=3307;dbname=freeblog',
            'root',
            '1111'
            );
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

