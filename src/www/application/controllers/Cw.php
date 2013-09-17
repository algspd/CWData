<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cw extends CI_Controller {
  public function index(){
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
      ($row->printernumber<0)?$printers[$row->printernumber] = $row->printername : 
      $printers[$row->printernumber] = "#$row->printernumber: $row->printername";
    }

    $query = $this->db->query('SELECT username FROM users');
    $users = array();
    foreach ($query->result() as $row){
      $users[$row->username] = $row->username;
    }
    $this->load->helper(array('form', 'url'));
    $this->load->helper('date');

    $config['upload_path'] = './uploads/';
    $config['allowed_types'] = 'gif|jpg|png';
    $this->load->library('upload', $config);

    // Reglas de validación
    $this->load->library('form_validation');
    $this->form_validation->set_message('required', 'El campo "%s" es obligatorio');
    $this->form_validation->set_message('is_unique', 'El campo "%s" debe ser único');
    $this->form_validation->set_message('valid_email', 'El campo "%s" debe contener un e-mail');
    $this->form_validation->set_message('numeric', 'El campo "%s" debe contener solo números');
    $this->form_validation->set_message('integer', 'El campo "%s" debe ser un número entero');
    $this->form_validation->set_message('exact_length', 'La longitud del campo "%s" no es correcta');
    
    if ($this->input->post('cw')){
      $this->form_validation->set_rules('printername', 'Nombre', 'required');
      $this->form_validation->set_rules('printernumber', 'N&uacute;mero',
        'required|is_unique[impresoras.printernumber]|numeric|integer');
      $this->form_validation->set_rules('fnacimiento', 'Fecha de nacimiento','exact_length[10]');
    }

    if ($this->input->post('cwuser')){
      $this->form_validation->set_rules('username', 'Nombre de usuario', 'required');
      $this->form_validation->set_rules('useremail', 'Email', 'valid_email');
    }
    
    $viewdata=array(
      'models' => $models,
      'provincias' => $provincias,
      'printers' => $printers,
      'users' => $users,
    );

    // Validacion
    if ($this->form_validation->run() == FALSE){
      $this->load->view('cw_view',$viewdata);
    }
    else{
      // Guardar en DB
      if ($this->input->post('cw') && $this->upload->do_upload("foto")){
        // Si se trata de una impresora y se ha podido subir la foto
        $data = $this->upload->data();
        $printer = array(
          'printernumber'   => $this->input->post('printernumber'),
          'printername'     => $this->input->post('printername'),
          'fnacimiento'     => $this->input->post('fnacimiento'),
          'printermodel'    => $this->input->post('printermodel'),
          'printermother'   => $this->input->post('printermother'),
          'printerlocation' => $this->input->post('printerlocation'),
          'printerurl'      => $this->input->post('printerurl'),
          'printeralive'    => 1,
          'username'        => $this->input->post('printerusername'),
          'foto'            => $data['full_path'],
        );
        $res=$this->db->insert('impresoras', $printer); 
        if(!$res){
          $this->form_validation->set_message('false', 'El campo no es v&aacute;lido');
          $this->form_validation->run();
          $this->load->view('cw_view',$viewdata);
        }
        $data=array('printer'=>$printer);
        $this->load->view('cw_success',$data);
      }
      else if ($this->input->post("cwuser")){
      // Si se trata de un constructor
        $user = array(
          'username'  => $this->input->post('username'),
          'userurl'   => $this->input->post('userurl'),
          'useremail' => $this->input->post('useremail'),
        );
        $this->db->insert('users', $user); 
        $data=array('user'=>$user);
        $this->load->view('cwuser_success',$data);
      }
      else {
        // Si la foto estaba vacía o ha habido algún problema con ella
        $nofoto="El campo \"Foto\" es obligatorio<br/>";
        $viewdata['nofoto'] = $nofoto;
        $this->load->view('cw_view',$viewdata);
      }


    }
  }
}

