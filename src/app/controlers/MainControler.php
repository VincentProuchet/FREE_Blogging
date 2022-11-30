<?php

class MainControler implements RestBase
{

    public function get(\Base $sfw, array $args = [])
    {
        ?>
<html>
<body>
	<p>hello world this is the main page of the blogging tool</p>
	<div></div>
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
        $res = 'Module non disponible';
        ?>
<html>
<body>
	<p>test MainControler -> succées <?php $sfw->VERB;?></p>
	<?php
        if (! function_exists('apache_get_modules')) {
            ?>
          <p>apache_get_modules faonction non disponible</p>
     <?php
        } else {
            if (in_array('mod_rewrite', apache_get_modules())) {
                $res = 'Module disponible';
                echo "<p>" . apache_get_version() . "</p><p>mod_rewrite $res </p> ";
            }
        }
     ?>
	<p> hello world ! </p>
	<p> ceci est la page d'information du service </p>
	<div>	
	<?php
	   phpinfo();
    ?>
    </div>
</body>
</html>
<?php
    }
}
