<?php
class courseEditView{
    var $course;
    function __construct(Course $course){
        $this->course = $course;
        $this->render();
    }
    function render(){
        echo "mierdapura";
        include '../Templates/header.html';

        /*  USAD ESTO COMO EJEMPLO PARA ACCEDER A LOS DATOS!!!!!!!!!!!!!!!!!
                echo "IDCourse: ".$this->course->getIDCourses();
                echo "<br>";
                echo "Nombre: ". $this->course->getName();
        */
        ?>
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb"><i class="fa fa-angle-right"></i> Editar Curso</h4>
                    <form class="form-horizontal style-form" action="../Controllers/CoursesActionController.php?action=EDIT">
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">ID Curso</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control round-form" name="IDCourses" value="<?php echo $this->valores['IDCourses'];?>" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Nombre del Curso</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control round-form" name="Name" value="<?php echo $this->valores['Name'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Contenido</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control round-form" name="Content" value="<?php echo $this->valores['Content'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Numero de plazas</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control round-form" name="NPlaces" value="<?php echo $this->valores['NPlaces'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Fecha de inicio</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control round-form" name="DataStart" value="<?php echo $this->valores['DataStart'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Fecha de Fin</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control round-form" name="DataEnd" value="<?php echo $this->valores['DataEnd'];?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">DNI del coach</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control round-form" name="DNICoach" value="<?php echo $this->valores['DNICoach'];?>">
                            </div>
                        </div>

                        <button class="submit" type="submit"><img src="../Templates/img2/add.png"></button>
                        <a class="submit" href="../Controllers/CoursesShowAllController.php"><img src="../Templates/img2/atras.png"></a>
                    </form>
                </div>
            </div>
        </div>

        <?php
        include '../Templates/footer.html';
    }
}