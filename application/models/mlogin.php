<?php

class mlogin extends CI_model
{
    public function ingresar($usu, $pass)
    {
        $this->db->select('p.cod_persona, p.nombre, p.apellido_p, p.apellido_m, pf.descripcion_perfil');
        $this->db->from('t02_persona p');
        $this->db->join('t08_perfil pf', 'p.cod_perfil = pf.cod_perfil');
        $this->db->WHERE('p.usuario', $usu);
        $this->db->WHERE('p.pass', $pass);

        $resultado = $this->db->get();
        if ($resultado-> num_rows() == 1) {
            $r         = $resultado-> row();
            $s_usuario = array(
                's_cod_persona'  => $r->cod_persona,
                's_usuario1' => $r->usuario,
                's_usuario' => $r->nombre." ".$r->apellido_p,
                's_perfil'  => $r->descripcion_perfil
                );

            $this->session->set_userdata($s_usuario);
            return 1;
        } else {
            return 0;
        }
    }

    public function rcuenta($correo)
    {
        $this->db->select('email');
        $this->db->from('persona');
        $this->db->WHERE('email', $correo);
        $resultado = $this->db->get();
        if ($resultado-> num_rows() == 1) {
            return 1;
        } else {
            return 0;
        }
    }

    public function nusuario($dni)
    {
        $this->db->select('codper, nomper, appper, dniper');
        $this->db->from('persona ');
        $this->db->WHERE('dniper', $dni);

        $resultado = $this->db->get();
        if ($resultado->num_rows() == 0) {
          return 0;
        }
        if ($resultado->num_rows() > 0) {
            $this->db->select('p.nomper, p.appper, p.dniper, u.userper');
            $this->db->from('persona p');
            $this->db->join('usuario u', 'p.codper = u.codper');
            $this->db->WHERE('p.dniper', $dni);

            $result = $this->db->get();
            if ($result->num_rows() > 0) {
            return 1; // el dni ya tiene usuario registrado
            }else{ // tiene dni pero no tiene usuario registrado
            $q = " SELECT codper, nomper, appper, apmper, dniper
                   FROM persona
                   WHERE dniper = $dni AND  codperf = 4
                   ";
            $r = $this->db->query($q);
            return $r->result();
            }
        }
    }

    public function modalusuario($param,$codpers)
    {
      $campos = array(
        'telper'  => $param['telper'],
        'email'  => $param['email'],
        'fnacper'  => $param['fnacper'],
        'sexo'  => $param['sexo'],
      );
      $this->db->where('codper', $param['codper']);
      $this->db->update('persona', $campos);
//--------------------------------------------------------------
      $q = " SELECT codper, nomper, appper, apmper, dniper
             FROM persona
             WHERE codper = $codpers AND  codperf = 4
             ";
      $resultado = $this->db->query($q);
      $r = $resultado->row();

            $ca = substr($r->nomper, 0, 1);

            $data = array(
                    'codper'  => $r->codper,
                    'userper' => strtolower($ca.$r->appper),
                    'pass'    => sha1($r->dniper),
                    'estusu'  => 1,
                    );
            $this->db->insert('usuario', $data);

            $q = " SELECT u.userper, p.dniper
                   FROM usuario u INNER JOIN persona p on u.codper = p.codper
                   WHERE codper = $codpers AND  estusu = 1
                   ";
            $res = $this->db->query($q);
            return $res->result();


    }
}
