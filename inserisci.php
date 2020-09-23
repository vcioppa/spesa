<?php
 
 if(isset($_POST['invio'])){
     $prodotto = filter_var($_POST['prodotto'], FILTER_SANITIZE_STRING);
	 //$prodotto = $_POST['prodotto'];
	 $categoria = filter_var($_POST['categoria'], FILTER_SANITIZE_STRING);
	 $quantita =(int) $_POST['quantita'];
	 $prezzo = (int) $_POST['prezzo'];
	 $negozio = filter_var($_POST['negozio'], FILTER_SANITIZE_STRING);
	 $riga = $prodotto."|".$categoria."|". $quantita."|".$prezzo."|".$negozio."\n";
     $archivio=fopen("spesa.txt", "a+") or die ("Impossibile aprire il archivio");
     $newriga = filter_var($riga, FILTER_SANITIZE_STRING);
	 fputs($archivio,$newriga);
	 fclose($archivio);
	 header('location:visualizza.php');
	 
}
?>
<?php include("check.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Elenco attività - Inserimento</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
</head>
<body>
<div class="container">
	<div class="row">
		<form method="post" class="form-horizontal col-md-6 col-md-offset-3">
			<h2>Inserimento attività</h2>
			<div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Nome attività</label>
			    <div class="col-sm-10">
			      <input type="text" name="prodotto"  class="form-control" id="input1" placeholder="Nome attività" />
			    </div>
			</div>

			
			<!--<div class="form-group">
			<label for="input1" class="col-sm-2 control-label">Categoria</label>
			<div class="col-sm-10">
				<select name="categoria" class="form-control">
					<option>Seleziona categoria attività</option>
					<option value="primi">Primi</option>
					<option value="secondi">Secondi</option>
					<option value="contorni">Contorni</option>
					<option value="detersivi">Detersivi</option>
					<option value="bevande">Bevande</option>
					<option value="insaccati">Insaccati</option>
                    
				</select>
			</div>
			</div>
            <div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Quantità</label>
			    <div class="col-sm-10">
			      <input type="text" name="quantita"  class="form-control" id="input1" placeholder="Quantità" />
			    </div>
			</div>
            <div class="form-group">
			    <label for="input1" class="col-sm-2 control-label">Prezzo</label>
			    <div class="col-sm-10">
			      <input type="text" name="prezzo"  class="form-control" id="input1" placeholder="Prezzo" />
			    </div>
			</div>
            <div class="form-group">
			<label for="input1" class="col-sm-2 control-label">Negozio</label>
			<div class="col-sm-10">
				<select name="negozio" class="form-control">
					<option>Seleziona il negozio</option>
					<option value="Deco campetti">Decò campetti</option>
					<option value="Deco Tutuni">Decò Tutuni</option>
					<option value="Deco Luciani">Deco Luciani</option>
					<option value="Deco Pancaro">Decò Pancaro</option>
					<option value="risparmioso">Super Risparmioso</option>
					<option value="Tre C">Tre C</option>
                    <option value="decumano">Decumano</option>
				</select>
			</div>
			</div>-->
			<input type="submit" class="btn btn-primary col-md-2 col-md-offset-10" value="Invia" name="invio"/>
		</form>
	</div>
</div>
</body>
</html>
