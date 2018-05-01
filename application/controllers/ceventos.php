<?php
class Ceventos extends ci_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('meventos');
	}

	public function index (){
		$this->load->view('layout/header');
		$this->load->view('layout/menu');
		$this->load->view('veventos');
		$this->load->view('layout/footer');
	}

	public function getevento(){
		$resultado = $this->meventos->getevento();
		echo json_encode($resultado);
	}

	public function RegistrarEvento()
	{
		$param['nomeve']  = $this->input->post('mdltxtnomeve');
		$param['deseve']  = $this->input->post('mtxtdesceve');
		$param['finieve'] = $this->input->post('mdlfechainieve');
		$param['ffineve'] = $this->input->post('mdlfechafineve');
		$param['enceve']  = $this->input->post('cbencargado');

	echo  $this->meventos->RegistrarEvento($param);
	}

	public function Updevento()
	{
		$param['codeve']  = $this->input->post('emdlevento');
		$param['nomeve']  = $this->input->post('emdltxtnomeve');
		$param['deseve']  = $this->input->post('emtxtdesceve');
		$param['finieve'] = $this->input->post('emdlfechainieve');
		$param['ffineve'] = $this->input->post('emdlfechafineve');
		$param['enceve']  = $this->input->post('mcbencargado');

	echo  $this->meventos->Updevento($param);
	}

	public function deleteevento()
	{
		$codeve = $this->input->post('dmdlevento');
		echo $this->meventos->deleteevento($codeve);
	}

	public function getencargado()
	{
		$s=$this->input->post('codperf');
		$resultado = $this->meventos->getencargado($s);
		echo json_encode($resultado);
	}
}
