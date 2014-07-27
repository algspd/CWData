<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'common.php';
?><!DOCTYPE html>
<html>
<head>
  <link href="/favicon.ico" rel="icon" type="image/x-icon" />
  <link type="text/css" rel="stylesheet" href="/css/style.css">
  <link type="text/css" rel="stylesheet" href="/css/overlay.css">
  <script type="text/javascript" src="/jquery.min.js"></script>
  <script type="text/javascript" src="/js/overlay.js"></script>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Añadir impresora</title>
</head>
<body>

<?php
  head();
?>

<a class="show-popup" href="#">Instrucciones para agregar tu impresora</a><br/>

<?php
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

<div class="overlay-bg">
<div class="overlay-content">
<p style="font-weight:bold;">Instrucciones</p>
<p>Si todavía no tienes ninguna impresora en el árbol, lo primero será añadirte como "constructor", para ello rellena los campos del formulario <b>"Sobre el constructor"</b>. Únicamente el nombre es obligatorio.</p>
<p>Cuando ya estés registrado como constructor, deberás rellenar el formulario <b>"Sobre la impresora"</b>, asegúrate de que el número de la impresora es correcto. El propio formulario te guiará para que no introduzcas campos erróneos.<br/>
Asegúrate de aportar toda la información posible sobre tu impresora.</p>
<p>Si lo que quieres es editar tu impresora, deberás seleccionarla en el desplegable de <b>"Editar una impresora"</b>. Podrás modificar cualquier información excepto su número de clon. Si te has equivocado en ese campo, ponte en contacto para que lo solucionemos.</p>
<br/><br/><button class="close-btn">Cerrar</button>
</div>
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
