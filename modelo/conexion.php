<?php 

    class Conexion{
        public static function conectar(){
            //abrimos una conexion hacia la base de datos
            try {
                
                $con = new PDO("mysql:host=localhost;dbname=camp", "root","");

                $con->exec("set names utf8");

                return $con;

            } catch (PDOException $e) {
                $e->getMessage();
            }
        }
    }