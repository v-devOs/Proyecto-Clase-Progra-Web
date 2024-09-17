<?php
include("config.class.php");
class Sistema{

  var $con;

  function connection(){
    $this -> con = new PDO(SGDB.':host='.DBHOST.';dbname='.DBNAME, DBUSER, DBPASS);
  }
}