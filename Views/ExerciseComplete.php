<?php

/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 29/11/17
 * Time: 19:06
 */
class ExerciseComplete{

    var $exercise;
    function __construct(Exercise $exercise){
        $this->exercise = $exercise;
        $this->render();
    }
    function render(){

        ?>
        <section id="main">
            <section class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="content-panel">
                    <h4><i class="fa fa-angle-right"></i><?php echo $this->exercise->getName()  ?>  </h4>
                        <table class="table table-bordered table-striped table-condensed cf">
                            <thead class="cf">
                            <tr>
                                <td>Ejercicio</td>
                                <td><img src="<?php echo $this->exercise->getUrlImage();?>" style="height: 80px; width: 110px;"></td>
                            </tr>
                            <tr>
                                <td>Nombre</td>
                                <td><?php echo $this->exercise->getName();?></td>
                            </tr>
                            <tr>
                                <td>Tipo de ejercicio</td>
                                <td><?php echo $this->exercise->getExerciseType();?></td>
                            </tr>
                            <tr>
                                <td>Descripción</td>
                                <td><?php echo $this->exercise->getContent();?></td>
                            </tr>
                            <tr>
                                <td>Video</td>
                                <td class="embed-responsive embed-responsive-4by3"><iframe class="embed-responsive-item" src="<?php echo $this->exercise->getUrlVideo(); ?>" allowfullscreen></iframe>
                                </td>

                            </tr>
                            </thead>
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
            </section>
        </section>
        <?php
    }
}