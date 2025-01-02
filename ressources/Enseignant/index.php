<?php
session_start();
require '../layouts/header.php';
$enseignant = $_SESSION['enseignant'];

?>

<div class="container bg-light divBreakClass1">
    <div class="container bg-light divBreakClass2">
        <div class="bg-white divBreakClass3">
            <nav aria-label="breadcrumb" class="divBreakClass4">
                <ol class="breadcrumb divBreakClass5">
                    <li class="breadcrumb-item divBreakClass6"><a href="/2024_dev_web_l2tdsi/ressourses/index.php">Accueil</a></li>
                    <li class="breadcrumb-item divBreakClass6"><a href="#">Enseignants</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Listes des Enseignants</li>
                </ol>
            </nav>
            <div>
                <div class="center row bg-light divAdmin">
                    <div class="col-4"><strong>Listes des enseignants</strong></div>
                    <div class="col-4"><strong>Nombre d'enseignants 
                        <?php  require_once '../Base/DatabaseConnexion.php';
                        require_once '../Base/CRUD.php';
                        $db = new DatabaseConnexion();
                        $count = new CRUD($db);
                        $count_enseignant = $count->count("enseignants"); echo $count_enseignant ?>
                    </strong></div>
                    <div class="col-4 text-end"><a href="EnseignantController.php?action=create" class="btn btn-outline-primary me-3"><span class="p-2">Ajouter un enseignant</span></a>
                    </div>
                </div>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Matricule</th>
                        <th scope="col">Prénom</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Adresse</th>
                        <th scope="col">email</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($enseignant as $enseignants) : ?>
                        <tr class="table-secondary">
                            <td scope="row"><?php echo $enseignants['matricule']; ?></td>
                            <td><?php echo $enseignants['prenom']; ?></td>
                            <td><?php echo $enseignants['nom']; ?></td>
                            <td><?php echo $enseignants['adresse']; ?></td>
                            <td><?php echo $enseignants['email']; ?></td>
                            <td>
                                <a class="pe-4 text-dark btn btn-sm btn-warning" href="EnseignantController.php?action=edit&id=<?php echo $enseignants['matricule'];  ?>">
                                    modifier
                                </a>
                                <a class="btn btn-sm btn-danger" href="EnseignantController.php?action=delete&matricule=<?php echo $enseignants['matricule'];  ?>">
                                    supprimer
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <nav aria-label="Page navigation example" class="navClass2">
                <ul class="pagination">
                    <li class="page-item"><a class="page-link text-dark href=" #">Previous</a></li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link bg-primary text-white href=" #">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>
<script>
    function confirmDelete(matricule) {
        Swal.fire({
            title: 'Confirmez-vous la suppression de cet enseignant ?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Oui, supprimer',
            cancelButtonText: 'Annuler'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'EnseignantController.php?action=delete&matricule=' + matricule;
            }
        });
    };
</script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

<?php require '../layouts/footer.php'; ?>