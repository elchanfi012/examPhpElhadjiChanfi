<?php 

    include_once('parts/header.php');
?>

<div class="container">

    <div class="row my-5">
        <diV class="col-md-8 mx-auto">
            <div class="card">

                <h1 class="card-header text-center bg-dark text-white">
                    <?php if(empty($_GET['id'])){ 
                        echo("Ajouter une équipe");
                    }else{
                        echo("Modifier une equipe");
                    } ?>

                </h1>

                <div class="card-body">

                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group mb-4">
                            <label for="label" >Nom de l'équipe :</label>
                            <input type="text" class="form-control" id="label" name="label" value="<?php echo $team->getLabel(); ?>">
                            
                        </div>

                        <div class="form-group mb-4">
                            <label for="nb_points" >Nombre de points :</label>
                            <input type="number" class="form-control" id="nb_points" name="nb_points" value="<?php echo $team->getNbPoints(); ?>">
                            
                        </div>

                        <div class="form-group mb-4">
                            <label for="nb_goals_scored" >Nombre de buts marqués :</label>
                            <input type="number" class="form-control" id="nb_goals_scored" name="nb_goals_scored"  value="<?php echo $team->getNbGoalsScored(); ?>">
                            
                        </div>

                        <div class="form-group mb-4">
                            <label for="nb_goals_conceded" >Nombre de buts encaissés :</label>
                            <input type="number" class="form-control" id="nb_goals_conceded" name="nb_goals_conceded"  value="<?php echo $team->getNbGoalsConceded(); ?>">
                            
                        </div>

                        <div class="form-group mb-4">
                            <label for="logo">Logo :</label>
                            <input type="file" id="logo" name="logo">
                        </div>

                        <div class="form-group mb-4 d-flex justify-content-center" >
                            <button type="submit" class="btn btn-sm btn-dark">
                                <?php if(empty($_GET['id'])){ 
                                    echo("Ajouter");
                                }else{
                                    echo("Modifier");
                                } ?>
                            </button>
                        </div>
                    </form>

                    <ul>
                        <?php foreach ($this->formErrors as $value) { ?>
                            <li class="text-danger"><?php echo $value; ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
                
        </div>
           
    </div>


</div>



<?php 

    include_once('parts/footer.php');
?>



