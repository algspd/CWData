<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wiki extends CI_Controller {

	public function index()
	{
          $this->load->database();
          $this->load->library('table');
          $query = $this->db->query('SELECT hijas.printernumber,hijas.printername,provincia,hijas.fnacimiento,madres.printername AS madre,hijas.printerurl, human,hijas.foto, users.username FROM impresoras AS hijas LEFT JOIN impresoras AS madres ON madres.printernumber=hijas.printermother LEFT JOIN models ON models.id=hijas.printermodel LEFT JOIN users ON hijas.username=users.username LEFT JOIN provincias ON provincias.id_provincia=hijas.printerlocation');
          $data=array(
            'query' => $query,
          );
          $this->load->view('wikiview',$data);
	}
}

