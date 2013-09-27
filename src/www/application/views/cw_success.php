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
Ahora puedes <a href="/">visitar el arbol</a><br/>o <a href="/index.php/cw">insertar otra impresora</a>.
</div>



</body>
</html>
