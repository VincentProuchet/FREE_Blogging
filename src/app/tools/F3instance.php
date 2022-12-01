<?php

//! F3 object mode
class F3instance {
    
    //@{ Locale-specific error/exception messages
    const
    TEXT_Conflict='%s conflicts with framework method name';
    //@}
    
    /**
     Get framework variable reference; Workaround for PHP's
     call_user_func() reference limitation
     @return mixed
     @param $key string
     @param $set bool
     @public
     **/
    function &ref($key,$set=TRUE) {
        return F3::ref($key,$set);
    }
    
    /**
     Run PHP code in sandbox
     @param $file string
     @param $vars array
     @public
     **/
    function sandbox($file,$vars=array()) {
        extract($vars);
        return require $file;
    }
    
    /**
     Grab file contents
     @return mixed
     @param $file string
     @public
     **/
    function grab($file) {
        $file=F3::resolve($file);
        if (!ini_get('short_open_tag')) {
            $text=preg_replace_callback(
                '/<\?(?:\s|\s*(=))(.+?)\?>/s',
                function($tag) {
                    return '<?php '.($tag[1]?'echo ':'').trim($tag[2]).' ?>';
                },
                $orig=self::getfile($file)
                );
            if (ini_get('allow_url_fopen') && ini_get('allow_url_include'))
                // Stream wrap
                $file='data:text/plain,'.urlencode($text);
                elseif ($text!=$orig) {
                    // Save re-tagged file in temporary folder
                    if (!is_dir($ref=F3::ref('TEMP')))
                        F3::mkdir($ref);
                        $temp=$ref.$_SERVER['SERVER_NAME'].'.tpl.'.F3::hash($file);
                        if (!is_file($temp))
                            self::mutex(
                                function() use($temp,$text) {
                                    file_put_contents($temp,$text);
                                }
                                );
                            $file=$temp;
                }
        }
        ob_start();
        // Render
        $this->sandbox($file);
        return ob_get_clean();
    }
    
    /**
     Proxy for framework methods
     @return mixed
     @param $func string
     @param $args array
     @public
     **/
    function __call($func,array $args) {
        return call_user_func_array('F3::'.$func,$args);
    }
    
    /**
     Class constructor
     @param $boot bool
     @public
     **/
    function __construct($boot=FALSE) {
        if ($boot)
            F3::start();
            // Allow application to override framework methods?
            if (F3::ref('EXTEND'))
                // User assumes risk
                return;
                // Get all framework methods not defined in this class
                $def=array_diff(get_class_methods('F3'),get_class_methods(__CLASS__));
                // Check for conflicts
                $class=new ReflectionClass($this);
                foreach ($class->getMethods() as $func)
                    if (in_array($func->name,$def))
                        trigger_error(sprintf(self::TEXT_Conflict,
                            get_called_class().'->'.$func->name));
    }
    
}

// Bootstrap
return new F3instance(TRUE);
