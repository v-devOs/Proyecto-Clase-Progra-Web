<?php

include("../sistema.class.php");

class Invenadero extends Sistema{

  function create( $data ) {


    return $result = [];
  }

  function update( $id, $data ) {


    return $result = [];
  }

  function delete( $id ) {

    return $result = [];
  }

  function readOne( $id ) {
    return $result = [];
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