<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'common.php';

header("Cache-Control: public");
header("Content-Description: File Transfer");
header("Content-Disposition: attachment; filename=clones.csv");
header("Content-Type: application/octet-stream; "); 
header("Content-Transfer-Encoding: binary");

function calculafecha($fecha){

  $ff=explode('/',$fecha);
  $dd=$ff[0];
  $mm=intval($ff[1])-1;
  $yy=$ff[2];
  $sm = array("January","February","March","April","May","June","July","August","September","October","November","December");

  return "$sm[$mm] $dd, $yy";
}

    foreach ($datos->result() as $row){
      if ($row->loc!="" && $row->printernumber>0 && $row->fnacimiento!=""){
        $fecha=calculafecha($row->fnacimiento);
        $htmlstring="\"<ul><li>Clon #$row->printernumber: <b>$row->printername</b></li><li>Lugar: <b>$row->loc</b></li><li>Familia: <b>$row->model</b></li><li>Autor: <b>$row->username</b></li><li>Impresora progenitora: <b>$row->printermother</b></li><li>Nacimiento: <b>$fecha</b></li></ul>\"";
        $foto=str_replace("/var/www/CWData/src/www/uploads/","http://maytheclonebewithyou.com/uploads/",$row->foto);
        $foto=str_replace("/var/www/cw_big_data/uploads/","http://maytheclonebewithyou.com/uploads/",$foto);
        $csvString = "\"$fecha\",,\"Clon #$row->printernumber: <b>$row->printername</b>\",$htmlstring,$foto,CloneWars,,,,";

       echo "$csvString\n";
      }
    }
  ?>
