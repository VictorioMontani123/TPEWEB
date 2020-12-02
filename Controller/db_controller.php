<?php
require_once("Model/ModelProductos.php");
require_once("Model/ModelUsuarios.php");
require_once("Model/ModelCategorias.php");
require_once("Model/ModelComentarios.php");
require_once("Controller/db_controllerAdmin.php");
require_once("View/DataView.php");
require_once("RouteAvanzado.php");


class db_controller
{

    private $model;
    private $view;
    private $ModelUsuarios;
    private $ModelCategorias;
    private $controllerADM;

    private $ModelComentarios;
    public function __construct()
    {
        $this->model = new ModelProductos();
        $this->ModelUsuarios = new ModelUsuarios();
        $this->view = new DataView();
        $this->ModelCategorias = new ModelCategorias();
        $this->ModelComentarios = new ModelComentarios();
        $this->controllerADM = new db_controllerAdmin();
    }

    public function home()
    {
        $this->view->ShowHome();
    }

    public function ShowProductos()
    {
        $productos = $this->model->GetProduct();
        $Categorias = $this->ModelCategorias->GetCategoria();
        $JoinCategorias = $this->ModelCategorias->GetCategoriaJoin();
        $this->view->ShowProductos($productos, $Categorias, $JoinCategorias);
    }

    public function GetProductFiltro($filtro = null)
    {
        $filtro = $filtro[':ID'];

        $productos = $this->model->GetProductFiltro($filtro);
        //$this->controllerADM->
        session_start();
        $usuario = null;
        if(isset($_SESSION['ADMIN'])){
            $usuario = $_SESSION['ADMIN'];
            $this->view->ShowAlone($productos, $usuario);
        }
        else{
            $this->view->ShowAlone($productos, $usuario);
        }
        
        
        
       // var_dump('HOLAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA'.  $usuario);
        //$this->view->ShowAlone($productos, $usuario);




        //$this->view->ShowPredeterminado();
    }

    function tablausuarios()
    {
        $productos = $this->model->GetProduct();
        $Categorias = $this->ModelCategorias->GetCategoria();
        $JoinCategorias = $this->ModelCategorias->GetCategoriaJoin();
        $this->view->tablitausuarios($productos, $Categorias, $JoinCategorias);
    }





    //               ---------------------------- SOLO ADMINISTRADORES --------------------------------

    function editarcat()
    {
        $this->verificarusuariologeado();
        $JoinCategorias = $this->ModelCategorias->GetCategoriaJoin();
        $usuario = $this->verificarusuariologeado();
        $this->view->modificarCategoria($JoinCategorias, $usuario);
    }
    function borrarcategoria()
    {
        $this->verificarusuariologeado();

        $contenedor = $_POST['id'];
        $this->ModelCategorias->borrarcat($contenedor);
        $this->view->ShowPredeterminadoADMIN();
    }
    function modificarcategoria()
    {
        $this->verificarusuariologeado();
        $id = $_POST['id'];
        $contenedor = $_POST['editarnombre'];
        $this->ModelCategorias->modificarCategoria($id, $contenedor);
        $this->view->ShowPredeterminadoADMIN();
    }
    function Verborrarcat()
    {
        $this->verificarusuariologeado();
        $JoinCategorias = $this->ModelCategorias->GetCategoriaJoin();
        $this->view->borrarcategoria($JoinCategorias);
    }
    function insertar()
    {
        $this->verificarusuariologeado();
        $JoinCategorias = $this->ModelCategorias->GetCategoriaJoin();
        $this->view->insertar($JoinCategorias);
    }
    function catinsert()
    {
        $this->verificarusuariologeado();
        $this->view->catinsert();
    }
    public function insertarcategoria()
    {
        $this->verificarusuariologeado();

        $this->ModelCategorias->insertcategoria($_POST['nombre_categoria']);

        $this->view->ShowPredeterminadoADMIN();
    }


    public function ShowProductosAdmin()
    {   // nos muestra todos los productos y el ABM
        $this->verificarusuariologeado();  // barrera de seguridad
        $JoinCategorias = $this->ModelCategorias->GetCategoriaJoin();                                 //obtener categorias con el join
        $productos = $this->model->GetProduct();
        $Categorias = $this->ModelCategorias->GetCategoria();
        $this->view->ShowProductosAdmin($productos, $Categorias, $JoinCategorias);
    }

