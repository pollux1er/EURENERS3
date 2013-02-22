<?php 
@session_start();
require_once '../config.php';
require_once '../lib/library.php';
require_once '../camertic/classes/bd.class.php';
require_once '../lib/classes/entity.class.php';
require_once '../lib/classes/labor_maquinarias.class.php';

$C = new CamerticConfig;
$p = new labor_maquinarias; 
$mun = $p->getMaquinariasFromLabor($_GET['id']);

//var_dump($mun); die;
$json = '['; // start the json array element
$json_names = array();

foreach ($mun as $id => $name) {
	$json_names[] = "{\"optionValue\": $name->identificador, \"optionDisplay\": \"".utf8_encode($name->nombre)."\"}";
}

$json .= implode(',', $json_names); // join the objects by commas;
$json .= ']'; // end the json array element
echo $json;

?>