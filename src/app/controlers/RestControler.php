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
    const CONTENT_TYPE = 'Content-Type:'
        , JSON = 'application/json'
            , HTML = 'text/html';

    
    public function sendJson($response ='',$option =''){
        $options = [];
        
        $defaults = array(
            //CURLOPT_URL => 'http://myremoteservice/',
            CURLOPT_HTTPHEADER => array(
                "Content-type: 'application/json;charset=UTF-8'",
                "Accept: application/json",
                "Cache-Control: no-cache",
                "Pragma: no-cache",
                "Content :".$response
            ),
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $response
        );
        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));
        
        header(RestControler::CONTENT_TYPE . RestControler::JSON."; charset=UTF-8 ;".$option );
        echo $response;
    }
}