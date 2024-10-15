<?php

require_once("./invernadero.class.php");
$app = new Invenadero;

$app -> checkRol('AdministradorX');

$accion = isset($_GET['accion'])
  ? $_GET['accion'] 
  : null;

$id = isset($_GET['id']) 
  ? $_GET['id'] 
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
    $invernaderos = $app -> readOne($id);
    include('views/invernadero/crear.php');
    break;
  case 'modificar':
    $data = $_POST['data'];
    $result = $app -> update($id, $data);

    if($result){
      $mensaje = 'Invernadero se actualizo correctamente';
      $tipo = 'success';
    }
    else{
      $mensaje = 'El invernadero no se actualizo';
      $tipo = 'danger';
    }
    $invernaderos = $app -> readAll(); // Read
    include("views/invernadero/index.php");

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