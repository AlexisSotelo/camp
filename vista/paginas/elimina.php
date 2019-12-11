<?php

if (isset($_GET['ruta'])) {

    $rutas = explode("/", $_GET['ruta']);

    $tipo = $rutas[1];
    $id = $rutas[2];


    if($tipo=="usuarios"){
        $elimina = new TutorControlador();
        $elimina -> ctrEliminarTutor($id);
    }



}
