<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $url ?>vista/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo $url ?>vista/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo $url ?>vista/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo $url ?>vista/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $url ?>vista/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo $url ?>vista/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo $url ?>vista/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo $url ?>vista/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo $url ?>vista/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Sweet Alert -->
  <script src="<?php echo $url ?>vista/plugins/sweetalert2/sweetalert2.min.js"></script>


</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    
    <?php// $msj = App_controlador::messagesInfo("Titulo","Esta pagina es una prueba","error","")?>
    <!-- Aqui va el navbar -->
    <?php $app->getComponents('navbar'); ?>

    <!-- Aqui va el sidebar -->
    <?php $app->getComponents('sidebar'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Aqui van las paginas -->
      <?php

      if (isset($_GET['ruta'])) {
        //Traer la lista blanca de paginas adminitas
        $whiteList = App_controlador::getWhiteList();
        //Guardad en la variable la ruta que venga de GET
        $ruta_get = $_GET['ruta'];
        //Inicializamos una bandera en true para ver si hay pagina admitida
        $_404 = true;
        //Recorremos la lista de paginas admitidas
        foreach ($whiteList as $item) {
          //Si hay una conincidencia con lo que venga por GET y un elemento de mi lista
          if ($ruta_get == $item) {
            //Marcar la bandera en false indicando que si existe la pagina
            $_404 =  false;
          }
        }
        //Guardar la pagina mostrar dependiendo la bandera
        $page = $_404 ? '404' : $ruta_get;
        //Cargar la pagina solicitada
        $app->getPage($page);
      } else { }

      ?>
      <!-- Aqui va el dashboard -->


    </div>
    <!-- /.content-wrapper -->

    <!-- Aqui va el footer -->
    <?php $app->getComponents('footer'); ?>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?php echo $url ?>vista/plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="<?php echo $url ?>vista/plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo $url ?>vista/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- ChartJS -->
  <script src="<?php echo $url ?>vista/plugins/chart.js/Chart.min.js"></script>
  <!-- Sparkline -->
  <script src="<?php echo $url ?>vista/plugins/sparklines/sparkline.js"></script>
  <!-- JQVMap -->
  <script src="<?php echo $url ?>vista/plugins/jqvmap/jquery.vmap.min.js"></script>
  <script src="<?php echo $url ?>vista/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?php echo $url ?>vista/plugins/jquery-knob/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?php echo $url ?>vista/plugins/moment/moment.min.js"></script>
  <script src="<?php echo $url ?>vista/plugins/daterangepicker/daterangepicker.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="<?php echo $url ?>vista/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Summernote -->
  <script src="<?php echo $url ?>vista/plugins/summernote/summernote-bs4.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="<?php echo $url ?>vista/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo $url ?>vista/dist/js/adminlte.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php echo $url ?>vista/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo $url ?>vista/dist/js/demo.js"></script>
  <!-- DataTables -->
  <script src="<?php echo $url ?>vista/plugins/datatables/jquery.dataTables.js"></script>
  <script src="<?php echo $url ?>vista/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <!-- mandar a traer script generales reutilizables -->
  <script src="<?php echo $url ?>vista/dist/js/plantilla.js"></script>
      <!-- mandar a traer script de tutor -->
  <script src="<?php echo $url ?>vista/dist/js/tutor.js"></script>

</body>

</html>