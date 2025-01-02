<?php
session_start();
 require '../layouts/header.php'; 
$enseignant = $_SESSION['enseignants'] ?? null;
$action = $_GET['action'] ?? '';
?>

<div class="container bg-light divBreakClass1">
    <div class="container bg-light divBreakClass2">
        <div class="bg-white divBreakClass3">
            <nav aria-label="breadcrumb" class="divBreakClass4">
                <ol class="breadcrumb divBreakClass5">
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Accueil</a></li>
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Enseignant</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Formulaire enseignant</li>
                </ol>
            </nav>
            <div>
                <div class="center row bg-light divAdmin">
                    <div class="col-4"><strong>Formulaire enseignant</strong></div>
                </div>
            </div>
            <div class="center row container">
                <form action="EnseignantController.php?action=<?php echo $action == 'edit' ?  'update' : 'store'; ?>&matricule=<?php echo $action=='edit' ? $enseignant[0]["matricule"] : "";?>" method="post">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1 mb-2">Prénom</label>
                            <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" placeholder="Moussa" <?php echo $action == 'edit' ? 'value="' . $enseignant[0]['prenom'] . '"' : ''; ?>>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1 mb-2">Nom</label>
                            <input type="text" name="nom" class="form-control" id="exampleInputEmail1" placeholder="Diop" <?php echo $action == 'edit' ? 'value="' . $enseignant[0]['nom'] . '"' : ''; ?>>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1 mb-2">Adresse</label>
                            <input type="text" class="form-control" name="adresse" placeholder="Grand-Yoff" <?php echo $action == 'edit' ? 'value="' . $enseignant[0]['adresse'] . '"' : ''; ?>>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1 mb-2">Email</label>
                            <input type="text" class="form-control" name="email" id="exampleInputEmail1" placeholder="20220982HZT" <?php echo $action == 'edit' ? 'value="' . $enseignant[0]['email'] . '"' : ''; ?>>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-6">
                            <button type="submit" class="btn btn-primary"><?php echo $action == 'edit' ? 'Modifier' : 'Enregistrer'; ?></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require '../layouts/footer.php'; ?>