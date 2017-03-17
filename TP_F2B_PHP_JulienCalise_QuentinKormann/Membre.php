<?php

try
{
	$bdd = new PDO('mysql:host=localhost;dbname=facturef2b','root','root');
	}
		catch (Exception $e)
	{
		die('Erreur:'.$e->getMessage());
	}






?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>GestionClient</title>
  <link rel="stylesheet" href="Site_CSS.css">
</head><body><div  id="carbonForm">

<ul class="menu-vertical">

	<li class="mv-item">Table
		<ul>
			<li class="mv-item"><a href="Membre.php">Membre</a></li>
			<li class="mv-item"><a href="Client.php">Client</a></li>
			<li class="mv-item"><a href="Facture.php">Facture</a></li>
		</ul>
	</li>
</ul>
</div>
<div  id="carbonForm">
<table id="table_resultat">
<thead> <!-- entête du tableau -->
		<tr>
			<th>login</th>
			<th>password</th>

		</tr>
		</thead>
		<tbody> <!-- corps du tableau -->

<?php
$reponse= $bdd->query("SELECT * FROM membre");

while($donnees = $reponse->fetch())
{
	?>

		<tr>
			<td><?php echo $donnees['login']; ?></td>
			<td><?php echo $donnees['password']; ?></td>
		</tr>

	<?php
}
?>
	</tbody>
</table>
<?php
?>
</div>



</div></body>




