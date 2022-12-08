<?php

/**
 * 
 * @author Vincent
 *
 */
class MainControler extends RestControler
{
    private $extension = ".htm";
    private $home ='acceuil';
    private $phpinfo = 'phpinfo';

    /**
     * affiche les information sur le service du site
     * @param \Base $sfw
     * @param array $args
     */
    public function test(\Base $sfw, array $args = [])
    {
             
     echo \Template::instance()->render($this->phpinfo.$this->extension);
        phpinfo();
    }
/**
 * envoie la page d'acceuil du site
 * servira à l'envoie de la version compiler de l'application angular
 * @param Base $sfw
 * @param array $args
 */
    public function home(Base $sfw, array $args = [])
    {        
        echo \Template::instance()->render($this->home.$this->extension);
    }
}
