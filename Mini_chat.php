<!DOCTYPE html>
<html lang="fr">

     <head>
         <meta charset="utf-8" />
         <title>Mini chat amélioré</title>
     </head>

     <style>
     form
     {
         text-align:center;
     }
     </style>


     <body>

     <form action="Mini_chat_post.php" method="post">

     	 <p>
     	 <label for="pseudo">Pseudo</label> : <input type="text" name="pseudo" /> <br/>
     	 <label for="message">Message</label> : <textarea name="message" rows="1" cols="50">
		 Votre message ici.
		 </textarea><br/>
     	 <input type="submit" name="Valider" />
     	 </p>

     </form>

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

     <p>
     <?
     	 $com = $bdd -> query("SELECT * FROM minichat_2");
     	 while ($donnees = $com->fetch())
     	 {
     	 	 echo "<em> ' ". $donnees["date_message"]." ' </em>  <strong>". htmlspecialchars($donnees['pseudo']). "</strong> : ". htmlspecialchars($donnees['message']). "<br/>".PHP_EOL;
     	 }
     	 $com -> closeCursor();

     ?>
     </p>
     	
     </body>

</html>
