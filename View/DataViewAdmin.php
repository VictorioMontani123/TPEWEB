<?php
require_once('libs/smarty/Smarty.class.php');

class DataViewAdmin{
    private $smarty;
    
    
    public function __construct(){
        $this->smarty = new Smarty();
    }


    public function ShowLogin(){
        $this->smarty->assign('titulo', 'LOGIN' );
        $this->smarty->assign('nombre', 'NOMBRE');
        $this->smarty->assign('contrasenia', 'CONTRASEÑA');
        
        $this->smarty->display('templates/login.tpl');

    }
    
    public function ShowLoginError(){
        $this->smarty->assign('titulo', 'LOGIN' );
        $this->smarty->assign('nombre', 'NOMBRE');
        $this->smarty->assign('contrasenia', 'CONTRASEÑA');
        
        $this->smarty->display('templates/loginError.tpl');

    }


    

    function ShowPredeterminado(){
        header("Location: ".BASE_URL."productosadmin"); // para que vuelva despues de que ejecute la function
    }

    function BacktoLogin(){
        header("Location: ".BASE_URL."login"); // para que vuelva despues de que ejecute la function
    }

















}
?>