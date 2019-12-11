<?php $app->getComponents('header'); ?>
<div class="conten">

  <div class="container-fluid">
    <!-- Agregar un boton que mande a llamar al moda de registro de usuarios -->
    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modalUser">
      <i class="fa fa-plus"></i> Agregar usuarios
    </button>


    <table class="table table-bordered table-hover tablas">
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Correo</th>
          <th>Acciones</th>

        </tr>
      </thead>
      <tbody>


        <?php

        $tutor = TutorControlador::ctrConsultarTutor();
        foreach ($tutor as $item) :
          ?>
          <tr>
            <td><?php echo $item['TutorNombre'] ?></td>
            <td><?php echo $item['TutorApellido'] ?></td>
            <td><?php echo $item['TutorCorreo'] ?></td>
            <td>

              <!-- boton de modificar tutor -->
              <div class="btn-group">

              <button type="button" class="btn btn-outline-warning btnModificatutorTutor" idTutor="<?php echo $item['TutorID'] ?>" data-toggle="modal" data-target="#EditmodalUserEdit">
                
                <i class="far fa-edit"></i>
                </button>
                <!-- boton de eliminar tutor -->
                <button type="button" class="btn btn-outline-danger btnEliminaTutor" idTutor="<?php echo $item['TutorID'] ?>" data-toggle="modal" data-target="#EditmodalUserEdit">
                <i class="fas fa-trash-alt"></i>
                </button>
                

              </div>



            </td>
          </tr>



        <?php endforeach ?>

      </tbody>
      <tfoot>
        <tr>
          <th>Nombre</th>
          <th>Apellido</th>
          <th>Correo</th>
          <th>Acciones</th>

        </tr>
      </tfoot>
    </table>

  </div>
</div>


<!-- Modal de regustri de usuarios -->
<div class="modal fade" id="modalUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="#" method="post">
        <div class="modal-body">
          <div class="form-row">
            <!-- Nombre y apellido -->
            <!-- Nombre -->
            <div class="col-md-6 col-12">
              <div class="form-gr">
                <label for="TutorNombre">Nombres(s)</label>
                <input id="TutorNombre" type="text" pattern="^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$" title="El apellido no debe llevar letras o caracteres especiales" class="form-control" placeholder="Nombres(s)" name="TutorNombre" required>
              </div>
            </div>
            <!-- Apellido -->
            <div class="col-md-6 col-12">
              <div class="form-gr">
                <label for="TutorApellido">Apellido(s)</label>
                <input id="TutorApellido" type="text" pattern="^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$" title="El apellido no debe llevar letras o caracteres especiales" class="form-control" placeholder="Apellido(s)" name="TutorApellido" required>
              </div>
            </div>
            <!-- correo electronico y Confirmacion -->
            <!-- correo -->
            <div class="col-md-6 col-12">
              <div class="form-gr">
                <label for="TutorCorreo">Correo electronico</label>
                <input id="TutorCorreo" type="email" pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$" title="El correo no es valido" class="form-control" placeholder="Correo electronico" name="TutorCorreo" required>
              </div>
            </div>
            <!-- Correo confirmacion -->
            <div class="col-md-6 col-12">
              <div class="form-gr">
                <label for="TutorCorreoConfir">Confirmacion de correo electronico</label>
                <input id="TutorCorreoConfir" type="email" pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$" title="El correo no es valido" class="form-control" placeholder="Confirmacion correo electronico" name="TutorCorreoConfir" required>
              </div>
            </div>
            <!-- contraseña y confirmacion de contraseña -->
            <div class="col-md-6 col-12">
              <div class="form-gr">
                <label for="TutorPass">Contraseña</label>
                <input id="TutorPass" type="password" pattern="^.{8,}" title="La contraseña debe ser minimo de 8 caracteres" class="form-control" placeholder="Contraseña" name="TutorPass" required>
              </div>
            </div>
            <!-- confirmacion de contraseña -->
            <div class="col-md-6 col-12">
              <div class="form-gr">
                <label for="TutorPassConfir">Confirmacion de contraseña</label>
                <input id="TutorPassConfir" type="password" pattern="^.{8,}" title="La contraseña debe ser minimo de 8 caracteres" class="form-control" placeholder="Confirmacion de contraseña" name="TutorPassConfir" required>
              </div>
            </div>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" name="btnGuardarTutor">Guardar</button>

        </div>
        <?php
        $guardar = new TutorControlador();
        $guardar->ctrAgregarTutor();

        ?>
      </form>
    </div>
  </div>
</div>


<!-- Modal de regustri de usuarios -->
<div class="modal fade" id="EditmodalUserEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="   EditexampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="#" method="post">
        <div class="modal-body">
          <div class="form-row">
            <!-- Nombre y apellido -->
            <!-- Nombre -->
            <div class="col-md-6 col-12">
              <div class="form-gr">
                <label for="EditTutorNombre">Nombres(s)</label>
                <input id="EditTutorNombre" type="text" pattern="^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$" title="El apellido no debe llevar letras o caracteres especiales" class="form-control" placeholder="Nombres(s)" name="TutorNombre" required>
              </div>
            </div>
            <!-- Apellido -->
            <div class="col-md-6 col-12">
              <div class="form-gr">
                <label for="EditTutorApellido">Apellido(s)</label>
                <input id="EditTutorApellido" type="text" pattern="^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$" title="El apellido no debe llevar letras o caracteres especiales" class="form-control" placeholder="Apellido(s)" name="TutorApellido" required>
              </div>
            </div>
            <!-- correo electronico y Confirmacion -->
            <!-- correo -->
            <div class="col-md-6 col-12">
              <div class="form-gr">
                <label for="EditTutorCorreo">Correo electronico</label>
                <input id="EditTutorCorreo" type="email" pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$" title="El correo no es valido" class="form-control" placeholder="Correo electronico" name="TutorCorreo" required>
              </div>
            </div>
            <!-- Correo confirmacion -->
            <div class="col-md-6 col-12">
              <div class="form-gr">
                <label for="EditTutorCorreoConfir">Confirmacion de correo electronico</label>
                <input id="EditTutorCorreoConfir" type="email" pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$" title="El correo no es valido" class="form-control" placeholder="Confirmacion correo electronico" name="TutorCorreoConfir" required>
              </div>
            </div>
            
            <input type="hidden" id="EditTutorIDHide" name="EditTutorIDHide" required readonly>

          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-primary" name="btnModificaTutor">Guardar</button>

        </div>
        <?php
        $modifica = new TutorControlador();
        $modifica->ctrModificarTutor();

        ?>
      </form>
    </div>
  </div>
</div>