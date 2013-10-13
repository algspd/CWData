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
  
  echo link_tag('css/style.css');
?>
<script type="text/javascript" src="http://www.google.com/jsapi"></script>
<script type="text/javascript" src="/js/timeline-min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/timeline.css">
<link href="/css/style.css" rel="stylesheet" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <script type="text/javascript">
        var timeline;

        google.load("visualization", "1");

        // Set callback to run when API is loaded
        google.setOnLoadCallback(drawVisualization);

        // Called when the Visualization API is loaded.
        function drawVisualization() {
            // Create and populate a data table.
            var data = new google.visualization.DataTable();
            data.addColumn('datetime', 'start');
            data.addColumn('string', 'content');

            data.addRows([
                <?php
                foreach ($fechas as $i){
                $nombre=str_replace('\'','',$i[0]);
                echo "[new Date($i[3],$i[2]-1,$i[1]),'$nombre'],\n";
                }
                ?>
            ]);

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
        }
    </script>

</head>
<body>
<?php head(); ?>

<div id="mytimeline" style="position:relative;top:10px;width:98%;margin-left:auto;margin-right:auto;">
</div>
<br/><br/>
Haz zoom con la rueda del ratón, pincha y arrastra para desplazarte.

</body>
</html>
