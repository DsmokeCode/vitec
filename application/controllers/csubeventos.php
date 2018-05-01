<?php
class Csubeventos extends ci_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('msubeventos');
        $this->load->model('mregpersonas');
    }

    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('vsubeventos');
        $this->load->view('layout/footer');
    }

    public function guardarsubevento()
    {
        $param['cbevento']   = $this->input->post('cbxe');
        $param['nomsubeve']  = $this->input->post('txts');
        $param['codper']     = $this->input->post('cbxex');
        $param['codlug']     = $this->input->post('cbxl');
        $param['dessubeve']  = $this->input->post('txtds');
        $param['finisubeve'] = $this->input->post('fechs');
        $param['hinisubeve'] = $this->input->post('hrini');
        $param['hfinsubeve'] = $this->input->post('hrfin');


        $this->msubeventos->guardarsubevento($param);
    }

    public function getevento()
    {
        $s = $this->input->post('esteve');
        $resultado = $this->mregpersonas->getEventos($s);

        echo json_encode($resultado);
    }

    public function getexpositor()
    {
        $s=$this->input->post('codperf');
        $resultado=$this->msubeventos->getexpositor($s);

        echo json_encode($resultado);
    }

    public function getLugar()
    {
        $s=$this->input->post('estlug');
        $resultado=$this->msubeventos->getLugar($s);

        echo json_encode($resultado);
    }

		public function getsubevento(){

			$b =  $this->input->post('cbe');
			$resultado = $this->msubeventos->getsubevento($b);
			echo json_encode($resultado);
		}

    public function updsubeventos()
    {
      $param['codsubeve']  = $this->input->post('mdlidsubevento');
      $param['nomsubeve']  = $this->input->post('mdltxtnomsub');
      $param['dessubeve']  = $this->input->post('mdltxtdescsub');
      $param['codper']     = $this->input->post('mdlcbexpositor');
      $param['codlug']     = $this->input->post('mdlcblugar');
      $param['finisubeve'] = $this->input->post('datepicker1');
      $param['hinisubeve'] = $this->input->post('timepicker');
      $param['hfinsubeve'] = $this->input->post('timepicker1');

    echo $this->msubeventos->updsubeventos($param);
    }

    public function deletesubevento()
    {
      $codsubeve = $this->input->post('dmdlsubevento');
      echo $this->msubeventos->deletesubevento($codsubeve);
    }
}
