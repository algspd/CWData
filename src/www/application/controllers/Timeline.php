<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Timeline extends CI_Controller {

	public function index()
	{
          $this->load->database();
          $timeline = $this->db->query('SELECT printername,fnacimiento FROM impresoras');


    foreach ($timeline->result() as $row){
      if ($row->fnacimiento!=""){
        $fecha=explode('/',$row->fnacimiento);
        $fechas[] = array($row->printername,$fecha[0],$fecha[1],$fecha[2]);
      }
    }

          $data=array(
            'fechas' => $fechas,
          );

          $this->load->view('timeline',$data);
	}
}
