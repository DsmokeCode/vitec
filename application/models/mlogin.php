<?php

class Mlogin extends CI_Model
{
	
	function __construct()
	{
		parent::__construct();
	}
public function ingresar($usuario,$pass){
	$this->db->select('cod_persona, nombre, apellido_p, apellido_m, correo, cod_perfil');
	$this->db->from('t02_persona');
	$this->db->where('usuario', $usuario);
	$this->db->where('pass', $pass);
	$resultado = $this->db->get();

	if ($resultado->num_rows()==1) {
		$r = $resultado->row();

		$s_usuario = array(
			's_cod_persona' => $r->cod_persona,
			's_nombre' => $r->nombre.", ".$r->apellido_p." ".$r->apellido_m,
			's_cod_perfil' => $r->cod_perfil,
			's_correo' => $r->correo );
		$this->session->set_userdata($s_usuario);
		return 1;
	}else{
		return 0;
	}
}


}?>