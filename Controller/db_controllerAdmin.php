<?php
require_once("Model/DataModelAdmin.php");
require_once("View/DataViewAdmin.php");
require_once("RouteAvanzado.php");

class db_controllerAdmin {
    
    private $model;
    private $view;

    public function __construct(){
        $this->model = new DataModelAdmin();
        $this->view = new DataViewAdmin();
    } 


    public function login(){
        $this->view->ShowLogin();
    }

    public function verificaradmin(){
        $usuarioform = $_POST['usuario'];
        $contraseniaform = $_POST['contrasenia'];
        //todo verificar
        if(!empty($usuarioform) && !empty($contraseniaform)){
           $usuarios = $this->model->GetUsuario($usuarioform);
          if($usuarios && ($contraseniaform ==  $usuarios->contraseña) ){

            session_start(); // abrimos session y guardamos el id y el nombre hasta que la cierre
            $_SESSION['IS_LOGGED'] == true;
            $_SESSION['ID_USER'] = $usuarios->id;
            $_SESSION['NOMBRE'] = $usuarios->nombre; 

            $this->view->ShowPredeterminado();
            
          } else {
            $this->view->ShowLoginError();
          }
          
        
        }
        }

    public function logout(){
        session_start();
        session_destroy();


        $this->view->BacktoLogin();


    }

    

}


?>