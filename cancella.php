<?php
    $id = $_GET['id'];
    $id--;
	
	$righe=file("spesa.txt");
	foreach ($righe as $key => $riga){
		//list($a, $b, $c, $d, $e)=explode("|", $riga);
		if($key==$id){
			unset($righe[$id]);
		}				
	}
	
	$archivio=fopen("spesa.txt", "w+");
	foreach($righe as $key => $riga){
		fputs($archivio, $riga);
	}
	fclose($archivio);
	header('location:visualizza.php');
?>
 
