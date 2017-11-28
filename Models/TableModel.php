<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 11/22/17
 * Time: 8:23 PM
 */

class TableDAO
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



    function add(Table $table){

        $statement = $this->DBLink->prepare("SELECT * FROM ExerciseTable WHERE IDTable = ?");

        $IDTable = $table->getIDTable();
        $statement->bind_param("s",$IDTable);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;
        }
        $resultado = $statement->get_result();

        if($resultado->num_rows != 0){
            return "El IDTable: ". $IDTable . " ya existe en la base de datos.";
        }else{

            $statement = $this->DBLink->prepare("INSERT INTO ExerciseTable(IDTable, TableType, TotalScore, NumberOfVotes, 
                                                                    Content,Visibility) 
                   
                                                                    VALUES (?,?,?,?,?,?)");
            $IDTable = $table->getIDTable();
            $TableType = $table->getTableType();
            $TotalScore = $table->getTotalScore();
            $NumberOfVotes = $table->getNumberOfVotes();
            $Content = $table->getContent();
            $Visibility = $table->getVisibility();

            $statement->bind_param("ssiiss",$IDTable,$TableType, $TotalScore, $NumberOfVotes, $Content,$Visibility);

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
        $statement = $this->DBLink->prepare("SELECT * FROM ExerciseTable");
        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            $result = $statement->get_result();
            $toRet = array();

            while ($row = $result->fetch_assoc()){
                $table = new Table($row['IDTable']);
                $table->loadDataAssoc($row);
                array_push($toRet,$table);

            }
            $this->lastResult = $toRet;
            return "ok";
        }
    }


    function get(Table $table){


        $statement = $this->DBLink->prepare("SELECT * FROM ExerciseTable WHERE IDTable=?");
        $IDTable = $table->getIDTable();


        $statement->bind_param("s",$IDTable);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{

            $result = $statement->get_result();
            $row = $result->fetch_assoc();
            $table = new Table($row['IDTable']);
            $table->loadDataAssoc($row);

            //Start load exercices

            $statement = $this->DBLink->prepare("SELECT IDTable, IDExercise FROM ExerciseContainInTable WHERE IDTable=?");
            $IDTable = $table->getIDTable();


            $statement->bind_param("s",$IDTable);
            if(!$statement->execute()) {
                return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

            }else{
                $result = $statement->get_result();

                $exerciseDAO = new ExerciseDAO();

                while ($row = $result->fetch_assoc()){
                    $exercise = $exerciseDAO->get(new Exercise($row[IDExercise]));
                    $table->addExercise($exercise);


                }
            }

            //End load exercices


            $this->lastResult = $table;
            return "ok";
        }

    }




    function delete(Table $table){
        $statement = $this->DBLink->prepare("DELETE FROM ExerciseTable WHERE IDTable=?");

        $IDTable = $table->getIDTable();
        $statement->bind_param("s",$IDTable);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            return 'Borrado realizado con exito';
        }
    }


    function edit(Table $table){

        $statement = $this->DBLink->prepare("SELECT * FROM ExerciseTable WHERE IDTable=?");

        $IDTable = $table->getIDTable();
        $statement->bind_param("s",$IDTable);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            $resultado = $statement->get_result();
            if($resultado->num_rows == 0){
                return 'El usuario no existe.';
            }else{

                $statement = $this->DBLink->prepare("UPDATE UsersGym SET IDTable= ?, TableType= ?, TotalScore= ?, 
                                                                    NumberOfVotes= ?, Visibility= ? WHERE IDTable=?");
                $IDTable = $table->getIDTable();
                $TableType = $table->getTableType();
                $TotalScore = $table->getTotalScore();
                $NumberOfVotes = $table->getNumberOfVotes();
                $Content = $table->getContent();
                $Visibility = $table->getVisibility();

                $statement->bind_param("siiss",$TableType, $TotalScore, $NumberOfVotes, $Content,$IDTable,$Visibility);

                if(!$statement->execute()) {
                    return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;
                }else{
                    return 'Se ha actualizado con exito.';
                }

            }

        }
    }
}