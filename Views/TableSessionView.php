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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script>
            var cadena= "";
            $(document).ready(function(){
                $("#guardarTiempo").click(function(){
                    cadena+=$("#horas").text();
                    cadena+=$("#minutos").text();
                    cadena+=$("#segundos").text();
                    $("#resultado").val(cadena);
                });

            });


        </script>


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



            <div id="contenedor">
                <div class="reloj" id="Horas">00</div>
                <div class="reloj" id="Minutos">:00</div>
                <div class="reloj" id="Segundos">:00</div>
                <div class="reloj" id="Centesimas">:00</div>
                <input type="button" class="boton" id="inicio" value="Inicio &#9658;" onclick="inicios();">
                <input type="button" class="boton" id="parar" value="Parar &#8718;" onclick="parars();" disabled>
                <input type="button" class="boton" id="continuar" value="Continuar &#8634;" onclick="inicios();" disabled>
                <input type="button" class="boton" id="reinicio" value="Reiniciar &#8635;" onclick="reinicios();" disabled>
            </div>

            <input type="text" id="Record" name="Record" value="0"> <button id="guardarTiempo">guardar</button>


            <div class="row mt">
                <div style="display: flex; justify-content: center;" >
                    <button class="submit" type="submit" ><img src="../Templates/img2/add.png"></button>
                    <a href="../Controllers/TableShowAllController.php"><img src="../Templates/img2/atras.png" style="width:45px;heigh:45px;margin-left: 10px;" title="Atrás"></a>
                </div>
            </div>


        </form>

        <?php
    }
}

?>