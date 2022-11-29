<?php

class MainControler implements RestBase
{

    public function get(\Base $sfw, array $args = [])
    {
        if (! function_exists('apache_get_modules')) {
            ?>
<html>
<body>
	<p>apache_get_modules function not availabe</p>
	<div>
    <?php
            phpinfo();
            ?>
    </div>
</body>
</html>
<?php
            exit();
        }
        $res = 'Module Unavailable';
        if (in_array('mod_rewrite', apache_get_modules()))
            $res = 'Module Available';
        ?>
<html>
<head>
<title>A mod_rewrite availability check !</title>
</head>
<body>
	<p><?php echo apache_get_version(),"</p><p>mod_rewrite $res"; ?></p>
</body>
</html>
<?php
    }

    public function post(\Base $sfw, array $args = [])
    {}

    public function put(\Base $sfw, array $args = [])
    {}

    public function delete(\Base $sfw, array $args = [])
    {}

    public function test(\Base $sfw, array $args = [])
    {
        echo " main controler success ! $sfw->VERB ";
        echo phpinfo();
        
    }
}


