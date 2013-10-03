<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'common.php';
?>
<!DOCTYPE html>
<html>
<head>
  <link href="/favicon.ico" rel="icon" type="image/x-icon" />
<?php
  $this->load->helper('html');
  $this->load->helper('date');
  
  echo link_tag('css/style.css');
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CW Data</title>
</head>
<body>

  <?php
    head();
    $this->table->set_heading(array("#","Nombre","Provincia","Fecha nacimiento","Madre","Modelo","Foto"));
    $this->table->set_template(array('table_open'=> '<table border="1" cellpadding="4" cellspacing="0">',));
    foreach ($query->result() as $row){
      $foto2=substr($row->foto,29);
      $foto=substr($row->foto,20);
      $this->table->add_row(
        ($row->printernumber>0) ? "#$row->printernumber" : "",
        ($row->printerurl!="") ? "<a href=\"$row->printerurl\">$row->printername</a>" : "$row->printername",
        $row->provincia,
        $row->fnacimiento,
        $row->madre,
        $row->human,
        (isset($row->foto)) ? "<a href=\"$foto\" target=\"_blank\">$foto2</a>" : ""
      );
    }
    echo $this->table->generate();
  ?>

</body>
</html>
