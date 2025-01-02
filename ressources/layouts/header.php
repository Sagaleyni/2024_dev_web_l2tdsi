<!DOCTYPE html>
<html lang="en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link rel="stylesheet" href="../../public/css/css1.css">
        <link rel="stylesheet" href="../../public/css/css2.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
        <title>SOLOQUIZZ</title>
    </head>
<body>
        <header class="pb-2 headerClass" >
                    <nav class="px-3 navbar navbar-expand-lg navbar-dark bg-dark fixed">
                        <div class="container row px-1 containerClass">
                            <div class="col">
                                <a class="navbar-brand" href="#"><img class="imgClass1" src="../../public/images/Soloquizz.png"></a>
                            </div>
                            <div class="col divClass1">
                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                                <div class="collapse navbar-collapse justify-content-end" id="navbarNavDarkDropdown">
                                    <ul class="navbar-nav">
                                        <li class="nav-item dropdown">
                                            <button class="px-3 btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                <img class="imgClass2" src="../../public/images/user.png">
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-info">
                                                <li>
                                                    <a class="dropdown-item text-dark" href="#">
                                                        <span<ion-icon name="person"></ion-icon></span>
                                                            <strong>&nbsp;Alassane Laye Diop</strong>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="dropdown-item text-dark" href="#">
                                                        <span<ion-icon name="power"></ion-icon></span>&nbsp;Deconnexion</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
        </header>
        <div class="bg-light">
            <!-- <hr class="bg-primary" style="color: white;"> -->
            <?php include "navtop.php"; ?>
            <div >
                <div class="row text-center shadow bg-light divClassB" >
                    <div class="col-3 shadow-lg divClass3">Etudiants<br><strong class="text-dark">
                        <?php  require_once '../Base/DatabaseConnexion.php';
                        require_once '../Base/CRUD.php';
                        $db = new DatabaseConnexion();
                        $count = new CRUD($db);
                        $count_etudiant = $count->count("etudiants"); echo $count_etudiant ?>
                    </strong></div>
                    <div class="text-center col-lg-3 shadow-lg rounded divClass4">Examen<br><strong class="text-dark">
                        <?php  require_once '../Base/DatabaseConnexion.php';
                        require_once '../Base/CRUD.php';
                        $db = new DatabaseConnexion();
                        $count = new CRUD($db);
                        $count_examen = $count->count("examens"); echo $count_examen ?>
                        </strong></div>
                    <div class="text-center col-lg-3 shadow-lg rounded divClass5">Enseignant<br><strong class="text-dark">
                        <?php  require_once '../Base/DatabaseConnexion.php';
                        require_once '../Base/CRUD.php';
                        $db = new DatabaseConnexion();
                        $count = new CRUD($db);
                        $count_enseignant = $count->count("enseignants"); echo $count_enseignant ?>
                    </strong></div>
                    <div class="text-center col-lg-3 shadow-lg rounded divClass5">Matiere<br><strong class="text-dark">
                        <?php  require_once '../Base/DatabaseConnexion.php';
                        require_once '../Base/CRUD.php';
                        $db = new DatabaseConnexion();
                        $count = new CRUD($db);
                        $count_matiere = $count->count("matieres"); echo $count_matiere ?>
                    </strong></div>
                </div>
<?php                
   
?>
