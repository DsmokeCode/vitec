<?php
class Mregpersonas extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('date');
    }

    public function getEventos($s)
    {
        $s = $this->db->get_where('evento', array('esteve' => $s));
        return $s->result();
    }

    public function getSubEventos($c)
    {
        $this->db->select('s.codsubeve, s.nomsubeve');
        $this->db->from('subevento s');
        $this->db->WHERE('s.codeve', $c);
        $this->db->WHERE('s.estsubeve', 1);
        $c = $this->db->get();

        return $c->result();
    }

    public function getAsistencias($a, $b)
    {

      $q = " SELECT @rownum:=@rownum+1 AS rownum, p.codper, p.dniper, p.nomper, p.appper, p.apmper, s.nomsubeve, a.horasis
                 FROM asistencia a
                 LEFT JOIN persona p ON a.codper = p.codper
                 LEFT JOIN subevento s ON a.codsubeve = s.codsubeve,
                 (SELECT @rownum := 0) r
                 WHERE (s.codsubeve = $b AND s.codeve = $a AND p.estper = 1)
           ";

      $r = $this->db->query($q);

      return $r->result();
    }

    public function RegistroPersona($param,$dniper)
    {
      $q = "SELECT p.dniper FROM persona p
            WHERE (p.estper = 1 AND p.dniper = $dniper)";
      $r = $this->db->query($q);

      if ($r->num_rows() > 0) {
        $query = "SELECT CAST(p.codper as UNSIGNED) as codper FROM persona p
              WHERE (p.estper = 1 AND p.dniper = $dniper)";
              $q = $this->db->query($query);
              $q = $q->row();
              $codper = $q->codper;
              return $codper;
        }else{
        $campos = array(
          'dniper'  => $param['dniper'],
          'nomper'  => $param['nomper'],
          'appper'  => $param['appper'],
          'apmper'  => $param['apmper'],
          'estper'  => 1,
          'codperf' => 4,
        );
          $this->db->insert('persona', $campos);
          return $this->db->insert_id();
      }
    }

    public function RegistroAsistencia($paramasis,$ce,$cs,$cp)
    {
      $q = "SELECT *
            FROM asistencia
            WHERE codeve = $ce  AND codsubeve = $cs AND codper = $cp";
      $r = $this->db->query($q);

      if ($r->num_rows() > 0)
      {
        return 666;
      }else {
        $campos = array(
          'codeve'    => $paramasis['codeve'],
          'codsubeve' => $paramasis['codsubeve'],
          'codper'    => $paramasis['codper'],
          'fecasis'   => $paramasis['fecasis'],
          'horasis'   => $paramasis['horasis'],
        );
        $this->db->insert('asistencia', $campos);
      }
    }

    // public function getAsistencias($start, $length, $search)
    // {
    //     //-------$search----------
    //     $srch = "";
    //     if ($search) {
    //         $srch = "WHERE (p.dniper LIKE '%$search%' OR
    //           p.nomper LIKE '%$search%' OR
    //           p.appper LIKE '%$search%' OR
    //           p.apmper LIKE '%$search%' OR
    //           s.nomsubeve LIKE '%$search%' OR
    //           a.horasis LIKE '%$search%')";
    //     }
    //
    //     //-------------------
    //     $qnr = "SELECT count(1) cant
    //             FROM asistencia a
    //             INNER JOIN persona p ON a.codper = p.codper
    //             INNER JOIN subevento s ON a.codsubeve = s.codsubeve
    //     ".$srch;
    //
    //     $qnr = $this->db->query($qnr);
    //     $qnr = $qnr->row();
    //     $qnr = $qnr->cant;
    //
    //     $q = " SELECT p.codper rownum, p.codper, p.dniper, p.nomper, p.appper, p.apmper, s.nomsubeve, a.horasis
    //           FROM asistencia a
    //           LEFT JOIN persona p ON a.codper = p.codper
    //           LEFT JOIN subevento s ON a.codsubeve = s.codsubeve
    //     ".$srch."LIMIT $start,$length";
    //
    //     $r = $this->db->query($q);
    //
    //     $retornar = array(
    //                 'numDataTotal' => $qnr,
    //                 'datos'        => $r
    //                 );
    //
    //     return $retornar;
    // }
}
