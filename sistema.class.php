<?php
session_start();
require_once("config.class.php");
class Sistema{

  var $con;

  function connection(){
    $this -> con = new PDO(SGDB.':host='.DBHOST.';dbname='.DBNAME, DBUSER, DBPASS);
  }

  function alerta( $tipo, $mensaje ){
    require_once ('views/alert.php');
  } 

  function getRol($correo){
    $this -> connection();
    $data=[];
    if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
        $sql= " SELECT r.rol FROM usuario u 
                INNER JOIN usuario_rol ur ON u.id_usuario=ur.id_usuario
                INNER JOIN rol r ON r.id_rol=ur.id_rol
                WHERE u.correo=:correo;";

        $roles = $this->con->prepare($sql);
        $roles->bindParam(':correo',$correo,PDO::PARAM_STR);
        $roles->execute();
        $data = $roles->fetchAll(PDO::FETCH_ASSOC);

        $roles = [];

        foreach( $data as $rol ){
          array_push($roles, $rol['rol']);
        }

        $data = $roles;
    }
    return $data;

  }
  function getPrivilegios($correo){
    $this -> connection();
    $data=[];
    if(filter_var($correo, FILTER_VALIDATE_EMAIL)){
        $sql= " SELECT p.permiso FROM usuario u 
                INNER JOIN usuario_rol ur ON u.id_usuario=ur.id_usuario
                INNER JOIN rol r ON r.id_rol=ur.id_rol
                INNER JOIN rol_permiso rp ON rp.id_rol=r.id_rol
                INNER JOIN permiso p ON p.id_permiso=rp.id_permiso
                WHERE u.correo=:correo;";

        $privilegios = $this->con->prepare($sql);
        $privilegios->bindParam(':correo',$correo,PDO::PARAM_STR);
        $privilegios->execute();
        $data = $privilegios->fetchAll(PDO::FETCH_ASSOC);

        $permisos = [];

        foreach( $data as $permiso ){
          array_push($permisos, $permiso['permiso'] );
        }
        
        $data = $permisos;
    }

    return $data;
  }

  function login($correo, $contrasena){
    $contrasena = md5($contrasena);

    $acceso = false;
    
    if( filter_var($correo, FILTER_VALIDATE_EMAIL) ){
      $this -> connection();

      $sql = "SELECT * FROM usuario WHERE correo = :correo AND contrasena = :contrasena";

      $stmt = $this -> con -> prepare($sql);
      $stmt -> bindParam(':correo',$correo, PDO::PARAM_STR);
      $stmt -> bindParam(':contrasena', $contrasena, PDO::PARAM_STR);

      $stmt -> execute();

      $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);

      if (isset($result[0])){
        $acceso = true;
        $_SESSION['validado'] = $correo;
        $roles = $this -> getRol($correo);
        $privilegios = $this -> getPrivilegios($correo);

        $_SESSION['roles'] = $roles;
        $_SESSION['privilegios'] = $privilegios;
        return $acceso;
      }
    }
    $_SESSION['validado'] = false;
    return $acceso;
  }

  function checkRol( $rol ){
    $roles = $_SESSION['roles'];
    if( in_array($rol, $roles) == false ){
      echo ('Error, no tienes el rol');
      die();
    }
  }

  function logout(){
    unset($_SESSION);
    session_destroy();
  }
}