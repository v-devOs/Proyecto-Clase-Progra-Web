<?php 

  require_once('./usuario.class.php');

  $app = new Seccion;

  $app -> checkRol('Administrador');


  $accion = isset($_GET['accion'])
  ? $_GET['accion'] 
  : null;

  $id = isset($_GET['id']) 
    ? $_GET['id'] 
    : null;

  switch ($accion) {
    case 'value':
      # code...
      break;
    
    default:
      $usuarios = $app -> readAll();
      include('views/usuario/index.php');
      break;
  }