<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
<div id="cabecera">
<img src="logo.png" alt="logo" style="width:200px;margin-left:28px;"/><br/>
<a style="font-size:17px;text-decoration:none;" href="malto://info@maytheclonebewithyou.com">info@mayTheCloneBeWithYou.com</a>
<ul style="margin-left:-30px;">
<li><a href="index.php/cw">Insertar o modificar una impresora</a></br></li>
<li><a href="index.php/wiki">Ver datos como en la wiki</a></li>
<li><a href="index.php/view">Ver datos en una tabla</a></li>
</ul>
</div>
  <div id="dvTreeContainer"></div>
  <script type="text/javascript">
  <?php
    function genPrinter($db,$printernumber,$last,$branch){

      $impresoras=$db->query("SELECT printernumber,printername,printerurl,foto FROM impresoras WHERE printermother=\"$printernumber\"");
      
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
            echo "$curr={ Content: \"<a href=\\\"$row->printerurl\\\" target=\\\"_blank\\\">$numero $row->printername</br><img class=\\\"foto\\\" src=\\\"uploads/thumb_$foto\\\"/></a>\" };\n";
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
