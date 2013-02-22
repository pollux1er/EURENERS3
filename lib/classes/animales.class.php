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

class animales extends entity {
	
	public function __construct() {
		parent::__construct(__CLASS__);
	}
	
	public function getAnimalesFromCategory($id) {
		$req = "SELECT identificador, nombre FROM $this->table WHERE categoria = '". $id ."'";
		//var_dump($req); die;
		$res = $this->select($req);
		return $res;
	}
	
	public function getAnimalesOfEmpresa() {
		$req = "SELECT c.identificador as identificador, c.nombre as nombre FROM $this->table as c INNER JOIN empresa_animales AS ea ON ea.animal = c.identificador WHERE ea.empresa = '". $_SESSION['u']['enterprise'] ."'";
		//var_dump($req); die;
		$res = $this->select($req);
		return $res;
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>