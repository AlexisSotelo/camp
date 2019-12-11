<?php

require_once '../controlador/tutor.controlador.php';

//Incluir los modelos
require_once '../modelo/tutor.modelo.php';

class TutorAJAX
{
    public $idTutor;

    public function cargarTutor()
    {
        $id = $this->idTutor;
        $respuesta =  TutorControlador::ctrConsultarTutor($id);

        echo json_encode($respuesta);
    }
}


if (isset($_POST['idTutor'])) {

    $tutor = new TutorAJAX();
    $tutor->idTutor = $_POST['idTutor'];
    $tutor->cargarTutor();
}
