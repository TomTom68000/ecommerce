<?php 
$bdd = new PDO('mysql:host=localhost;dbname=espace_admin', 'root', '');
if (isset($_GET['id']) AND !empty($_GET['id'])) {
	$getid = $_GET['id'];

	$recupArticle = $bdd->prepare('SELECT * FROM articles WHERE id = ? ');
	$recupArticle->execute(array($getid));
	if ($recupArticle->rowCount() > 0) {
		$articleInfos = $recupArticle->fetch();
		$titre = $articleInfos['titre'];
		$description = str_replace('<br />', '', $articleInfos['description']);

		if (isset($_POST['valider'])) {
			$titre_saisi = htmlspecialchars($_POST['titre']);
			$description_saisie = nl2br(htmlspecialchars($_POST['description']));

			$updateArticle = $bdd->prepare('UPDATE articles SET titre = ?, description = ? WHERE id = ?');
			$updateArticle->execute(array($titre_saisi, $description_saisie, $getid));

			header('Location: articles.php');
		}
		
	}else{
		echo "Aucun article trouvé";
	}

}else{
	echo "Aucun identifiant trouvé";
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Modifier l'article</title>
</head>
<body>

	<form method="POST" action="">
		<input type="text" name="titre" value="<?= $titre; ?>">
		<br>
		<textarea name="description"><?= $description; ?></textarea>
		<br><br>
		<input type="submit" name="valider">
	</form>

</body>
</html>