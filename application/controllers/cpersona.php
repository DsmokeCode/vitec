<?php 
/**
 * 
 */
 class Cpersona extends CI_Controller
 {
 	
 	function __construct()
 	{
 		parent::__construct();
 	}

public function index(){
	$this->load->view('vpersona');
 } 
public function guardar(){
	echo "holi";
}





 }?>