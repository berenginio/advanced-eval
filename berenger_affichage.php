<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Evaluation</title>
		<link rel="stylesheet" href="style.css" type="text/css" /> 
	</head>

<body>

<header>
	<h1> Advanced Eval - Berenger FRAGNY </h1>		
</header>


<?php include('berenger.php'); ?>
		
		<?php function calcul_taux_remplissage ($poidReel, $poidMax){

			$taux_remplissage = $poidReel*100/$poidMax;
			$taux_remplissage = ceil($taux_remplissage).'%';
			return $taux_remplissage;

			}
		?>
	<table>
		<tr>
			<th></th>
			<th>ID</th>
			<th>Poids maximum</th>
			<th>Poids réel</th>
			<th>Type de contenu</th>
		</tr>
		<?php 	foreach ($container as $key => $value){ ?>

				<tr>
			       <td><?php echo $key ?></td>

				  

						
							<td><?php echo $value["ID"]; ?></td>
							<td><?php echo $value["poid_max"]; ?></td>
							<td><?php echo $value["poid_reel"]; ?></td>
							<td><?php echo $value["contenu"]; ?></td>
							<td><?php echo calcul_taux_remplissage($value["poid_reel"], $value["poid_max"]); ?></td>
						
					
				
			       
			   </tr>
		
		<?php } ?>
	</table>
	

		<footer class="footer">
			
		</footer>

	</body>
</html>