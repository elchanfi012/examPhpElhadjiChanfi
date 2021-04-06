<?php 

    class UserController {

        private $userManager;
        private $formErrors;
        private $pageTitle;

        public function __construct()
        {
            $this->userManager = New UserManager();
            $this->formErrors = [];
            $this->pageTitle = '';
        }

        public function displayLoginForm(){
            $this->pageTitle = 'Formulaire de connexion';
            require_once('views/login.php');
        }

        public function logUser(){
            $this->pageTitle = 'Formulaire de connexion';

            if (isset($_POST['username']) && empty($_POST['username'])) {
                $this->formErrors[] = "Veuillez saisir un nom d'utilisateur";
            }

            if (isset($_POST['password']) && empty($_POST['password'])) {
                $this->formErrors[] = "Veuillez saisir un mot de passe";
            }


            if (count($this->formErrors) === 0) {
                $result = $this->userManager->checkLogin($_POST['username'], $_POST['password']);

                if($result['user'] !== null){
                    $_SESSION['username'] = $result['user']->getUsername();
                    header('Location: index.php?controller=dashboard&action=home');
                }
                else{
                    $this->formErrors[] = $result['error'];
                    require_once('views/login.php');
                }
                
            } else {
                
                require_once('views/login.php');
            }
            
        }

        
    }

?>