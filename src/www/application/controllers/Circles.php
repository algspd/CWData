<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Circles extends CI_Controller {

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
          $bymodel = $this->db->query('SELECT human,count(printermodel) AS num FROM impresoras LEFT JOIN models ON impresoras.printermodel=models.id GROUP BY printermodel ORDER BY num DESC');
          $byplace = $this->db->query('
            SELECT p.provincia,count(printerlocation) AS num
            FROM provincias AS p
            LEFT OUTER JOIN impresoras AS i
            ON i.printerlocation=p.id_provincia
            GROUP BY provincia
            ORDER BY num DESC');

          $data=array(
            'db'    => $this->db,
            'bymodel' => $bymodel,
            'byplace' => $byplace,
          );
                    

          $this->load->view('circles',$data);
	}
}

