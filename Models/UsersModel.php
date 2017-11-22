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
    private $lastResult;
	
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
                return "Insercion correcta";
            }

        }

    }


    function getLastResult(){
        return $this->lastResult;
    }

    function getAll(){
        $statement = $this->DBLink->prepare("SELECT * FROM UsersGym");
        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            $result = $statement->get_result();
            $toRet = array();

            while ($row = $result->fetch_assoc()){
                $user = new User($row['DNI']);
                $user->loadDataAssoc($row);
                array_push($toRet,$user);
            }
            $this->lastResult = $toRet;
            return "ok";
        }
    }


    function get(User $user){


        $statement = $this->DBLink->prepare("SELECT * FROM UsersGym WHERE DNI=?");
        $DNI = $user->getDNI();


        $statement->bind_param("s",$DNI);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            $result = $statement->get_result();
            $row = $result->fetch_assoc();
            $user = new User($row['DNI']);
            $user->loadDataAssoc($row);

            $this->lastResult = $user;
            return "ok";
        }

    }



    function login(User $user){

        $statement = $this->DBLink->prepare("SELECT * FROM UsersGym WHERE DNI=?");
        $DNI = $user->getDNI();



        $statement->bind_param("s",$DNI);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{

            $result = $statement->get_result();

            if($result->num_rows == 0){
                return "El DNI: ". $DNI . " no existe en la base de datos.";
            }else{
                $row = $result->fetch_assoc();
                if(strcasecmp($row['PasswordHash'],$user->getPasswordHash()) == 0){
                    return 'ok';
                }else{
                    return 'password no valida';
                }
            }
        }

    }



    function delete(User $user){
        $statement = $this->DBLink->prepare("DELETE FROM UsersGym WHERE DNI=?");

        $DNI = $user->getDNI();
        $statement->bind_param("s",$DNI);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            return 'Borrado realizado con exito';
        }
    }

    function edit(User $user){

        $statement = $this->DBLink->prepare("SELECT * FROM UsersGym WHERE DNI=?");
        $DNI = $user->getDNI();


        $statement->bind_param("s",$DNI);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            $resultado = $statement->get_result();
            if($resultado->num_rows == 0){
                return 'El usuario no existe.';
            }else{
                $statement = $this->DBLink->prepare("UPDATE UsersGym SET UserType= ?, PasswordHash= ?, FirstName= ?, 
                                                                    LastName= ?, Email= ?, Telephone= ?, City= ?, Birthdate= ? WHERE DNI=?");
                $DNI = $user->getDNI();
                $UserType = $user->getUserType();
                $PasswordHash = $user->getPasswordHash();
                $FirstName = $user->getFirstName();
                $LastName = $user->getLastName();
                $Email = $user->getEmail();
                $Telephone = $user->getTelephone();
                $City = $user->getCity();
                $Birthdate = $user->getBirthdate();

                $statement->bind_param("sssssisss",$UserType, $PasswordHash, $FirstName, $LastName, $Email, $Telephone, $City, $Birthdate,$DNI);

                if(!$statement->execute()) {
                    return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;
                }else{
                    return 'Se ha actualizado con exito.';
                }

            }

        }
    }

}

?>