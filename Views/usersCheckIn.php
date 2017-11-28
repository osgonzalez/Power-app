<?php
class usersCheckInS
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

            </tr>
            </thead>
            <tbody>
  <?php      foreach ($this->users as $user){ ?>
            <tr>
                <td><?php  echo $user->getDNI(); ?></td>

      <td><?php  echo '<a href="../Controllers/formLoader.php?DNI='.$user->getDNI().'&form=userEdit"><img src="../Templates/img2/hecho.png" style="width:30px;height:30px;" title="Editar"></a>'; ?></td>

            </tr><?php
        }
  ?>
            </tbody>
        </table>
    </div>
</div>
        </div>


       <?php
        include '../Templates/footer.html';
    }
}
?>
