<?php

class Mencuestas extends CI_Model
{

	function __construct()
	{
		parent::__construct();
		$this->load->helper('date');
	}

  public function getencuesta($b)
  {
    $q = "  SELECT @rownum:=@rownum+1 AS rownum, e.codenc, e.nomenc, e.desenc, e.finienc, e.ffinenc
               FROM encuesta e
               LEFT JOIN evento ev ON ev.codeve = e.codeve,
               (SELECT @rownum := 0) r
               WHERE (ev.codeve = $b and e.estenc = 1)
         ";

      $r = $this->db->query($q);

      return $r->result();
  }

  public function guardarencuesta($param)
  {
    $campos = array(
      'codeve'  => $param['codeve'],
      'nomenc'  => $param['nomenc'],
      'desenc'  => $param['desenc'],
      'finienc' => $param['finienc'],
      'ffinenc' => $param['ffinenc'],
      'estenc'  => 1,
       );
    $this ->db->insert('encuesta',$campos);
  }

	public function EditarEncuesta($param)
	{
		$campos = array(
			'nomenc'  => $param['nomenc'],
			'desenc'  => $param['desenc'],
			'finienc' => $param['finienc'],
			'ffinenc' => $param['ffinenc'],
		);

		$this->db->where('codenc', $param['codenc']);
		$this->db->update('encuesta', $campos);

		return 1;
	}
	public function deleteencuesta($codenc)
	{
		$q = "UPDATE encuesta SET estenc = 0 WHERE codenc = $codenc";
		$this->db->query($q);

		return 777;
	}
}
