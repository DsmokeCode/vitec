<?php
class Cgesusuarios extends ci_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mgesusuarios');
        $this->load->library('encryption');
    }

    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('vgesusuarios');
        $this->load->view('layout/footer');
    }
    public function Registrarpersona()
    {
        $param['dniper']  = $this->input->post('mdltxtdni');
        $param['nomper']  = $this->input->post('mdltxtNombre');
        $param['appper']  = $this->input->post('mdltxtApPaterno');
        $param['apmper']  = $this->input->post('mdltxtApMaterno');
        $param['sexo']    = $this->input->post('mdlcbxSexo');
        $param['codperf'] = $this->input->post('mdlcbxPerfil');
        $param['fnacper'] = $this->input->post('mdlfechaNacimiento');
        $param['telper']  = $this->input->post('mdlTelefono');
        $param['email']   = $this->input->post('mdlEmail');
        $dnipersona = $this->input->post('mdltxtdni');

      echo  $this->mgesusuarios->Registrarpersona($param,$dnipersona);
    }

    public function Updpersona()
    {
      $param['codper']  = $this->input->post('emdlCodPersona');
      $param['dniper']  = $this->input->post('emdltxtdni');
      $param['nomper']  = $this->input->post('emdltxtNombre');
      $param['appper']  = $this->input->post('emdltxtApPaterno');
      $param['apmper']  = $this->input->post('emdltxtApMaterno');
      $param['sexo']    = $this->input->post('emdlcbxSexo');
      $param['codperf'] = $this->input->post('emdlcbxPerfil');
      $param['fnacper'] = $this->input->post('emdlfechaNacimiento');
      $param['telper']  = $this->input->post('emdlTelefono');
      $param['email']   = $this->input->post('emdlEmail');

      echo  $this->mgesusuarios->Updpersona($param);
    }

    public function UdpUsuario()
    {
      $param['codusu']  = $this->input->post('umdlcodusu');
      $param['codper']  = $this->input->post('umdlcodper');
      $param['userper']  = $this->input->post('umdltxtUsuario');
      $param['pass']  = sha1($this->input->post('umdlpassword'));
      $cdp = $this->input->post('umdlcodusu');
      echo $this->mgesusuarios->UdpUsuario($param,$cdp);
    }

    public function deletepersona()
    {
      $codper = $this->input->post('dmdlPersona');
      echo $this->mgesusuarios->deletepersona($codper);
    }

    public function getPerfiles()
    {
        $s = $this->input->post('estperf');
        $resultado = $this->mgesusuarios->getPerfiles($s);

        echo json_encode($resultado);
    }

    public function getUsuarios()
    {
      $start  = $this->input->post('start');
      $length = $this->input->post('length');
      $search = $this->input->post('search')['value'];

      $result = $this->mgesusuarios->getUsuarios($start,$length,$search);
      $resultado = $result['datos'];

      $totalDatos = $result['numDataTotal'];

  $datos = array( );
  foreach ($resultado->result_array() as $row) {
    $array = array();
    $array ['rownum']  = $row['rownum'];
    $array ['codper']  = $row['codper'];
    $array ['dniper']  = $row['dniper'];
    $array ['nomper']  = $row['nomper'];
    $array ['appper']  = $row['appper'];
    $array ['apmper']  = $row['apmper'];
    $array ['sexo']    = $row['sexo'];
    $array ['desperf'] = $row['desperf'];
    $array ['telper']  = $row['telper'];
    $array ['email']   = $row['email'];
    $array ['fnacper'] = $row['fnacper'];
    $array ['codusu']  = $row['codusu'];
    $array ['userper'] = $row['userper'];

    $datos[] = $array;
  }
  $totalDatoObtenido = $resultado->num_rows();

  $json_data = array(
  "draw"            => intval($this->input->post('draw')),
  "recordsTotal"    => intval($totalDatoObtenido),
  "recordsFiltered" => intval($totalDatos),
  "data"            => $datos
  );
      echo json_encode($json_data);
    }
}
