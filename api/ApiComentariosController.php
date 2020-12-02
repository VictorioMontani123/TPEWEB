<?php

require_once("Model/ModelComentarios.php");
require_once("ApiController.php");
require_once("./ApiRouter.php");


class ApiComentariosController extends ApiController
{


    public function __construct()
    {
        parent::__construct();
        $this->view = new ApiView;
        $this->ModelComentarios = new ModelComentarios();
    }

    public function obtenercomentarios($params = null)
    {
        $comentarios = $this->ModelComentarios->GetAll();
        $this->view->responce($comentarios, 200);
    }

    public function obteneruncomentario($params = null)
    {
        $id = $params[':ID'];
        $comentario = $this->ModelComentarios->GetThisComentario($id);

        if (!empty($comentario))
            $this->view->responce($comentario, 200);
        else
            $this->view->responce("la tarea con el id = $id no existe", 404);
    }

    public function comentariosdeproducto($id = null)
    {
        $id = $id[':ID'];
        $comentario = $this->ModelComentarios->Getcomentariosdeproductos($id);
        if (!empty($comentario))
            $this->view->responce($comentario, 200);
        else
            $this->view->responce("No se encontraron comentarios para este producto", 404);
    }
    public function eliminarcomentario($id = null)
    {
        $id = $id[':ID'];
        $this->ModelComentarios->DeleteComentario($id);
        $comentario = $this->ModelComentarios->GetThisComentario($id);

        if (!empty($comentario))
            $this->view->responce("la tarea con el id = $id no se borro", 404);
        else
            $this->view->responce("borrado", 200);
    }
    public function agregarcomentario($params = [])
    {
        $body = $this->getData(); // esto es un JSON, por lo que hace el padre de transformarlo

        $comentario = $this->ModelComentarios->agregarcomentario($body->comentario, $body->puntaje, $body->id_productos);

        if (!empty($comentario))
            $this->view->responce($this->ModelComentarios->GetThisComentario($comentario), 200);
        else
            $this->view->responce("No se pudo agregar", 404);
    }
}
