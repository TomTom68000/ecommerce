<?php
session_start();
if(!$_SESSION['mdp']){
	header('Location: connexion.php');
}
echo $_SESSION['pseudo'];
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Home</title>
 </head>
 <body>
 
 	<a href="deconnexion.php"><button>Se déconnecter</button></a>

 </body>
 </html>