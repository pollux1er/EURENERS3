<?php
@session_start();
/**
 * Classe de gestion des provinces
 * @author 		Patient Assontia <assontia@gmail.com>
 * @package 	Camertic Framework
 * @since 		Version 1.0
 * @version		1.1
 * @copyright 	Copyright (c) 2012, Patient
 * @license		GNU General Public License
 */

class tipos_basicos extends entity {
	
	public function __construct() {
		parent::__construct(__CLASS__);
	}
	
	public function getCategories($id) {
		$req = "SELECT identificador, nombre FROM categorias WHERE tipo_basico = '". $id ."'";
		//var_dump($req); die;
		$res = $this->select($req);
		return $res;
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>