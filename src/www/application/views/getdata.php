<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="../JSTreeGraph.css" rel="stylesheet" type="text/css" />
  <script src="../JSTreeGraph.js" type="text/javascript"></script>
<?php
  $this->load->helper('html');
  $this->load->helper('date');
  
  echo link_tag('css/style.css');
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CW Data</title>
</head>
<body>
  
  <div id="dvTreeContainer"></div>
  <script type="text/javascript">
  <?php
    function genPrinter($db,$printernumber,$last,$branch){

      $impresoras=$db->query("SELECT printernumber,printername FROM impresoras WHERE printermother=\"$printernumber\"");
      
      $branch=0;
      foreach ($impresoras->result() as $row){
        if ($row->printernumber!=-100000){
          //echo "     Debug: $last\n";
          $curr="$last.Nodes[$branch]";
          echo "$curr={ Content: \"$row->printername\" };\n";
          echo "$curr.Nodes=new Array();\n";
          genPrinter($db,$row->printernumber,$curr,$branch++);
        }
      }
      
    }
    echo "
    var rootNode = new Object();
        rootNode.Content = [\"Clone Wars\"];
        rootNode.Nodes = new Array();
    ";

    genPrinter($db,"-100000","rootNode",0);
  ?>
        var container = document.getElementById("dvTreeContainer");

        // Build tree with options
        DrawTree({ 
            Container: container,
            RootNode: rootNode
        });
    -->

  </script>

</body>
</html>
