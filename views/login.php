<?php 

    include_once('parts/header.php');
?>

<div class="container">

    <div class="row my-5">
        <diV class="col-md-8 mx-auto">
            <div class="card">

                <h1 class="card-header text-center bg-dark text-white">Connectez-vous !!!</h1>

                <div class="card-body">
                    <form method="post">
                        <div class="form-group mb-4">
                            <div>
                                <label for="username">Nom d'utilisateur :</label>
                            </div>
                            <div>
                                <input class="form-control" type="text" id="username" name="username">
                            </div>
                            
                            
                        </div>

                        <div class="form-group mb-4">
                            <div>
                                <label for="password">Mot de passe :</label>
                            </div>
                            
                            <div>
                                <input class="form-control" type="password" id="password" name="password">
                            </div>
                            
                            
                        </div>

                        <div class="form-group mb-4 d-flex justify-content-center">
                            <button type="submit" class="btn btn-sm btn-dark">Se connecter</button>
                        </div>
                    </form>

                    <ul>
                        <?php foreach ($this->formErrors as $value) { ?>
                            <li class="text-danger"><?php echo $value; ?></li>
                        <?php } ?>
                    </ul>
                </div>
                
            </div>
        </diV>
    </div>
</div>
        


<?php 

    include_once('parts/footer.php');
?>



