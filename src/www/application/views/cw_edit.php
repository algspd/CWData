<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <link href="/favicon.ico" rel="icon" type="image/x-icon" />
<?php
  $this->load->helper('html','date');
  echo link_tag('css/style.css');
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CW Data :: Edit</title>
</head>
<body>

<?php
  function intext($type, $name, $text, $defval=""){
    echo "<h5>$text</h5>";
    $error=form_error($name);
    echo "<span class=\"error\"> $error </span>";
    echo "<input type=\"$type\" name=\"$name\" value=\"" . set_value($name,$defval) . "\" size=\"40\" />";
  }

  function intextdis($type, $name, $text, $defval=""){
    echo "<h5>$text</h5>";
    $error=form_error($name);
    echo "<span class=\"error\"> $error </span>";
    echo "<input disabled type=\"$type\" value=\"" . set_value($name,$defval) . "\" size=\"40\" />";
    echo "<input type=\"hidden\" name=\"$name\" value=\"" . set_value($name,$defval) . "\" />";
  }

  function infile($name, $text, $nofoto, $defval=""){
    echo "<h5>$text</h5>";
    echo "<input type=\"file\" name=\"$name\" />";
  }

  function inlist($options, $name, $text, $defval=""){
    echo "<h5>$text</h5>";
    echo form_dropdown($name, $options,$defval);
  }

  $datestring = "%d/%m/%Y";
  $time=time();
?>

<?php echo form_open_multipart('edit'); ?>
<div id="sobre_impresora">
<h3>Editar la impresora</h3>
  <?php intext("text","printername","Nombre *",$defvals['printername']); ?>
  <?php intextdis("text","printernumber","N&uacute;mero *",$defvals['printernumber']); ?>
  <?php intext("text","fnacimiento","Fecha de nacimiento (dd/mm/aaaa)",$defvals['fnacimiento']); ?>
  <?php inlist($models, 'printermodel', "Modelo *",$defvals['printermodel']);?>
  <?php if (! isset($nofoto)) $nofoto=""; infile("foto","Foto (La foto debería tener <a href=\"#\">este aspecto</a>)</h5>", $nofoto); ?>
  <?php inlist($printers, 'printermother', "Impresora madre *",$defvals['printermother']);?>
  <?php inlist($provincias,"printerlocation","Localizaci&oacute;n",$defvals['printerlocation']); ?>
  <?php intext("text","printerurl","Web",$defvals['printerurl']); ?>
  <?php inlist($users, 'printerusername', "Nombre o nick del constructor",$defvals['username']);?>
  <?php inlist($viva, 'printeralive', "¿La impresora sigue en funcionamiento?",$defvals['printeralive']);?>
  <div id="enviar">
    <input type="submit" value="Guardar edici&oacute;n" name="cw_save_changes"/>
    <input type="submit" value="Descartar cambios" name="cw_discard_changes"/>
  </div>
</div>
</form>

</body>
</html>
