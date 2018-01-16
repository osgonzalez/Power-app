<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 15/01/2018
 * Time: 17:32
 */

class SpaceBookingDAO {

    private $DBLink;
    private $serverName ="localhost";
    private $userName = "admin";
    private $passWord = "admin";
    private $DBName = "powerAppDB";
    private $lastResult;

    function __construct(){

        $this->DBLink =  new mysqli($this->serverName,$this->userName,$this->passWord,$this->DBName);
    }


    function add(SpaceBooking $spaceBooking){

        $statement = $this->DBLink->prepare("SELECT * FROM UserBookingSpace WHERE IDSpace = ?, DNI = ?, DateBooking = ?, TimeBooking = ?");

        $IDSpace = $spaceBooking->getIDSpace();
        $DNI = $spaceBooking->getDNI();
        $DateBooking = $spaceBooking->getDateBooking();
        $TimeBooking = $spaceBooking->getTimeBooking();
        $statement->bind_param("isss",$IDSpace, $DNI, $DateBooking, $TimeBooking);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;
        }
        $resultado = $statement->get_result();

        if($resultado->num_rows != 0){
            return "La reserva de ". $IDSpace . "para" . $DNI . " el " . $DateBooking . $TimeBooking ." ya existe en la base de datos.";
        }else{

            $statement = $this->DBLink->prepare("INSERT INTO UserBookingSpace(IDSpace, DNI, DateBooking, TimeBooking, Commentary) 
                   
                                                                    VALUES (?,?,?,?,?)");
            $IDSpace = $spaceBooking->getIDSpace();
            $DNI = $spaceBooking->getDNI();
            $DateBooking = $spaceBooking->getDateBooking();
            $TimeBooking = $spaceBooking->getTimeBooking();
            $Commentary = $spaceBooking->getCommentary();

            $statement->bind_param("ssiiss",$IDSpace,$DNI, $DateBooking, $TimeBooking, $Commentary);

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
        $statement = $this->DBLink->prepare("SELECT * FROM UserBookingSpace");
        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            $result = $statement->get_result();
            $toRet = array();

            while ($row = $result->fetch_assoc()){
                $spaceBooking = new SpaceBooking($row['IDSpace'], $row['DNI'], $row['DateBooking'], $row['TimeBooking']);
                $spaceBooking->loadDataAssoc($row);
                array_push($toRet,$spaceBooking);

            }
            $this->lastResult = $toRet;
            return "ok";
        }
    }

    function get(SpaceBooking $spaceBooking){


        $statement = $this->DBLink->prepare("SELECT * FROM UserBookingSpace WHERE IDSpace = ?, DNI = ?, DateBooking = ?, TimeBooking = ?");
        $IDSpace = $spaceBooking->getIDSpace();
        $DNI = $spaceBooking->getDNI();
        $DateBooking = $spaceBooking->getDateBooking();
        $TimeBooking = $spaceBooking->getTimeBooking();

        $statement->bind_param("isss",$IDTable,$IDSpace,$DNI,$DateBooking,$TimeBooking);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{

            $result = $statement->get_result();
            $row = $result->fetch_assoc();
            $spaceBooking = new SpaceBooking($row['IDSpace'], $row['DNI'], $row['DateBooking'], $row['TimeBooking']);
            $spaceBooking->loadDataAssoc($row);

            $this->lastResult = $spaceBooking;
            return "ok";
        }

    }

    function delete(SpaceBooking $spaceBooking){
        $statement = $this->DBLink->prepare("DELETE FROM UserBookingSpace WHERE IDSpace = ?, DNI = ?, DateBooking = ?, TimeBooking = ?");

        $IDSpace = $spaceBooking->getIDSpace();
        $DNI = $spaceBooking->getDNI();
        $DateBooking = $spaceBooking->getDateBooking();
        $TimeBooking = $spaceBooking->getTimeBooking();

        $statement->bind_param("isss",$IDTable,$IDSpace,$DNI,$DateBooking,$TimeBooking);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            return 'Borrado realizado con exito';
        }
    }

    function edit(SpaceBooking $spaceBooking){

        $statement = $this->DBLink->prepare("SELECT * FROM ExerciseTable WHERE IDSpace = ?, DNI = ?, DateBooking = ?, TimeBooking = ?");

        $IDSpace = $spaceBooking->getIDSpace();
        $DNI = $spaceBooking->getDNI();
        $DateBooking = $spaceBooking->getDateBooking();
        $TimeBooking = $spaceBooking->getTimeBooking();

        $statement->bind_param("isss",$IDTable,$IDSpace,$DNI,$DateBooking,$TimeBooking);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            $resultado = $statement->get_result();
            if($resultado->num_rows == 0){
                return 'La reserva no existe.';
            }else{

                $statement = $this->DBLink->prepare("UPDATE UserBookingSpace SET IDSpace= ?, DNI= ?, DateBooking= ?, 
                                                                    TimeBooking= ?, Commentary= ? WHERE IDSpace= ?, DNI= ?, DateBooking= ?, 
                                                                    TimeBooking= ?");
                $IDSpace = $spaceBooking->getIDSpace();
                $DNI = $spaceBooking->getDNI();
                $DateBooking = $spaceBooking->getDateBooking();
                $TimeBooking = $spaceBooking->getTimeBooking();
                $Commentary = $spaceBooking->getCommentary();

                $statement->bind_param("sisss",$Commentary, $IDSpace, $DNI, $DateBooking, $TimeBooking);

                if(!$statement->execute()) {
                    return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;
                }else{
                    return 'Se ha actualizado con exito.';
                }

            }

        }
    }

    function idName(){
        $statement = $this->DBLink->prepare("SELECT IDSpace, NameSpace FROM Space");
        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            $result = $statement->get_result();
            $result = $result->fetch_array();

            return $result;
        }
    }

}

?>