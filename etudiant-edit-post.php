<?php
require_once "class/Etudiant.php";

$etudiant = new Etudiant;

$update = $etudiant->update("etudiant", $_POST, "idetudiant", $_POST["idetudiant"]);

header("Location: index.php");

?>