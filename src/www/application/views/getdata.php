<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'common.php';
?><!DOCTYPE html>
<html>
<head>
  <title>CWData</title>
  <link href="/favicon.ico" rel="icon" type="image/x-icon" />
  <link href="JSTreeGraph.css" rel="stylesheet" type="text/css" />
  <script src="JSTreeGraph.js" type="text/javascript"></script>
  <script src="treesetup.js" type="text/javascript"></script>
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
?>
<br/><br/><span style="font-size:17px;">Número de impresoras: <?php
echo $query->num_rows() - 2;
?></span><br/>

  <div id="setup">
    <img src="gear.png" style="vertical-align:middle"/>
    <select name="imagen" id="imagen" onchange="noimages();">
      <option selected="selected">Con imágenes</option>
      <option>Sin imágenes</option>
    </select>
    <select name="orientacion" id="orientacion" onchange="orientacion();">
      <option selected="selected">Vertical</option>
      <option>Horizontal</option>
    </select>
  </div>

  <div id="dvTreeContainer"></div>
  <script type="text/javascript">
  <?php
    treeData($db);
  ?>
       var container = document.getElementById("dvTreeContainer");

        // Build tree with options
        DrawTree({ 
            Container: container,
            RootNode: rootNode,
            Layout: layout,
            Height: treeheight,
        });
    -->

  </script>

</body>
</html>
