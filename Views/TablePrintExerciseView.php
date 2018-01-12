<?php
/**
 * Created by PhpStorm.
 * User: r
 * Date: 12/01/18
 * Time: 19:50
 */

class TablePrintExerciseView
{
    var $table;
    function __construct(Table $table){
        $this->table = $table;
        $this->render();
    }
    function render(){

        ?>
        <style>
            h1{
                text-align: center;
            }
            .table{
                font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            .table td, .table th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            .table tr:nth-child(even){background-color: #f0effe;}

            .table tr:hover {background-color: #ddd;}

            .table th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #f5424a;
                color: white;
            }
        </style>

        <div class="row">
            <div class="col">
                <div class="content">
                    <h1><i class="fa fa-angle-right"></i> Imprimir Tabla <?php echo $this->table->getIDTable()  ?>  </h1>
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="hidden">Ejercicio</th>
                            <th class="hidden">Nombre</th>
                            <th class="hidden">Tipo de ejercicio</th>
                            <th class="hidden">Descripción</th>
                            <th class="hidden">Repeticiones</th>
                            <th class="hidden">Realizado</th>
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
                                <td><?php  echo '<input type="checkbox" id="check" value="hecho">'?></td>

                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row mt">


         <!--   <div style="display: flex; justify-content: center;" >
                <a href="../Controllers/formLoader.php?form=addExerciseInTable&IDTable=<?php echo $this->table->getIDTable();?>"><img src="../Templates/img2/addCurso.png" style="width:45px;heigh:45px;" title="Añadir Ejercicio a Tabla"></a>
                <a href="../Controllers/TableShowAllController.php"><img src="../Templates/img2/atras.png" style="width:45px;heigh:45px;margin-left: 10px;" title="Atrás"></a>
            </div> -->
        </div>

        <?php
    }
}
