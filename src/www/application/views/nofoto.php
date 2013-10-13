<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'common.php';
?><!DOCTYPE html>
<html>
<head>
  <title>Impresoras sin foto</title>
  <link href="/favicon.ico" rel="icon" type="image/x-icon" />
<?php
  $this->load->helper('html');
  $this->load->helper('date');
  
  echo link_tag('css/style.css');
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php head(); ?>

  <h1> Impresoras sin foto </h1>

  <div id="nofoto">
  <ul>
  <?php
    
    foreach ($nofoto->result() as $row){
      echo "<li>#$row->printernumber $row->printername ($row->username)";
    }
  ?>
  </ul>
Si dispones de la fotografía de cualquiera de estas impresoras <a href="/index.php/cw">añádela</a>.
  </div>

</body>
</html>
