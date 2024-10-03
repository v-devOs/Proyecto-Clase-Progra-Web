<?php

require_once("./seccion.class.php");
require_once("./invernadero.class.php");
$app = new Seccion;
$appInvernadero = new Invenadero;

$accion = isset($_GET['accion'])
  ? $_GET['accion'] 
  : null;

$id = isset($_GET['id']) 
  ? $_GET['id'] 
  : null;



switch ($accion) {
  case 'crear':
    $invernaderos = $appInvernadero -> readAll();
    include("views/seccion/crear.php");
    break;
  case 'nuevo':
    $data = $_POST['data'];
    $result = $app -> create($data);

    if($result == 1){
      $mensaje = 'La Sección se agrego correctamente';
      $tipo = "success";
    }else{
      $mensaje = "Ocurrio al intentar agregar la sección";
      $tipo = "danger";
    }

    $secciones = $app -> readAll(); // Read
    include("views/seccion/index.php");
    
    break;
  case 'actualizar':
    $invernaderos = $appInvernadero -> readAll();
    $secciones = $app -> readOne($id);
    include('views/seccion/crear.php');
    break;
  case 'modificar':
    $data = $_POST['data'];
    $result = $app -> update($id, $data);

    if($result){
      $mensaje = 'Sección se actualizo correctamente';
      $tipo = 'success';
    }
    else{
      $mensaje = 'La sección no se actualizo';
      $tipo = 'danger';
    }
    $secciones = $app -> readAll(); // Read
    include("views/seccion/index.php");

    break;
  case 'eliminar':
    $id = (isset($_GET['id'])) ? $_GET['id'] : null;

    if( !is_null($id) ){
      if(is_numeric($id)){
        $result = $app -> delete($id);

        if($result == 1){
          $mensaje = "La sección se elimino correctamente";
          $tipo = "success";
        }else{
          $mensaje = "Error al eliminar la sección";
          $tipo = "danger";
        }
      }
    }

    $secciones = $app -> readAll(); // Read
    include("views/seccion/index.php");

    break;
  default:
    $secciones = $app -> readAll(); // Read
    include("views/seccion/index.php");
    break;
}