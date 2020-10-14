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
    

    // -------------------------- PARA LOS ADMIN ------------------------------

    $r->addRoute("delete/:ID", "GET", "db_controller", "Delete");
    $r->addRoute("insert", "POST", "db_controller", "InsertProduct");
    $r->addRoute("verificado", "POST", "db_controllerAdmin", "verificaradmin");
    $r->addRoute("edit", "POST", "db_controller", "editarProducto");
    $r->addRoute("productosadmin", "GET", "db_controller", "ShowProductosAdmin"); // va a la pantalla del admin (productos)
    $r->addRoute("logout", "GET", "db_controllerAdmin", "logout");



    //run
    $r->route($_GET['action'], $_SERVER['REQUEST_METHOD']); 
   
    
?>