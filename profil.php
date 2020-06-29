  


<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css"/>
		<title>Profil</title>

	</head>

	<body class="fondgrey">
	<header class="menu">
 <nav>
<ul>
<?php include('header.php') ;

?>

</ul>
 </nav>
</header>
<main>
	<?php
			$connexion = mysqli_connect("localhost", "root", "", "reservationsalles");
$sql = "SELECT * FROM utilisateurs WHERE id='".$_SESSION['id']."'";
$req = mysqli_query($connexion, $sql);
$req2 = mysqli_fetch_assoc($req);

if(isset($_POST['modifier']))
{
	if(!empty($_POST['login']) && !empty($_POST['pass']))
	{
		$login = $_POST['login'];
		$passe = $_POST['pass'];
		
		
		if($passe != $req2['password'])
		{
			
			$sql = "UPDATE utilisateurs SET password = '$passe' WHERE login = '".$_SESSION['login']."'";
			mysqli_query($connexion, $sql);
			$_SESSION['password'] = $_POST['pass'];
			$modif_passe = true;
		}	{
			echo "<p>Mot de passe modifier avec succès</p>";}
	}

	mysqli_close($connexion);

}
?>		<section>
	
		
	<form class="formu" method="post">
		<div class="titre"><legend>Modification </legend>
</div>
			<fieldset>	<label> LOGIN :</label>
			      <input type="text" name="login" maxlength="10"  class="profil2"/></fieldset>
			<fieldset><label>MODIFIER MOT DE PASSE :</label>
			<input type="password" name="pass" minlength="4" class="profil2"/></fieldset>

					<fieldset><label>Bouton Modifier :</label>
					<input type="submit" value="MODIFIER" name="modifier"/></fieldset>
					


				</form>
			
		
</section>
</main>

<footer>
		<section>
				Copyright © 2020 All rights reserved
		</section>
	</footer>	
			</body>	
</html>