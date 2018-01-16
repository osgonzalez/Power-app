<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 12/28/17
 * Time: 9:19 PM
 */

class TableAddView
{
    var $exercises;

    function __construct(array $exercises){
        $this->exercises = $exercises;
        $this->render();
    }
    function render(){


?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            var bool = true;

            function add(id,nombreExercise){
                    $(".lista").append("<li>"+"Ejercicio "+ nombreExercise + "</li>"+ "<input type='hidden' value='"+ id +"' name='listaEjercicios[]'>"
                                                                        + "<input type='text' placeholder='Ej:10 repeticiones' name='listaDuracion[]'>");
            }

            $(document).ready(function(){

                $(".uno").show();
                $(".dos").hide();
                $(".boton").click(function(){
                    if(!bool){
                        $(".uno").show(1000);
                        $(".dos").hide();
                    }else{
                        $(".uno").hide();
                        $(".dos").show(1000);
                    }
                    bool = !bool;
                });
            });

        </script>

        <h3>Gestión de Tablas</h3>
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Crear la Tabla</h4>
                    <form method="post" class="form-horizontal style-form" action="../Controllers/TableActionController.php?action=ADD">


                        <div class="uno">
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">IDTabla</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control round-form" name="IDTable">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Tipo de tabla</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control round-form" name="TableType">
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Contenido</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control round-form" name="Content">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label">Asignar tabla</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control round-form" name="Visibility">
                                </div>
                            </div>



                        </div>

                        <link rel="stylesheet" type="text/css" href="../Templates/prueba.css">


                        <div class="dos">
                            <h3>Eleccion de Ejercicio</h3>
                            <div class="dosBox">

                                <div class="col-md-12">
                                    <div class="content-panel">
                                        <h4><i class="fa fa-angle-right"></i> Todos los ejercicio</h4>
                                        <table class="table table-striped table-advance table-hover">
                                            <thead>
                                            <tr>
                                                <th class="hidden-phone">Nombre del Ejercicio</th>
                                                <th class="hidden-phone">Tipo de ejercicio</th>
                                                <th class="hidden-phone">Seleccionar</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php      foreach ($this->exercises as $exercise){ ?>
                                                <tr>
                                                <td><?php  echo $exercise->getName(); ?></td>
                                                <td><?php  echo $exercise->getExerciseType(); ?></td>

                                                <td><button class="check" type="button" onclick="add('<?php echo $exercise->getIDExercise()?>','<?php echo $exercise->getName()?>')">Añadir</button></td>

                                                </tr><?php
                                            }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>

                            <br><br><br><br>

                            <div class="dosBox" id="selected">

                                <ul class="lista">
                                </ul>


                            </div>








                            <button class="submit" title="Crear Tabla" type="submit"><img src="../Templates/img2/add.png"></button>

                        </div>



                    </form>
                    <br>
                    <br>
                    <img class="boton" style="width: 50px;height: 50px" src="../Templates/img2/hecho.png">
                    <a class="submit" href="../Controllers/TableShowAllController.php"><img src="../Templates/img2/atras.png"></a>
                </div>
            </div>
        </div>

<?php

    }
}

?>