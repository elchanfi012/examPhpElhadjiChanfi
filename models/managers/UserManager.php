<?php 

    class UserManager extends DbManager{


        public function __construct(){
            
            parent::__construct();
        }

        public function checkLogin($username, $password){
            $query = $this->bdd->prepare('SELECT * FROM user WHERE username = :username AND password = :password');
            $query->execute(['username' => $username,
                             'password' => $password
                            ]);

            $result = $query->fetch();

            $error = null;
            $user = null;
            
            if (!$result) {
                $error = "les identifiants saisis sont invalides";
            } else {
                $user = new User($result['id'], $result['username'], $result['password']);
            }

            return ['error' => $error, 'user' => $user];
            
        }

        
    }



?>