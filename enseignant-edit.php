<?php
require_once "class/Enseignant.php";

$enseignant = new Enseignant;
$resultat = $enseignant->selectId("enseignant", "idenseignant", $_GET["idenseignant"]);


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
    <title>Enseignant - Edit</title>
</head>

<body>
    <div class="list">
        <div class="px">
            <div class="container">
                <h1 class="list__title">Enseignant - Edit</h1>
                <form action="enseignant-edit-post.php" method="post" class="form__create">
                    <input type="hidden" value="<?php echo $idenseignant; ?>" name="idenseignant">

                    <div class="form__nomComplet flex">
                        <div class="form__prenom">
                            <label for="prenom">Prénom</label>
                            <input type="text" id="prenom" name="prenom" maxlenght="45" value="<?php echo $prenom; ?>">
                        </div>

                        <div class="form__nom">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" maxlenght="45" value="<?php echo $nom; ?>">
                        </div>
                    </div>

                    <div class="form__contact flex">
                        <div class="form__phone">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" maxlenght="25" value="<?php echo $phone; ?>">
                        </div>

                        <div class="form__courriel">
                            <label for="courriel">Courriel</label>
                            <input type="text" id="courriel" name="courriel" maxlenght="50" value="<?php echo $courriel; ?>">
                        </div>
                    </div>

                    <div class="form__groupeSubmit flex">
                        <div class="form__btn">
                            <input class="form__submit" type="submit">
                            <a href="enseignant-delete.php?idenseignant=<?php echo $idenseignant; ?>" class="delete"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</body>

</html>