  <?php

    function genPrinter($db,$printernumber,$last,$branch){

      $impresoras=$db->query("SELECT printernumber,printername,printerurl,foto,printeralive FROM impresoras WHERE printermother=\"$printernumber\"");

      $branch=0;

      foreach ($impresoras->result() as $row){
        $numero="";
        if ($row->printernumber>0) $numero="#$row->printernumber ";
        if ($row->printernumber!=-100000){
          $curr="$last.Nodes[$branch]";
          $foto_a=explode('/',$row->foto);
          $foto=$foto_a[sizeof($foto_a)-1];
            echo "{\"name\": \"$numero $row->printername\",\n";
          echo "\"children\": [\n";
          genPrinter($db,$row->printernumber,$curr,$branch++);
          echo "]}\n";
        }
      }
    }

    echo "{\n\"name\": \"CW\",\n\"children\" : [";
    genPrinter($db,"-100000","rootNode",0);
    echo "]}";


?>

