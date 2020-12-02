<?php
require_once("Model/ModelUsuarios.php");
require_once("View/DataViewAdmin.php");
require_once("RouteAvanzado.php");

class db_controllerAdmin
{

  private $model;
  private $view;

  public function __construct()
  {
    $this->model = new ModelUsuarios();
    $this->view = new DataViewAdmin();
  }


  public function login()
  {
    $this->view->ShowLogin();
  }

  public function verificaradmin()
  {
    $usuarioform = $_POST['usuario'];
    $contraseniaform = $_POST['contrasenia'];
    //todo verificar
    if (!empty($usuarioform) && !empty($contraseniaform)) {
      $usuarios = $this->model->GetThisUsuario($usuarioform);
      if ($usuarios && ($contraseniaform ==  $usuarios->contraseña)) {

        session_start(); // abrimos session y guardamos el id y el nombre hasta que la cierre
        $_SESSION['IS_LOGGED'] == true;
        $_SESSION['ID_USER'] = $usuarios->id;
        $_SESSION['ADMIN'] = $usuarios->admin;
        $_SESSION['NOMBRE'] = $usuarios->nombre;
        if ($usuarios->admin == '1') {
          //$_SESSION['ESTEESADMIN'] = $usuarios->admin;
          $this->view->ShowPredeterminadoAdmin();
          
        } else {
          //$_SESSION['ESTENOESADMN'] = $usuarios->admin;
          $this->view->ShowPredeterminadousuario();
        }
      } else {
        $this->view->ShowLoginError();
      }
    } else {
      $this->view->ShowLoginError();
    }
  }

  public function logout()
  {
    session_start();
    session_destroy();


    $this->view->BacktoLogin();
  }
}
