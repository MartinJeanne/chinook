<?php
// Connection à la base de donnée
try {
	$bdd = new PDO("mysql:host=localhost;dbname=chinook;charset=utf8", "root", "");
}

catch (Exception $e) {
	die("Erreur : ".$e->get_Message());
}

// Suppression des données dans toutes les tabless (l'ordre des requêtes est important, du aux foreing key)
$sql = "DELETE FROM `comment`; DELETE FROM `album`; DELETE FROM `artist`;";
$req = $bdd->query($sql);

// On reset l'auto increment des id de nos tables
$sql = "ALTER TABLE `comment` AUTO_INCREMENT = 1; ALTER TABLE `album` AUTO_INCREMENT = 1; ALTER TABLE `artist` AUTO_INCREMENT = 1;";
$req = $bdd->query($sql);

header("Location: index.php");
?>