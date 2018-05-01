<?php
class Chistorial extends ci_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('mhistorial');
    }

    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('layout/menu');
        $this->load->view('vhistorial');
        $this->load->view('layout/footer');
    }

    public function gethistorialeventos()
    {
      $fechaini = $this->input->post('fechainibusqueda');
      $fechafin = $this->input->post('fechafinbusqueda');
      $resultado = $this->mhistorial->gethistorialeventos($fechaini,$fechafin);

      echo json_encode($resultado);
    }

    public function gethistorialponente()
    {
      $codeve = $this->input->post('codeventos');
      $resultado = $this->mhistorial->gethistorialponente($codeve);
      echo json_encode($resultado);
    }
}
