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
    $data = $_POST['data'];
    $result = $app -> create($data);

    if($result == 1){
      $mensaje = 'El invernadero se agrego correctamente';
      $tipo = "success";
    }else{
      $mensaje = "Ocurrio al intentar agregar el invernadero";
      $tipo = "danger";
    }

    $invernaderos = $app -> readAll(); // Read
    include("views/invernadero/index.php");
    
    break;
  case 'actualizar':
    
    break;
  case 'eliminar':
    $id = (isset($_GET['id'])) ? $_GET['id'] : null;

    if( !is_null($id) ){
      if(is_numeric($id)){
        $result = $app -> delete($id);

        if($result == 1){
          $mensaje = "El invernadero se elimino correctament";
          $tipo = "success";
        }else{
          $mensaje = "Error al eliminar el invernadero";
          $tipo = "danger";
        }
      }
    }

    $invernaderos = $app -> readAll(); // Read
    include("views/invernadero/index.php");

    break;
  default:
    $invernaderos = $app -> readAll(); // Read
    include("views/invernadero/index.php");
    break;
}