<?php

class Mreportes extends CI_Model
{

  function __construct()
  {
    parent::__construct();

  }

  public function getEvexAsi()
  {
    $q = "SELECT e.nomeve, COUNT(*) AS total_asistencia
          FROM asistencia a
          INNER JOIN evento e ON a.codeve = e.codeve
          GROUP BY 1";

    $r = $this->db->query($q);
    return $r->result();
  }

  public function getPonxAsi()
  {
    $q = "SELECT s.nomsubeve, COUNT(*) AS total_asistencia
          FROM asistencia a INNER JOIN subevento s ON a.codsubeve = s.codsubeve
          GROUP BY 1";

    $r = $this->db->query($q);
    return $r->result();
  }

  public function getPonxAsixEve($ideve)
  {
    $q = "SELECT s.nomsubeve, COUNT(*) AS total_asistencia
          FROM asistencia a INNER JOIN subevento s ON a.codsubeve = s.codsubeve
          WHERE a.codeve = $ideve
          GROUP BY 1";

    $r = $this->db->query($q);
    return $r->result();
  }
}