    public function editarProducto($id = null)
    {
        //$id = $id[':ID'];
        // $productos = $this->model->GetProductFiltro($id);

        $this->verificarusuariologeado();
        $this->model->EditarProducto($_POST['EditNombre'], $_POST['EditColor'], $_POST['EditEspecificacion'], $_POST['EditPrecio'], $_POST['InsertCategoria'], $_POST['EditId']);

        $this->view->ShowPredeterminadoADMIN();
    }

    public function Delete($id = null)
    {
        $this->verificarusuariologeado();
        $id = $id[':ID'];
        $this->model->DeleteProduct($id);

        $this->view->ShowPredeterminadoADMIN();
    }

    public function InsertProduct()
    {  // agregamos un producto desde la view del admin
        $this->verificarusuariologeado();
        //if(isset ($_POST['InsertNombre'] && $_POST['InsertColor'] && $_POST['InsertPrecio'] && $_POST['InsertCategoria'])){  
        $this->model->InsertProduct($_POST['InsertNombre'], $_POST['InsertColor'], $_POST['InsertEspecificaciones'], $_POST['InsertPrecio'], $_POST['InsertCategoria']);

        //}
        // $this->view->ShowError(      );

        $this->view->ShowPredeterminadoADMIN();
    }

    private function verificarusuariologeado()
    {
        session_start();
        if (!isset($_SESSION['ID_USER'])) {
            if ($_SESSION['ADMIN'] == 1) {
                var_dump($_SESSION['ADMIN']);
                die();
               $this->view->ShowPredeterminado();
            }else {
                $this->view->ShowPredeterminadoADMIN();
                die();
            }
        }
    
    }


    public function ShowfiltrodeCategorias()
    {
        $categoria = $_POST['opcion'];
        $arcategorias = $this->ModelCategorias->GetCategoria();
        //var_dump($arcategorias);
        $productos = $this->model->GetProduct();
        $JoinCategorias = $this->ModelCategorias->GetCategoriaJoin();
        foreach ($arcategorias as $arcategoria) {
            //var_dump($categoria);
            //var_dump($arcategoria->nombre_categoria);
            if ($categoria == $arcategoria->nombre_categoria) {
                //var_dump($arcategorias);
                $productos = $this->model->ShowProductosPorCategoria($arcategoria->id);
            }
        }
        $this->view->ShowProductos($productos, $arcategorias, $JoinCategorias);
    }

    // -------------------------------------------------- USUARIOS
    /*function AgregarComentario(){
        $comentario = $_POST['comentario'];
        $puntaje = $_POST['puntaje'];
        $id_comentario = '85';
        $this->ModelComentarios->agregarcomentario($comentario,$puntaje,$id_comentario);
    }*/
    function ShowUsuarios()
    {
        $this->verificarusuariologeado();
        $usuarios = $this->ModelUsuarios->GetUsuarios();
        $this->view->ShowTablaUsuarios($usuarios);
    }
    function Editarusuario()
    {
        $this->verificarusuariologeado();
        $admin = $_POST['admin'];
        $id = $_POST['id'];
        $this->ModelUsuarios->EditUser($id, $admin);
        $this->view->ShowPredeterminadoUsuario();
    }
    function DeleteUsuario($id = null)
    {
        $this->verificarusuariologeado();
        $id = $id[':ID'];
        $this->ModelUsuarios->Delete($id);
        $this->view->ShowPredeterminadoUsuario();
    }
    function registrar()
    {
        $this->view->registrarusuario();
    }
    function Registrarusuario()
    {
        $nombre = $_POST['usuario'];
        $contraseña = $_POST['contraseña'];
        $this->ModelUsuarios->InsertUsuario($nombre, $contraseña);
        $this->view->ShowPredeterminado();
    }
}
/*
$contenedor = GetProduct();



$filtro = 2;

$contenedor_filtro = GetProductFiltro($filtro);

var_dump ($contenedor_filtro);
*/
