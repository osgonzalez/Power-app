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

            $statement = $this->DBLink->prepare("SELECT * FROM ExerciseContainInTable WHERE IDTable=?");
            $IDTable = $table->getIDTable();


            $statement->bind_param("s",$IDTable);
            if(!$statement->execute()) {
                return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

            }else{
                $result = $statement->get_result();

                $exerciseDAO = new ExerciseDAO();

                while ($row = $result->fetch_assoc()){
                    $exerciseDAO->get(new Exercise($row['IDExercise']));
                    $exercise = $exerciseDAO->getLastResult();
                    $exercise->setDuracion($row['Description']);
                    $table->addExercise($exercise);
                }
            }

            //End load exercices


            $this->lastResult = $table;
            return "ok";
        }

    }


    function addExserciseInTable(Table $table,Exercise $exercise,$Description){

        $statement = $this->DBLink->prepare("SELECT * FROM ExerciseContainInTable WHERE IDTable = ?");

        $IDTable = $table->getIDTable();
        $statement->bind_param("s",$IDTable);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;
        }
        $resultado = $statement->get_result();



        $statement = $this->DBLink->prepare("INSERT INTO ExerciseContainInTable(IDTable, IDExercise, ExercisePosition, Description) 
                                                  VALUES (?,?,?,?)");
        $IDTable = $table->getIDTable();
        $IDExercise = $exercise->getIDExercise();
        $ExercisePosition = ($resultado->num_rows)+1;


        $statement->bind_param("siis",$IDTable,$IDExercise, $ExercisePosition, $Description);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            return "Insercion correcta";
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


    function addSession($table,$record,$comment){

        $SesionTime = date('Y-m-d H:i:s',(new DateTime())->getTimestamp());
        /*$IDTable = $table->getIDTable();*/
        $IDTable = $table;
        $dni = $_SESSION['login'];

            echo $IDTable." ".$dni." ".$SesionTime;
            $statement = $this->DBLink->prepare("INSERT INTO `TableSession`(`IDTable`, `DNI`, `SesionTime`,`Record`,`Comment`) VALUES (?,?,?,?,?)");


            $statement->bind_param("sssss",$IDTable,$dni,$SesionTime, $record, $comment);

            if(!$statement->execute()) {
                return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

            }else{
                return "Insercion correcta";
            }



    }

    function getAllSession(){

        $dni=$_SESSION['login'];
        $statement = $this->DBLink->prepare("SELECT * FROM `TableSession` WHERE DNI='".$dni."' ORDER BY IDTable");
        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            $result = $statement->get_result();
            $toRet = array();

            while ($row = $result->fetch_assoc()){
                $table = new Table($row['IDTable']);
                $table->loadSession($row);
                array_push($toRet,$table);

            }
            $this->lastResult = $toRet;
            return "ok";
        }


    }



    function getSession($table){


        $dni=$_SESSION['login'];
        $statement = $this->DBLink->prepare("SELECT * FROM `TableSession` WHERE DNI='".$dni."' AND IDTable='".$table."'");
        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            $result = $statement->get_result();
            $toRet = array();

            while ($row = $result->fetch_assoc()){
                $table = new Table($row['IDTable']);
                $table->loadSession($row);
                array_push($toRet,$table);

            }
            $this->lastResult = $toRet;
            return "ok";
        }
    }


}