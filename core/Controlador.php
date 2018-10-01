<?php

class Controlador{
    
    protected $db;

    public function __construct(){
        global $pdo;
        $this->db = $pdo;
    }

    public function loadView($viewName, $viewData = array()){
        extract($viewData);
        include "views/".$viewName.".php";
    }

    public function loadTemplate($viewName, $viewData = array()){
        include "views/template.php";
    }

    public function loadViewInTemplate($viewName, $viewData){
        extract($viewData);
        include "views/".$viewName.".php";
    }

}