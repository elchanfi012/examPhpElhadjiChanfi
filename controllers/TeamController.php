<?php 

class TeamController{

    private $teamManager;
    private $formErrors;
    private $pageTitle;

    public function __construct(){
            $this->teamManager = new TeamManager();
            $this->formErrors = [];
            $this->pageTitle = '';
    }


    public function displayAddTeamForm(){
        
        $team = new Team(null, null, null, null, null, null);

        $this->pageTitle = 'Formulaire ajout equipe';
        

        require_once('views/form.php');
    }

    public function addTeam(){

        $this->pageTitle = "Formulaire ajout equipe";

        if (isset($_POST['label']) && empty($_POST['label'])) {
            $this->formErrors[] = "Veuillez saisir un nom d'équipe";
        }

        if (isset($_POST['nb_points']) && empty($_POST['nb_points'])) {
            $this->formErrors[] = "Veuillez saisir un nombre de points";
        }

        if (isset($_POST['nb_goals_scored']) && empty($_POST['nb_goals_scored'])) {
            $this->formErrors[] = "Veuillez saisir un nombre de buts marqués";
        }

        if (isset($_POST['nb_goals_conceded']) && empty($_POST['nb_goals_conceded'])) {
            $this->formErrors[] = "Veuillez saisir un nombre de buts concédés";
        }

        if (isset($_FILES['logo']) && $_FILES['logo']['error'] !== 0) {
            $this->formErrors[] = "Veuillez insérer un logo";
        }


        if (count($this->formErrors) === 0) {
            
            

            if (isset($_FILES['logo']) AND $_FILES['logo']['error'] === 0) {
                if ($_FILES['logo']['size'] <= 1000000){
                    $extensions_autorisees = ['jpg', 'jpeg', 'gif', 'png'];
                    $ext = explode('/', $_FILES['logo']['type'])[1];
        
                    if (in_array($ext, $extensions_autorisees)) {
                        $file_name = 'uploads/' . uniqid() . '.'. $ext;
                        
                        
    
                        echo "L'envoi a bien été effectué ! <br>";
        
    
                    } else {
                        echo('J\'accepte que les images ... <br>');
                        $this->formErrors[] = "J'accepte que les images";
                        require_once('views/form.php');
                    }
                } 
                else {
                    $this->formErrors[] = "le fichier est trop lourd pour un petit serveur";
                    require_once('views/form.php');
                    echo('le fichier est trop lourd pour un petit serveur ... <br>');
                }
        
            }

                $team = new Team(null, $_POST['label'], $_POST['nb_points'], $_POST['nb_goals_scored'], $_POST['nb_goals_conceded'], $file_name);

                $this->teamManager->addTeam($team);

            
                move_uploaded_file($_FILES['logo']['tmp_name'], $file_name);
                header('Location: index.php?controller=dashboard&action=home');
            
            
        }
        else{
            require_once('views/form.php');
        }
    }

    public function displayEditTeamForm(){
        
        $team = $this->teamManager->getTeam($_GET['id'])['team'];

        if($team == null){
            throw new Exception("Page introuvable", 404);
        }

        $this->pageTitle = 'Formulaire modification equipe';
        

        require_once('views/form.php');
    }

    public function editTeam(){

        $this->pageTitle = "Formulaire modification equipe";

        if (isset($_POST['label']) && empty($_POST['label'])) {
            $this->formErrors[] = "Veuillez saisir un nom d'équipe";
        }

        

        if (isset($_POST['nb_points']) && empty($_POST['nb_points'])) {
            $this->formErrors[] = "Veuillez saisir un nombre de points";
        }

        if (isset($_POST['nb_goals_scored']) && empty($_POST['nb_goals_scored'])) {
            $this->formErrors[] = "Veuillez saisir un nombre de buts marqués";
        }

        if (isset($_POST['nb_goals_conceded']) && empty($_POST['nb_goals_conceded'])) {
            $this->formErrors[] = "Veuillez saisir un nombre de buts concédés";
        }

        if (isset($_FILES['logo']) && $_FILES['logo']['error'] !== 0) {
            $this->formErrors[] = "Veuillez insérer un logo";
        }

        if (count($this->formErrors) === 0) {
            
            

            if (isset($_FILES['logo']) AND $_FILES['logo']['error'] === 0) {
                if ($_FILES['logo']['size'] <= 1000000){
                    $extensions_autorisees = ['jpg', 'jpeg', 'gif', 'png'];
                    $ext = explode('/', $_FILES['logo']['type'])[1];
        
                    if (in_array($ext, $extensions_autorisees)) {
                        $file_name = 'uploads/' . uniqid() . '.'. $ext;
                        
                        
    
                        echo "L'envoi a bien été effectué ! <br>";
        
    
                    } else {
                        echo('J\'accepte que les images ... <br>');
                        $this->formErrors[] = "J'accepte que les images";
                        require_once('views/form.php');
                    }
                } 
                else {
                    $this->formErrors[] = "le fichier est trop lourd pour un petit serveur";
                    require_once('views/form.php');
                    echo('le fichier est trop lourd pour un petit serveur ... <br>');
                }
        
            }

                $team = new Team($_GET['id'], $_POST['label'], $_POST['nb_points'], $_POST['nb_goals_scored'], $_POST['nb_goals_conceded'], $file_name);

                $this->teamManager->editTeam($team);

            
                move_uploaded_file($_FILES['logo']['tmp_name'], $file_name);
                header('Location: index.php?controller=dashboard&action=home');
            
            
        }
        else{
            require_once('views/form.php');
        }



    }

    public function deleteTeam(){
        $this->pageTitle = 'Accueil';


        $team = $this->teamManager->getTeam($_GET['id'])['team'];

        if($team == null){
            throw new Exception("Page introuvable", 404);
        }

        $this->teamManager->deleteTeam($team);

        header('Location: index.php?controller=dashboard&action=home');

    }
    

}

?>