<?php
include ('common.php');
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
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
    $this->table->set_template(array('table_open'=> '<table border="1" cellpadding="4" cellspacing="0">',));
    foreach ($query->result() as $row){
      // Foto
      $foto_a=explode('/',$row->foto);
      $foto=$foto_a[sizeof($foto_a)-1];
      $thumb="/uploads/thumb_$foto";

      // Descripcion
      $URL=""; if ($row->printerurl!="") $URL="<li><a href=\"$row->printerurl\">Más información</a></li>";
      $fotot="";if (isset($row->foto)) $fotot="<a href=\"/uploads/$foto\" target=\"_blank\"><img src=\"$thumb\" /></a>";
      $desc="<ul><li><b>Clon #$row->printernumber:</b> $row->printername</li>
                 <li><b>Lugar:</b> $row->provincia</li>
                 <li><b>Familia:</b> $row->human</li>
                 <li><b>Autor:</b> $row->username</li>
                 <li><b>Progenitora:</b> $row->madre</li>
                 <li><b>Nacimiento:</b> $row->fnacimiento</li>
                 $URL";

      $this->table->add_row(
        $fotot,
        $desc
      );
    }
    echo $this->table->generate();
  ?>

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
