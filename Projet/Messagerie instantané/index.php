<?php  
$bdd = new PDO('mysql:host=localhost;dbname=messagerie;charset=utf8;', 'root', '');
if (isset($_POST['valider'])) {
	if (!empty($_POST['pseudo']) AND !empty($_POST['message'])) {
		$pseudo = htmlspecialchars($_POST['pseudo']);
		$message = nl2br(htmlspecialchars($_POST['message']));


		$insererMessage = $bdd->prepare('INSERT INTO messages(pseudo, message) VALUES(?, ?)');
		$insererMessage->execute(array($pseudo, $message));
	}else{
		echo "Veuillez compléter tous les champs...";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Messagerie instantané</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>

	<form method="POST" action="" align="center">
		<input type="text" name="pseudo">
		<br><br>
		<textarea name="message"></textarea>
		<br>
		<input type="submit" name="valider">
	</form>
	<section id="messages"></section>

	<script>
		setInterval('load_messages()', 500);
		function load_messages(){
			$('#messages').load('loadMessages.php');
		}
	</script>

</body>
</html>