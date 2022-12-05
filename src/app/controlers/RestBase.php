<?php

/**
 * interface de base pour la classe de controler Rest
 * 
 * @author Vincent
 *
 */
interface RestBase
{

    /**
     *
     * @param \Base $sfw
     * @param array $args
     */
    function get(\Base $sfw, array $args = []);

    /**
     *
     * @param \Base $sfw
     * @param array $args
     */
    function post(\Base $sfw, array $args = []);

    /**
     *
     * @param \Base $sfw
     * @param array $args
     */
    function put(\Base $sfw, array $args = []);

    /**
     * 
     * @param \Base $sfw
     * @param array $args
     */
    function patch (\Base $sfw, array $args = []);
    /**
     *
     * @param \Base $sfw
     * @param array $args
     */
    function delete(\Base $sfw, array $args = []);
    
}