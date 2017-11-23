<?php

class ExerciseDAO
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
     * @param Exercise $exercise
     */
    function add(Exercise $exercise){

        $statement = $this->DBLink->prepare("SELECT * FROM Exercise WHERE IDExercise = ?");

        $IDExercise = $exercise->getIDExercise();
        $statement->bind_param("i",$IDExercise);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;
        }
        $resultado = $statement->get_result();

        if($resultado->num_rows != 0){
            return "El Ejercicio: ". $IDExercise . " ya existe en la base de datos.";
        }else{

            $statement = $this->DBLink->prepare("INSERT INTO Exercise(Name, ExerciseType, Content) 
                                                                    VALUES (?,?,?)");
            $Name = $exercise->getName();
            $ExerciseType = $exercise->getExerciseType();
            $Content = $exercise->getContent();


            $statement->bind_param("sss",$Name,$ExerciseType, $Content);

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
        $statement = $this->DBLink->prepare("SELECT * FROM Exercise");
        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            $result = $statement->get_result();
            $toRet = array();

            while ($row = $result->fetch_assoc()){
                $Exercise = new Exercise($row['IDExercise']);
                $Exercise->loadDataAssoc($row);
                array_push($toRet,$Exercise);
            }
            $this->lastResult = $toRet;
            return "ok";
        }
    }


    function get(Exercise $exercise){


        $statement = $this->DBLink->prepare("SELECT * FROM Exercise WHERE IDExercise=?");
        $IDExercise = $exercise->getIDExercise();


        $statement->bind_param("s",$IDExercise);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            $result = $statement->get_result();
            $row = $result->fetch_assoc();
            $exercise = new Exercise($row['IDExercise']);
            $exercise->loadDataAssoc($row);

            $this->lastResult = $exercise;
            return "ok";
        }

    }




    function delete(Exercise $exercise){
        $statement = $this->DBLink->prepare("DELETE FROM Exercise WHERE IDExercise=?");

        $IDExercise = $exercise->getIDExercise();
        $statement->bind_param("s",$IDExercise);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            return 'Borrado realizado con exito';
        }
    }

    function edit(Exercise $exercise){

        $statement = $this->DBLink->prepare("SELECT * FROM Exercise WHERE IDExercise=?");
        $IDExercise = $exercise->getIDExercise();


        $statement->bind_param("s",$IDExercise);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            $resultado = $statement->get_result();
            if($resultado->num_rows == 0){
                return 'El ejercicio no existe.';
            }else{
                $statement = $this->DBLink->prepare("UPDATE Exercise SET Name= ?, ExerciseType= ?, Content= ?");
                $IDExercise = $exercise->getIDExercise();
                $Name = $exercise->getName();
                $ExerciseType = $exercise->getExerciseType();
                $Content = $exercise->getContent();

                $statement->bind_param("isss",$IDExercise, $Name, $ExerciseType, $Content);

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