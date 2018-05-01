<?php

class Mgesusuarios extends CI_model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function Registrarpersona($param,$dnipersona)
    {
      $q = "SELECT p.dniper FROM persona p
            WHERE (p.estper = 1 AND p.dniper=$dnipersona)";
      $r = $this->db->query($q);

      if ($r->num_rows() > 0) {
        return 0;
      }else {
        $campos = array(
            'dniper'  => $param['dniper'],
            'nomper'  => $param['nomper'],
            'appper'  => $param['appper'],
            'apmper'  => $param['apmper'],
            'sexo'    => $param['sexo'],
            'codperf' => $param['codperf'],
            'fnacper' => $param['fnacper'],
            'telper'  => $param['telper'],
            'email'   => $param['email'],
            'estper'  => 1,
        );
        $this->db->insert('persona', $campos);
        return 1;
      }
    }

    public function Updpersona($param)
    {
      $campos = array(
          'dniper'  => $param['dniper'],
          'nomper'  => $param['nomper'],
          'appper'  => $param['appper'],
          'apmper'  => $param['apmper'],
          'sexo'    => $param['sexo'],
          'codperf' => $param['codperf'],
          'fnacper' => $param['fnacper'],
          'telper'  => $param['telper'],
          'email'   => $param['email'],
      );

      $this->db->where('codper', $param['codper']);
      $this->db->update('persona', $campos);

  		return 2;
    }

 public function UdpUsuario($param,$cdp)
    {

      if ($cdp != 'null') {
        $campos2 = array(
        'userper' => $param['userper'],
        'pass'    => $param['pass'],
        );
        $this->db->where('codusu', $cdp);
        $this->db->update('usuario', $campos2);
      }else {
        $campos = array(
        'codper'  => $param['codper'],
        'userper' => $param['userper'],
        'pass'    => $param['pass'],
        'estusu'  => 1,
        );
        $this->db->insert('usuario', $campos);
      }
        return 3;
    }

    public function deletepersona($codper)
    {
      $q = "UPDATE persona SET estper = 0 WHERE codper = $codper";
      $this->db->query($q);

      return 4;
    }

    public function getPerfiles($s)
    {
      $s = $this->db->get_where('perfil', array('estperf' => $s));
      return $s->result();
    }

    public function getUsuarios($start, $length, $search)
    {
      $srch = "WHERE (p.estper = 1) ";
      if ($search) {
          $srch = "WHERE (
              p.dniper LIKE '%$search%' OR
              p.nomper LIKE '%$search%' OR
              p.appper LIKE '%$search%' OR
              p.apmper LIKE '%$search%' OR
              p.sexo LIKE '%$search%' OR
              pf.desperf LIKE '%$search%' OR
              p.telper LIKE '%$search%' OR
              p.email LIKE '%$search%' OR
              p.fnacper LIKE '%$search%') AND p.estper = 1 ";
      }

      $qnr = " SELECT count(1) cant
      FROM persona p
      LEFT JOIN perfil pf ON pf.codperf = p.codperf
      ".$srch;

          $qnr = $this->db->query($qnr);
          $qnr = $qnr->row();
          $qnr = $qnr->cant;

      $q = " SELECT @rownum:=@rownum+1 AS rownum, p.codper, p.dniper, p.nomper, p.appper, p.apmper,
                p.sexo, pf.desperf, p.telper, p.email, p.fnacper, u.codusu, u.userper
                 FROM persona p
                 LEFT JOIN perfil pf ON pf.codperf = p.codperf
                 LEFT JOIN usuario u ON u.codper = p.codper,
                 (SELECT @rownum := 0) r
           ".$srch."LIMIT $start,$length";


  			$r = $this->db->query($q);

        $retornar = array(
        'numDataTotal' => $qnr,
        'datos'        => $r
        );

  			return $retornar;
    }
}
