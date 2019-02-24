<?
	 try
	 {
		 $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', '___', '***');
	 }
	 catch (Exception $e)
	 {
	     die('Erreur : ' . $e->getMessage());
	 }

 $req = $bdd-> prepare('INSERT INTO minichat_2 (pseudo,message) VALUES (?,?)' );
 $req -> execute(array(
	 $_POST['pseudo'],
	 $_POST['message']
	 ));

header('Location : Mini_chat.php');

?>
