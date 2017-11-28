<?php
class userEditView
{
  function __construct(Exercise $exercise)
  {
      $this->exercise = $exercise;
      $this->render();
  }

  function render()
  {
    ?>

    <div class="row mt">
        <div class="col-lg-12">
            <div class="form-panel">
                <h4 class="mb"><i class="fa fa-angle-right"></i> Editar ejercicio</h4>
                <form method="post" class="form-horizontal style-form" action="../Controllers/CoursesActionController.php?action=EDIT">
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">ID Ejercicio</label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control round-form" name="IDExercise" value="<?php echo $this->$exercise->getIDExercise();?>" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Nombre del ejercicio</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control round-form" name="Name" value="<?php echo $this->$exercise->getName();?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">Contenido</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control round-form" name="Content" value="<?php echo $this->$exercise->getContent();?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">URL Imagen</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control round-form" name="UrlImage" value="<?php echo $this->$exercise->getUrlImage();?>">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label">URL Video</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control round-form" name="UrlVideo" value="<?php echo $this->$exercise->getUrlVideo();?>">
                        </div>
                    </div>

                    <button class="submit" type="submit"><img src="../Templates/img2/add.png"></button>
                    <a class="submit" href="../Controllers/ExerciseShowAllController.php"><img src="../Templates/img2/atras.png"></a>
                </form>
            </div>
        </div>
    </div>

    <?php
}
} ?>
