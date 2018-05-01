<?php
class Cregpersonas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mregpersonas');
        $this->load->helper('date_helper');
    }

    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('vregpersonas');
        $this->load->view('layout/footer');
    }

    public function getEventos()
    {
        $s = $this->input->post('esteve');
        $resultado = $this->mregpersonas->getEventos($s);

        echo json_encode($resultado);
    }

    public function dnipersona()
    {
        require("reniec/curl.php");
        require("reniec/reniec.php");

        $persona = new Reniec();
        $dni     = $this->input->post('dnip');
        echo json_encode($persona->search($dni));
    }

    public function getSubEventos()
    {
        $c = $this->input->post('codeve');
        $resultado = $this->mregpersonas->getSubEventos($c);

        echo json_encode($resultado);
    }

    public function getAsistencias()
    {
        $a = $this->input->post('cbe');
        $b =  $this->input->post('cbs');
        $resultado = $this->mregpersonas->getAsistencias($a, $b);
        echo json_encode($resultado);
    }

    public function RegistroPersona()
    {
        $param['dniper']  = $this->input->post('dn');
        $param['nomper']  = $this->input->post('no');
        $param['appper']  = $this->input->post('pa');
        $param['apmper']  = $this->input->post('ma');
        $dniper = $this->input->post('dn');

        $lastid = $this->mregpersonas->RegistroPersona($param,$dniper);

        if ($lastid > 0) {
            $paramasis['codper'] = $lastid;
            $paramasis['codeve']  = $this->input->post('ce');
            $paramasis['codsubeve']  = $this->input->post('cs');

            $formatofecha = 'Y-m-d';
            $formatoHora = 'H:i:s';

            $paramasis['fecasis'] = date($formatofecha);
            $paramasis['horasis'] = date($formatoHora);

            $ce = $this->input->post('ce');
            $cs = $this->input->post('cs');
            $cp = $lastid;

            echo $this->mregpersonas->RegistroAsistencia($paramasis,$ce,$cs,$cp);
        }

    }

    // public function getAsistencias()
    // {
    //     $start  = $this->input->post('start');
    //     $length = $this->input->post('length');
    //     $search = $this->input->post('search')['value'];
    //
    //     $result = $this->mregpersonas->getAsistencias($start, $length, $search);
    //     $resultado = $result['datos'];
    //
    //     $totalDatos = $result['numDataTotal'];
    //
    //     $datos = array( );
    //     foreach ($resultado->result_array() as $row) {
    //         $array = array();
    //         $array ['rownum']    = $row['rownum'];
    //         $array ['dniper']    = $row['dniper'];
    //         $array ['nomper']    = $row['nomper'];
    //         $array ['appper']    = $row['appper'];
    //         $array ['apmper']    = $row['apmper'];
    //         $array ['nomsubeve'] = $row['nomsubeve'];
    //         $array ['horasis']   = $row['horasis'];
    //
    //         $datos[] = $array;
    //     }
    //
    //     $totalDatoObtenido = $resultado->num_rows();
    //
    //     $json_data = array(
    //     "draw"            => intval($this->input->post('draw')),
    //     "recordsTotal"    => intval($totalDatoObtenido),
    //     "recordsFiltered" => intval($totalDatos),
    //     "data"            => $datos
    //     );
    //
    //     echo json_encode($json_data);
    // }
}
