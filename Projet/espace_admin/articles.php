<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin', 'root', '');
if (!$_SESSION['mdp']) {
	header('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Afficher tous les articles</title>
</head>
<body>

	<?php 
		$recupArticles = $bdd->query('SELECT * FROM articles');
		while($article = $recupArticles->fetch()){
			?>
			<div class="article" style="border: 1px solid black;">
				<h1><?= $article['titre']; ?></h1>
				<!-- <br> -->
				<p><?= $article['description']; ?></p>
				<a href="supprimer-article.php?id=<?= $article['id']; ?>"><button style="background-color: red; color: white; margin-bottom: 10px;">Supprimer l'article</button></a>

				<a href="modifier-article.php?id=<?= $article['id']; ?>"><button style="background-color: yellow; color: black; margin-bottom: 10px;">Modifier l'article</button></a>
				
			</div>
			<br>
			<?php
		}
	?>

</body>
</html>