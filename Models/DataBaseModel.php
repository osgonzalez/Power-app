<?php 


/**
* 
*/
class UserDAO 
{

    private $DBLink;
    private $serverName ="localhost";
    private $userName = "admin";
    private $passWord = "admin";
    private $DBName = "powerAppDB";
	
	function __construct(){

	    $this->DBLink =  new mysqli($this->serverName,$this->userName,$this->passWord,$this->DBName);



    }


    /**
     * @param User $user
     */
    function add(User $user){

        $statement = $this->DBLink->prepare("SELECT * FROM UsersGym WHERE DNI = ?");

        $DNI = $user->getDNI();
        $statement->bind_param("s",$DNI);
        
        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;
        }
        $resultado = $statement->get_result();

        if($resultado->num_rows != 0){
            return "El DNI: ". $DNI . " ya existe en la base de datos.";
        }else{

            $statement = $this->DBLink->prepare("INSERT INTO UsersGym(DNI, UserType, PasswordHash, FirstName, 
                                                                    LastName, Email, Telephone, City, Birthdate) 
                                                                    VALUES (?,?,?,?,?,?,?,?,?)");
            $DNI = $user->getDNI();
            $UserType = $user->getUserType();
            $PasswordHash = $user->getPasswordHash();
            $FirstName = $user->getFirstName();
            $LastName = $user->getLastName();
            $Email = $user->getEmail();
            $Telephone = $user->getTelephone();
            $City = $user->getCity();
            $Birthdate = $user->getBirthdate();

            $statement->bind_param("ssssssiss",$DNI,$UserType, $PasswordHash, $FirstName, $LastName, $Email, $Telephone, $City, $Birthdate);

            if(!$statement->execute()) {
                return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

            }else{
                return "Insercio correcta";
            }

        }

    }


    function get(User $user){


        $statement = $this->DBLink->prepare("SELECT * FROM `UsersGym` WHERE 'DNI'=?");
        $DNI = $user->getDNI();
        $UserType = $user->getUserType();
        $PasswordHash = $user->getPasswordHash();
        $FirstName = $user->getFirstName();
        $LastName = $user->getLastName();
        $Email = $user->getEmail();
        $Telephone = $user->getTelephone();
        $City = $user->getCity();
        $Birthdate = $user->getBirthdate();

        $statement->bind_param("ssssssiss",$DNI,$UserType, $PasswordHash, $FirstName, $LastName, $Email, $Telephone, $City, $Birthdate);

        $statement->execute();

        $statement->fetch();

        if ($statement> 0){

        }



    }

}





 ?>