<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin', 'root', '');
if (!$_SESSION['mdp']) {
	header('Location: connexion.php');
}

if (isset($_POST['envoi'])) {
	if (!empty($_POST['titre']) AND !empty($_POST['description'])) {
		$titre = htmlspecialchars($_POST['titre']);
		$description = nl2br(htmlspecialchars($_POST['description']));

		$insererArticle = $bdd->prepare('INSERT INTO articles(titre, description)VALUES(?, ?)');
		$insererArticle->execute(array($titre, $description));

		echo "L'article a bien été envoyé";
	}else{
		echo "Veuillez compéter tous les champs...";
	}
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Publier un article</title>
</head>
<body>

	<form method="POST" action="">
		<input type="text" name="titre">
		<br>
		<textarea name="description"></textarea>
		<br>
		<input type="submit" name="envoi">
	</form>

</body>
</html>