<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Academic Free License version 3.0
 *
 * This source file is subject to the Academic Free License (AFL 3.0) that is
 * bundled with this package in the files license_afl.txt / license_afl.rst.
 * It is also available through the world wide web at this URL:
 * http://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world wide web, please send an email to
 * licensing@ellislab.com so we can send you a copy immediately.
 *
 * @package		CodeIgniter
 * @author		EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2013, EllisLab, Inc. (http://ellislab.com/)
 * @license		http://opensource.org/licenses/AFL-3.0 Academic Free License (AFL 3.0)
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Cw extends CI_Controller {

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
          $query = $this->db->query('SELECT id,human FROM models');
          $models = array();
          foreach ($query->result() as $row){
            $models[$row->id] = $row->human;
          }
          $query = $this->db->query('SELECT id_provincia,provincia FROM provincias');
          $provincias = array();
          $provincias[-1]="Provincia";
          foreach ($query->result() as $row){
            $provincias[$row->id_provincia] = $row->provincia;
          }

          $query = $this->db->query('SELECT printernumber, printername FROM impresoras');
          $printers = array();
          foreach ($query->result() as $row){
            $printers[$row->printernumber] = $row->printername;
          }
          
		$this->load->helper(array('form', 'url'));
                $this->load->helper('date');

		$this->load->library('form_validation');

                $this->form_validation->set_message('required', 'El campo "%s" es obligatorio');
                $this->form_validation->set_rules('printername', 'Nombre de la impresora', 'required');
                //$this->form_validation->set_rules('username', 'Nombre o nick del constructor', 'required');
                $this->form_validation->set_rules('printernumber', 'N&uacute;mero de la impresora', 'required');
                //$this->form_validation->set_rules('printermodel', 'Modelo de la impresora', 'required');

		if ($this->form_validation->run() == FALSE)
		{
                        $data=array(
                          'models' => $models,
                          'provincias' => $provincias,
                          'printers' => $printers,
                        );
			$this->load->view('cw_view',$data);
		}
		else
		{
                        // Guardar en DB
                        echo "Guardando en DB<br/><br/>\n\nDatos:<br/>\n";
                        
                        $printernumber	 = $this->input->post('printernumber');
                        $printername     = $this->input->post('printername');
                        $fnacimiento     = $this->input->post('fnacimiento');
                        $printermodel    = $this->input->post('printermodel');
                        $printermother   = $this->input->post('printermother');
                        $printerlocation = $this->input->post('printerlocation');
                        $printerurl      = $this->input->post('printerurl');
                        $printeralive    = 1;
                        
                        $username        = $this->input->post('username');
                        $userurl         = $this->input->post('userurl');
                        $useremail       = $this->input->post('useremail');

                        echo ("#$printernumber: $printername <br/>\n");
                        echo "Fecha de nacimiento: $fnacimiento<br/>\n";
                        echo "Impresora de tipo $printermodel hija de la impresora n&uacute;mero #$printermother<br/>\n";
                        echo "<a href=\"$printerurl\">Más información sobre la impresora</a><br/><br/>\n\n";
                        
                        echo "Autor: <a  href=\"$userurl\">$username</a> $useremail";
                        $user = array(
                          'username' => $username,
                          'userurl' => $userurl,
                          'useremail' => $useremail
                        );
                        $this->db->insert('users', $user); 

                        $printer = array(
                          'printernumber' => $printernumber,
                          'printername' => $printername,
                          'fnacimiento' => $fnacimiento,
                          'printermodel' => $printermodel,
                          'printermother' => $printermother,
                          'printerlocation' => $printerlocation,
                          'printerurl' => $printerurl,
                          'printeralive' => $printeralive,
                          'username'    => $username,
                        );
                        $this->db->insert('impresoras', $printer); 

			//$this->load->view('formsuccess');
		}
	}
}

