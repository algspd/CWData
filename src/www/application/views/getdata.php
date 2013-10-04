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
<?php
  $this->load->helper('html');
  $this->load->helper('date');
  echo link_tag('css/style.css');
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CW Data</title>
</head>
<body>
<?php head(); ?>
<br/><br/><span style="font-size:17px;">Número de impresoras: <?php echo $query->num_rows()-2; ?></span>
  <div id="dvTreeContainer"></div>
  <script type="text/javascript">
  <?php
    function genPrinter($db,$printernumber,$last,$branch){

      $impresoras=$db->query("SELECT printernumber,printername,printerurl,foto,printeralive FROM impresoras WHERE printermother=\"$printernumber\"");
      
      $branch=0;
      foreach ($impresoras->result() as $row){
        $numero="";
        if ($row->printernumber>0) $numero="#$row->printernumber ";
        if ($row->printernumber!=-100000){
          //echo "     Debug: $last\n";
          $curr="$last.Nodes[$branch]";
          $foto_a=explode('/',$row->foto);
          $foto=$foto_a[sizeof($foto_a)-1];
          if ($row->printerurl!=""){
            $RIP="";
            if ($row->printeralive==0) $RIP="R.I.P";

            echo "$curr={ Content: \"<a href=\\\"$row->printerurl\\\" target=\\\"_blank\\\">$numero $row->printername</br><img class=\\\"foto\\\" src=\\\"uploads/thumb_$foto\\\"/><br/><span style=\\\"text-decoration:none;display:inline;position:relative;bottom:25px;color:red;font-size:20px;\\\">$RIP</span></a>\" };\n";
          } else{
            echo "$curr={ Content: \"$numero $row->printername</br><img class=\\\"foto\\\" src=\\\"uploads/thumb_$foto\\\"/>\" };\n";
          }
          echo "$curr.Nodes=new Array();\n";
          genPrinter($db,$row->printernumber,$curr,$branch++);
        }
      }
      
    }
    echo "
    var rootNode = new Object();
        rootNode.Content = [\"<img class=\\\"foto_raiz\\\" src=\\\"/logo.png\\\" alt=\\\"Logo\\\">\"];
        rootNode.Nodes = new Array();
    ";

    genPrinter($db,"-100000","rootNode",0);
  ?>
        var container = document.getElementById("dvTreeContainer");

        // Build tree with options
        DrawTree({ 
            Container: container,
            RootNode: rootNode,
            Layout: "Vertical",
        });
    -->

  </script>

</body>
</html>
