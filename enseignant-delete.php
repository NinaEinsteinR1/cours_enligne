<?php
require_once "class/Enseignant.php";


$enseignant = new Enseignant;

$delete = $enseignant->delete("enseignant", $_GET["idenseignant"], "index.php");


?>