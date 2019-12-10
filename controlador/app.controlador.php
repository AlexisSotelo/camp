<?php

//mandar a traer componenetes, paginas 
class App_controlador
{
    public static function starApp()
    {
        //mandar a traer un metodo se usa :: porque nos retorna 
        $url = App_controlador::getRute();
        $app = new App_controlador();
        //Incluir la vista que cargara mi aplicacion con include
        include_once 'vista/app.php';
    }

    //cambiar las extensiones html por php
    //obtener la url pagina del index.php
    public static function getRute()
    {
        return 'http://localhost/camp/';
    }

    //function que trae los componentes
    public function getComponents($comp)
    {
        //mandar a traer un metodo se usa :: porque nos retorna 
        $url = App_controlador::getRute();
        $app = new App_controlador();
        include_once 'vista/componentes/' . $comp . '.componente.php';
    }

    //function que cargara la pagina
    public function getPage($page)
    {
        //mandar a traer un metodo se usa :: porque nos retorna 
        $url = App_controlador::getRute();
        $app = new App_controlador();
        include_once 'vista/paginas/' . $page . '.php';
    }
    //crear lista blanca
    public static function getWhiteList()
    {
        $whitList = array(
            'usuarios',
            'campamentos',
            'galeria'

        );

        return $whitList;
    }

    //crear  mensajes de errores
    public static function messagesInfo($title, $text, $icon, $page = "")
    {
        if ($icon == "error" || $icon == "warning") {
            echo '
        
            <script>
            swal({
                title: "' . $title . '",
                text: "' . $text . '",
                icon: "' . $icon . '",
                buttons: [false,"Esta bien"],
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  window.history.back();
                } 
              });
          </script>
            
            ';
        } else {
            echo '
        
            <script>
            swal({
                title: "' . $title . '",
                text: "' . $text . '",
                icon: "' . $icon . '",
                buttons: [false,"Esta bien"],
                dangerMode: true,
              })
              .then((willDelete) => {
                if (willDelete) {
                  window.location = "' . $page . '"
                } 
              });
          </script>
            
            ';
        }
        //NOTA MATAR EL PROCESO  CON DIE YA QUE SI SE PONE 2 CORREOS DIFERENTES SE PUEDE AGREGAR EL CORREO AUNQUE SEAN DIFERENTES
        // die();
    }
}
