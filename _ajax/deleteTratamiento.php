<?php 
@session_start();
require_once '../config.php';
require_once '../lib/library.php';
require_once '../camertic/classes/bd.class.php';
require_once '../lib/classes/entity.class.php';
require_once '../lib/classes/empresa_residuos_tratamiento.class.php';

$C = new CamerticConfig;
$p = new empresa_residuos_tratamiento; 
$keys = explode('-', $_POST['key']);
$p->delProd($keys[0], $keys[1]);
?>