<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Csv extends CI_Controller {

	public function index()
	{
          $this->load->database();
          $datos = $this->db->query('SELECT printernumber,printername,fnacimiento,human AS model, provincia AS loc, printerurl, foto, username, printermother FROM impresoras LEFT JOIN models ON impresoras.printermodel=models.id LEFT JOIN provincias ON impresoras.printerlocation=provincias.id_provincia');

          $data=array(
            'datos' => $datos,
          );
                    
          $this->load->view('csv',$data);
	}
}

