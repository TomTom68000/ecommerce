<?php 
session_start();
if (!$_SESSION['mdp']) {
	header('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
</head>
<body>

	<a href="membres.php">Afficher tous les membres</a>
	<a href="publier-article.php">Publier un article</a>
	<a href="articles.php">Afficher tous les articles</a>

</body>
</html>