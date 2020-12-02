<?php
class ModelComentarios
{

    private $db;

    public function __construct()
    {
        $this->db =  new PDO('mysql:host=localhost;' . 'dbname=db_fabrica;charset=utf8', 'root', '');
    }

    function GetAll()
    {
        $sentencia = $this->db->prepare('SELECT * FROM comentarios');
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function GetThisComentario($id)
    {
        $sentencia = $this->db->prepare("SELECT * FROM comentarios WHERE id = ?");
        $sentencia->execute([$id]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }
    function DeleteComentario($id)
    {

        $sentencia =  $this->db->prepare("DELETE FROM comentarios WHERE id=?");
        return $sentencia->execute(array($id));
    }
    function agregarcomentario($comentario,$puntaje,$id_productos)
    {
        $sentencia = $this->db->prepare("INSERT INTO comentarios (comentario,puntaje,id_productos) VALUES(?,?,?)");
        $sentencia->execute(array($comentario,$puntaje,$id_productos));
        return $this->db->lastInsertId();
    }
    function Getcomentariosdeproductos($id_productos){
        $sentencia = $this->db->prepare('SELECT * FROM comentarios WHERE id_productos=?');
        $sentencia->execute([$id_productos]);
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
}
