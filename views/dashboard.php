<?php 
    include_once('parts/header.php');
?>

<div class="container">

    <div class="d-flex justify-content-end my-5">
        <a href="index.php?controller=team&action=add" class="btn btn-sm btn-dark">Ajouter équipe</a>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-lg">
                
                <div class="card-body">

                    <table class=" table table-bordered">
                        <thead class="table-dark">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom de l'equipe</th>
                            <th scope="col">Nombre de points</th>
                            <th scope="col">Nombre de buts marqués</th>
                            <th scope="col">Nombre de buts encaissés</th>
                            <th scope="col">Logo</th>
                            <th scope="col">LActions</th>
                            
                            </tr>
                        </thead>

                        <tbody>

                            <?php  foreach ($this->teams as $key => $value) { ?>
                                <tr>
                                <th scope="row"><?php echo $key + 1; ?></th>
                                <td> <?php echo $value->getLabel(); ?></td>
                                <td> <?php echo $value->getNbPoints(); ?></td>
                                <td> <?php echo $value->getNbGoalsScored(); ?></td>
                                <td> <?php echo $value->getNbGoalsConceded(); ?></td>
                                <td> <img class="img-fluid" src="<?php echo $value->getLogo(); ?>" alt="" style="max-width: 30px;"></td>
                                <td>
                                <a href="index.php?controller=team&action=edit&id=<?php echo $value->getId(); ?>" class="btn btn-sm btn-warning">Modifier équipe</a> 
                                <a href="index.php?controller=team&action=delete&id=<?php echo $value->getId(); ?>" class="btn btn-sm btn-danger">Supprimer équipe</a> 
                                </td>
                                </tr>
                            <?php } ?>

                        
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
    </div>

</div>



<?php 

    include_once('parts/footer.php');
?>



