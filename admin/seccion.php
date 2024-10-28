<?php
require_once ('seccion.class.php');
require_once ('invernadero.class.php');
$appinvernaderos= new invernadero();
$app = new seccion;
$app -> checkRol('Administrador');
$accion = (isset($_GET['accion']))?$_GET['accion']:null;
$id=(isset($_GET['id']))?$_GET['id']:null;
switch($accion){
    case 'crear':
        $invernaderos=$appinvernaderos->readAll();
        include 'views/seccion/crear.php';
        break;
    case 'nuevo':
        $data=$_POST['data'];
        $resultado= $app->create($data);
        if($resultado){
            $mensaje="La seccion se agrego correctamente";
            $tipo="success";
        }else{
            $mensaje="Ocurrio un error al agregar la seccion";
            $tipo="danger";
        }
        $secciones = $app->readAll();
        include('views/seccion/index.php');
        break;
    case 'actualizar':
        $secciones=$app->readOne($id);
        $invernaderos = $appinvernaderos->readAll();
        include('views/seccion/crear.php');
        break;

    case 'modificar':
        $data= $_POST['data'];
        $resultado = $app->update($id,$data);
        if($resultado){
            $mensaje="La seccion se modificó correctamente";
            $tipo="success";
        } else {
            $mensaje="Ocurrió un error al modificar la seccion";
            $tipo="danger";
        }
        $secciones = $app->readAll();
        include('views/seccion/index.php');
        break;
    case 'eliminar':
        if(!is_null($id)){
            if(is_numeric($id)){
                $resultado=$app->delete($id);
                if($resultado){
                    $mensaje="Se elimino exitosamente la seccion";
                    $tipo="success";
                }else{
                    $mensaje="Hubo un problema con la eliminacion";
                    $tipo="danger";
                }
            }
        }
        $secciones = $app->readAll();
        include 'views/seccion/index.php';
        break;
    default:
        $secciones = $app->readAll();
        include 'views/seccion/index.php';
}
require_once('views/footer.php')
?>