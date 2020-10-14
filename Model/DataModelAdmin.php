<?php
class DataModelAdmin{

  private $db;

    public function __construct() {
      $this->db =  new PDO('mysql:host=localhost;'.'dbname=db_fabrica;charset=utf8', 'root', '');
    }
  
    public function GetUsuario($usuario){
      $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE usuario = ?");
      $sentencia->execute([$usuario]);
      return $sentencia->fetch(PDO::FETCH_OBJ);
    }
    function GetProduct(){
      $sentencia = $this->db->prepare("SELECT * FROM producto");
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_OBJ);
  }


  
  function GetCategoria(){
    $sentencia = $this->db->prepare('SELECT * FROM categoria ');
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
  }

  /*  public function GetContra($contra){
      $sentencia = $this->db->prepare("SELECT contraseña FROM usuario");
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_OBJ);
  }*/



}