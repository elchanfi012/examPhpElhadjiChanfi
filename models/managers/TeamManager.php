<?php 

class TeamManager extends DbManager{

    public function __construct(){
            
        parent::__construct();
    }

    public function getTeams(){
        $query = $this->bdd->query('SELECT * FROM TEAM Order by nb_points desc, nb_goals_conceded asc, nb_goals_scored DESC');

        $result = $query->fetchAll();

        $teams = [];

        foreach ($result as $value) {
            $team = new Team($value['id'], $value['label'], $value['nb_points'], $value['nb_goals_scored'], $value['nb_goals_conceded'], $value['logo']);

            $teams [] = $team;
        }


       return ['teams' => $teams];

    }

    public function getTeam($id){

        $query = $this->bdd->prepare('SELECT * FROM TEAM WHERE id = :id');

        $query->execute(['id' => $id]);

        $result = $query->fetch();

        

        $team = null;

        if($result != false){
            $team = new Team($result['id'], $result['label'], $result['nb_points'], $result['nb_goals_scored'], $result['nb_goals_conceded'], $result['logo']);
        }

        return ['team' => $team];
    }

    public function addTeam(Team $team){

       
            $query = $this->bdd->prepare('INSERT INTO TEAM (label, nb_points, nb_goals_scored, nb_goals_conceded, logo) 
                                            values (:label, :nb_points, :nb_goals_scored, :nb_goals_conceded, :logo)');
            $query->execute(['label' => $team->getLabel(),
                         'nb_points' => $team->getNbPoints(),
                         'nb_goals_scored' => $team->getNbGoalsScored(),
                         'nb_goals_conceded' => $team->getNbGoalsConceded(),
                         'logo' => $team->getLogo()]);

    }


    public function editTeam(Team $team){

        $query = $this->bdd->prepare('UPDATE TEAM SET label = :label, nb_points = :nb_points, nb_goals_scored = :nb_goals_scored,
                                    nb_goals_conceded = :nb_goals_conceded, logo = :logo WHERE id = :id' );

        $query->execute(['label' => $team->getLabel(),
        'nb_points' => $team->getNbPoints(),
        'nb_goals_scored' => $team->getNbGoalsScored(),
        'nb_goals_conceded' => $team->getNbGoalsConceded(),
        'logo' => $team->getLogo(),
        'id' => $team->getId()]);

        
    }


    public function deleteTeam(Team $team){
        $query = $this->bdd->prepare('DELETE FROM TEAM WHERE id = :id');

        $query->execute(['id' => $team->getId()]);
    }


}


?>