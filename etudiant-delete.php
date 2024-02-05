<?php
require_once "class/Etudiant.php";


$etudiant = new Etudiant;

$delete = $etudiant->delete("etudiant", $_GET["idetudiant"], "index.php");
?>