<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'common.php';

//models,nums;
foreach ($bymodel->result() as $row){
  if ($row->human!=""){
  $models[]=$row->human;
  $nums[]=($row->num/1.5)+3;
  $totales[]=$row->num;
  }
}
?><!DOCTYPE html>
<html>
<head>
  <title>Gráfico por modelo de impresora</title>
  <link href="/favicon.ico" rel="icon" type="image/x-icon" />
  <link href="/css/style.css" rel="stylesheet" type="text/css" />
  <script type="text/javascript" src="/d3.v3.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CW Data :: stats</title>
<style type='text/css'>
#chart {
  background: transparent;
  font: 10px sans-serif;
  height: 100%;
  position: absolute;
  top:0px;
  bottom:0px;
  left:0px;
  width: 100%;
  z-index:-100;
}

#chart svg {
  width: 100%;
  height:100%;
  left: 0px;
  position: absolute;
  top: 0px;
}

#chart circle.little {
  fill: #0D0;
  stroke: #060;
  stroke-width: 1.5px;
}
#chart text {
  fill: #FFF;
  font-size:12px;
  font-weight:bold;
}
</style>

<script type='text/javascript'>
var data = [<?php echo implode(',',$nums); ?>],
    texts = ["<?php echo implode('","',$models); ?>"],
    total = [<?php echo implode(',',$totales); ?>],
    dataEnter = data.concat(293),
    dataExit = data.slice(0, 2),
    w = 800,
    h = 800,
    x = d3.scale.ordinal().domain([0]).rangePoints([0, w], 1),
    y = d3.scale.ordinal().domain(data).rangePoints([0, h], 2);
</script>
</head>
<body>
<?php head(); ?>

<div  id='chart'>

</div><script type='text/javascript'>
(function() {
  var svg = d3.select("#chart").append("svg")
      .attr("width", w)
      .attr("height", h);

      var g = svg.selectAll(".data")
      .data(data)
      .enter().append("g")
      .attr("transform", function(d,i) { return "translate(" + 50*i + "," + 100 + ")"; })

      g.append("circle")
      .attr("class", "little")
      .attr("r", 12);
      
      g.append("text")
      .attr("dy", ".35em")
      .attr("text-anchor", "middle")
      .attr("transform", function(d,i) { return "translate(" + 0 + "," + (data[i]+7) + ")"; })
      .text(function(d,i){return texts[i] + " (" + total[i] + ")"});
      
    g.transition()
     .duration(1500)
     .attr("transform", function(d,i) { 
       y=20*i+150;
       x=Math.random()*w+180;
       if (i<3){x=x+200};
       return "translate(" + x + "," + y + ")"; })

     .select("circle")
     .attr("r", function(d) {return d;});

//   });
})();
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
