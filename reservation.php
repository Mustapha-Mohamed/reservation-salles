<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css"/>
		<title>reservation</title>
	</head>

<body class="fondgrey">

  <header class="menu">
 <nav>
<ul>
<?php include('header.php') ?>
</ul>
 </nav>
</header>



<main>
	<section>
		<article>
      <?php  
     
$connexion = mysqli_connect("localhost", "root", "", "reservationsalles");
$id=$_GET['id'];
$sql = "SELECT reservations.titre, reservations.description,reservations.debut,reservations.fin,utilisateurs.id,
 utilisateurs.login FROM reservations INNER JOIN utilisateurs
ON reservations.id_utilisateur = utilisateurs.id WHERE reservations.id='$id' ";
       $resultat = mysqli_query($connexion, $sql);
       while($data = mysqli_fetch_array($resultat))
       {
      ?>
<div id="formulaire">
		 	<p><?php echo $data['login'];?></p>
             <p><?php echo $data['titre'];?></p>
             <p><?php echo $data['description'];?></p>	
             <p><?php echo $data['debut'];?></p>
             <p><?php echo $data['fin'];?></p>
                          </article>
    </section>
    <?php
		  }
			
		


			
					?>
</main>


<footer>
				<section>
				Copyright © 2020 All rights reserved
		</section>
	</footer>	
</body>
</html>