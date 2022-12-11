<?php



/**
 * J'ai voulut organiser le code 
 * et pour moi organiser ça veux dire transformer en objet
 * 
 * @author Vincent
 *
 */
class Main extends Prefab
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
    private $configFiles = __DIR__ . '\\config\\';

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
    private $routes = [];

    /**
     *
     * @var Cache
     */
    private $cache;

    private $db;

    private $db_mapper;

    private $auth;

    /**
     * constructor
     */
    protected function __construct()
    {
        // Use the Fat-Free Framework
        $this->main = Base::instance();
        // vérifie l'existence du fichier
        if (! file_exists($this->configFiles . $this->configFileName)) {
            // ou tue l'application
            die($this->fileNotFound($this->configFileName, $this->configFiles));
        }
        // chargement fichier configuration
        $this->main->config($this->configFiles . $this->configFileName);
        // execute le caching
        $this->caching();
        // function setRoute contient les routes et kles maps de votre Back-end
        $this->setRoutes();
        // setting the database
        $this->setDatabase();
        // controle l'état de l'environement
        $this->setDebug();
//         echo '<pre>';
//         print_r($this->main);
//         echo '</pre>';
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
     */
    private function setDatabase()
    {
        $this->db = new DB\SQL('mysql:host=127.0.0.1;port=3307;dbname=freeblog;charset=utf8', 'root', '1111'
            ,[
                //PDO::ATTR_EMULATE_PREPARES => false,
                //PDO::ATTR_STRINGIFY_FETCHES => false,
                ]
            );
        
        $this->main->mset([
            "DB" => $this->db,
           
        ]);
    }

    /**
     * mettra le workframe en mode produciotn
     * si la variable ENVIRONNEMENT du fichier de configuration
     * a toutes autres valeur que : DEV
     */
    private function setDebug()
    {
//         if ($this->main->EVIRONNEMENT === "DEV") {
//             $this->main->DEVMODE = 1; 
//             $this->main->DEBUG = 3;
//         } else {
//             $this->main->DEVMODE = 0;
//             $this->main->DEBUG = 0;
//             $this->db->log(false);
//         }
    }

    /**
     * créer les differents caches pour les besoins du workframe
     */
    private function caching()
    {
        if ($this->main->CACHE) {
            // route caching
            $this->cache = Cache::instance();
            if (! $this->cache->exists('route-cache')) {
                // creation du cache des routes
                $this->cache->set('route-cache', $this->main->get('ROUTES'), 86400);
            }
        }
    }

    /**
     * controle l'existences des fichiers routes et maps
     * et configureras le workframe avec leurs contenus
     */
    private function setRoutes()
    {
        // notez la présence du devmode
        // qui force le recaching systématique
        // le but est d'évitez que vous ne vous retrouviez
        // avec des erreurs de routing juste parce que le cache n'aurait pas expiré
        if (!empty($this->cache->exists('route-cache'))&& $this->main->DEVMODE==0) {
           // return;
        }
        if (! file_exists($this->configFiles . $this->main->routesFile)) {
            die($this->fileNotFound($this->main->routesFile, $this->configFiles));
        }
        if (! file_exists($this->configFiles . $this->main->mapsFile)) {
            die($this->fileNotFound($this->main->mapsFile, $this->configFiles));
        }
        if (! file_exists($this->configFiles . $this->main->redirectFile)) {
            die($this->fileNotFound($this->main->redirectFile, $this->configFiles));
        }
        // main route
        $this->main->config($this->configFiles . $this->main->routesFile);
        $this->main->config($this->configFiles . $this->main->mapsFile);
        $this->main->config($this->configFiles . $this->main->redirectFile);
        // caching
        if ($this->main->CACHE) {
            // le caching n'est effectué que si il est configuré
            $this->cache->set('route-cache', $this->main->get('ROUTES'), 86400);
        }
    }

    /**
     * cette fonction met en forme un message d'erreur
     * utilisé lorsque qu'n fichier n'est pas trouvé
     * dans le dossier de configuration
     *
     * @param string $file
     * @param string $repository
     * @return string
     */
    private function fileNotFound($file, $repository)
    {
        return 'fichier ' . $file . ' manquant dans le dossier : ' . $repository;
    }

    /**
     *
     * @return mixed
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     *
     * @return mixed
     */
    public function getAuth()
    {
        return $this->auth;
    }
}
return Main::instance();