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
         <title>MiniChat</title>
     </head>


     <body>
     	
     <form method="post" action="chat_post.php">

     <p>
     	 <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" /><br/>
	     <label for="message">Message</label> : <input type="text" name="message" /><br/>
	     <input type="submit" value="Valider" />

	 </p>

	 </form>


	 <?

	 $reponse = $bdd->query('SELECT * FROM minichat LIMIT 0, 10');

	 while($donnee = $reponse -> fetch())
	 {
	 	 echo  '<p><strong>'.htmlspecialchars($donnee['Nom']) . '</strong> : ' .  
	 	 htmlspecialchars($donnee['Message']) . '</p>';
	 }

	 $reponse->closeCursor();

	 ?>

     </body>
     

</html>
