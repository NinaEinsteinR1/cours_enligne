<?php
require_once "class/Enseignant.php";

$enseignant = new Enseignant;

$insert = $enseignant->insert("enseignant", $_POST);

header("Location: index.php");


?>