<?php
session_start();
require '../layouts/header.php'; 

// Initialisation des variables
$examen = isset($_SESSION['examen']) ? $_SESSION['examen'] : null;
$action = isset($_GET['action']) ? $_GET['action'] : '';

// Sécurité : échapper les données affichées dans le formulaire
function escape($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

?>

<div class="container bg-light divBreakClass1">
    <div class="container bg-light divBreakClass2">
        <div class="bg-white divBreakClass3">
            <nav aria-label="breadcrumb" class="divBreakClass4">
                <ol class="breadcrumb divBreakClass5">
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Accueil</a></li>
                    <li class="breadcrumb-item divBreakClass6"><a href="/2024_dev_web_l2tdsi/ressourses/examens/index.php">Examen</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Formulaire Examen</li>
                </ol>
            </nav>
            <div>
                <div class="center row bg-light divAdmin">
                    <div class="col-4"><strong>Formulaire Examen</strong></div>
                </div>
            </div>
            <div class="center row container">
                <form action="ExamenController.php?action=<?php echo escape($action == 'edit' ? 'update' : 'store'); ?>&numero_examen=<?php echo escape($action == "edit" ? $examen[0]["numero_examen"] : ''); ?>" method="post">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1 mb-2">Date</label>
                            <input type="date" class="form-control" name="date" id="exampleInputEmail1" placeholder="15/01/2024" value="<?php echo escape($action == 'edit' ? $examen[0]['date'] : ''); ?>">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1 mb-2">Nom</label>
                            <input type="text" name="nom" class="form-control" id="exampleInputEmail1" placeholder="licence" value="<?php echo escape($action == 'edit' ? $examen[0]['nom'] : ''); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1 mb-2">Saison</label>
                            <input type="text" name="saison" class="form-control" id="exampleInputEmail1" placeholder="normal" value="<?php echo escape($action == 'edit' ? $examen[0]['saison'] : ''); ?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <div class="">
                                <label for="exampleInputEmail1 mb-2"></label>
                                <button type="submit" class="btn btn-primary form-control"><?php echo $action == 'edit' ? 'Modifier' : 'Enregistrer'; ?></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require '../layouts/footer.php'; ?>
