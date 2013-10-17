<?php
function linkify($link){
if ($link=="") return $link;
$link = str_replace(array("\r", "\n"), '', trim($link));
if (!preg_match('/^https?:\/\//', $link)) {
    $link = 'http://'.$link;
}
return $link;
}

defined('BASEPATH') OR exit('No direct script access allowed');
class Detail extends CI_Controller {

	public function index()
	{
          $this->load->database();
          $params=$this->input->get(NULL, TRUE);
          //if ($params['n']<=0){return;}
          $timeline = $this->db->query('SELECT impresoras.printerurl, impresoras.printernumber,impresoras.printerlocation,madres.printername AS madre,impresoras.printername,impresoras.fnacimiento,models.human,impresoras.username,provincias.provincia FROM impresoras LEFT JOIN models ON impresoras.printermodel=models.id LEFT JOIN provincias ON impresoras.printerlocation=provincias.id_provincia LEFT JOIN impresoras AS madres ON impresoras.printermother=madres.printernumber WHERE impresoras.printernumber = "' . $params['n'] . '"');


          $r=$timeline->result();
          $r=$r[0];
          $r->printerurl=linkify($r->printerurl);
          echo (json_encode($r));
    }
}
