<?php
session_start();
require '../layouts/header.php';
$etudiant = $_SESSION['etudiant'] ?? null;
$action = $_GET['action'] ?? '';
?>

<div class="container bg-light divBreakClass1">
    <div class="container bg-light divBreakClass2">
        <div class="bg-white divBreakClass3">
            <nav aria-label="breadcrumb" class="divBreakClass4">
                <ol class="breadcrumb divBreakClass5">
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Accueil</a></li>
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Étudiant</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Formulaire étudiant</li>
                </ol>
            </nav>
            <div>
                <div class="center row bg-light divAdmin">
                    <div class="col-4"><strong>Formulaire étudiant</strong></div>
                </div>
            </div>
            <div class="center row container">
                <form action="EtudiantController.php?action=<?php echo ($action == 'edit' ?  'update' : 'store'); ?>" method="post">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1 mb-2">Numero carte</label>
                            <input type="text" class="form-control" name="numcard" id="exampleInputEmail1" placeholder="exemple: 20220982HZT" <?php echo ($action == 'edit' ? 'value="' . $etudiant[0]['numero_carte'] . '"' : ''); ?>>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1 mb-2">Prénom</label>
                            <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" placeholder="exemple: Moussa" <?php echo ($action == 'edit' ? 'value="' . $etudiant[0]['prenom'] . '"' : ''); ?>>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1 mb-2">Nom</label>
                            <input type="text" name="nom" class="form-control" id="exampleInputEmail1" placeholder="exemple: Diop" <?php echo ($action == 'edit' ? 'value="' . $etudiant[0]['nom'] . '"' : ''); ?>>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1 mb-2">Adresse</label>
                            <input type="text" class="form-control" name="adresse" placeholder="exemple: Grand-Yoff" <?php echo ($action == 'edit' ? 'value="' . $etudiant[0]['adresse'] . '"' : ''); ?>>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary"><?php echo ($action == 'edit' ? 'Modifier' : 'Enregistrer'); ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require '../layouts/footer.php'; ?>