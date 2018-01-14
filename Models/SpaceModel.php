<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 14/1/18
 * Time: 2:09
 */

class SpaceDAO{
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
     * @param User $space
     */
    function add(Space $space){

        $statement = $this->DBLink->prepare("SELECT * FROM Space WHERE IDSpace = ?");

        $IDSpace = $space->getIDSpace();
        $statement->bind_param("i",$IDSpace);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;
        }
        $resultado = $statement->get_result();

        if($resultado->num_rows != 0){
            return "El espacio: ". $IDSpace . " ya existe en la base de datos.";
        }else{

            $statement = $this->DBLink->prepare("INSERT INTO Space(NameSpace, Description, Capacity) 
                                                                    VALUES (?,?,?)");

            $NameSpace = $space->getNameSpace();
            $Description = $space->getDescription();
            $Capacity = $space->getCapacity();

            $statement->bind_param("sss", $NameSpace, $Description, $Capacity);

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
        $statement = $this->DBLink->prepare("SELECT * FROM Space");
        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            $result = $statement->get_result();
            $toRet = array();

            while ($row = $result->fetch_assoc()){
                $NameSpace = new Space($row['IDSpace']);
                $NameSpace->loadDataAssoc($row);
                array_push($toRet,$NameSpace);
            }
            $this->lastResult = $toRet;
            return "ok";
        }
    }

    function get(Space $space){


        $statement = $this->DBLink->prepare("SELECT * FROM Space WHERE IDSpace=?");
        $IDSpace = $space->getIDSpace();


        $statement->bind_param("i",$IDSpace);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            $result = $statement->get_result();
            $row = $result->fetch_assoc();
            $space = new Space($row['IDSpace']);
            $space->loadDataAssoc($row);

            $this->lastResult = $space;
            return "ok";
        }

    }

    function delete(Space $space){
        $statement = $this->DBLink->prepare("DELETE FROM Space WHERE IDSpace=?");

        $IDSpace = $space->getIDSpace();
        $statement->bind_param("i",$IDSpace);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            return 'Borrado realizado con exito';
        }
    }

    function edit(Space $space){

        $statement = $this->DBLink->prepare("SELECT * FROM Space WHERE IDSpace=?");
        $IDSpace = $space->getIDSpace();


        $statement->bind_param("s",$IDSpace);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            $resultado = $statement->get_result();
            if($resultado->num_rows == 0){
                return 'El ejercicio no existe.';
            }else{
                $statement = $this->DBLink->prepare("UPDATE Space SET NameSpace= ?, Description= ?,Capacity= ? WHERE IDSpace= ?");
                $IDSpace = $space->getIDSpace();
                $NameSpace = $space->getNameSpace();
                $Description = $space->getDescription();
                $Capacity = $space->getCapacity();

                $statement->bind_param("sssi", $NameSpace, $Description, $Capacity,$IDSpace);

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