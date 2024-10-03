<?php

require_once("../sistema.class.php");

class Invenadero extends Sistema{

  function create( $data ) {

    $this -> connection();

    $sql = 
      "INSERT INTO invernadero(invernadero, longitud, latitud, area,  fecha_creacion) 
        VALUES (:invernadero, :longitud, :latitud, :area , :fecha_creacion)";
    $stmt = $this -> con -> prepare( $sql );

    $stmt -> bindParam(':invernadero', $data['invernadero'], PDO::PARAM_STR);
    $stmt -> bindParam(':longitud', $data['longitud'], PDO::PARAM_STR);
    $stmt -> bindParam(':latitud', $data['latitud'], PDO::PARAM_STR);
    $stmt -> bindParam(':area',$data['area'], PDO::PARAM_INT);
    $stmt -> bindParam(':fecha_creacion', $data['fecha_creacion'], PDO::PARAM_STR);
    $stmt -> execute();

    $result = $stmt -> rowCount();

    return $result;
  }

  function update( $id, $data ) {
    $this -> connection();

    $sql = "UPDATE invernadero set invernadero=:invernadero,
        latitud=:latitud, longitud=:longitud, area=:area, fecha_creacion=:fecha_creacion where
        id_invernadero=:id_invernadero";
    
    $stmt = $this -> con -> prepare( $sql );
    $stmt->bindParam(':id_invernadero',$id,PDO::PARAM_INT);
    $stmt->bindParam(':invernadero',$data['invernadero'],PDO::PARAM_STR);
    $stmt->bindParam(':latitud',$data['latitud'],PDO::PARAM_STR);
    $stmt->bindParam(':longitud',$data['longitud'],PDO::PARAM_STR);
    $stmt->bindParam(':area',$data['area'],PDO::PARAM_INT);
    $stmt->bindParam(':fecha_creacion',$data['fecha_creacion'],PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt -> rowCount();
    return $result;
  }

  function delete( $id ) {
    $this -> connection();

    $sql = " DELETE FROM invernadero where id_invernadero = :id_invernadero ";
    $stmt = $this -> con -> prepare( $sql );
    $stmt -> bindParam(":id_invernadero", $id, PDO::PARAM_INT);
    $stmt -> execute();
    $result = $stmt -> rowCount();

    return $result;
  }

  function readOne( $id ) {
    $this -> connection();
    $result = [];

    $consulta = 'SELECT * FROM invernadero where id_invernadero=:id_invernadero;';
    $sql = $this->con->prepare($consulta);
    $sql->bindParam(":id_invernadero", $id, PDO::PARAM_INT);
    $sql -> execute();
    $result = $sql->fetch(PDO::FETCH_ASSOC);

    return $result;
  }

  function readAll() {
    $this -> connection();
    $consulta = 'SELECT * FROM invernadero';

    $sql = $this -> con -> prepare ($consulta);
    $sql -> execute();

    $result = $sql -> fetchAll(PDO::FETCH_ASSOC);

    return $result;
  }
}