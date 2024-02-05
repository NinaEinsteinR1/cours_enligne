<?php
require_once "class/Etudiant.php";
require_once "class/Groupe.php";

$etudiant = new Etudiant();
$resultat = $etudiant->selectId("etudiant", "idetudiant", $_GET["idetudiant"]);
$groupe = new Groupe();
$select = $groupe->select("groupe");

foreach ($resultat as $key => $value) {
    $$key = $value;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Student - Edit</title>
</head>

<body>
    <main class="content-section">
        <div class="container">
            <h1 class="section-title">Student - Edit</h1>
            <form action="etudiant-edit-post.php" method="post" class="edit-form">
                <input type="hidden" value="<?php echo $idetudiant; ?>" name="idetudiant">

                <div class="form-group flex-layout">
                    <div class="field-group">
                        <label for="prenom">First Name</label>
                        <input type="text" id="prenom" name="prenom" maxlength="45" value="<?php echo $prenom; ?>">
                    </div>

                    <div class="field-group">
                        <label for="nom">Last Name</label>
                        <input type="text" id="nom" name="nom" maxlength="45" value="<?php echo $nom; ?>">
                    </div>
                </div>

                <div class="form-group flex-layout">
                    <div class="field-group">
                        <label for="phone">Phone</label>
                        <input type="text" id="phone" name="phone" maxlength="25" value="<?php echo $phone; ?>">
                    </div>

                    <div class="field-group">
                        <label for="courriel">Email</label>
                        <input type="text" id="courriel" name="courriel" maxlength="50" value="<?php echo $courriel; ?>">
                    </div>
                </div>

                <div class="form-group flex-layout">
                    <div class="field-group">
                        <label for="groupe_idgroupe">Group</label>
                        <select name="groupe_idgroupe" id="groupe_idgroupe" class="select-field">
                            <?php
                            foreach ($select as $option) {
                                echo "<option value='{$option["idgroupe"]}'>{$option["nom"]}</option>";
                            }
                            ?>
                        </select>
                    </div>

                    <div class="submit-area">
                        <input class="submit-button" type="submit" value="Submit">
                        <a href="etudiant-delete.php?idetudiant=<?php echo $idetudiant; ?>" class="delete-button"><i class="fa-solid fa-trash"></i>Delete</a>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>
