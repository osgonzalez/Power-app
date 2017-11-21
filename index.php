<?php





include './Models/User.php';
include './Models/DataBaseModel.php';



$user = new User("15491094L");
$user->loadData("ADMIN","admin","otro","otro","otro","333333333",
                                "Vigo","19/11/91");


$user->hashPassword();
$DAO = new UserDAO();

$message = $DAO->add($user);


echo $message;




?>