<!DOCTYPE html>
<html>
<head>

<title>PHP-TP4</title>
</head>

<style >
table , th , td {
border: 1px solid blue;
border-collapse: collapse;
}
</style >

<body>

<?php
$fichier = "user.csv";
if ( $_SERVER ['REQUEST_METHOD'] == 'POST') {
$utilisateur = $_POST ['utilisateur'];
$pass = $_POST ['pass'];

if (!file_exists($fichier))
	echo "le fichier n'existe pas";

$monFichier = fopen($fichier, "r");//ouverture du fichier avec le mode de lecture
//$contenu = fread($monFichier, filesize($fichier)); //lecture du contenu du fichier et le mettre dans la variable $contenu

$test = 0;
while(!feof($monFichier)){
		//$car = fgetc($monFichier); //lecture caractère par caractère
		$ligne = fgets($monFichier); //lecture d'une ligne
		$T = explode(" ",$ligne);//transforme la ligne vers un tableau

		if ($T[0] == $utilisateur and $T[1] == $pass){
			echo "Bienvenu $utilisateur";
			$test = 1;
			break;
		}
}

if ($test == 0)
	echo "$utilisateur n'existe pas <a href ='index.php'>retour</a>";

fclose($monFichier);
}
?>




</body>
</html>
