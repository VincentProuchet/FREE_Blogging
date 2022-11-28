<?php

/**
	This application is not meant for production use. Its only purpose is to
	serve as a sample code to help you get acquainted with the Fat-Free
	Framework. Padding this blog software with a lot of bells and whistles
	would be nice, but it would also make the entire learning process
	lengthier and more complicated.
**/

// Use the Fat-Free Framework
$main=require_once __DIR__.'/fffc/base.php';

/**
	We don't have to "include" or "require" the blog.php class because
	the framework automatically searches the path defined in AUTOLOAD.
	If you want a different path for autoloaded classes, use:-

		F3::set('AUTOLOAD','path/to/autoloaded/classes/');

	The framework can search multiple folders too:-

		F3::set('AUTOLOAD','folder1/,folder2/,main/sub/');

	If you define a static onload() method inside an autoloaded class, it is
	also auto-executed the same way __construct() is called by an object
	instantiating a dynamic class.
**/
$main->set('AUTOLOAD','app/,dao/,controlers/');

/**
	Setting the Fat-Free global variable DEBUG to zero will suppress stack
	trace in HTML error page. If you're still debugging your application,
	you might want to give it a value from 1 to 3. Adjust to your desired
	level of verbosity. The stack trace can help a lot in program testing.
**/
$main->set('DEBUG',3);

// Path to our CAPTCHA font file
$main->set('FONTS','fonts/');

// Path to our templates
//$main->set('GUI','gui/');

// Define application globals
$main->set('site','freeBlog/Test');

$main->set('timeformat','r');

/**
	Let's define our routes (HTTP method and URI) and route handlers.
**/
// main route
// should serve the frontend application
$main->route('GET /',function() {
    echo phpinfo();
});


// Execute application
$main->run();

// Now, isn't the above code simple and clean?
// yes it is