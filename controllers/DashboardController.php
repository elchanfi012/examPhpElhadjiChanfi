<?php 

    class DashboardController{
        
        private $teamManager;
        private $pageTitle;
        private $teams;


        public function __construct()
        {
            $this->teamManager = new TeamManager();
            $this->pageTitle = '';
            $this->teams = [];
        }

        public function displayHome(){
            $this->pageTitle = 'Accueil';
            $this->teams = $this->teamManager->getTeams()['teams'];
            require_once('views/dashboard.php');
        }
    }



?>