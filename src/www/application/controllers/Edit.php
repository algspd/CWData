<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {

  public function index(){

    function getdroplist($table,$id,$text,$db){
      $db->select("$id,$text");
      $query = $db->get("$table");
      $ret=array();
      foreach ($query->result() as $row){
        $ret[$row->$id] = $row->$text;
      }
      return $ret;
    }

    $this->load->database();
    $this->load->helper(array('form', 'url'));

    $models=getdroplist("models","id","human",$this->db);
    $provincias=getdroplist("provincias","id_provincia","provincia",$this->db);
    $users=getdroplist("users","username","username",$this->db);

    $this->db->select('printernumber,printername');
    $query = $this->db->get('impresoras');
    $printers = array();
    foreach ($query->result() as $row){
      ($row->printernumber<0)?$printers[$row->printernumber] = $row->printername : 
      $printers[$row->printernumber] = "#$row->printernumber: $row->printername";
    }

    $currentprinter=$this->input->post('printernumber');
    if ($currentprinter=="" || $this->input->post('cw_discard_changes')){
      // No está seteada la variable $currentprinter
      redirect('/');
    }

    $viva=array('1' =>"Sí" , '0' => "No");

    $viewdata=array(
      'models'         => $models,
      'provincias'     => $provincias,
      'printers'       => $printers,
      'viva'           => $viva,
      'users'          => $users,
      'currentprinter' => $currentprinter,
    );

    $query = $this->db->query("SELECT * FROM impresoras WHERE impresoras.printernumber=$currentprinter");
    $row = $query->result_array();
    $defvals = $row[0];
    $viewdata['defvals']=$defvals;

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
    $this->form_validation->set_message('natural', 'El campo "%s" debe ser un número positivo');
    $this->form_validation->set_message('exact_length', 'La longitud del campo "%s" no es correcta');
    if ($this->input->post('cw_save_changes') ){
      $this->form_validation->set_rules('printername', 'Nombre', 'required');
      $this->form_validation->set_rules('printernumber', 'N&uacute;mero','required|numeric');
      $this->form_validation->set_rules('fnacimiento', 'Fecha de nacimiento','exact_length[10]');
    }

    // Validacion
    if ($this->form_validation->run() == FALSE){
      $this->load->view('cw_edit',$viewdata);
    }
    else{
      // Guardar en DB
      $printer = array(
          'printername'     => $this->input->post('printername'),
          'fnacimiento'     => $this->input->post('fnacimiento'),
          'printermodel'    => $this->input->post('printermodel'),
          'printermother'   => $this->input->post('printermother'),
          'printerlocation' => $this->input->post('printerlocation'),
          'printerurl'      => $this->input->post('printerurl'),
          'printeralive'    => $this->input->post('printeralive'),
          'username'        => $this->input->post('printerusername'),
      );

      if ($this->upload->do_upload("foto")){
        $data = $this->upload->data();
        // Generar thumbnail
        $file=$data['full_path'];
        $foto_a=explode('/',$file);
        $filename=$foto_a[sizeof($foto_a)-1];
        $path=str_replace($filename,"",$file);
        exec ("convert -resize 70x70 $file $path/thumb_$filename");
        // Si el usuario ha agregado una nueva foto
        $printer['foto'] = $data['full_path'];
      }
      $this->db->where('printernumber', $this->input->post('printernumber'));
      $this->db->update('impresoras', $printer);
      $data=array('printer'=>$printer);
      $this->load->view('cw_success',$data);
    }
  }
}

