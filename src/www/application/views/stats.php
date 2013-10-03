<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'common.php';
?><!DOCTYPE html>
<html>
<head>
  <title>CWData</title>
  <link href="/favicon.ico" rel="icon" type="image/x-icon" />
<?php
  $this->load->helper('html');
  $this->load->helper('date');
  
  echo link_tag('css/style.css');
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CW Data :: stats</title>
</head>
<body>
<div id="cabecera">
<img src="/logo.png" alt="logo" style="width:200px;margin-left:28px;"/><br/>
<a style="font-size:17px;text-decoration:none;" href="malto://info@maytheclonebewithyou.com">info@mayTheCloneBeWithYou.com</a>

<br/><br/>

<?php menu(); ?>
</div>

  <div id="stats">

  <?php
    $this->table->set_heading(array("Modelo","Uds"));
    $this->table->set_template(array('table_open'=> '<table border="1" cellpadding="4" cellspacing="0">',));
    foreach ($bymodel->result() as $row){
      if ($row->human!=""){
      $this->table->add_row(
        $row->human,
        $row->num
      );
      }
    }
    echo $this->table->generate();
  ?>



  </div>

</body>
</html>
