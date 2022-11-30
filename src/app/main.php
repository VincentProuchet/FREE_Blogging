<?php

/**
 * J'ai voulut organiser le code 
 * et pour moi organiser ça veux dire transformer en objet
 * 
 * @author Vincent
 *
 */
class Main
{
    /**
     * fat-free framework instance
     *
     * @var Base
     */
    private $main = null;

    /**
     * routes de l'application
     *
     * @var array
     */
    private $routes;

    /**
     *
     * @var Cache
     */
    private $cache;

    /**
     * constructor
     */
    public function __construct()
    {
        // Use the Fat-Free Framework
        $this->main = Base::instance();
        if(!file_exists(__DIR__.'/../app/setup.ini')){
            die('missing config file');
        }
      
        $this->main->config(__DIR__.'/../app/setup.ini');
        
        
        
        //$this->setBaseValues();
        
        //$this->setDebug();
        $this->caching();
        // notez la présence du devmode
        // qui force le recaching systématique
        // le but est d'évitez que vous ne vous retrouviez
        // avec des erreurs de routing juste parce que le cache n'aurait pas expiré
        if (empty($this->routes) || $this->devMode || ! $this->useCache) {
            // function setRoute contient les routes de votre Back-end
            $this->setRoutes();
            if ($this->useCache) {
                $this->cache->set('route-cache', $this->main->get('ROUTES'), 86400);
            }
        }
        // Execute application
        $this->main->run();
    }

    /**
     */
    private function setBaseValues()
    {
        
        $this->main->CACHE = $this->useCache;
        // Define application globals
        $this->main->mset(
            array(
                'AUTOLOAD'=> $this->file_4_Class
                // Path to our CAPTCHA font file
                ,'FONTS'=> $this->file_4_fonts
                ,'site'=> $this->site_value
                ,'timeformat'=> $this->timeFormat
            )
            );
        
    }

    /**
     * setting devmode to false
     * remove all debug message
     */
    private function setDebug()
    {
        if ($this->devMode) {
            $this->main->set('DEBUG', $this->debugLevel);
        } else {
            $this->main->set('DEBUG', 0);
        }
    }

    /**
     * create the differents caches for all your needs
     */
    private function caching()
    {
        if ($this->main->CACHE) {
            // route caching
            $this->cache = new Cache();
            $this->cache->exists('route-cache', $this->routes);
        }
    }

    /**
     * Definissez ici vos routes
     */
    private function setRoutes()
    {
        if(!file_exists(__DIR__.'/../app/routes.ini')){
            die('missing routes file');
        }
        $this->main->config(__DIR__.'/../app/routes.ini');
        
        if(!file_exists(__DIR__.'/../app/maps.ini')){
            die('missing maps file');
        }
        $this->main->config(__DIR__.'/../app/maps.ini');
        
        // main route
        // should serve the frontend application
        // will do hello world for now
        $this->main->map('/test', 'MainControler');
        
    }
}
return new Main();