<?php

class ArticleControler extends \RestControler implements  \RestBase
{
    public function __construct(){
        User::setup();
        Article::setup();        
    }
    public function patch(Base $sfw, array $args = [])
    {}

    public function post(Base $sfw, array $args = [])
    {}

    public function get(Base $sfw, array $args = [])
    {
        $this->sendJson(json_encode(new ArticleDTO()));
    }

    public function delete(Base $sfw, array $args = [])
    {}

    public function put(Base $sfw, array $args = [])
    {}

    
}

