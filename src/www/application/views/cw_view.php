<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'common.php';
?><!DOCTYPE html>
<html>
<head>
  <link href="/favicon.ico" rel="icon" type="image/x-icon" />
<?php
  $this->load->helper('html','date');
  echo link_tag('css/style.css');
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Añadir impresora</title>
</head>
<body>

<?php
  head();
  function intext($type, $name, $text, $defval=""){
    echo "<h5>$text</h5>";
    $error=form_error($name);
    echo "<span class=\"error\"> $error </span>";
    echo "<input type=\"$type\" name=\"$name\" value=\"" . set_value($name,$defval) . "\" size=\"40\" />";
  }

  function infile($name, $text, $nofoto){
    echo "<h5>$text</h5>";
     echo "<span class=\"error\"> $nofoto </span>";
    echo "<input type=\"file\" name=\"$name\" />";
  }

  function inlist($options, $name, $text){
    echo "<h5>$text</h5>";
    echo form_dropdown($name, $options);
  }

  $datestring = "%d/%m/%Y";
  $time=time();
?>

<?php echo form_open_multipart('cw'); ?>
<div id="sobre_impresora">
<h3>Sobre la impresora</h3>
  <?php intext("text","printername","Nombre *"); ?>
  <?php intext("text","printernumber","N&uacute;mero * (el número por defecto es el siguiente)", $printermax); ?>
  <?php intext("text","fnacimiento","Fecha de nacimiento (dd/mm/aaaa)", mdate($datestring, $time)); ?>
  <?php inlist($models, 'printermodel', "Modelo *");?>
  <?php if (! isset($nofoto)) $nofoto=""; infile("foto","Foto (La foto debería tener <a href=\"/muestra.jpg\" target=\"_blank\">este aspecto</a>)</h5>", $nofoto); ?>
  <?php inlist($printers, 'printermother', "Impresora madre *");?>
  <?php inlist($provincias,"printerlocation","Localizaci&oacute;n"); ?>
  <?php intext("text","printerurl","Web"); ?>
  <?php inlist($users, 'printerusername', "Nombre o nick del constructor");?>
  <div id="enviar"><input type="submit" value="Guardar" name="cw"/></div>
</div>
</form>

<?php echo form_open('cw',array('id' => 'cwuser')); ?>
<div id="sobre_constructor">
<h3>Sobre el constructor</h3>
  <?php intext("text","username","Nombre o nick del constructor"); ?>
  <?php intext("text","userurl","Web del constructor"); ?>
  <?php intext("text","useremail","Email del constructor"); ?>
  <div id="enviar"><input type="submit" value="Guardar" name="cwuser"/></div>
</div>
</form>

<?php echo form_open('cw'); ?>
<div id="nuevo_modelo">
<h3>Insertar modelo de impresora</h3>
  <?php intext("text","model","Nombre del modelo *"); ?>
  <?php intext("text","modelurl","Web informativa sobre el modelo"); ?>
  <div id="enviar"><input type="submit" value="Guardar" name="cwmodel"/></div>
</div>
</form>

<?php echo form_open('edit'); ?>
<div id="editar_impresora">
<h3>Editar una impresora</h3>
  <?php inlist($printers2, 'printernumber', "Impresora *");?>
  <div id="enviar"><input type="submit" value="Editar" name="cwmedit"/></div>
</div>
</form>

</body>
</html>
