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

class tratamientos extends entity {
	
	public function __construct() {
		parent::__construct('tratamientos_residuos');
	}
	
	public function getAllTratamientosFromCategory($id) {
		$req = "SELECT * FROM $this->table WHERE categoria = '".$id."'";
		$res = $this->select($req);
		return $res;
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>