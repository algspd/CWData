<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <link href="/favicon.ico" rel="icon" type="image/x-icon" />
<?php
  $this->load->helper('html');
  echo link_tag('css/style.css');
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CW Data</title>
</head>
<body>


<div id="sobre_impresora">
<h3>Impresora insertada correctamente</h3>
La impresora se ha insertado en la base de datos.
Te recomendamos que ahora añadas tu impresora a <a target="_blank" href="http://reprap.org/wiki/Clone_Wars:_El_imperio_de_los_clones/es">la wiki</a>. Te resultará sencillo, solo tienes que añadir este código en la sección que corresponda a tu impresora, después de subir la fotografía:

<p><?php

if ($printer['printermother']<0) {
  # Si la impresora desciende de una progenitora
  $ascendencia = ', descendiente de Progenitora';
}
else {
  $ascendencia = ', descendiente del clon #'.$printer['printermother'];
}

echo  'File:CW'.
      $printer['printernumber'].
      '-'.
      $printer['printername'].
      '.jpg|\'\'\'Clon #'.
      $printer['printernumber'].
      ': '.
      $printer['printername'] .
      '\'\'\'' . 
      $ascendencia .
      '(' .
      $printer['username'] .
      ',' .
      $provincias[$printer['printerlocation']] .
      ',' .
      $printer['fnacimiento'] .
      ')</p>';

?>

No olvides revisar manualmente el texto que insertas en la wiki, y comprobar que se visualiza correctamente.</br></br>

Ahora puedes <a href="/">visitar el arbol</a> o <a href="/index.php/cw">insertar otra impresora</a>.
</div>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-53250706-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
