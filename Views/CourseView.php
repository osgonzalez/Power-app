<?php


class CourseView{

    var $users;

    function __construct($users){
        $this->users = $users;
        $this->render();
    }

    function render(){

        include '../Templates/header.html';

        foreach ($this->users as $user){
            echo "DNI: ".$user->getDNI();
            echo "<br>";
            echo "Nombre: ". $user->getFirstName();
            echo "<br>";
            echo "Apellido: ". $user->getLastName();
            echo "<br>";
            echo "EMail: ". $user->getEmail();
            echo "<br>";
            echo "Ciudad: ". $user->getCity();
            echo "<br>";
            echo "<br>";
            echo "<br>";
        }



        include '../Templates/footer.html';

    }
}