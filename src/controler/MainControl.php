<?php

// autoload Config 

define('DAO', 'dao/');

// Add your class dir to include path

set_include_path(PATH_SEPARATOR.DAO.get_include_path());

// You can use this trick to make autoloader look for commonly used "My.class.php" type filenames
spl_autoload_extensions('.php');
// Use default autoload implementation
spl_autoload_register();
echo phpinfo();