<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 14/01/18
 * Time: 0:34
 */

class TableSessionView
{
    var $table;
    function __construct(Table $table){
        $this->table = $table;
        $this->render();
    }
    function render(){

        ?>

        <link rel="stylesheet" href="../Templates/css/Cronometro.css">
        <script type="text/javascript" src="../Templates/js/Cronometro.js"></script>

        <form method="post" action="../Controllers/TableSessionController.php?DNI=<?php echo $_SESSION['login'].'&IdTable='.$this->table->getIDTable()?>">

            <div class="row mt">
                <div class="col-lg-12">
                    <div class="content-panel">
                        <h4><i class="fa fa-angle-right"></i> Tabla <?php echo $this->table->getIDTable()  ?>  </h4>
                        <table class="table table-striped table-advance table-condensed">
                            <thead>
                            <tr>
                                <th class="hidden-phone">Ejercicio</th>
                                <th class="hidden-phone">Nombre</th>
                                <th class="hidden-phone">Tipo de ejercicio</th>
                                <th class="hidden-phone">Descripción</th>
                                <th class="hidden-phone">Repeticiones</th>
                                <th class="hidden-phone">Ver Ejercicio</th>
                                <th class="hidden-phone">Realizado</th>

                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            foreach ($this->table->getExercises() as $exercise){
                                ?>
                                <tr>
                                    <td><a><img src="<?php echo $exercise->getUrlImage();?>" width="90px" height="60px"></a></td>
                                    <td><?php  echo $exercise->getName();?></td>
                                    <td><?php  echo $exercise->getExerciseType();?></td>
                                    <td><?php  echo $exercise->getContent();?></td>
                                    <td><?php  echo $exercise->getDuracion();?></td>
                                    <td><?php echo '<a href="../Controllers/formLoader.php?form=exerciseShowOne&IDExercise='. $exercise->getIDExercise() .' target="blank" onclick="window.open(this.href, this.target, \'width=300,height=400\'); return false;"><img src="../Templates/img2/ver.png" style="width:30px;height:20px;" title="Ver ejercicio"></a>';?></td>
                                    <td><input type="checkbox" id="check" value="hecho" title="Realizado"></td>


                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="content-panel" style="padding-left: 20px">
                <h4>Añadir comentarios a la sesión.</h4>
                <br>
                <textarea style="width: 100%; color: black;font-size: 20px;" name="Coments" id="Coments" cols="30" rows="3" maxlength="140" placeholder="Hoy me veo bien ;)"></textarea>
            </div>



            <div id="cronometro">
                <div id="reloj">
                    0 00 00 00
                </div>
                <form name="cron" action="#">
                    <input type="button" id="boton" value="Empezar" name="boton1"   />
                    <input type="button" id="boton" value="Parar" name="boton2"  />
                    <br>
                </form>
            </div>



            <div class="row mt">
                <div style="display: flex; justify-content: center;" >
                    <a href="../Controllers/formLoader.php?form=addExerciseInTable&IDTable=<?php echo $this->table->getIDTable();?>"><i class="fa fa-check-square" title="Finalizar Sesión" style="font-size: 4em; color: #212529;"></i></a>
                    <a href="../Controllers/TableShowAllController.php"><img src="../Templates/img2/atras.png" style="width:45px;heigh:45px;margin-left: 10px;" title="Atrás"></a>
                </div>
            </div>
        </form>

        <?php
    }
}

?>