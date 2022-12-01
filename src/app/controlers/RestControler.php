<?php
/**
 * Base de tous les controleur REST
 * 
 * 
 * @author Vincent
 *
 */
abstract class RestControler{
   
    const CONTENT_TYPE  = 'Content-Type:';
    const JSON =  'application/json';
    const HTML = 'text/html';
    
    function __construct(){
        header(RestControler::CONTENT_TYPE.RestControler::JSON);
    }
    
    
}