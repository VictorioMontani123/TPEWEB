<?php
    require_once 'Controller/db_controller.php';
    require_once 'Controller/db_controllerAdmin.php';
    require_once 'RouterClass.php';
    
    
    // CONSTANTES PARA RUTEO
    define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].':'.$_SERVER["SERVER_PORT"].dirname($_SERVER["PHP_SELF"]).'/');

    $r = new Router();

    //$r->addRoute('', "GET", "db_controller", "Home");
    
    $r->addRoute("home", "GET", "db_controller", "Home");

  
    $r->addRoute("productos", "GET", "db_controller", "ShowProductos");
    $r->addRoute("registrado", "POST", "db_controller", "ShowVistaAdmin");
    //$r->addRoute("mostrar", "GET", "db_controller", "ShowProductoEspecifico"); //
    $r->addRoute("login", "GET", "db_controllerAdmin", "login");
    $r->addRoute("ver/:ID", "GET", "db_controller", "GetProductFiltro");
    $r->addRoute("filtramos", "POST", "db_controller", "ShowfiltrodeCategorias");
    $r->addRoute("productosusuario", "GET", "db_controller", "tablausuarios");
    
    
    // -------------------------- PARA LOS ADMIN ------------------------------
    

    $r->addRoute("modificarcategoria", "POST", "db_controller", "modificarcategoria");
    $r->addRoute("editarcat", "GET", "db_controller", "editarcat");
    $r->addRoute("borrarcategoria", "POST", "db_controller", "borrarcategoria"); // va al model y borra
    $r->addRoute("borrarcat", "GET", "db_controller", "Verborrarcat");// me muestra la pagina para borrar
    $r->addRoute("catinsert", "GET", "db_controller", "catinsert");
    $r->addRoute("insertcategoria", "POST", "db_controller", "insertarcategoria");
    $r->addRoute("delete/:ID", "GET", "db_controller", "Delete");
    $r->addRoute("insertar", "GET", "db_controller", "insertar");
    $r->addRoute("insert", "POST", "db_controller", "InsertProduct");
    $r->addRoute("verificado", "POST", "db_controllerAdmin", "verificaradmin");
    $r->addRoute("edit", "POST", "db_controller", "editarProducto");
    $r->addRoute("productosadmin", "GET", "db_controller", "ShowProductosAdmin"); // va a la pantalla del admin (productos)
    $r->addRoute("logout", "GET", "db_controllerAdmin", "logout");
    $r->addRoute("registrar", "GET", "db_controller", "registrar");
    //$r->addRoute("agregarcomentario", "POST", "db_controller", "AgregarComentario");
    


    $r->addRoute("TablaUsuarios", "GET", "db_controller", "ShowUsuarios");
    $r->addRoute("editusuario", "POST", "db_controller", "Editarusuario");
    $r->addRoute("deleteusuario/:ID", "GET", "db_controller", "DeleteUsuario");
    $r->addRoute("AgregarUsuario", "POST", "db_controller", "Registrarusuario");
    
    
    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']);
