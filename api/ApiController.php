<?php
require_once('ApiView.php');


abstract class ApiController
{
    protected $ModelComentarios;
    protected $view;

    private $data;


    public function __construct() {
        $this->view = new ApiView();
        $this->data = file_get_contents("php://input"); 
    }
    
    function getData(){ 
        return json_decode($this->data);
    }
    
}
