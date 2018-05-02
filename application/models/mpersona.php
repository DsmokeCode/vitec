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


}?>