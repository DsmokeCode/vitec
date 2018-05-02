<?php 
/**
* 
*/
class Mpersona extends CI_Model
{
	
 	function __construct()
 	{
 		parent::__construct();
 	}
public function guardar($param){
	$campos = array(
		'dni' => $param['dni'],
		'nombre' => $param['nombre'],
		'apellido_p' => $param['apellido_p'],
		'apellido_m' => $param['apellido_m'],
		'direccion' => $param['direccion'],
		'fecha_ingreso' => $param['fecha_ingreso'],
		'celular' => $param['celular'],
		'telefono' => $param['telefono'],
		'correo' => $param['correo'],
		'cod_perfil' => $param['cod_perfil'],
		'usuario' => $param['usuario'],
		'pass' => $param['pass'],
		'estado_persona' => $param['estado_persona']
		);
	$this->db->insert('t02_persona',$campos);
}
public function actualizar($param){
	$campos = array(
		'nombre' => $param['nombre'],
		'apellido_p' => $param['apellido_p'],
		'apellido_m' => $param['apellido_m']
		);
	$this->db->where('cod_persona', $this->session->userdata('s_cod_persona'));
	$this->db->update('t02_persona', $campos);

	$this->db->select('nombre, apellido_p, apellido_m');
	$this->db->from('t02_persona');
	$this->db->where('cod_persona', $this->session->userdata('s_cod_persona'));
	$resultado = $this->db->get();
	$r = $resultado->row();

		$s_usuario = array(
			's_nombre' => $r->nombre.", ".$r->apellido_p." ".$r->apellido_m,
		);
		$this->session->set_userdata($s_usuario);



	return 1;
}

}?>