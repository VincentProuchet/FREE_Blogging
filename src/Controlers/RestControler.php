<?php



/**
 * Base de tous les controleur REST
 * 
 * 
 * @author Vincent
 *
 */
abstract class RestControler
{
    
    /**
     *
     * @var string
     */
    const CONTENT_TYPE = 'Content-Type:', JSON = 'application/json', HTML = 'text/html', CHARSET = 'charset=', UTF = 'UTF-8';

    private $header = [
        "Content-type:"=> RestControler::JSON.';'.RestControler::CHARSET.RestControler::UTF,        
        "Accept: " => RestControler::JSON,
        "Cache-Control:"=> 'no-cache',
        "Pragma:"=> "no-cache ",
        "Content :"=> ''
    ];
    protected $f3,$db;

    public function __construct()
    {
        $this->db = Base::instance()->DB;
        $this->setHeader();
    }

    public function sendJson($response = '')
    {
        echo $response;
    }
    
    public function setHeader(){
        foreach ($this->header as $key => $value) {
            header($key.$value, true);
        }
    }
}