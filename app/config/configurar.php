<?php
    /*CONFIG BASES DE DATOS REEMPLAZANDO LOS DATOS 
    EJEMPLO:
    define ('DB_HOST', 'https://mibasededatos/124.121.12.0')
    define ('DB_USUARIO', 'AdministradorPedro');
    define ('DB_PASSWORD', '12345');
    define ('DB_NOMBRE', 'DBTienda');

    Todas las definiciones deben acordar con las credenciales.
    */
    define ('DB_HOST', 'localhost');
    define ('DB_USUARIO', '_USER');
    define ('DB_PASSWORD', '_PASS');
    define ('DB_NOMBRE', '_DBNAME');
    /*RUTAS CONSTANTES DE LAS URL
    Aqui se establecen las rutas para acceder a los archivos del Framwork
    Solo se debe cambiar la URL y el Nombre ya que estos perteneces especificamente al sitio de creacion

    Ejemplo:
    define ('RUTA_URL', 'https://misitio.com');
    define ('NOMBRESITIO', 'Tienda en Linea');

    */
    define ('RUTA_APP', dirname(dirname(__FILE__)));
    define ('RUTA_URL', '_RUTASITIO');
    define ('NOMBRESITIO', 'NOMBRESITIO');
?>