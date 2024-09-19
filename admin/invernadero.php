<?php

include("./invernadero.class.php");
$app = new Invenadero;

$accion = isset($_GET['accion'])
  ? $_GET['accion'] 
  : null;

switch ($accion) {
  case 'crear':
    
    break;
  case 'actualizar':

    break;
  case 'eliminar':
    
    break;
  default:
    $invernaderos = $app -> readAll(); // Read
    include("views/invernadero/index.php");
    break;
}