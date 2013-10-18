<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'common.php';
?><!DOCTYPE html>
<html>
<head>
  <title>Línea de tiempo</title>
  <link href="/favicon.ico" rel="icon" type="image/x-icon" />
  <style type="text/css">
    body {font: 10pt arial;}
  </style>
<?php
  $this->load->helper('html');
  $this->load->helper('date');
?>
<script type="text/javascript" src="/js/timeline-min.js"></script>
<script type="text/javascript" src="/jquery.min.js"></script>
<script type="text/javascript" src="/js/overlay.js"></script>

<link rel="stylesheet" type="text/css" href="/css/timeline.css">
<link href="/css/style.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="/css/overlay.css">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script type="text/javascript">
        var timeline;

        $(document).ready(drawVisualization);

        function drawVisualization() {
            // Create and populate a data table.
            var data=[];
                <?php
                foreach ($fechas as $i){
                $nombre=str_replace('\'','',$i[0]);
                echo "data.push({'start': new Date($i[3],$i[2]-1,$i[1]),'content': '$nombre','n': '$i[4]'});\n";
                }
                ?>

            var options = {
                "width":  "98%",
                "height": "400px",
                "style": "box",
                'zoomMin': 1000 * 60 * 60 * 24 * 7,
                'cluster': false,
                'min': new Date(2009,1,1),
                'start': new Date(2013,3,1),
                'zoomMax': 1000*60*60*24*31*12*6
            };

            timeline = new links.Timeline(document.getElementById('mytimeline'));
            timeline.draw(data, options);
            links.events.addListener(timeline, 'select', onselect);


        }


   function getImpresora(n) {
        var source = "/index.php/detail?n=" + n;
        return $.ajax({
            type: 'GET',
            url: source,
            async:false,
            contentType: "application/json",
            dataType: 'json'
        }).responseText;
    }

        function onselect() {
          var sel = timeline.getSelection();
          var data=timeline.getData();
          var response = getImpresora(data[sel[0].row].n);
          var impresora = jQuery.parseJSON(response);
          var pnombre  = '<span style="font-size:15px;font-weight:bold;">Clon #'+impresora.printernumber+': '+impresora.printername + '</span><br/><br/>';
          var plugar   = 'Lugar: <span style="font-weight:bold;">'+impresora.provincia+'</span><br/>';
          var pfamilia = 'Familia: <span style="font-weight:bold;">'+impresora.human+'</span><br/>';
          var pautor   = 'Autor: <span style="font-weight:bold;">'+impresora.username+'</span><br/>';
          var pmadre   = 'Madre: <span style="font-weight:bold;">'+impresora.madre+'</span><br/>';
          var pnacim   = 'Nacimiento: <span style="font-weight:bold;">'+impresora.fnacimiento+'</span><br/>';
          var pweb="";
          if (impresora.printerurl!="") pweb = '<a href="'+impresora.printerurl+'" target="_blank">Más información</a>';


          document.getElementById('respuesta').innerHTML=pnombre+plugar+pfamilia+pautor+pmadre+pnacim+pweb;
          $('.overlay-bg').show(); //display your popup
          
        
        }
    </script>

</head>
<body>
<?php head(); ?>

<div id="mytimeline" style="position:relative;top:10px;width:98%;margin-left:auto;margin-right:auto;">
</div>
<br/><br/>
Haz zoom con la rueda del ratón, pincha y arrastra para desplazarte.

<div class="overlay-bg">
<div class="overlay-content">
<div id="respuesta"></div>
<br/><br/><button class="close-btn">Cerrar</button>
</div>
</div>


</body>
</html>
