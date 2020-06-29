
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css"/>
		<title>Inscription</title>
	</head>
	<body class="inscription">
		<header class="menu">

<nav>
<ul>
<?php include('header.php') ?>
</ul>
</nav>
		</header>

		<?php

		if(isset($_SESSION['login']))  
		{
			header('Location: accueil.php');
		}
			?>



		


		
		<main>
			<section>
				<article class="box">
				<form action="inscription.php" method="post">
					<div class="titre">
						<legend>inscription</legend>
					</div>
					<div class="input-container">
					<input type="text" name="login"  placeholder="login"/>
					<input type="password" name="pass"  placeholder="password"required>
					<input type="password" name="confirmpass"  placeholder="confirmation"required>	
					<div class="btn">
					<input type="submit" value="inscription" name="inscription"/>
					</div></div>
			

				
</form>	
</div>





			
			</article>
		</section>
</main>



<?php
if(isset($_POST["inscription"]))
{

	
	$login=$_POST["login"];
	$pass=$_POST["pass"];
	$confirmpass=$_POST["confirmpass"];	
	if($pass==$confirmpass)
		{

	$connexion = mysqli_connect("localhost", "root", "", "reservationsalles");
	$requete = "INSERT INTO utilisateurs(id,login, password) values (NULL,'$login','$pass')";
	$query = mysqli_query($connexion, $requete);
	mysqli_close($connexion);
	header('Location: connexion.php');
	
}
else{

	?>
	<div class="test">
		<?php
		echo "les mdp ne correspondent pas";
		?>
		</div>
		<?php
	}



	
	
}
?>
		
			

<footer>
				<section>
				Copyright © 2020 All rights reserved	
				</section>
	</footer>	
</body>
</html>