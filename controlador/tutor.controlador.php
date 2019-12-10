<?php
class TutorControlador
{
    //Si dio clic en el boton entrar hacer lo siguiente
    public function ctrAgregarTutor()
    {
        if (isset($_POST['btnGuardarTutor'])) {

            //
            #region
            //filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);

            //     if (filter_var($_POST['correo'], FILTER_VALIDATE_EMAAIL)) {
            //         $error = "Introduce un email valido";
            //     }
            // }
            // //correo confirmacion
            // if (!empty($_POST['correoConfir'])) {
            //     filter_var($_POST['correoConfir'], FILTER_SANITIZE_EMAIL);

            //     if (filter_var($_POST['correoConfir'], FILTER_VALIDATE_EMAAIL)) {
            //         $error = "Introduce un email valido";
            //     }
            // 
            #endregion
            if (
                preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/", $_POST['TutorCorreo']) &&
                preg_match("/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/", $_POST['TutorCorreoConfir']) &&
                preg_match("/^.{8,}/", $_POST['TutorPass']) &&
                preg_match("/^.{8,}/", $_POST['TutorCorreoConfir']) &&
                preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/", $_POST['TutorNombre']) &&
                preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$/", $_POST['TutorApellido'])

            ) {
                if ($_POST['TutorCorreo'] != $_POST['TutorCorreoConfir']) {
                    App_controlador::messagesInfo("Error", "Los correos no coinciden :(", "error");
                } else if ($_POST['TutorPass'] != $_POST['TutorPassConfir']) {
                    App_controlador::messagesInfo("Error", "Las contraseñas no coinciden :(", "error");
                } else {

                    // encriptar el id y el password
                     $_POST['TutorCorreo'] = md5($_POST['TutorCorreo']);
                     $_POST['TutorPass'] = password_hash($_POST['TutorPass'], PASSWORD_DEFAULT);
                    //mandar todos los datos de post hacia el tutor.modelo para que lo envie a la BD
                    $guardarTutor = TutorModelo::mdlAgregarTutor($_POST);
                    if ($guardarTutor > 0) {
                        App_controlador::messagesInfo("Bien hecho!", "Registro insertado", "success", "usuarios");
                    } else {
                        App_controlador::messagesInfo("Error", "Es probable que ya exista este registro", "error");
                    }
                }
            } else {
                App_controlador::messagesInfo("Error", "Algunos campos no cumplen con el formato valido. Intente de nuevo", "error");
            }
        }
    }

    //Obtener tutores
    public static function ctrConsultarTutor($tutor = "")
    {
        return TutorModelo::mdlConsultarTutor($tutor);
    }
}
