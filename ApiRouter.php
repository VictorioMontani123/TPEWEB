<?php
require_once 'RouterClass.php';
require_once 'api/ApiComentariosController.php';
$r = new Router();

$r->addRoute("comentarios", "GET", "ApiComentariosController", "obtenercomentarios");
$r->addRoute("comentarios/:ID", "GET", "ApiComentariosController", "comentariosdeproducto");
$r->addRoute("comentarios/:ID", "DELETE", "ApiComentariosController", "eliminarcomentario");
$r->addRoute("comentarios", "POST", "ApiComentariosController", "agregarcomentario");


$r->route($_GET['resource'], $_SERVER['REQUEST_METHOD']);

