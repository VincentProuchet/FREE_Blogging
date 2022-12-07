<?php

/**
 * 
 * @author Vincent
 *
 */
class MainControler extends RestControler
{

    public function test(\Base $sfw, array $args = [])
    {
        // header(RestControler::CONTENT_TYPE.RestControler::HTML);
        $res = 'Module non disponible';
        ?>
<html>
<body>
	<p>test MainControler -> succées <?php $sfw->VERB;?></p>
	<?php
        if (! function_exists('apache_get_modules')) {
            ?>
          <p>apache_get_modules non disponible</p>
     <?php
        } else {
            if (in_array('mod_rewrite', apache_get_modules())) {
                $res = 'Module disponible';
                echo "<p>" . apache_get_version() . "</p><p>mod_rewrite $res </p> ";
            }
        }
        ?>
	<p>hello world !</p>
	<p>ceci est la page d'information du service</p>
	<div>	
	<?php
        phpinfo();
        ?>
    </div>
</body>
</html>
<?php
    }

    public function home(Base $sfw, array $args = [])
    {        
        echo \Template::instance()->render('acceuil.htm');
    }
}
