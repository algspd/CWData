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
          $query = $this->db->query('SELECT hijas.printernumber,hijas.printername,provincia,hijas.fnacimiento,madres.printername AS madre,hijas.printerurl,human,hijas.foto FROM impresoras AS hijas LEFT JOIN impresoras AS madres ON madres.printernumber=hijas.printermother LEFT JOIN models ON models.id=hijas.printermodel LEFT JOIN users ON hijas.username=users.username LEFT JOIN provincias ON provincias.id_provincia=hijas.printerlocation');

          $data=array(
            'db'    => $this->db,
            'query' => $query,
          );
          $this->load->view('getdata',$data);
	}
}

