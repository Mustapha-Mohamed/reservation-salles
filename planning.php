<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="index.css"/>
		<title>planning</title>
	</head>
	<body class="fondgrey">
		<header class="menu">
		<nav>
<ul>
<?php include('header.php')
?>
</ul>
 </nav>
		</header>
		
		<main>
<section>
<table border="1">
	<thead>
		<tr>
			<td></td>
			<td>Lundi</td>
			<td>Mardi</td>
			<td>Mercredi</td>
			<td>Jeudi</td>
			<td>Vendredi</td>
			<td>Samedi</td>
			<td>Dimanche</td>
        </tr>

<?php
	
						
$ligne = 11;
$colonne = 7;
$jour = array('Lundi','Mardi','Mercredi','Jeudi','Vendredi',
'Samedi','Dimanche');
$heure=array('08h00','09h00','10h00','11h00','12h00','13h00',
'14h00','15h00','16h00','17h00','18h00','19h00')	;
$connexion = mysqli_connect("localhost", "root", "", "reservationsalles");
$sql = "SELECT * FROM reservations ";
$query = mysqli_query($connexion, $sql);
$resultat=mysqli_fetch_all($query);


?>
   <tbody>
    <tr>

<?php


for($ligne =8; $ligne <= 19; $ligne++ )
{

		echo '<tr>';
		echo "<td>".$ligne."</td>";

  	for($colonne = 1; $colonne <= 7; $colonne++)
  	{
    
				echo "<td>";
				foreach($resultat as $value){

	$id=$value[0];
					$jour=date("w", strtotime($value[3]));
					$heure=date("H", strtotime($value[3]));
				
					if($heure==$ligne && $jour== $colonne)
						{
						
						echo"<a href=\"reservation.php?id=".$id."\">$value[2]</a>";
						
						
					
						}
						else{
							//echo "non";
						}
						
						
						
						 
		
						
		}
		echo '</td>';
	}
		echo '</tr>';			
}
?>



</tr>
   </tbody>

</table>


</section>

</main>
<footer>
				<section>
				Copyright © 2020 All rights reserved
		</section>
	</footer>	
</body>
</html>

