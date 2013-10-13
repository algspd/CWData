<?php
include 'common.php';
?><!DOCTYPE html>
<html>
<head>
  <title>Árbol de los clones</title>
  <link href="/favicon.ico" rel="icon" type="image/x-icon" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>CW Data</title>
</head>
<body>
<?php
head();
?>

<div style="position:absolute;top:200px;right:30px;">
  <a href="/index.php/get2"><img src="/arb_c.jpg" alt="Arbol circular" style="width:140px;" /></a>
</div>
<div style="position:absolute;top:360px;right:30px;">
  <a href="/index.php/circles"><img src="/circulos.jpg" alt="Arbol circular" style="width:140px;" /></a>
</div>
<div style="position:absolute;top:520px;right:30px;">
  <a href="/index.php/nofoto"><img src="/prusadordelfrac.png" alt="Prusador del frac" style="width:140px;" /></a>
</div>
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
  </script>

  <script src="JSTreeGraph.js" type="text/javascript"></script>
  <script src="treesetup.js" type="text/javascript"></script>

  <script type="text/javascript">
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

  <link href="css/style.css" rel="stylesheet" type="text/css" />
  <link href="JSTreeGraph.css" rel="stylesheet" type="text/css" />
</body>
</html>
