<?php 
@session_start();
require_once '../config.php';
require_once '../lib/library.php';
require_once '../camertic/classes/bd.class.php';
require_once '../camertic/classes/utilisateur.class.php';

$C = new CamerticConfig;
$p = new utilisateur; 
$p->blockUser($_POST);


?>