<?php
    /*El Archivo Iniciador.php llama a todas las librerias disponibles dentro de la carpeta app/librerias
    igualmente carga el Archivo de Configurar.php para el uso de las Contantes.

    **IMPORTANTE**
    El nombre de los archivos de las librerias debe siempre empezar con primera letra Mayuscula.
    Ejemplo:
        Compras.php
        Registro.php
        Transaccion.php
        
    De lo contrario genera un error
    */
    require_once 'config/Configurar.php';

    spl_autoload_register(function($nombreClase){
        require_once 'librerias/' . $nombreClase . '.php';
    });