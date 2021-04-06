<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title><?php echo $this->pageTitle;?></title>
  </head>
  <body>

  

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Ligue 1</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">

    <?php if(isset($_SESSION['username'])){ ?>
        <li class="nav-item active px-5">
            <a href="index.php?controller=dashboard&action=home" style="text-decoration: none;color:gray">Accueil</a> 
        </li>

        <li class="nav-item active px-5">
            <a href="index.php?logout" style="text-decoration: none;color:gray">Deconnexion</a>
        </li>
       
    <?php }
    else{ ?>
        <li class="nav-item active px-5">
            <a href="index.php?controller=user&action=login" style="text-decoration: none;color:gray">Se connecter</a>
        </li>
      
    <?php } ?>

    </ul>
  </div>
</nav>

    