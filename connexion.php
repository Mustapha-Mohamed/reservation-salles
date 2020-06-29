<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css"/>
		<title>connexion</title>
	</head>

<body class="connexion">



  <header class="menu">
 <nav>
<ul>
<?php include('header.php') ?>
</ul>
 </nav>
</header>
<main>
	
	<?php
		
		if(isset($_SESSION['login']))
			{
				header('Location: accueil.php');
			} 
			?>
		
				<section> 
					<article class="box">
				<form class="formu" method="post">
						<div class="titre">
						<legend>Connexion</legend>
					</div>
						<div class="input-container">
						<input type="text" name="login" placeholder="login"required/>
						
						<input type="password" name="pass"  placeholder="mot de passe"required/>
						<div class="btn">
						<input type="submit" value="Connexion" name="Connexion"required/>
					</div>
				</div>
			</article>
						
					
				</form>
</section>
</main>


<?php

if(isset($_POST["Connexion"]))
{

	$login=$_POST["login"];
	$password=$_POST["pass"];
	$connexion=mysqli_connect("localhost","root","","reservationsalles");
	$requete = "SELECT * FROM utilisateurs WHERE login='$login'";
	$query=mysqli_query($connexion,$requete);
	$resultat=mysqli_fetch_all($query);

	
  if(!empty($resultat))
  {

    if ($password == $resultat[0][2])
    {
      $_SESSION['id']=$resultat[0][0];
      $_SESSION['login']=$resultat[0][1];
      //var_dump($resultat);
    mysqli_close($connexion);
    header('Location: planning.php');
   }
    else
    {
      ?>
      <div class="test">
    <?php
      echo "le mot de passe est incorrect";
        ?>
      </div>
    <?php
    }

  }
  else
  {
    ?>
      <div class="test">
    <?php
      echo "l'identifiant n'existe pas";
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