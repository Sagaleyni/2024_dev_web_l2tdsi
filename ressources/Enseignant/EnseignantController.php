<?php
session_start();
require_once '../Base/DatabaseConnexion.php';
require_once '../Base/CRUD.php';
$db = new DatabaseConnexion();
$enseignant = new CRUD($db);

$_SESSION['enseignant'] = $enseignant->read('enseignants');
$action = $_GET['action'] ?? 'index';
switch ($action) {
    case 'create':
        create();
        break;
    case 'store':
        $data = [
            'prenom' => $_POST['prenom'],
            'nom' => $_POST['nom'],
            'adresse' => $_POST['adresse'],
            "email" => $_POST["email"]
        ];
        $enseignant->create('enseignants', $data);
        index($enseignant);
        break;
    case 'edit':
        $matricule = $_GET['id'];
        $condition = 'matricule = "' . $matricule . '"';
        $enseignants = $enseignant->read('enseignants', '*', $condition);
        $_SESSION['enseignants'] = $enseignants;
        update();
        break;
    case 'update':
        $data = [
            'prenom' => $_POST['prenom'],
            'nom' => $_POST['nom'],
            'adresse' => $_POST['adresse'],
            'email' => $_POST['email'],
        ];
        $condition = $_GET['matricule'];
        $enseignant->update('enseignants', $data, 'matricule = "' . $condition . '"');
        index($enseignant);
        break;
    case 'delete':
        $matricule = $_GET['matricule'];
        $condition = 'matricule = "' . $matricule . '"';
        $enseignant->delete('enseignants', $condition);
        index($enseignant);
        break;
    case 'index':
    default:
        index($enseignant);
        break;
}


function index($enseignant)
{
    $data = $enseignant->read('enseignants');
    $_SESSION['enseignant'] = $data;
    header('Location: index.php');
    exit;
}

function create()
{
    header('Location: create.php');
    exit;
}


function update()
{
    header('Location: create.php?action=edit');
    exit;
}
