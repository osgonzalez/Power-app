<?php
class userCheckIn
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
        <h3>Usuarios Check In</h3>
        <div id="showback">
            <?php
            echo '<a class="submit" href="../index.php"><img src="../Templates/img2/atras.png" style="width:45px;heigh:45px;" title="Atrás"></a>';
            ?>
        </div>
        <div class="col-md-12">
            <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i>usuarios</h4>
                <table class="table table-striped table-advance table-hover">
                    <thead>
                    <tr>
                        <th class="hidden-phone">DNI</th>
                        <th class="hidden-phone">Nombre</th>
                        <th class="hidden-phone">Apellido</th>
                        <th class="hidden-phone">Tipo de Usuario</th>
                        <th class="hidden-phone">Hora Entrada</th>

                    </tr>
                    </thead>
                    <tbody>

          <?php      foreach ($this->users as $date => $user){ ?>

                    <tr>
                        <td><?php  echo $user->getDNI(); ?></td>
                        <td><?php  echo $user->getFirstName(); ?></td>
                        <td><?php  echo $user->getLastName(); ?></td>
                        <td><?php  echo $user->getUserType(); ?></td>
                        <td><?php  echo $date; ?></td>

                    </tr><?php
                }
          ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php
echo '<a class="submit" href="../Controllers/CheckInShowAllController.php?number='.($_REQUEST['number']+10).'">Mostrar mas </a> ';
?>

<div id="showback">
    <?php
    echo '<a class="submit" href="../Controllers/CheckInShowUsersController.php"><img src="../Templates/img2/userAdd.png" style="width:45px;heigh:45px;" title="Añadir usuario"></a>';
    echo '<a class="submit" href="../index.php"><img src="../Templates/img2/atras.png" style="width:45px;heigh:45px;" title="Atrás"></a>';
    ?>
</div>


        <?php
        include '../Templates/footer.html';
    }
}
?>
