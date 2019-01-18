<?php
session_start ();
//variable de session pour les messages d'erreur
$_SESSION['message'] = "";

$baseController = "Pages";
$baseTask = "afficher";
$complementTask = "home";

if(isset($_REQUEST['controller'])) $baseController = $_REQUEST['controller'];
if(isset($_REQUEST['task'])) $baseTask = $_REQUEST['task'];
if(isset($_REQUEST['part'])) $complementTask = $_REQUEST['part'];
if(isset($_REQUEST['page'])) $pageTask = $_REQUEST['page'];

if($complementTask == 'index') $complementTask = "home";

require_once('controllers/controller' . $baseController . '.php');
$className = "controller" . $baseController;
$controller = new $className();
if(!empty($baseTask) && empty($complementTask)) $controller->$baseTask();
if(!empty($baseTask) && !empty($complementTask) && !empty($pageTask)) $controller->$baseTask($complementTask,$pageTask);
elseif(!empty($baseTask) && !empty($complementTask)) $controller->$baseTask($complementTask);