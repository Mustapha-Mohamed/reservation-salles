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

<form action="reservation-form.php" method="post">
<fieldset>
   <legend>Evenement </legend>
   <label>Titre :</label>
		<input type="text" name="titre" >
<label>Description :</label>
        <input type="text" name="description"></fieldset>
<fieldset>  
<legend>date </legend>      
<label>Date de début :</label>
		<input type="datetime-local" name="debut">
<!<label>Date de fin :</label>
        <input type="datetime-local" name="fin">
</fieldset>
<fieldset>  
        <input type="submit" name="reserver" value="Reserver">
</fieldset>
</form>

<?php
if(isset($_POST["reserver"]))
{
	$titre=$_POST["titre"];
	$description=$_POST["description"];
	$debut= $_POST["debut"];
	$fin=$_POST["fin"];		
    $connexion = mysqli_connect("localhost", "root", "", "reservationsalles");
    
	$requete = "INSERT INTO `reservations` (`titre`, `description`, `debut`, `fin`, `id_utilisateur`)
	VALUES('".$titre."', '".$description."', '".$debut."', '".$fin."' , '".$_SESSION["id"]."')"; 
  $query = mysqli_query($connexion, $requete);

    

	header('Location: planning.php');
	
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