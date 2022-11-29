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
     * @var string
     */
    private $site_value =  'freeBlog/Test';
    /**
     * time format
     * @var string
     */
    private $timeFormat = 'r';
    /**
     * dev mode activation
     *
     * @var boolean
     */
    private $devMode = true;
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

    public function __construct()
    {

        /**
         * This application is not meant for production use.
         * Its only purpose is to
         * serve as a sample code to help you get acquainted with the Fat-Free
         * Framework. Padding this blog software with a lot of bells and whistles
         * would be nice, but it would also make the entire learning process
         * lengthier and more complicated.
         */
        // Use the Fat-Free Framework
        $this->main = Base::instance();
        $this->main->CACHE = true;

        /**
         * We don't have to "include" or "require" the class.php because
         * the framework automatically searches the path defined in AUTOLOAD.
         * If you want a different path for autoloaded classes, use:-
         *
         * F3::set('AUTOLOAD',);
         *
         * The framework can search multiple folders too:-
         *
         * F3::set('AUTOLOAD','folder1/,folder2/,main/sub/');
         *
         * If you define a static onload() method inside an autoloaded class, it is
         * also auto-executed the same way __construct() is called by an object
         * instantiating a dynamic class.
         * path is relative to base require
         * if you have troubles a simple trick is to include fff by a require_once in the index.php at the base of your server
         */
        $this->main->set('AUTOLOAD', $this->file_4_Class);

        /**
         * Setting the Fat-Free global variable DEBUG to zero will suppress stack
         * trace in HTML error page.
         * If you're still debugging your application,
         * you might want to give it a value from 1 to 3. Adjust to your desired
         * level of verbosity. The stack trace can help a lot in program testing.
         */
        if ($this->devMode) {
            $this->main->set('DEBUG', 3);
        } else {
            $this->main->set('DEBUG', 0);
        }

        // Path to our CAPTCHA font file
        $this->main->set('FONTS', $this->file_4_fonts);
        // Define application globals
        $this->main->set('site', $this->site_value);


        $this->main->set('timeformat', $this->timeFormat);
        // route caching
        $this->cache = new Cache();
        $this->cache->exists('route-cache', $this->routes);
        
        $this->setRoutes();
        // Execute application
        $this->main->run();

        // Now, isn't the above code simple and clean?
        // yes it is
    }

    /**
     * Definissez ici vos routes
     */
    private function setRoutes()
    {
        // notez la présence du devmode
        if (empty($this->routes) || $this->devMode) {
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
            $this->cache->set('route-cache', $this->main->get('ROUTES'), 86400);
        }
    }
}
$blog = new Main();