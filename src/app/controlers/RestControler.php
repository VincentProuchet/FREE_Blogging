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

    private $app_Json_Header = array(
        "Content-type: 'application/json;charset=UTF-8'",
        "Accept: application/json",
        "Cache-Control: no-cache",
        "Pragma: no-cache",
        "Content :"
    );

    public function sendJson($response = '', $option = '')
    {
        $options = [];

        $defaults = array(
            // CURLOPT_URL => 'http://myremoteservice/',
            CURLOPT_HTTPHEADER => $this->app_Json_Header,
            //CURLOPT_POST => false,
            //CURLOPT_POSTFIELDS => $response
        );
        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));

        header(RestControler::CONTENT_TYPE . RestControler::JSON . "; charset=UTF-8 ;" . $option);
       
         echo $response;
    }
}