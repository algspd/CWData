<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'common.php';
?><!DOCTYPE html>
<html>
<head>
  <title>Estadísticas</title>
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

  <div id="stats">

  <?php
    $this->table->set_heading(array("Puesto","Modelo","Uds"));
    $this->table->set_template(array('table_open'=> '<table border="1" cellpadding="4" cellspacing="0" style="float:left;margin-right:40px;">',));
    $puesto=1;
    foreach ($bymodel->result() as $row){
      if ($row->human!=""){
      $this->table->add_row(
        "$puesto º",
        $row->human,
        $row->num
      );
      $puesto++;
      }
    }
    echo $this->table->generate();
  ?>

  <?php
    $this->table->set_heading(array("Puesto","Provincia","Uds"));
    $this->table->set_template(array('table_open'=> '<table border="1" cellpadding="4" cellspacing="0">',));
    $puesto=1;
    foreach ($byplace->result() as $row){
      if ($row->provincia!=""){
      $this->table->add_row(
        "$puesto º",
        $row->provincia,
        $row->num
      );
      $puesto++;
      }
    }
    echo $this->table->generate();
  ?>




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
