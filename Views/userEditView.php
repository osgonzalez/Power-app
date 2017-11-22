<?php


class userEditView{

    var $course;

    function __construct(User $user){
        $this->user = $user;
        $this->render();
    }

    function render(){

        include '../Templates/header.html';

        /*  USAD ESTO COMO EJEMPLO PARA ACCEDER A LOS DATOS!!!!!!!!!!!!!!!!!

                echo "User: ".$this->user->getDNI();
                echo "<br>";
                echo "Nombre: ". $this->user->getFirstName();
        */

        ?>
        <form action="../Controllers/UserActionController.php?action=EDIT">
            <!-- RELLENAR ESTO CON EL FORMULARIO DE EDICION DE user!!!!!! -->
        </form>


        <?php


        include '../Templates/footer.html';

    }
}