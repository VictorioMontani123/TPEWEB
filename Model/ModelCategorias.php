<?php
class ModelCategorias
{

    private $db;

    public function __construct()
    {
        $this->db =  new PDO('mysql:host=localhost;' . 'dbname=db_fabrica;charset=utf8', 'root', '');
    }

    function GetCategoria()
    {
        $sentencia = $this->db->prepare('SELECT * FROM categoria ');
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

    function GetCategoriaJoin()
    {
        $sentencia = $this->db->prepare('SELECT id,nombre_categoria FROM categoria');
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }
    function insertcategoria($nombre)
    {
        $sentencia = $this->db->prepare("INSERT INTO categoria (nombre_categoria) VALUES(?)");
        $sentencia->execute(array($nombre));
    }

    function borrarcat($id)
    {
        $sentencia = $this->db->prepare("DELETE FROM categoria WHERE id=?");
        $sentencia->execute(array($id));
    }
    function modificarCategoria($id, $nombre)
    {
        $sentencia = $this->db->prepare("UPDATE categoria SET nombre_categoria = '$nombre' WHERE id=$id");
        $sentencia->execute(array($id, $nombre));
    }
}
