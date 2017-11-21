<?php





include './Models/User.php';
include './Models/DataBaseModel.php';


/*
$user = new User("15491094L");
$user->loadData("ADMIN","admin","otro","otro","otro","333333333",
                                "Vigo","19/11/91");


$user->hashPassword();
$DAO = new UserDAO();

$message = $DAO->add($user);


echo $message;*/

$DAO = new UserDAO();

$message = $DAO->getAll();

if(strcasecmp($message,"ok") != 0){
    echo $message;
}else{
    $result = $DAO->getLastResult();

    foreach ($result as $user){
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



}





?>