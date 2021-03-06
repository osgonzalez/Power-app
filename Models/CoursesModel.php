<?php

class CourseDAO{

    private $DBLink;
    private $serverName = "localhost";
    private $userName = "admin";
    private $passWord = "admin";
    private $DBName = "powerAppDB";
    private $lastResult;

    function __construct()
    {

        $this->DBLink = new mysqli($this->serverName, $this->userName, $this->passWord, $this->DBName);

    }

    function add(Course $course){

        $statement = $this->DBLink->prepare("SELECT * FROM Courses WHERE IDCourses = ?");

        $IDCourses = $course->getIDCourses();
        $statement->bind_param("i",$IDCourses);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;
        }
        $resultado = $statement->get_result();

        if($resultado->num_rows != 0){
            return "El Curso: ". $course . " ya existe en la base de datos.";
        }else{




            $statement = $this->DBLink->prepare("INSERT INTO Courses(Name, Content, DataStart, 
                                                                    DataEnd, NPlaces, DNICoach) 
                                                                    VALUES (?,?,?,?,?,?)");
            $Name = $course->getName();
            $Content = $course->getContent();
            $DataStart = $course->getDataStart();
            $DataEnd = $course->getDataEnd();
            $NPlaces = $course->getNPlaces();
            $DNICoach = $course->getDNICoach();


            $statement->bind_param("ssssis",$Name, $Content, $DataStart, $DataEnd, $NPlaces, $DNICoach);

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
        $statement = $this->DBLink->prepare("SELECT * FROM Courses");
        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            $result = $statement->get_result();
            $toRet = array();

            while ($row = $result->fetch_assoc()){
                $Course = new Course($row['IDCourses']);
                $Course->loadDataAssoc($row);
                array_push($toRet,$Course);
            }
            $this->lastResult = $toRet;
            return "ok";
        }
    }


    function get(Course $course){


        $statement = $this->DBLink->prepare("SELECT * FROM Courses WHERE IDCourses=?");
        $IDCourses = $course->getIDCourses();
        $statement->bind_param("i",$IDCourses);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            $result = $statement->get_result();
            $row = $result->fetch_assoc();
            $course = new Course($row['IDCourses']);
            $course->loadDataAssoc($row);


            //Start load exercices

            $statement = $this->DBLink->prepare("SELECT IDCourses, DNI FROM UserRealizeCourses WHERE IDCourses=?");
            $IDCourses = $course->getIDCourses();


            $statement->bind_param("i",$IDCourses);
            if(!$statement->execute()) {
                return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

            }else{
                $result = $statement->get_result();
                $userDAO = new UserDAO();

                while ($row = $result->fetch_assoc()){
                    $userDAO->get(new User($row['DNI']));
                    $course->addUsers($userDAO->getLastResult());
                }
            }

            //End load exercices



            $this->lastResult = $course;
            return "ok";
        }

    }


    function delete(Course $course){
        $statement = $this->DBLink->prepare("DELETE FROM Courses WHERE IDCourses=?");

        $IDCourses = $course->getIDCourses();
        $statement->bind_param("i",$IDCourses);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            return 'Borrado realizado con exito';
        }
    }

    function edit(Course $course){

        $statement = $this->DBLink->prepare("SELECT * FROM Courses WHERE IDCourses=?");
        $IDCourses = $course->getIDCourses();


        $statement->bind_param("i",$IDCourses);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            $resultado = $statement->get_result();
            if($resultado->num_rows == 0){
                return 'El usuario no existe.';
            }else{
                $statement = $this->DBLink->prepare("UPDATE Courses SET Name= ?, Content= ?, DataStart= ?, 
                                                                    DataEnd= ?, NPlaces= ?, DNICoach= ? WHERE IDCourses=?");
                $IDCourses = $course->getIDCourses();
                $Name = $course->getName();
                $Content = $course->getContent();
                $DataStart = $course->getDataStart();
                $DataEnd = $course->getDataEnd();
                $NPlaces = $course->getNPlaces();
                $DNICoach = $course->getDNICoach();

                $statement->bind_param("ssssisi",$Name, $Content, $DataStart, $DataEnd, $NPlaces, $DNICoach, $IDCourses);

                if(!$statement->execute()) {
                    return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;
                }else{
                    return 'Se ha actualizado con exito.';
                }

            }

        }
    }


    function addUser($IDCourses,$DNI){

        $statement = $this->DBLink->prepare("INSERT INTO UserRealizeCourses (IDCourses, DNI) 
                                                                    VALUES (?,?)");


        $statement->bind_param("is",$IDCourses, $DNI);

        if(!$statement->execute()) {
            return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

        }else{
            return "Insercion correcta";
        }


    }



}



?>