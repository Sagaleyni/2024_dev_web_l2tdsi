<?php
session_start();
require '../layouts/header.php'; 
$matiere = $_SESSION['matiere'] ?? null;
$action = $_GET['action'] ?? '';
?>

<div class="container bg-light divBreakClass1">
    <div class="container bg-light divBreakClass2">
        <div class="bg-white divBreakClass3">
            <nav aria-label="breadcrumb" class="divBreakClass4">
                <ol class="breadcrumb divBreakClass5">
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Accueil</a></li>
                    <li class="breadcrumb-item divBreakClass6"><a href="/2024_dev_web_l2tdsi/ressourses/examens/index.php">Matiere</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Formulaire Matiere</li>
                </ol>
            </nav>
            <div>
                <div class="center row bg-light divAdmin">
                    <div class="col-4"><strong>Formulaire Matiere</strong></div>
                </div>
            </div>
            <div class="center row container">
                <form action="MatiereController.php?action=<?php echo $action == 'edit' ?  'update' : 'store'; ?>" method="post">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1 mb-2">Code</label>
                            <input type="text" class="form-control" name="code" id="exampleInputEmail1" placeholder="00122" <?php echo $action == 'edit' ? 'value="' . $matiere[0]['code'] . '"' : ''; ?>>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="exampleInputEmail1 mb-2">Nom</label>
                            <input type="text" name="nom" class="form-control" id="exampleInputEmail1" placeholder="DEV WEB" <?php echo $action == 'edit' ? 'value="' . $matiere[0]['nom'] . '"' : ''; ?>>
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