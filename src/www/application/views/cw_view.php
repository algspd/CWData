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


$models = array(
  'p2'      => 'Prusa 2',
  'mendel'  => 'Mendel',
  'p3_alu'  => 'Prusa 3 aluminio',
  'p3_box'  => 'Prusa 3 box',
  'rostock' => 'Rostock',
);
$printers = array(
  '1'  => '#1 Impresora1',
  '2'  => '#2 Impresora2',
  '3'  => '#3 Impresora3',
  '-1'  => 'Hu&eacute;rfana',
);

$provincias = array(
                '1' =>'Provincia',
		'2' =>'&Aacute;lava',
		'3' =>'Albacete',
		'4' =>'Alicante/Alacant',
		'5' =>'Almer&iacute;a',
		'6' =>'Asturias',
		'7' =>'&Aacute;vila',
		'8' =>'Badajoz',
		'9' =>'Barcelona',
		'10' =>'Burgos',
		'11' =>'C&aacute;ceres',
		'12' =>'C&aacute;diz',
		'13' =>'Cantabria',
		'14' =>'Castell&oacute;n/Castell&oacute;',
		'15' =>'Ceuta',
		'16' =>'Ciudad Real',
		'17' =>'C&oacute;rdoba',
		'18' =>'Cuenca',
		'19' =>'Girona',
		'20' =>'Las Palmas',
		'21' =>'Granada',
		'22' =>'Guadalajara',
		'23' =>'Guip&uacute;zcoa',
		'24' =>'Huelva',
		'25' =>'Huesca',
		'26' =>'Illes Balears',
		'27' =>'Ja&eacute;n',
		'28' =>'A Coru&ntilde;a',
		'29' =>'La Rioja',
		'30' =>'Le&oacute;n',
		'31' =>'Lleida',
		'32' =>'Lugo',
		'33' =>'Madrid',
		'34' =>'M&aacute;laga',
		'35' =>'Melilla',
		'36' =>'Murcia',
		'37' =>'Navarra',
		'38' =>'Ourense',
		'39' =>'Palencia',
		'40' =>'Pontevedra',
		'41' =>'Salamanca',
		'42' =>'Segovia',
		'43' =>'Sevilla',
		'44' =>'Soria',
		'45' =>'Tarragona',
		'46' =>'Santa Cruz de Tenerife',
		'47' =>'Teruel',
		'48' =>'Toledo',
		'49' =>'Valencia/Val&eacute;ncia',
		'50' =>'Valladolid',
		'51' =>'Vizcaya',
		'52' =>'Zamora',
		'53' =>'Zaragoza',
                '54' =>'Otro'
);

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


<?php intext("text","printer_url","Web"); ?>
</div>

<div id="sobre_constructor">
<h3>Sobre el constructor</h3>
<?php intext("text","username","Nombre o nick del constructor"); ?>
<?php intext("text","autor_url","Web del constructor"); ?>
<?php intext("text","email","Email del constructor"); ?>

</div>

<div id="enviar"><input type="submit" value="Guardar" /></div>

</form>

</body>
</html>
