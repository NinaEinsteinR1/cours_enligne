<?php

require_once "class/Groupe.php";
$groupe = new Groupe;
$select = $groupe->select("groupe");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Etudiant - create</title>
</head>

<body>
    <div class="list">
        <div class="px">
            <div class="container">
                <h1 class="list__title">Etudiant</h1>
                <form action="etudiant-post.php" method="post" class="form__create">
                    <div class="form__nomComplet flex">
                        <div class="form__prenom">
                            <label for="prenom">Prénom</label>
                            <input type="text" id="prenom" name="prenom" maxlenght="45">
                        </div>

                        <div class="form__nom">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" maxlenght="45">
                        </div>
                    </div>

                    <div class="form__contact flex">
                        <div class="form__phone">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" maxlenght="25">
                        </div>

                        <div class="form__courriel">
                            <label for="courriel">Courriel</label>
                            <input type="text" id="courriel" name="courriel" maxlenght="50">
                        </div>
                    </div>

                    <div class="form__groupeSubmit flex">
                        <div class="form__groupe">
                            <label for="groupe_idgroupe">Groupe</label>
                            <select name="groupe_idgroupe" id="groupe_idgroupe" class="form__select">
                                <?php
                                for ($i = 0; $i < count($select); $i++) {
                                    echo "<option value='{$select[$i]["idgroupe"]}'>{$select[$i]["nom"]}</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div>
                            <input class="form__submit" type="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>