<?php

	session_start(); // Crée une session

	try{
		$bdd = new PDO('mysql:host=localhost;dbname=facturef2b','root','root'); // Crée une connection a la base de donnée
	}

	catch (Exception $e){ // Verifie que la base de donnée a bien été connecté
			die('Erreur:'.$e->getMessage()); // Sinon affiche un message d'erreur
	}


	echo'<!doctype html>
	<html lang="fr">
		<head>
		  <meta charset="utf-8">
		  <title>GestionClient</title> <!-- Nom de la fenetre -->
		  <link rel="stylesheet" href="Blog_CSS.css"> 
		</head>

		<body>
			<div id="carbonForm"> <!-- Mise en forme CSS -->
				<h1>SignIn</h1> <!-- Affiche en taille max -->

				<form action="submit.php" method="post" id="signupForm"> <!-- Indique une cible et choisi la methode de passage dans l\'adresse -->

					<div class="fieldContainer">
						<div class="formRow">
							<div class="label">
							<label for="name">Name:</label> <!-- Affiche Name: -->
							</div>
							<div class="field">
							<input type="text" name="name" id="name" /> <!-- Crée un champ de texte remplissable -->
							</div>
						</div>

						<div class="formRow">
							<div class="label">
							<label for="name">Password:</label> <!-- Affiche Password: -->
							</div>
							<div class="field">
							<input type="text" name="password" id="password" /> <!-- Crée un champ de texte cacher remplissable -->
							</div>
						</div>

						<div class="signupButton">
							<input type="submit" name="submit" id="submit" value="Signup" /> <!-- Envoie les champs et passe a la page ciblez -->
						</div>
					</div>	
				</form>
			</div>
		</body>
	</html>';
?>