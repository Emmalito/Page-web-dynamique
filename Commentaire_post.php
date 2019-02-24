<?
	 try
	 {
		 $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', '__', '***');
	 }
	 catch (Exception $e)
	 {
	     die('Erreur : ' . $e->getMessage());
	 }
?>

<!DOCTYPE html>
<html lang="fr">

     <head>
         <meta charset="utf-8" />
         <title>MON SUPER BLOG</title>
     </head>


     <body>
     <h1>Mon super blog</h1>
     <p>
     	 derniers billets du blog :

     	 <?
     	 $billets = $bdd->query('SELECT * FROM billets LIMIT 0,5' ) ;
     	 while($donnee = $billets -> fetch())
     	 {
     	 	echo "<h3>".$donnee['titre']. " le ".$donnee['date_creation']."</h3><br/>" ;
     	 	echo $donnee['contenu']."<br/>" ;
     	 	echo "<a href=\"Commentaires.php?id=".$donnee['id']."\">Commentaires</a>" ;
     	 }
     	 $billets -> closeCursor()
     	 ?>

     </p>	

     </body>
     

</html>
