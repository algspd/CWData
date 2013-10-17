<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get extends CI_Controller {

	public function index()
	{
          $this->load->database();
          $this->load->library('table');
          $query = $this->db->query('SELECT * FROM impresoras');
          // Obtener el número máximo de impresora
          $this->db->select_max('printernumber','max');
          $query2 = $this->db->get('impresoras');
          $row=$query2->row();
          $printermax=$row->max;

          $data=array(
            'db'    => $this->db,
            'query' => $query,
            'printermax' => $printermax,
          );
                    

          $this->load->view('getdata',$data);
	}
}

