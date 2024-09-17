<?php

include("./invernadero.class.php");
$app = new Invenadero;

$accion = isset($_GET['accion'])
  ? $_GET['accion'] 
  : null;

switch ($accion) {
  case 'create':
    
    break;
  case 'update':

    break;
  case 'delete':
    
    break;
  default:
    $invernaderos = $app -> readAll(); // Read
    include("views/invernadero/index.php");
    break;
}