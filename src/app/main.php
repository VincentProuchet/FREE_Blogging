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
     * dossier des classes pour l'autoload
     * 'path/to/autoloaded/classes/'
     * ou
     * 'folder1/,folder2/,main/sub/'
     * est relatif à l'inclusion du framework fff
     * ici au dossier de l'index.php
     *
     * @var string
     */
    private $file_4_Class = 'app/controlers/;app/dao/';

    /**
     * dossier des fonts
     * utilisé par le captcha
     * toujours relif au require du framework
     *
     * @var string
     */
    private $file_4_fonts = '/fonts/';

    /**
     * site title
     *
     * @var string
     */
    private $site_value = 'freeBlog/Test';

    /**
     * time format
     *
     * @var string
     */
    private $timeFormat = 'r';

    /**
     * allez vous utiliser le cache pour vos variables
     * spoiler alert ! la réponse est oui
     *
     * @var boolean
     */
    private $useCache = true;

    /**
     * dev mode activation
     *
     * @var boolean
     */
    private $devMode = true;

    /**
     * Setting the Fat-Free global variable DEBUG to zero will suppress stack
     * trace in HTML error page.
     * If you're still debugging your application,
     * you might want to give it a value from 1 to 3. Adjust to your desired
     * level of verbosity. The stack trace can help a lot in program testing.
     *
     * @var integer
     */
    private $debugLevel = 3;

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
        $this->setBaseValues();
        $this->setDebug();
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
        $this->main->set('AUTOLOAD', $this->file_4_Class);
        // Path to our CAPTCHA font file
        $this->main->set('FONTS', $this->file_4_fonts);
        // Define application globals
        $this->main->set('site', $this->site_value);
        $this->main->set('timeformat', $this->timeFormat);
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
        if ($this->useCache) {
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
        // main route
        // should serve the frontend application
        // will do hello world for now
        $this->main->route('GET|POST|PUT|DELETE /', function () {
            echo 'hello world  this is a ' . $this->main->VERB;
        });
        $this->main->map('/test', 'MainControler');
        $this->main->route('GET /patate', 'MainControler->test');
        $this->main->route('GET|POST|PUT|DELETE /stupid', function () {
            echo 'this is a stupid test in ' . $this->main->VERB;
        });
    }
}
$blog = new Main();