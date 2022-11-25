<?php
/**
fait l'appel
du contrôleur
et du fichier de démarrage de la logique du site
meilleur moyen de limiter l'impact d'une injection d'un jumeaux maléfique
*/
// definition du chemin absolu
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');
// logique du site
if(!defined('CONTROL')){
	define('CONTROL',ABSPATH.'controler'.'/');}

require_once(dirname(__FILE__)."/controler/MainControl.php");
?>