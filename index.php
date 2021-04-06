<?php
    session_start();
    require_once('include.php');


    $userController = new UserController();
    $dashboardController = new DashboardController();
    $taemController = new TeamController();


    if(empty($_GET)){
        header('Location: index.php?controller=user&action=login');
    }

    if($_GET['controller'] === 'team'){
        if(!isset($_SESSION['username'])){
            header('Location: index.php?controller=user&action=login');
        }
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        header('Location: index.php?controller=user&action=login');
    }


    if ($_GET['controller'] === 'user' && $_GET['action'] === 'login') {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $userController->displayLoginForm();
        } else {
            $userController->logUser();
        }
    }
    elseif ($_GET['controller'] === 'dashboard' && $_GET['action'] === 'home') {
        $dashboardController->displayHome();
    }
    elseif ($_GET['controller'] === 'team' && $_GET['action'] === 'add') {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $taemController->displayAddTeamForm();
        }else{
            $taemController->addTeam();
        }
    }
    elseif ($_GET['controller'] === 'team' && $_GET['action'] === 'edit' && !empty($_GET['id'])) {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $taemController->displayEditTeamForm();
        }else{
            $taemController->editTeam();
        }
    }
    elseif ($_GET['controller'] === 'team' && $_GET['action'] === 'delete' && !empty($_GET['id'])) {
        
        $taemController->deleteTeam();
        
    }
     else {
        throw new Exception("Page introuvable", 404);
        
    }
    

?>