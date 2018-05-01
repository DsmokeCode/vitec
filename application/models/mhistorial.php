<?php

class Mhistorial extends CI_Model
{

  function __construct()
  {
    parent::__construct();
		$this->load->helper('date');
  }
  public function gethistorialeventos($fechaini, $fechafin)
  {
    $q = "  SELECT @rownum:=@rownum+1 AS rownum, e.codeve, e.nomeve, e.finieve, e.ffineve , p.nomper as enceve
               FROM evento e
               INNER JOIN persona p ON e.enceve = p.codper ,
               (SELECT @rownum := 0) r
               WHERE (e.esteve = 1 AND
                 e.finieve BETWEEN '$fechaini' AND '$fechafin')
         ";
    $r = $this->db->query($q);

    return $r->result();
  }


  public function gethistorialponente($codeve)
  {
    $q = "  SELECT @rownum:=@rownum+1 AS rownum, s.codsubeve, s.nomsubeve , p.nomper, s.finisubeve
               FROM subevento s
               INNER JOIN persona p ON p.codper = s.codper ,
               (SELECT @rownum := 0) r
               WHERE (s.estsubeve = 1 AND s.codeve = $codeve)
         ";
    $r = $this->db->query($q);
    return $r->result();
  }

}
