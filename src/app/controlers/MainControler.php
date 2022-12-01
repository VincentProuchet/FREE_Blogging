<?php

class MainControler extends RestControler implements RestBase
{

    public function get(\Base $sfw, array $args = [])
    {
        header(RestControler::CONTENT_TYPE.RestControler::HTML);
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
    {
        
        echo json_encode(new UserDTO(new User()));
    }

    public function put(\Base $sfw, array $args = [])
    {
        $options = [];
        $params = [
            'name' => 'John',
            'surname' => 'Doe',
            'age' => 36
        ];
        $defaults = array(
            CURLOPT_URL => 'http://myremoteservice/',
            CURLOPT_HTTPHEADER => array(
                "Content-type: 'application/json;charset=UTF-8'",
                "Accept: application/json",
                "Cache-Control: no-cache",
                "Pragma: no-cache"
            ),
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $params
        );
        $ch = curl_init();
        curl_setopt_array($ch, ($options + $defaults));
        echo json_encode($this);
    }

    public function delete(\Base $sfw, array $args = [])
    {}

    public function test(\Base $sfw, array $args = [])
    {
        header(RestControler::CONTENT_TYPE.RestControler::HTML);
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
}
