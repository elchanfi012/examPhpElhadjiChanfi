<?php 

class Team{

    private $id;
    private $label;
    private $nbPoints;
    private $nbGoalsScored;
    private $nbGoalsConceded;
    private $logo;

    public function __construct($id=null, $label=null, $nbPoints=null, $nbGoalsScored=null, $nbGoalsConceded=null, $logo= null)
    {
        $this->id = $id;
        $this->label = $label;
        $this->nbPoints = $nbPoints;
        $this->nbGoalsScored = $nbGoalsScored;
        $this->nbGoalsConceded = $nbGoalsConceded;
        $this->logo = $logo;
    }

    public function getId(){
        return $this->id;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getLabel(){
        return $this->label;
    }

    public function setLabel($label){
        $this->label = $label;
    }

    public function getNbPoints(){
        return $this->nbPoints;
    }

    public function setNbPoints($nbPoints){
        $this->nbPoints = $nbPoints;
    }

    public function getNbGoalsScored(){
        return $this->nbGoalsScored;
    }

    public function setNbGoalsScored($nbGoalsScored){
        $this->nbGoalsScored = $nbGoalsScored;
    }

    public function getNbGoalsConceded(){
        return $this->nbGoalsConceded;
    }

    public function setNbGoalsConceded($nbGoalsConceded){
        $this->nbGoalsConceded = $nbGoalsConceded;
    }


    public function getLogo(){
        return $this->logo;
    }

    public function setLogo($logo){
        $this->logo = $logo;
    }
}

?>