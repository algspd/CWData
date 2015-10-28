<?php
function genPrinter2($db, $printernumber, $last, $branch) {
    $impresoras = $db->query("SELECT printernumber,printername,printerurl,foto,printeralive FROM impresoras WHERE printermother=\"$printernumber\"");
    $branch     = 0;
    $primera    = true;
    foreach ($impresoras->result() as $row) {
        if (!$primera)
            echo ",\n";
        $primera = false;
        $numero  = "";
        if ($row->printernumber > 0)
            $numero = "#$row->printernumber ";
        if ($row->printernumber != -100000) {
            $curr   = "$last.Nodes[$branch]";
            $foto_a = explode('/', $row->foto);
            $foto   = $foto_a[sizeof($foto_a) - 1];
            echo "{\"name\": \"$numero $row->printername\", \"size\": 3000, \n";
            echo "\"children\": [";
            genPrinter2($db, $row->printernumber, $curr, $branch++);
            echo "]}";
        } else
            $primera = true;
    }
}
ob_start();
echo "{\n\"name\": \"CW\",\n\"children\" : [";
genPrinter2($db, "-100000", "rootNode", 0);
echo "]}";
$contents = ob_get_contents();
ob_end_clean();
file_put_contents("/var/www/maytheclonebewithyou.com/flare.json", $contents);
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'common.php';
?><!DOCTYPE html>
<head>
  <title>CWData</title>
  <link href="/favicon.ico" rel="icon" type="image/x-icon" />
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <link href="/css/style.css" rel="stylesheet" type="text/css" />
  <style>

.node circle {
  fill: #00DD00;
  stroke: #004400;
  stroke-width: 1px;
}

.node {
  font: 10px sans-serif;
}

.link {
  fill: none;
  stroke: #002200;
  stroke-width: 1.5px;
}

.node text {
  fill:#E9E9E9;
  font-size:10px;
}

svg {
  position:absolute;
  top:-150px;
  left:-300px;
  z-index:-10;
}

  </style>
</head>
<body>
<?php head(); ?>
<script src="http://d3js.org/d3.v3.min.js"></script>
<script>

var diameter = 2500;

var tree = d3.layout.tree()
    .size([360, diameter / 2 - 120])
    .separation(function(a, b) { return (a.parent == b.parent ? 1 : 2) / a.depth; });

var diagonal = d3.svg.diagonal.radial()
    .projection(function(d) { return [d.y, d.x / 180 * Math.PI]; });

var svg = d3.select("body").append("svg")
    .attr("width", diameter)
    .attr("height", diameter - 150)
  .append("g")
    .attr("transform", "translate(" + diameter / 2 + "," + diameter / 2 + ")");

d3.json("/flare.json", function(error, root) {
  var nodes = tree.nodes(root),
      links = tree.links(nodes);

  var link = svg.selectAll(".link")
      .data(links)
    .enter().append("path")
      .attr("class", "link")
      .attr("d", diagonal);

  var node = svg.selectAll(".node")
      .data(nodes)
    .enter().append("g")
      .attr("class", "node")
      .attr("transform", function(d) { return "rotate(" + (d.x - 90) + ")translate(" + d.y + ")"; })

  node.append("circle")
      .attr("r", 4.5);

  node.append("text")
      .attr("dy", ".31em")
      .attr("text-anchor", function(d) { return d.x < 180 ? "start" : "end"; })
      .attr("transform", function(d) { return d.x < 180 ? "translate(8)" : "rotate(180)translate(-8)"; })
      .text(function(d) { return d.name; });
});

d3.select(self.frameElement).style("height", diameter - 150 + "px");

</script>

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






