<?php
require_once 'conexion.php';
class TutorModelo
{
    //Insertar el tutor
    public function mdlAgregarTutor($tutor)
    {
        //verificar que no tenga errores el bloque de codigo
        try {

            //pps = prepare
            $sql = "INSERT INTO tb_tutores (TutorID,TutorCorreo,TutorPass,TutorNombre,TutorApellido) VALUES(?,?,?,?,?)";
            //Prepara la consulta
            $pps = Conexion::conectar()->prepare($sql);

            //Pasar los parametros solcitados
            $pps->bindValue(1, $tutor['TutorID'], PDO::PARAM_STR);
            $pps->bindValue(2, $tutor['TutorCorreo'], PDO::PARAM_STR);
            $pps->bindValue(3, $tutor['TutorPass'], PDO::PARAM_STR);
            $pps->bindValue(4, $tutor['TutorNombre'], PDO::PARAM_STR);
            $pps->bindValue(5, $tutor['TutorApellido'], PDO::PARAM_STR);

            //Ejecutamos la consulta
            $pps->execute();

            return $pps->rowCount();
        } catch (PDOException $e) {

            $e->getMessage();
        } finally {
            $pps = null;
        }
    }

    //Insertar el tutor
    public function mdlModificarTutor($tutor)
    {
        //verificar que no tenga errores el bloque de codigo
        try {

            //pps = prepare
            $sql = "UPDATE tb_tutores SET  TutorCorreo = ?,  TutorNombre = ? , TutorApellido = ? WHERE TutorID = ? ";
            //Prepara la consulta
            $pps = Conexion::conectar()->prepare($sql);

            //Pasar los parametros solcitados
            
            $pps->bindValue(1, $tutor['TutorCorreo'], PDO::PARAM_STR);
            $pps->bindValue(2, $tutor['TutorNombre'], PDO::PARAM_STR);
            $pps->bindValue(3, $tutor['TutorApellido'], PDO::PARAM_STR);
            $pps->bindValue(4, $tutor['TutorID'], PDO::PARAM_STR);

            //Ejecutamos la consulta
            $pps->execute();

            return $pps->rowCount();
        } catch (PDOException $e) {

            $e->getMessage();
        } finally {
            $pps = null;
        }
    }


    //Consultar el tutor
    public function mdlConsultarTutor($tutor = "")
    {
        try {
            //Preguntar si va haber filtro de busqueda
            if ($tutor == "") {
                $sql = "SELECT * FROM tb_tutores";
                $pps = Conexion::conectar()->prepare($sql);
                $pps->execute();
                //Retornar todos los registros
                return $pps->fetchAll(PDO::FETCH_ASSOC); // Se utiliza FETCH_ASSOC para convertir en un arreglo
            } else {
                $sql = "SELECT * FROM tb_tutores WHERE TutorID = ?";
                $pps = Conexion::conectar()->prepare($sql);
                $pps->bindValue(1, $tutor);
                $pps->execute();
                //Retonar la fila
                return $pps->fetch(PDO::FETCH_ASSOC); //Se utiliza FETCH_ASSOC para convertir en un arreglo
            }
        } catch (PDOException $e) {
            $e->getMessage();
        } finally {
            $pps = null;
        }
    }


    // ELIMINACION 

    public static function mdlEliminarTutor($id)
    {

        try {

            $sql = "DELETE FROM tb_tutores WHERE TutorID = ?";

            $pps = Conexion::conectar()->prepare($sql);

            $pps->bindValue(1, $id);

            $pps->execute();

            return $pps->rowCount();

        } catch (PDOException $e) {
            $e->getMessage();
        } finally {
            $pps = null;
        }
    }
}
