<?php
    require_once 'controlador/app.controlador.php';
    require_once 'controlador/tutor.controlador.php';
    
    //Incluir los modelos
    require_once 'modelo/tutor.modelo.php';




    //Iniciar la aplicacion
    $start = new App_controlador();
    $start -> starApp();