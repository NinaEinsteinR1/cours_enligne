<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Enseignant - create</title>
</head>

<body>
    <div class="list etudiant__list">
        <div class="px">
            <div class="container">
                <h1 class="list__title">Enseignant</h1>
                <form action="enseignant-post.php" method="post" class="form__create">
                    <div class="form__nomComplet flex">
                        <div class="form__prenom">
                            <label for="prenom">Prénom</label>
                            <input type="text" id="prenom" name="prenom" maxlength="45">
                        </div>

                        <div class="form__nom">
                            <label for="nom">Nom</label>
                            <input type="text" id="nom" name="nom" maxlength="45">
                        </div>
                    </div>

                    <div class="form__contact flex">
                        <div class="form__phone">
                            <label for="phone">Phone</label>
                            <input type="text" id="phone" name="phone" maxlength="25">
                        </div>

                        <div class="form__courriel">
                            <label for="courriel">Courriel</label>
                            <input type="text" id="courriel" name="courriel" maxlength="50">
                        </div>
                    </div>

                    <div class="form__groupeSubmit flex">
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
