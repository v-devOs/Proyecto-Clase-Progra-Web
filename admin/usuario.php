<?php
require_once('usuario.class.php');
include('roles.class.php');
$appRoles = new Roles();
$app = new Usuario();
$app->checkRol('Administrador');
$accion = (isset($_GET['accion'])) ? $_GET['accion'] : NULL;
$id = (isset($_GET['id'])) ? $_GET['id'] : null;

switch ($accion) {
    case 'crear':
        $roles = $appRoles -> readAll();
        include 'views/usuario/crear.php';
        break;
    case 'nuevo':
        $data = $_POST;
        //print_r($_POST);
        //die();
        $resultado = $app->create($data);
        if ($resultado) {
            $mensaje = "El usuario se agregó correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Hubo un error al agregar el usuario";
            $tipo = "danger";
        }
        $usuarios = $app->readAll();
        include('views/usuario/index.php');
        break;
    case 'actualizar':
        $usuario = $app->readOne($id);
        $roles=$appRoles->readAll();
        include('views/usuario/crear.php');
        break;
    case 'modificar':
        $data = $_POST['data'];
        $resultado = $app->update($id, $data);
        if ($resultado) {
            $mensaje = "El usuario se actualizó correctamente";
            $tipo = "success";
        } else {
            $mensaje = "Hubo un error al actualizar el usuario";
            $tipo = "danger";
        }
        $usuarios = $app->readAll();
        include('views/usuario/index.php');
        break;
    case 'eliminar':
        if (!is_null($id)) {
            if (is_numeric($id)) {
                $resultado = $app->delete($id);
                if ($resultado) {
                    $mensaje = "El usuario se ha eliminado correctamente";
                    $tipo = "success";
                } else {
                    $mensaje = "Ocurrió un error al eliminar el usuario";
                    $tipo = "danger";
                }
            }
        }
        $usuarios = $app->readAll();
        include("views/usuario/index.php");
        break;
    default:
        $usuarios = $app->readAll();
        include 'views/usuario/index.php';
}

require_once('views/footer.php');
?>