<?php
include("check.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf8_encode">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--<meta charset="utf-8">-->
	<title>Elenco attività</title>
		<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>
<body>
<div class="container">
	<nav class="col-sm-12" class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#">Elenco attività</a>
			</div>
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="inserisci.php">Inserisci attività</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
			<!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Registrati </a></li>-->
			<li><a href="destroy.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
			</ul>
		</div>
	</nav>

	<div class="col-sm-12" class="row">
		<table class="table">
			<tr>
				<th>#</th>
				<th>Attività</th>
				<!--<th>Categoria</th>
				<th>Quantita</th>
				<th>Prezzo</th>
				<th>Negozio</th>-->
			</tr>
			<?php
			$arc=fopen("spesa.txt","r");
			$i=0;
            //$vet=array();
            //$vet=file($arc);
			while(!feof($arc)){
				
				$i++;
				$riga=fgets($arc);
                if(strlen($riga)!=0)
                {
               /*list($prodotto, $categoria, $quantita, $prezzo, $negozio)=explode("|",$riga);*/
               list($prodotto)=explode("|",$riga);
                
				
			?>
            
			<tr>
				<td><?php echo "$i"; ?></td>
				<td><?php echo "$prodotto"; ?></td>
                <!--<td><?php echo "$categoria"; ?></td>
				<td><?php echo "$quantita"; ?></td>
				<td><?php echo "$prezzo"; ?></td>
				<td><?php echo "$negozio\n"; ?></td>-->
				<td><a href="update.php?id=<?php echo $i; ?>" class="btn btn-primary">Modifica</a> <a href="cancella.php?id=<?php echo $i; ?>" class="btn btn-danger">Cancella</a></td>
			</tr>
			<?php }
            }
            fclose($arc);
            ?>
		</table>
	</div>
</div>
</body>

</html>