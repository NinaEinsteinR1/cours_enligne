<?php
require_once "class/Enseignant.php";

$enseignant = new Enseignant;

$update = $enseignant->update("enseignant", $_POST, "idenseignant", $_POST["idenseignant"]);

header("Location: index.php");

?>