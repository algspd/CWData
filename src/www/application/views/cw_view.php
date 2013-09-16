<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
<?php
  $this->load->helper('html');
  $this->load->helper('date');
  echo link_tag('css/style.css');
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CW Data</title>
</head>
<body>

<?php function intext($type, $name, $text, $defval=""){
  echo "<h5>$text</h5>";
  echo "<input type=\"$type\" name=\"$name\" value=\"" . set_value($name,$defval) . "\" size=\"40\" />";
}

function inlist($options, $name, $text){
  echo "<h5>$text</h5>";
  echo form_dropdown($name, $options);
}


$datestring = "%d/%m/%Y";
$time=time();

?>


<?php echo validation_errors(); ?>
<?php echo form_open('cw'); ?>

<div id="sobre_impresora">
<h3>Sobre la impresora</h3>
<?php intext("text","printername","Nombre *"); ?>
<?php intext("text","printernumber","N&uacute;mero *"); ?>
<?php intext("text","fnacimiento","Fecha de nacimiento (dd/mm/aaaa)", mdate($datestring, $time)); ?>

<?php inlist($models, 'printermodel', "Modelo *");?>
<?php inlist($printers, 'printermother', "Impresora madre *");?>
<?php inlist($provincias,"printerlocation","Localizaci&oacute;n"); ?>


<?php intext("text","printerurl","Web"); ?>
</div>

<div id="sobre_constructor">
<h3>Sobre el constructor</h3>
<?php intext("text","username","Nombre o nick del constructor"); ?>
<?php intext("text","userurl","Web del constructor"); ?>
<?php intext("text","useremail","Email del constructor"); ?>

</div>

<div id="enviar"><input type="submit" value="Guardar" /></div>

</form>

</body>
</html>
