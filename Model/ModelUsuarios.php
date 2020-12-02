<?php
class ModelUsuarios
{

    private $db;

    public function __construct()
    {
        $this->db =  new PDO('mysql:host=localhost;' . 'dbname=db_fabrica;charset=utf8', 'root', '');
    }

    public function GetUsuarios()
    {
        $sentencia = $this->db->prepare('SELECT * FROM usuario');
        $sentencia->execute();
        return $sentencia->fetchAll(PDO::FETCH_OBJ);
    }

   
    public function GetthisUsuario($usuario)
    {
        $sentencia = $this->db->prepare("SELECT * FROM usuario WHERE usuario = ?");
        $sentencia->execute([$usuario]);
        return $sentencia->fetch(PDO::FETCH_OBJ);
    }

    public function EditUser($id, $admin)
    {
        $sentencia = $this->db->prepare("UPDATE usuario SET admin = $admin WHERE id=$id");
        $sentencia->execute(array($id, $admin));
    }
    public function Delete($id)
    {
        $sentencia = $this->db->prepare("DELETE FROM usuario WHERE id=$id");
        $sentencia->execute(array($id));
    }
    public function InsertUsuario($usuario, $contraseña)
    {
        $sentencia = $this->db->prepare("INSERT INTO usuario (usuario,contraseña) VALUES(?,?)");
        $sentencia->execute(array($usuario,$contraseña));
    }
}
