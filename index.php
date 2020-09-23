<?php
session_start();
if (isset($_POST["invio"])) {
  $puntatore = fopen("pasx.txt", "r");
  $trovato = 0;
  while ((!feof($puntatore)) && (!$trovato)) {
    $linea = fgets($puntatore);
    $trovato = stristr($linea, $_POST["userid"]);
    $puntatore++;
  }
  fclose($puntatore);
  list($nomeutente, $password) = explode ("~:~", $linea);
  if (($trovato)  && ($_POST["passwd"] == trim($password))) {
    //session_register('autorizzato');
    $_SESSION["autorizzato"] = 1;
    $destinazione = "visualizza.php";
  } else {
    $destinazione = "destroy.php";
  }
  /*echo '<script language=javascript>document.location.href="'.$destinazione.'"</script>';*/
  echo $destinazione;
  header("Location: $destinazione");
} else {
  // HTML ?>
  <!DOCTYPE HTML>
  <html lang="it">
  <head>
  <title>Elenco attività</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta charset="UTF-8">
  <meta name="Generator" content="EditPlus">
  <meta name="Author" content="Enzo Cioppa">
  <meta name="Keywords" content="">
  <meta name="Description" content="">
  <link rel="stylesheet" type="text/css" href="css/stile.css">
  </head>
  <style>
  	body {background-color: orange;}
    form {background-color: #25FF00;}
  
  </style>
  <body>
  <div id="verticale">
  <form method=post action='' style="background-color:green;">
   <fieldset>
   		<legend id="centrato">Inserire nome utente e password</legend>
          nome utente: <input type="text" name="userid">
          &nbsp;<br>
          &nbsp;<br>
          password:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="password" name="passwd">
          &nbsp;<br>
          &nbsp;<br>
          <input type="submit" name="invio" value="invio">
          &nbsp;&nbsp;
          <input type="reset" name="cancella" value="cancella">
   </fieldset>
  </form>
  </div>
  </body>
  </html>
<?php //fine HTML
}
?>
