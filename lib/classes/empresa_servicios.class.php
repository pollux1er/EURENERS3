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

class empresa_servicios extends entity {
	
	public function __construct() {
		parent::__construct('empresa_servicios_auxiliares');
	}
	
	public function getAllRecordsE() {
		$req = "SELECT * FROM $this->table WHERE empresa = '".$_SESSION['u']['enterprise']."' AND es_produccion = '1'";
		//$motif = is_null($motif) ? "Displays the records for $this->table" : $motif;
		//if($track == false || ($track == false && is_null($motif)))
			$res = $this->select($req);
		//else
		//	$res = $this->select($req, $motif);
		return $res;
	}
	public function getAllRecordsETrans() {
		$req = "SELECT * FROM $this->table WHERE empresa = '".$_SESSION['u']['enterprise']."' AND es_transformacion = '1'";
		//$motif = is_null($motif) ? "Displays the records for $this->table" : $motif;
		//if($track == false || ($track == false && is_null($motif)))
			$res = $this->select($req);
		//else
		//	$res = $this->select($req, $motif);
		return $res;
	}
	public function update($updates, $table = null) {
		$table = is_null($table) ? $table = 'empresa_servicios_auxiliares' : $table;
		$sql = $this->buildUpdateQueryWhere($updates, array('empresa' => $_SESSION['u']['enterprise'], 'servicio_auxiliar' => $updates['servicio_auxiliar']), $table);
		//var_dump($sql); die;
		$this->sql($sql);
	}
	
	public function getRecordE($id){
		$req = "SELECT * FROM $this->table WHERE servicio_auxiliar = '$id' AND empresa = '".$_SESSION['u']['enterprise']."' LIMIT 1";
		$res = $this->select($req);
		return $res[0];
	}
	
	public function del($id) {
		$req = "SET FOREIGN_KEY_CHECKS=0; DELETE FROM $this->table WHERE empresa = '".$_SESSION['u']['enterprise']."' AND servicio_auxiliar = '".$id."';";
		//var_dump($req); die;
		$this->sql($req);
	}
	
	public function __destruct() {
		parent::__destruct();
	}
	
}

?>