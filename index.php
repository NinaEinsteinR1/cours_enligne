<?php
// Inclusion des classes nécessaires
require_once "class/Etudiant.php";
require_once "class/Enseignant.php";
require_once "class/Cours.php";

// Création d'une instance de la classe Etudiant
$etudiant = new Etudiant;
// Récupération des données des étudiants triés par groupe en ordre ascendant
$selectStudent = $etudiant->select("etudiant", "groupe", "ASC");

// Création d'une instance de la classe Enseignant
$enseignant = new Enseignant;
// Récupération des données des enseignants
$selectTeacher = $enseignant->select("enseignant");

// Création d'une instance de la classe Cours
$cours = new Cours;
// Récupération des données des cours triés par titre
$selectCours = $cours->select("cours", "titre");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <title>Liste</title>
</head>

<body>
    <!-- En-tête de la page -->
    <header class="header">
        <div class="container flex">
            <div class="header__text">
                <h1>Cours en ligne d'apprentissage d'une nouvelle langue</h1>
            </div>
        </div>
    </header>

    <!-- Section pour la liste des étudiants -->
    <div class="list etudiant__list">
        <div class="px">
            <div class="container">
                <div class="list__title flex">
                    <h1>Etudiant</h1>
                    <!-- Lien vers la page de création d'étudiant -->
                    <a href="etudiant-create.php" class="etudiant__create--link"><span class="etudiant__create--text">CREATE</span><i class="fa-solid fa-user-plus"></i></a>
                </div>
                <!-- Tableau pour afficher la liste des étudiants -->
                <table>
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Phone</th>
                            <th>Courriel</th>
                            <th>Groupe</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Boucle pour afficher les données des étudiants dans le tableau
                        foreach ($selectStudent as $row) {
                        ?>
                            <tr>
                                <td><?php echo $row["nomEtudiant"]; ?></td>
                                <td><?php echo $row["phone"]; ?></td>
                                <td><?php echo $row["courriel"]; ?></td>
                                <td><?php echo $row["groupe"]; ?></td>
                                <!-- Liens pour l'édition et la suppression d'étudiants -->
                                <td><a href="etudiant-edit.php?idetudiant=<?php echo $row["idetudiant"]; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                <td><a href="etudiant-delete.php?idetudiant=<?php echo $row["idetudiant"]; ?>"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Section pour la liste des enseignants -->
    <div class="list enseignant__list">
        <div class="px">
            <div class="container">
                <div class="list__title flex">
                    <h1>Enseignant</h1>
                    <!-- Lien vers la page de création d'enseignant -->
                    <a href="enseignant-create.php" class="etudiant__create--link"><span class="etudiant__create--text">CREATE</span><i class="fa-solid fa-user-plus"></i></a>
                </div>
                <!-- Tableau pour afficher la liste des enseignants -->
                <table>
                    <thead>
                        <tr>
                            <th>Prénom</th>
                            <th>Nom</th>
                            <th>Phone</th>
                            <th>Courriel</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Boucle pour afficher les données des enseignants dans le tableau
                        foreach ($selectTeacher as $row) {
                        ?>
                            <tr>
                                <td><?php echo $row["prenom"]; ?></td>
                                <td><?php echo $row["nom"]; ?></td>
                                <td><?php echo $row["phone"]; ?></td>
                                <td><?php echo $row["courriel"]; ?></td>
                                <!-- Liens pour l'édition et la suppression d'enseignants -->
                                <td><a href="enseignant-edit.php?idenseignant=<?php echo $row["idenseignant"]; ?>"><i class="fa-solid fa-pen-to-square"></i></a></td>
                                <td><a href="enseignant-delete.php?idenseignant=<?php echo $row["idenseignant"]; ?>"><i class="fa-solid fa-trash"></i></a></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Section pour la liste des cours -->
    <div class="list cours__list">
        <div class="px">
            <div class="container">
                <h1 class="list__title">Cours</h1>
                <!-- Tableau pour afficher la liste des cours -->
                <table>
                    <thead>
                        <tr>
                            <th class="cours__title">Titre</th>
                            <th class="cours__desc">Description</th>
                            <th>Enseignant</th>
                            <th>Groupe</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Boucle pour afficher les données des cours dans le tableau
                        foreach ($selectCours as $row) {
                        ?>
                            <tr>
                                <td class="cours__title"><?php echo $row["titre"]; ?></td>
                                <td class="cours__desc"><?php echo $row["description"]; ?></td>
                                <td><?php echo $row["enseignant"]; ?></td>
                                <td><?php echo $row["groupe"]; ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
