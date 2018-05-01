<?php
class Meventos extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
	}

  public function getevento(){

    $q = "  SELECT @rownum:=@rownum+1 AS rownum, e.codeve, e.nomeve, e.deseve,
									 CONCAT(e.finieve,' a ',e.finieve) fecha, p.nomper as enceve
               FROM evento e
							 LEFT JOIN persona p ON e.enceve = p.codper ,
							 (SELECT @rownum := 0) r
               WHERE (e.esteve = 1)
         ";

			$r = $this->db->query($q);

			return $r->result();
	}

public function getencargado($s)
{
	$s = $this->db->get_where('persona',array('codperf' => $s ));
	return $s -> result();
}

  public function RegistrarEvento($param)
  {
    $campos = array(
        'nomeve'  => $param['nomeve'],
        'deseve'  => $param['deseve'],
        'finieve' => $param['finieve'],
        'ffineve' => $param['ffineve'],
        'enceve'  => $param['enceve'],
        'esteve'  => 1,
    );
    $this->db->insert('evento', $campos);
    return 1;
  }

  public function Updevento($param)
  {
    $campos = array(
        'nomeve'  => $param['nomeve'],
        'deseve'  => $param['deseve'],
        'finieve' => $param['finieve'],
        'ffineve' => $param['ffineve'],
        'enceve'  => $param['enceve'],
    );
    $this->db->where('codeve', $param['codeve']);
    $this->db->update('evento', $campos);

    return 2;
  }

  public function deleteevento($codeve)
  {
    $q = "UPDATE evento SET esteve = 0 WHERE codeve = $codeve";
    $this->db->query($q);

    return 3;
  }
}
