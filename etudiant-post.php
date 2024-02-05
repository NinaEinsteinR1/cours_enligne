<?php
require_once "class/Etudiant.php";

$etudiant = new Etudiant;

$insert = $etudiant->insert("etudiant", $_POST);

header("Location: index.php");


?>