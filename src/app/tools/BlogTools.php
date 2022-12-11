<?php
namespace BLOG\app\tools;
if(!class_exists('BlogTools')){
	/**
	 * Que ce soit bien clair
	 * je n'ais pas envie de faire ce truc
	 * d'abord parce que je l'ai déjà fait plusieurs fois et que j'en ai perdu les sources
	 * et que c'est MEGA CHIANT
	 * @author Vincent
	 *
	 */
	class BlogTools {

		private static $sepcial_char = array(
			'°','+' //MAJ
				,'²','&','"',"'",'(',')','_','=' // normal
				,'~','#','{','[',']','|',"`",'\\','^','}' //altgr
			,'¨','£','^','$','¤'  //MAJ//normal// altgr
			,'%','µ','*' // MAJ//normal
			,'>','?','.','/','§','<',',',';',':','!' //MAJ//normal
		);
		private static $tool = null;
		private function __construct(){
		}
		private static function Tool(){
			if(BlogTools::$tool==null){
				BlogTools::$tool = new BlogTools();
			}
			return BlogTools::$tool;
		}
		
		public static function cleanName($name){
			return BlogTOOLS::baseClean($name);
		}
		public static function cleanFirstName($firstName){
			return BlogTOOLS::baseClean($firstName);
		}
		public static function cleanEmail($email) {
			return BlogTOOLS::baseClean($email);
		}
		
		public static function cleanText($text){
			return BlogTOOLS::baseClean($text);
		}
		public static function cleanvar($param) {
			return trim(strip_tags($param));
			;
		}
		/**
		 * applique les filtrage et nettoyages de base à une chaine de caractères
		 *
		 * cette fonction n'existe que pour simplifier la mise
		 * à jour des méthodes de filtrage de base
		 * @todo ajoutez/mettre à jour les méthodes de filtrage
		 * @param string $text
		 * @return string une chaine de caractères en minuscules
		 *  sans espaces au début et à la fin et sans tag html ou php
		 *
		 */
		private static function baseclean($param){
			return  trim(strtolower(strip_tags($param)));

		}
		private static function nospecialchar($param){
			return trim(str_ireplace(BlogTools::$sepcial_char
						,""
					,strtolower(strip_tags($param))));
		}
		public static function testD(){
		}
	}
}
?>