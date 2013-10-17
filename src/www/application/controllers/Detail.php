<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Detail extends CI_Controller {

	public function index()
	{
          $this->load->database();
          $params=$this->input->get(NULL, TRUE);
          if ($params['n']<=0){return;}
          $timeline = $this->db->query('SELECT * FROM impresoras LEFT JOIN models ON impresoras.printermodel=models.id LEFT JOIN provincias ON impresoras.printerlocation=provincias.id_provincia WHERE printernumber = "' . $params['n'] . '"');

          $r=$timeline->result();
          $r=$r[0];
          echo (json_encode($r));
    }
}
