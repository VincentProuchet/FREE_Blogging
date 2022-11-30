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
     * nom du fichier de configuration du workframe
     *
     * @var string
     */
    private $configFileName = 'config.ini';

    /**
     * chemin des fichiers de configurations
     *
     * @var string
     */
    private $configFiles = __DIR__ . '/../app/config/';

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
     * valeur dépendante de la variable ENVIRONNEMENT 
     * du fichier de configuration 
     * @var boolean
     */
    private $devmode = false;

    /**
     * constructor
     */
    public function __construct()
    {
        // Use the Fat-Free Framework
        $this->main = Base::instance();
        // vérifie l'existence du fichier
        if (! file_exists($this->configFiles . $this->configFileName)) {
            // ou tue l'application
            die('fichier '.$this->configFileName.' manquant dans le dossier : '.$this->configFiles );
        }
        // chargement fichier configuration
        $this->main->config($this->configFiles . $this->configFileName);
        // controle l'état de l'environement
        $this->setDebug();
        // execute le caching
        $this->caching();
        // notez la présence du devmode
        // qui force le recaching systématique
        // le but est d'évitez que vous ne vous retrouviez
        // avec des erreurs de routing juste parce que le cache n'aurait pas expiré
        if (empty($this->routes) || $this->devMode) {
            // function setRoute contient les routes et kles maps de votre Back-end
            $this->setRoutes();
            if (! $this->main->CACHE) {
                // le caching n'est effectué que si il est configuré
                $this->cache->set('route-cache', $this->main->get('ROUTES'), 86400);
            }
        }
        // Execute application
        $this->main->run();
    }

    /**
     * set workframe base values
     * laissé pour références
     *
     * @deprecated
     */
    private function setBaseValues()
    {
        $this->main->CACHE = $this->useCache;
        // Define application globals
        $this->main->mset(array(
            'AUTOLOAD' => $this->file_4_Class,
            // Path to our CAPTCHA font file
            'FONTS' => $this->file_4_fonts,
            'site' => $this->site_value,
            'timeformat' => $this->timeFormat
        ));
    }

    /**
     * mettra le workframe en mode produciotn
     * si la variable ENVIRONNEMENT du fichier de configuration
     * a toutes autres valeur que : DEV
     */
    private function setDebug()
    {
        if ($this->main->ENVIRONNEMENT !== 'DEV') {
            $this->devmode = false;
            $this->main->set('DEBUG', 0);
        } else {
            $this->devmode = true;
        }
    }

    /**
     * créer les differents caches pour les besoins du workframe
     */
    private function caching()
    {
        if ($this->main->CACHE) {
            // route caching
            $this->cache = new Cache();
            // creation du cache des routes
            $this->cache->exists('route-cache', $this->routes);
        }
    }

    /**
     * controle l'existences des fichiers routes et maps
     * et configureras le workframe avec leurs contenus
     */
    private function setRoutes()
    {
        if (! file_exists($this->configFiles . $this->main->routesFile)) {
            die('fichier '.$this->main->routesFile.' manquant dans le dossier : '.$this->configFiles );
        }
        if (! file_exists($this->configFiles . $this->main->mapsFile)) {
            die('fichier '.$this->main->mapsFile.' manquant dans le dossier : '.$this->configFiles );
        }
        // main route
        $this->main->config($this->configFiles . $this->main->routesFile);
        $this->main->config($this->configFiles . $this->main->mapsFile);
    }
}
return new Main();