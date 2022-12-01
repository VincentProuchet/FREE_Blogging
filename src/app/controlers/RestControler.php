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
/**
 * 
 */
    function __construct()
    {
        header(RestControler::CONTENT_TYPE . RestControler::JSON);
    }
}