<?php
session_start();
require_once '../Base/DatabaseConnexion.php';
require_once '../Base/CRUD.php';

$db = new DatabaseConnexion();
$examen = new CRUD($db);

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        create();
        break;
    case 'store':
        $data = [
            'date' => $_POST['date'],
            'nom' => $_POST['nom'],
            'saison' => $_POST['saison']
        ];
        $examen->create('examens', $data);
        index($examen);
        break;
    case 'edit':
        $idExam = $_GET['id'];
        $condition = 'numero_examen = "' . $idExam . '"';
        $examens = $examen->read('examens', '*', $condition);
        $_SESSION['examen'] = $examens;
        update();
        break;
    case 'update':
        $data = [
            'nom' => $_POST['nom'],
            'date' => $_POST['date'],
            'saison' => $_POST['saison']
        ];
        $condition = $_GET['numero_examen'];
        $examen->update('examens', $data, 'numero_examen = "' . $condition . '"');
        index($examen);
        break;
    case 'delete':
        $idExam = $_GET['numero_examen'];
        $condition = 'numero_examen = "' . $idExam . '"';
        $examen->delete('examens', $condition);
        index($examen);
        break;
    case 'index':
    default:
        index($examen);
        break;
}

function index($examen)
{
    $examens = $examen->read('examens');
    $_SESSION['examens'] = $examens;
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
