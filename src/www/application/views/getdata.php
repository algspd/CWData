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
<br/><br/><span style="font-size:17px;">Número de impresoras: <?php
echo $query->num_rows() - 2;
?></span><br/>
<span style="font-size:17px;">Último clon subido: <?php
echo $printermax;
?></span><br/>

<div style="position:absolute;top:20px;left:350px;">
  <a href="/index.php/get2"><img src="/arb_c.jpg" alt="Arbol circular" style="width:140px;" /></a>
</div>
<div style="position:absolute;top:20px;left:530px;">
  <a href="/index.php/circles"><img src="/circulos.jpg" alt="Arbol circular" style="width:140px;" /></a>
</div>
<div style="position:absolute;top:20px;left:710px;">
  <a href="/index.php/timeline"><img src="/time.png" alt="Linea de tiempo" style="width:140px;" /></a>
</div>
<br/>

<div style="position:absolute;top:300px;left:20px;">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Maytheclonebewithyou.com2 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:336px;height:280px"
     data-ad-client="ca-pub-3060857077588927"
     data-ad-slot="7797428392"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</div>

  <div id="setup">
    <img src="gear.png" style="vertical-align:middle"/>
    <select name="imagen" id="imagen" onchange="noimages();">
      <option selected="selected">Con imágenes</option>
      <option>Sin imágenes</option>
    </select>
    
    <!--<select name="orientacion" id="orientacion" onchange="orientacion();">
      <option selected="selected">Vertical</option>
      <option>Horizontal</option>
    </select>-->
   
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
