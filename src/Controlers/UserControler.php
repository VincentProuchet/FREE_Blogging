<?php






class UserControler extends RestControler implements RestBase
{

    private $userFieldLogin = 'email';

    private $userFieldPassword = 'password';

    public function __construct()
    {
        User::setup();
        parent::__construct();
       
    }

    public function get(\Base $sfw, array $args = [])
    {
        $response = json_encode(UserDTO::makePublic(new User()));

        $this->sendJson($response);
    }

    public function post(\Base $sfw, array $args = [])
    {
        $response = json_encode(UserDTO::make(new User()));

        $this->sendJson($response);
    }

    public function put(\Base $sfw, array $args = [])
    {
        $user = new User();
        $user->setName("Prouchet");
        $user->setFirstName("vincent");
        $user->setUserName("Vincent");
        $user->setDateOfBirth(DateTime::createFromFormat("Y-m-d", '2000-04-03'));
        $user->setEmail('vincent@free.fr');
        $user->setPassword('b59c67bf196a4758191e42f76670ceba');
        $user =  $user->save();
        echo $this->db->log();
        $response = json_encode(UserDTO::make($user));

        $this->sendJson($response);
    }

    public function patch(Base $sfw, array $args = [])
    {
        $response = json_encode(UserDTO::make(new User()));

        $this->sendJson($response);
    }

    public function delete(\Base $sfw, array $args = [])
    {
        $response = json_encode(UserDTO::make(new User()));

        $this->sendJson($response);
    }

    /**
     *
     * @param Base $sfw
     * @param array $args
     */
    public function login(Base $sfw, array $args = [])
    {
        $user = new User();
        // creation du auth
        $this->auth = new \Auth($user, [
            'id' => $this->userFieldLogin,
            'pw' => $this->userFieldPassword
        ]);

        $id = $_POST['username'];
        $pw = $_POST['password'];

        if ($this->auth->login($id, md5($pw))) {
            $user->load([
                $this->userFieldLogin . '=?',
                $id
            ]);
            // $user = $this->db->exec('SELECT * FROM users WHERE email = :email', [
            // ':email' => $id
            // ]);
            echo $this->db->log();

            $this->sendJson(json_encode(UserDTO::make($user)));
        } else {
            // reject
            echo 'connection rejected <br>username' . $id . ' and password ' . $pw . '  = ' . md5($pw);

            $this->sendJson(json_encode($user->find()));
        }
    }

    public function logout(Base $sfw, array $args = [])
    {
        echo "logged out";
    }
}

