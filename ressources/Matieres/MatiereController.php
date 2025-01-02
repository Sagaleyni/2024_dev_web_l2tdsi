<?php
session_start();
require_once '../Base/DatabaseConnexion.php';
require_once '../Base/CRUD.php';

$db = new DatabaseConnexion();
$matiere = new CRUD($db);

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        create();
        break;
    case 'store':
        $data = [
            'Code' => $_POST['code'],
            'nom' => $_POST['nom']
        ];
        $matiere->create('matieres', $data);
        index($matiere);
        break;
    case 'edit':
        $code = $_GET['id'];
        $condition = 'code = "' . $code . '"';
        $matiere = $matiere->read('matieres', '*', $condition);
        $_SESSION['matiere'] = $matiere;
        update();
        break;
    case 'update':
        $data = [
            'code' => $_POST['code'],
            'nom' => $_POST['nom']
        ];
        $condition = $_POST['code'];
        $matiere->update('matieres', $data, 'code = "' . $condition . '"');
        index($matiere);
        break;
    case 'delete':
        $code = $_GET['code'];
        $condition = 'code = "' . $code . '"';
        $matiere->delete('matieres', $condition);
        index($matiere);
        break;
    case 'index':
    default:
        index($matiere);
        break;
}

function index($matiere)
{
    $matiere = $matiere->read('matieres');
    $_SESSION['matieres'] = $matiere;
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
