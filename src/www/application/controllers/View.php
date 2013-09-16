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

class View extends CI_Controller {

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
          $query = $this->db->query('SELECT printernumber,printername,provincia,fnacimiento,printermother,printerurl,human FROM impresoras LEFT JOIN models ON models.id=impresoras.printermodel LEFT JOIN users ON impresoras.username=users.username LEFT JOIN provincias ON provincias.id_provincia=impresoras.printerlocation');

          $this->load->library('table');
          $this->table->set_heading(array("#","Nombre","Provincia","Fecha nacimiento","Madre","URL","Modelo"));
          $this->table->set_template(array('table_open'=> '<table border="1" cellpadding="4" cellspacing="0">',));

          echo $this->table->generate($query);

                        /*$data=array(
                          'models' => $models,
                          'provincias' => $provincias,
                          'printers' => $printers,
                        );*/
			//$this->load->view('cw_view',$data);

			//$this->load->view('formsuccess');
	}
}

