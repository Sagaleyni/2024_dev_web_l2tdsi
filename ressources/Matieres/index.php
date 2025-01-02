<?php
session_start();
require '../layouts/header.php';
$matiere = $_SESSION['matieres'];

?>

<div class="container bg-light divBreakClass1">
    <div class="container bg-light divBreakClass2">
        <div class="bg-white divBreakClass3">
            <nav aria-label="breadcrumb" class="divBreakClass4">
                <ol class="breadcrumb divBreakClass5">
                    <li class="breadcrumb-item divBreakClass6"><a href="/2024_dev_web_l2tdsi/ressourses/index.php">Accueil</a></li>
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Matiere</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Listes des matières</li>
                </ol>
            </nav>
            <div>
                <div class="center row bg-light divAdmin">
                    <div class="col-4"><strong>Listes des matières</strong></div>
                    <div class="col-4"><strong>Nombre de matière 
                        <?php  require_once '../Base/DatabaseConnexion.php'; require_once '../Base/CRUD.php'; 
                        $db = new DatabaseConnexion(); $count = new CRUD($db); $count_matiere = $count->count("matieres"); 
                        echo $count_matiere ?></strong></div>
                    <div class="col-4 text-end"><a href="MatiereController.php?action=create" class="btn btn-outline-primary me-3"><span class="p-2">Ajouter un matiere</span></a></div>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Code</th>
                        <th scope="col">Nom</th>
                        <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($matiere as $matieres) : ?>
                        <tr class="table-secondary">
                            <td scope="row"><?php echo $matieres['code']; ?></td>
                            <td><?php echo $matieres['nom']; ?></td>
                            <td>
                                <a class="pe-5 text-dark btn btn-sm btn-warning" href="MatiereController.php?action=edit&id=<?php echo $matieres['code'];  ?>">
                                    modifier
                                </a>
                                <a href="MatiereController.php?action=delete&code=<?php echo $matieres['code']; ?>" class="delete btn border-0 btn btn-sm btn-danger">
                                    Supprimer
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example" class="navClass2">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link text-dark href=" >Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link bg-primary text-white href=" >2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<?php require '../layouts/footer.php'; ?>