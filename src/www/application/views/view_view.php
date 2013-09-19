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

  <?php
    $this->table->set_heading(array("#","Nombre","Provincia","Fecha nacimiento","Madre","Modelo","Foto"));
    $this->table->set_template(array('table_open'=> '<table border="1" cellpadding="4" cellspacing="0">',));
    foreach ($query->result() as $row){
      $foto=substr($row->foto,8);
      $this->table->add_row(
        ($row->printernumber>0) ? "#$row->printernumber" : "",
        ($row->printerurl!="") ? "<a href=\"$row->printerurl\">$row->printername</a>" : "$row->printername",
        $row->provincia,
        $row->fnacimiento,
        $row->madre,
        $row->human,
        (isset($row->foto)) ? "<a href=\"$foto\">$foto</a>" : ""
      );
    }
    echo $this->table->generate();
  ?>

</body>
</html>
