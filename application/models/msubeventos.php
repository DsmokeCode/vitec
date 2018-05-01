<?php

class Msubeventos extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('date');

	}
	public function guardarsubevento ( $param ){
		$campos = array(
			'codeve'     => $param['cbevento'],
			'nomsubeve'  => $param['nomsubeve'],
			'codlug'     => $param['codlug'],
			'codper'     => $param['codper'],
			'dessubeve'  => $param['dessubeve'],
			'finisubeve' => $param['finisubeve'],
			'hinisubeve' => $param['hinisubeve'],
			'hfinsubeve' => $param['hfinsubeve'],
			'estsubeve' => 1,
			 );

		$this ->db->insert('subevento',$campos);
	}

	public function getLugar($s){
		$s=$this->db->get_where('lugar',array('estlug' => $s ));
		return $s -> result();
	}

	public function getexpositor($s){
		$s=$this->db->get_where('persona',array('codperf' => $s ));
		return $s -> result();
	}
	public function getevento($s){
		$s=$this->db->get_where('evento',array('esteve' => $s ));
		return $s -> result();
	}
	public function getsubevento($b){

    $q = "  SELECT @rownum:=@rownum+1 AS rownum, s.codsubeve, s.nomsubeve, s.dessubeve, p.nomper, l.nomlug,
									s.finisubeve, CONCAT(s.hinisubeve,' - ', s.hfinsubeve) hora
               FROM subevento s
               LEFT JOIN persona p ON s.codper = p.codper
               LEFT JOIN lugar l ON s.codlug = l.codlug,
							 (SELECT @rownum := 0) r
               WHERE (s.codeve = $b and s.estsubeve = 1)
         ";

			$r = $this->db->query($q);

			return $r->result();
	}

	public function updsubeventos($param)
	{
		$campos = array(
			'nomsubeve'  => $param['nomsubeve'],
			'dessubeve'  => $param['dessubeve'],
			'codlug'     => $param['codlug'],
			'codper'     => $param['codper'],
			'finisubeve' => $param['finisubeve'],
			'hinisubeve' => $param['hinisubeve'],
			'hfinsubeve' => $param['hfinsubeve'],
			 );

		$this->db->where('codsubeve', $param['codsubeve']);
    $this->db->update('subevento', $campos);

		return 1;
	}
	public function deletesubevento($codsubeve)
	{
		$q = "UPDATE subevento SET estsubeve = 0 WHERE codsubeve = $codsubeve";
		$this->db->query($q);

		return 777;
	}

}
