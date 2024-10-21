<?php

require_once("../sistema.class.php");

class Seccion extends Sistema{

  function create( $data ) {

    $this -> connection();

    $sql = 
      "INSERT INTO seccion(area, id_invernadero, longitud, seccion ) 
        VALUES (:area, :id_invernadero, :longitud, :seccion)";
    $stmt = $this -> con -> prepare( $sql );

    $stmt -> bindParam(':seccion', $data['seccion'], PDO::PARAM_STR);
    $stmt -> bindParam(':area', $data['area'], PDO::PARAM_INT);
    $stmt -> bindParam(':longitud', $data['longitud'], PDO::PARAM_STR);
    $stmt -> bindParam(':id_invernadero', $data['id_invernadero'], PDO::PARAM_INT);
    $stmt -> execute();

    $result = $stmt -> rowCount();

    return $result;
  }

  function update( $id, $data ) {
    $this -> connection();

    $sql = "UPDATE seccion set seccion=:seccion,
        area=:area, longitud=:longitud, id_invernadero = :id_invernadero where
        id_seccion=:id_seccion";
    
    $stmt = $this -> con -> prepare( $sql );
    $stmt->bindParam(':seccion',$data['seccion'],PDO::PARAM_STR);
    $stmt->bindParam(':area',$data['area'],PDO::PARAM_INT);
    $stmt->bindParam(':longitud',$data['longitud'],PDO::PARAM_STR);
    $stmt->bindParam(':id_invernadero',$data['id_invernadero'],PDO::PARAM_INT);
    $stmt->bindParam(':id_seccion',$id,PDO::PARAM_INT);
    $stmt->execute();

    $result = $stmt -> rowCount();
    return $result;
  }

  function delete( $id ) {
    $this -> connection();

    $sql = " DELETE FROM seccion where id_seccion = :id_seccion ";
    $stmt = $this -> con -> prepare( $sql );
    $stmt -> bindParam(":id_seccion", $id, PDO::PARAM_INT);
    $stmt -> execute();
    $result = $stmt -> rowCount();

    return $result;
  }

  function readOne( $id ) {
    $this -> connection();
    $result = [];

    $consulta = 'SELECT * FROM seccion where id_seccion=:id_seccion;';
    $sql = $this->con->prepare($consulta);
    $sql->bindParam(":id_seccion", $id, PDO::PARAM_INT);
    $sql -> execute();
    $result = $sql->fetch(PDO::FETCH_ASSOC);

    return $result;
  }

  function readAll() {
    $this -> connection();
    $consulta = 'SELECT * FROM usuario;';

    $sql = $this -> con -> prepare ($consulta);
    $sql -> execute();

    $result = $sql -> fetchAll(PDO::FETCH_ASSOC);

    return $result;
  }
}