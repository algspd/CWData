<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
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

