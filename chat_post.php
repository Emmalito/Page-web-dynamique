<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', '___', '***');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
	

// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO minichat (Nom, Message) VALUES(?, ?)');
$req->execute(array($_POST['pseudo'], $_POST['message']));

// Redirection du visiteur vers la page du minichat
header('Location: chat.php');
?>




