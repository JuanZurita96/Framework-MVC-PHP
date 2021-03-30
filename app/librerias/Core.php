<?php
    /* Archivo CORE es el nucleo del Framework
    En este archivo se establecen las configuraciones para mantener limpia la URL y poder determinar la existencia
    del MVC almacenados en un Array[];
    Ejemplo:
    https://misitio.com/paginas   -> el indice "paginas" se establece como el Controlador en la posicion [0] del Array.
    https://misitio.com/paginas/articulos  -> Ahora "articulos" interactua dentro del controlador paginas por lo que ahora viene siendo el Modelo asignado en la posicion [1] del Array.
    https://misitio.com/paginas/articulos/mesadetrabajo  -> Finalmente se selecciona el/los parametros que se encuentrasn dentro del Controlador Paginas, seguido por el Medodo Articulos y llegando al Parametro Mesadetrabajo.

    De esta manera podermos generar los troncos de trabajo dependiendo del tema de nuestro sitio Web.


    */
    class Core {
        protected $controladorActual = 'paginas';
        protected $metodoActual = 'index';
        protected $parametros = [];

        public function __construct(){
            $url = $this->getUrl();
            //Asignar el Controlador
            if (file_exists('../app/controllers/' .ucwords($url[0]). '.php')){
                $this->controladorActual = ucwords($url[0]);
                unset($url[0]);
            }
            require_once '../app/controllers/' . $this->controladorActual . '.php';
            $this->controladorActual = new $this->controladorActual;

            //Obtener el Metodo
            if (isset($url[1])){
                if (method_exists($this->controladorActual, $url[1])){
                    $this->metodoActual = $url[1];
                    unset($url[1]);
                }
            }
            //Obtener los Parametros
            $this->parametros = $url ? array_values($url) : [];
            call_user_func_array([$this->controladorActual, $this->metodoActual], $this->parametros);
        }


        public function getUrl(){
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }
    }