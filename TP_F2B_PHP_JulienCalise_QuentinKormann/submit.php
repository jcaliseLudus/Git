<?php

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=facturef2b','root','root'); // Crée une connection a la base de donnée
	}

	catch (Exception $e) // Verifie que la base de donnée a bien été connecté
	{
		die('Erreur:'.$e->getMessage()); // Sinon affiche un message d'erreur
	}

	error_reporting(E_ALL^E_NOTICE);
	$redirectURL = "index.php";
	$redirectURL2 = "Blog.php"; 
	$errors = array();

	if(!$_POST['name'] || strlen($_POST['name'])<3 || strlen($_POST['name'])>50) // Verifie que le nom est entre 3 et 50 caractère
	{
		$errors['name']='Veulliez entrer un nom valide!<br />Il doit contenir entre 3 et 50 caractères.'; // Sinon affiche un message d'erreur
	}

	if(!$_POST['password'] || strlen($_POST['password'])<5) // Verifie que le MDP a au moin 5 caractère
	{
		$errors['pass']='Veulliez entrer un mot de passe valide!<br />Il doit contenir au moin 5 caractères.'; // Sinon affiche un message d'erreur
	}

	if(count($errors))
	{
		echo '<h2>'.join('<br /><br />',$errors).'</h2>'; // Si il y a des erreur les affiche
		header('refresh:3;url='.$redirectURL2); // Envoie l'utilisateur sur une autre page au bout de 3 seconde
	}

	if(isset($_POST['name']) && isset($_POST['password']))
	{
		$query = $bdd->prepare('SELECT password, login FROM membre WHERE login = :name'); // Verifie dans la BDD si un nom correspond
		$query->bindValue(':name', $_POST['name'], PDO::PARAM_STR);
		$query->execute();
		$data=$query->fetch(); // Met le nom de l'utilisateur dans une variable

		if($data['password'] == md5($_POST['password'])) // Verifie si le MDP correspond au MDP correspondant dans la BDD 
		{
			$_SESSION['login'] = $data['login']; // Enregistre l'utilisateur dans la session
			$message = 'Bienvenue'.$data['login'].', vous êtes bien connecté, Cliquez <a href="index.php">ici</a>';
			header('refresh:3;url='.$redirectURL); // Envoie l'utilisateur sur une autre page au bout de 3 seconde
			echo $message.'</div></body></html>';
		}

		else
		{
			$message = '<p> Une erreur s\'est produite pendant votre identification.';
			header('refresh:3;url='.$redirectURL2); // Envoie l'utilisateur sur une autre page au bout de 3 seconde

		}
		$query->CloseCursor();
	}	
?>