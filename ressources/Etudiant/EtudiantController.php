<?php
session_start();
require_once '../Base/DatabaseConnexion.php';
require_once '../Base/CRUD.php';

$db = new DatabaseConnexion();
$etudiant = new CRUD($db);


$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        create();
        break;
    case 'store':
        $data = [
            'numero_carte' => $_POST['numcard'],
            'prenom' => $_POST['prenom'],
            'nom' => $_POST['nom'],
            'adresse' => $_POST['adresse']
        ];
        $etudiant->create('etudiants', $data);
        index($etudiant);
        break;
    case 'edit':
        $numcard = $_GET['id'];
        $condition = 'numero_carte = "' . $numcard . '"';
        $etudiants = $etudiant->read('etudiants', '*', $condition);
        $_SESSION['etudiant'] = $etudiants;
        update();
        break;
    case 'update':
        $data = [
            'numero_carte' => $_POST['numcard'],
            'prenom' => $_POST['prenom'],
            'nom' => $_POST['nom'],
            'adresse' => $_POST['adresse']
        ];
        $condition = $_POST['numcard'];
        $etudiant->update('etudiants', $data, 'numero_carte = "' . $condition . '"');
        index($etudiant);
        break;
    case 'delete':
        $numcard = $_GET['numero_carte'];
        $condition = 'numero_carte = "' . $numcard . '"';
        $etudiant->delete('etudiants', $condition);
        index($etudiant);
        break;
    case 'index':
    default:
        index($etudiant);
        break;
}

function index($etudiant)
{
    $etudiants = $etudiant->read('etudiants');
    $_SESSION['etudiants'] = $etudiants;
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
