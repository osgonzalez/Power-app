<?php

class SelectedUserToCheckInView
{

    var $users;
    function __construct($users){
        $this->users = $users;
        $this->render();
    }
    function render(){
        include '../Templates/header.html';
        $usuarioTipo = $_SESSION['type'];
        switch ($usuarioTipo){
            case 'ADMIN': include '../Templates/lateralBarAdmin.html';
                break;
            case 'COACH': include '../Templates/lateralBarCoach.html';
                break;
            case 'TDU' : include '../Templates/lateralBarDeportista.html';
                break;
            case 'PEF' : include '../Templates/lateralBarDeportista.html';
                break;
        }
        ?>
        <h3>Eleccion de Usuarios</h3>
        <div class="col-md-12">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i> Todos los usuarios</h4>
                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th class="hidden-phone">DNI</th>
                        <th class="hidden-phone">Tipo de Usuario</th>
                        <th class="hidden-phone">Nombre</th>
                        <th class="hidden-phone">Apellido</th>
                        <th class="hidden-phone">Email</th>
                        <th class="hidden-phone">Teléfono</th>
                        <th class="hidden-phone">Ciudad</th>
                        <th class="hidden-phone">Fecha de nacimiento</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php      foreach ($this->users as $user){ ?>
                        <tr>
                        <td><?php  echo $user->getDNI(); ?></td>
                        <td><?php  echo $user->getUserType(); ?></td>
                        <td><?php  echo $user->getFirstName(); ?></td>
                        <td><?php  echo $user->getLastName(); ?></td>
                        <td><?php  echo $user->getEmail(); ?></td>
                        <td><?php  echo $user->getTelephone(); ?></td>
                        <td><?php  echo $user->getCity(); ?></td>
                        <td><?php  echo $user->getBirthdate(); ?></td>
                        <td><?php  echo '<a href="../Controllers/UserActionController.php?DNI='.$user->getDNI().'&action=CHECKIN">
                                        <img src="../Templates/img2/edit.png" style="width:30px;height:30px;" title="CheckIn"></a>'; ?></td>


                        </tr><?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        </div>


        <div id="showback">
            <?php
            echo '<a class="submit" href="../Controllers/CheckInShowAllController.php?number=10"><img src="../Templates/img2/atras.png" style="width:45px;heigh:45px;" title="Atrás"></a>';
            ?>
        </div> <?php
        include '../Templates/footer.html';
    }
}