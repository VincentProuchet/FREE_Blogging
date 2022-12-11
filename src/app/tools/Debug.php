<?php
namespace BLOG\app\tools;

use Exception;

if(!class_exists("Debug")){
	/**
	 * La classe Debug aide à la recherche et l'analyse
	 * de problèmes dans les scripts
	 * Elle DOIT être TOTALEMENT indépendente de toutes autre classes
	 * et sont dévellopement indépendant de tout autre projet
	 *
	 * Debug est un singleton, il est interdit de l'appeller directement par
	 * la fonction new
	 * ce n'est pâs simplement une question de sécurité
	 * c'est aussi une question de performance
	 * et de simplicitée d'utilisation
	 *
	 * pour s'en servir, la seule question que doit se poser le programmeur c'est
	 * - est-ce que j'ai bien fait mon include/require_once
	 *
	 * Toutes les fonction doivent être statiques
	 * controler l'existance de l'instance par la fonction d'appel d'origine
	 *
	 *
	 * @author Vincent
	 *
	 */
	class Debug{
		
		private static $debug=NULL;
		private $debugBlog=false;
		private $debugTheme= false;
		private $debugplugin = false;
		private $PhpInfo = false;
		private $PhpVersion =5;
		
		/**
		 * Il ne peut y en avoir qu'un
		 */
		private function __construct(){
			$this->PhpVersion = phpversion();
			try { $this->PhpInfo = PHPINFO;}
			catch (Exception $e){
				echo	'<!--'
				." Avertissement : la constante PHPINFO n'existe pas "
				." l'affichage de Debug::phpinfo est donc désactivé "
				.'-->';
				$this->PhpInfo = false;
			}
			try { $this->debugBlog = DEBUGBLOG;}
			catch (Exception $e){
				echo	'<!--'
				." Avertissement : la constante DEBUGBLOG n'existe pas "
				." l'affichage des messages de debogage du blog est donc désactivée "
				.'-->';
				$this->debugBlog = false;
			}
			try { $this->debugTheme =DEBUGTHEME;}
			catch (Exception $e){
				echo	'<!--'
				." Avertissement : la constante DEBUGTHEME n'existe pas "
				." l'affichage des messages de debogage du THEME est donc désactivée "
				.'-->';
				$this->debugTheme = false;
			}
			try { $this->debugplugin = DEBUGPLUGINS;}
			catch (Exception $e){
				echo	'<!--'
				." Avertissement : la constante DEBUGPLUGINS n'existe pas "
				." l'affichage des messages de debogage des PlUGINS est donc désactivée "
				.'-->';
				$this->debugplugin = false;
			}
			
			
		}
		/** fonction d'appel d'origine
		 *
		 * @return Debug instance
		 */
		private static function debug(){
			if(Debug::$debug==NULL){
				Debug::$debug=new Debug();
			}
			return Debug::$debug;
		}
		/**
		 *
		 * @return bool debugMode
		 */
		public static function isDebug(){
			return Debug::debug()->debugBlog;
		}
		/**affiche le texte passé en argument
		 * en tant que commentaire html
		 * utile pour comprendre le cheminement interne
		 * de vos scripts
		 * permet de supprimer toutes les occurences
		 * echo de vos script
		 * et de faire disparaitre vos messages de debogage
		 * en ne modifiant qu'une proprièté
		 *@param string $message
		 *@Todo reflechir à comment la fonction fait pour différentier d'où viennent
		 * les messages
		 */
		public static function message($message=" debug est actif "){
			Debug::debug();
			if(Debug::$debug->debugBlog)
				{echo '<!-- BLOG '
					.$message.'-->';}
			/*
			if(Debug::$debug->debugTheme)
				{echo '<!--'." THEME "
					.$message.'-->';}
			if(Debug::$debug->debugplugin)
				{echo '<!--'." PLUGIN "
					.$message.'-->';}
			*/
		}
		public static function phpinfo(){
			if(Debug::debug()->PhpInfo){
				echo '<h6>'.realpath('index.php').'</h6><br>';
				echo '<h6>'.$_SERVER['SERVER_NAME'].'</h6><br>';
				echo Debug::$debug->PhpVersion ;
				phpinfo();
			}
		}
		public static function phpversion(){
			return Debug::debug()->PhpVersion;
		}
		
		
	}
}

?>