<?php

include("./invernadero.class.php");
$app = new Invenadero;

$accion = isset($_GET['accion'])
  ? $_GET['accion'] 
  : null;

switch ($accion) {
  case 'crear':
    include("views/invernadero/crear.php");
    break;
  case 'nuevo':
    print_r($_GET);
    break;
  case 'actualizar':
    $data = $_POST['data'];
    $app -> create($data);
    print_r($data['invernadero']);
    break;
  case 'eliminar':
    
    break;
  default:
    $invernaderos = $app -> readAll(); // Read
    include("views/invernadero/index.php");
    break;
}