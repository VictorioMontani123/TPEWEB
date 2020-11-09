<?php

require_once('libs/smarty/Smarty.class.php');


class DataView{
    private $smarty;
    
    
    public function __construct(){
        $this->smarty = new Smarty();
    }


    function ShowProductos($productos,$Categorias){
        $this->smarty->assign('titulo', "LISTA DE PRODUCTOS");
        $this->smarty->assign('nombre', "NOMBRE");
        $this->smarty->assign('color', "COLOR");
        $this->smarty->assign('especificacion', "ESPECIFICACION");
        $this->smarty->assign('precio', "PRECIO");
        $this->smarty->assign('TituloCategoria', "CATEGORIA");

        
        $this->smarty->assign('Categorias', $Categorias);
        $this->smarty->assign('productos', $productos);
        $this->smarty->display('templates/tpusuarios.tpl');
    }

    function ShowProductosAdmin($productos, $Categorias, $JoinCategorias){
       //$contenedor = var_dump ($JoinCategorias);
       // $this->smarty->debugging = true;
        $this->smarty->assign('titulo', "LISTA DE PRODUCTOS");
        $this->smarty->assign('nombre', "NOMBRE");
        $this->smarty->assign('color', "COLOR");
        $this->smarty->assign('especificacion', "ESPECIFICACION");
        $this->smarty->assign('precio', "PRECIO");
        $this->smarty->assign('TituloCategoria', "CATEGORIA");
        
        $this->smarty->assign('descriptos', $JoinCategorias);
        $this->smarty->assign('Categorias', $Categorias);
        $this->smarty->assign('productos', $productos);
        $this->smarty->display('templates/tpadmin.tpl');
        
    }
    
    function ShowHome(){
        


        $this->smarty->display('templates/home.tpl');
    }


    function ShowPredeterminado(){
        header("Location: ".BASE_URL."productos"); // para que vuelva despues de que ejecute la function
    }

    function ShowPredeterminadoADMIN(){
        header("Location: ".BASE_URL."productosadmin"); // para que vuelva despues de que ejecute la function
    }

    function RedirigiraLogin(){
        header("Location: ".BASE_URL."login"); // para que vuelva despues de que ejecute la function
    }

    function ShowAlone($productos){
        $this->smarty->assign('productos', $productos);
        $this->smarty->display('templates/ver.tpl');
        

    }

    function insertar($JoinCategorias){
        $this->smarty->assign('descriptos', $JoinCategorias);
        $this->smarty->display('templates/insert.tpl');
        
    }
    function catinsert(){
        $this->smarty->display('templates/insertcategoria.tpl');
    }
    function borrarcategoria($JoinCategorias){
        $this->smarty->assign('descriptos', $JoinCategorias);
        $this->smarty->display('templates/borrarcategoria.tpl');
    }
    function modificarCategoria($JoinCategorias){
        $this->smarty->assign('descriptos', $JoinCategorias);
        $this->smarty->display('templates/modificarCategoria.tpl');

}
}









?>