<?php
class DataModel{

  private $db;

    public function __construct() {
      $this->db =  new PDO('mysql:host=localhost;'.'dbname=db_fabrica;charset=utf8', 'root', '');
  }
  
  function GetProduct(){
      $sentencia = $this->db->prepare("SELECT * FROM producto");
      $sentencia->execute();
      return $sentencia->fetchAll(PDO::FETCH_OBJ);
  }

  function ShowProductosPorCategoria($categoria){
    $sentencia = $this->db->prepare("SELECT * FROM producto WHERE id_categoria = ?");
      $sentencia->execute([$categoria]);
      return $sentencia->fetchAll(PDO::FETCH_OBJ);
  }

  
  function GetCategoria(){
    $sentencia = $this->db->prepare('SELECT * FROM categoria ');
    $sentencia->execute();
    return $sentencia->fetchAll(PDO::FETCH_OBJ);
  }

function GetProductFiltro($id){
    $sentencia = $this->db->prepare('SELECT * FROM producto WHERE id=? ');
    $sentencia->execute(array($id));
    return $sentencia->fetch(PDO::FETCH_OBJ);
}

  
function InsertProduct($nombre,$color,$especificacion,$precio,$id_categoria){
  $sentencia = $this->db->prepare("INSERT INTO producto(nombre, color, especificacion, precio, id_categoria) VALUES(?,?,?,?,?)"); 
  $sentencia->execute(array($nombre,$color,$especificacion,$precio,$id_categoria));
 
}

function EditarProducto($nombre,$color,$especificacion,$precio, $idcategoria, $id){
  $sentencia = $this->db->prepare("UPDATE  producto SET nombre = '$nombre', color = '$color', especificacion = '$especificacion', precio = $precio, id_categoria = $idcategoria WHERE id=?"); 
  var_dump ($sentencia);
  $caca = $sentencia->execute(array($id));
  var_dump($caca);
}

function DeleteProduct($id){

    $sentencia =  $this->db->prepare("DELETE FROM producto WHERE id=?");
    $sentencia->execute(array($id));
}

/*
  function UpdateProduct($nombre,$color,$especificacion,$precio,$id_categoria){
  $sentencia = $this->db->prepare("UPDATE INTO producto(nombre, color, especificacion, precio, id_categoria) VALUES(?,?,?,?,?)"); 
  $sentencia->execute(array($nombre,$color,$especificacion,$precio,$id_categoria));
 
}
*/
}


// ------------------------------------------- esto seria solo para el administrador


  
  
  /*
  function DeleteProduct($Product_id){ 
      $db = GetDBConnection();
      $sentencia = $db->prepare("DELETE FROM producto WHERE id=?");
      $sentencia->execute(array($Product_id));
  
      header("Location: ".BASE_URL."home");
  }
  */
  /*
  function UpdateProduct($Product_id){
      $db = GetDBConnection();
      $sentencia = $db->prepare("UPDATE task SET nombre,color WHE RE id=?, ?");
      $sentencia->execute(array($task_id));
  
      header("Location: ".BASE_URL."home");
  } 

*/



























?>