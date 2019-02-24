<?
	 try
	 {
		 $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', '___', '***');
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
     	 <a href="Commentaire_post.php">Retour à la liste de billets</a>

     	 <?
     	 $billets = $bdd->prepare('SELECT * FROM billets WHERE id=?' ) ;
     	 $billets -> execute(array($_GET['id']));

     	 $billet = $billets->fetch();

     	 echo "<h3>".$billet['titre']. " le ".$billet['date_creation']."</h3><br/>" ;
     	 echo $billet['contenu']."<br/>" ;

     	 $billets -> closeCursor()

     	 ?>

     	 </p>


     	 <p>

     	 <h3>Commentaires</h3>

     	 <?
     	 $com = $bdd->prepare('SELECT * FROM commentaires WHERE id_billet = ? ');
     	 $com -> execute(array($_GET['id']));

     	 while($donnee = $com -> fetch())
     	 {
     	 
     	 	 echo "<p>".htmlspecialchars($donnee['auteur']). " le ".htmlspecialchars($donnee['date_commentaire']). "<br/>" ;
     	 	 echo "<br/>".htmlspecialchars($donnee['commentaire']) ;     	 
     	 }
     	 $com -> closeCursor()

     	 ?>



     	 </p>


 	 </body>

 </html>
