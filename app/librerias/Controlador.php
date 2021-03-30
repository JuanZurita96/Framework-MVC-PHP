<?php
    /*El controlador es el encargo de la interracion entre los Modelos y las Vistas
    Con el se cargan los Modelos y las Vistas a ocupar y asimismo valida la existencia de estas.
    El controlador genera un ambiente dinamico para cuando se agregen vistas y mas modelos.
    */
    class Controlador{
        //Carga del Modelo
        public function modelo($model){
            require_once '../app/modelos/' . $model . '.php';
            return new $model();
        }

        //Carga de la Vista
        public function vista($vista, $datos = []){
            if (file_exists('../app/vistas/' . $vista . '.php')){
                require_once '../app/vistas/' . $vista . '.php';
            }else{
                die('La pagina no existe');
            }
        }
    }