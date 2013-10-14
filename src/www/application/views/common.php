<?php
function menu() {
?>
<br/>
<br/>
<div id="menu">

  <div class="menu">
    <a href="/index.php/cw">Añadir</a> |&nbsp;
  </div>
  <div class="menu">
    <a href="#">Vistas</a> |&nbsp; 
    <div class="submenu">
      <a href="/index.php/stats">Stats</a><br/>
      <a href="/index.php/get2">Arbol circular</a><br/>
      <a href="/index.php/timeline">Linea de tiempo</a><br/>
      <a href="/index.php/wiki">Vista wiki</a><br/>
      <a href="/index.php/view">Vista tabla</a>
      <a href="/index.php/nofoto">Impresoras sin foto</a>
      <a href="/index.php/csv">Exportar a csv</a>
    </div>
  </div>
  <div class="menu">
    <a href="#">Dev</a>
    <div class="submenu">
      <a href="http://www.reprap.org/wiki/Clone_Wars:_El_imperio_de_los_clones/es" target="_blank">Raw</a><br/>
      <a href="https://github.com/algspd/CWData" target="_blank">GitHub</a><br/>
      <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=M7J9NQ98K9C8E&lc=ES&item_name=May%20The%20Clone%20Be%20With%20You&currency_code=EUR&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted">Donar</a><br/>
      <a href="malto://info@maytheclonebewithyou.com">Mail</a>
    </div>
  </div>
</div>

<?php
}
?>

<?php
function head() {
?>
<div id="cabecera" style="z-index:4;">
<a href="/" style="z-index:3;"><img src="/logo.png" alt="logo" style="width:200px;margin-left:28px;z-index:3;"/></a><br/>
<a style="font-size:17px;text-decoration:none;z-index:3;" href="malto://info@maytheclonebewithyou.com">info@mayTheCloneBeWithYou.com</a>
<?php
    menu();
?>
</div>
<?php
}
?>


  <?php
function genPrinter($db, $printernumber, $last, $branch) {
    
    $impresoras = $db->query("SELECT printernumber,printername,printerurl,foto,printeralive FROM impresoras WHERE printermother=\"$printernumber\"");
    
    $branch = 0;
    foreach ($impresoras->result() as $row) {
        $numero = "";
        if ($row->printernumber > 0)
            $numero = "#$row->printernumber ";
        if ($row->printernumber != -100000) {
            //echo "     Debug: $last\n";
            $curr   = "$last.Nodes[$branch]";
            $foto_a = explode('/', $row->foto);
            $foto   = $foto_a[sizeof($foto_a) - 1];
            if ($row->printerurl != "") {
                $RIP = "";
                if ($row->printeralive == 0)
                    $RIP = "R.I.P";
                
                echo "$curr={ Content: \"<a href=\\\"" . linkify($row->printerurl) . "\\\" target=\\\"_blank\\\">$numero $row->printername</br><img class=\\\"foto\\\" src=\\\"uploads/thumb_$foto\\\"/><br/><span style=\\\"text-decoration:none;display:inline;position:relative;bottom:25px;color:red;font-size:20px;\\\" class=\\\"texto_rip\\\">$RIP</span></a>\" };\n";
            } else {
                echo "$curr={ Content: \"$numero $row->printername</br><img class=\\\"foto\\\" src=\\\"uploads/thumb_$foto\\\"/>\" };\n";
            }
            echo "$curr.Nodes=new Array();\n";
            genPrinter($db, $row->printernumber, $curr, $branch++);
        }
    }
    
}

function treeData($db) {
    echo "
    var rootNode = new Object();
        rootNode.Content = [\"<img id=\\\"foto_raiz\\\" src=\\\"/logo.png\\\" alt=\\\"Logo\\\"><span id=\\\"texto_raiz\\\" style=\\\"display:none\\\">Clone Wars</span>\"];
        rootNode.Nodes = new Array();
    ";
    genPrinter($db, "-100000", "rootNode", 0);
}

?> 

<?php
function linkify($link){
$link = str_replace(array("\r", "\n"), '', trim($link));
if (!preg_match('/^https?:\/\//', $link)) {
    $link = 'http://'.$link;
}
return $link;
}
