<?php

class NotificationShowAllView
{

  var $notifications;
  function __construct($notifications){
      $this->users = $notifications;
      $this->render();
}


function render(){
    include '../Templates/header.html';
    $usuarioTipo = $_SESSION['type'];
    switch ($usuarioTipo){
        case 'ADMIN': include '../Templates/lateralBarAdmin.php';
            break;
        case 'COACH': include '../Templates/lateralBarCoach.php';
            break;
        case 'TDU' : include '../Templates/lateralBarDeportista.php';
            break;
        case 'PEF' : include '../Templates/lateralBarDeportista.php';
            break;
    }
    ?>
    <h3>Gestión de Notificaciones</h3>
    <div class="col-md-12">
        <div class="content-panel">
            <h4><i class="fa fa-angle-right"></i> Todas las notificaciones</h4>
            <table class="table table-striped table-advance table-hover">
                <thead>
                <tr>
                    <th class="hidden-phone">ID</th>
                    <th class="hidden-phone">Notificacion</th>
                    <th class="hidden-phone">fecha</th>

                </tr>
                </thead>
                <tbody>
                <?php      foreach ($this->users as $notification){ ?>
                    <tr>
                    <td><?php  echo $notification->getIDNotification(); ?></td>
                    <td><?php  echo $notification->getNotification(); ?></td>
                    <td><?php  echo $notification->getNotificationDate(); ?></td>


                    <td><?php  echo '<img src="../Templates/img2/edit.png" style="width:30px;height:30px;" title="Editar"></a>'; ?></td>
                    <td><?php  echo '<<img src="../Templates/img2/delete.png" style="width:30px;height:30px;" title="Borrar"></a>'; ?></td>

                    </tr><?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    <div class="row mt">
        <div style="display: flex; justify-content: center;" >
            <a class="submit" href="../Controllers/formLoader.php?form=spaceAdd"><img src="../Templates/img2/userAdd.png" style="width:45px;heigh:45px;" title="Añadir espacio"></a>
            <a class="submit" href="../index.php"><img src="../Templates/img2/atras.png" style="width:45px;heigh:45px;" title="Atrás"></a>
        </div>
    </div>

    <?php
    include '../Templates/footer.html';
}
}
