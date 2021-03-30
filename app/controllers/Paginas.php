<?php
    /*Controlador Paginas es el Principal, es decir aqui se van a cargar el Landing Page y Vistas posteriores
    La funcion index es donde carga la pagina de inicio .....vistas/paginas/inicio.php
    La funcion __construct permite llamar los Modelos a utilizar o bien el cambio de paginas o controladores.
    */
    class Paginas extends Controlador{

        public function __construct(){
        }
        public function index(){
            $datos = [
                'titulo' => 'Framework MVC'
            ];
            $this->vista('paginas/inicio', $datos);
        }
    }