<?php

class Course{


    private $IDCourses;
    private $Name;
    private $Content;
    private $DataStart;
    private $DataEnd;
    private $NPlaces;
    private $DNICoach;
    private $Users;



    /**
     * CourseDAO constructor.
     * @param $IDCourses
     */
    public function __construct($IDCourses)
    {
        $this->IDCourses = $IDCourses;
        $this->Users= array();
    }

    /**
     * CourseDAO loadData.
     * @param $Name
     * @param $Content
     * @param $DataStart
     * @param $DataEnd
     * @param $NPlaces
     * @param $DNICoach
     */
    public function loadData($Name, $Content, $DataStart, $DataEnd, $NPlaces, $DNICoach)
    {
        $this->Name = $Name;
        $this->Content = $Content;
        $this->DataStart = $DataStart;
        $this->DataEnd = $DataEnd;
        $this->NPlaces = $NPlaces;
        $this->DNICoach = $DNICoach;
    }

    public function loadDataAssoc($dataArray){
        $this->Name = $dataArray['Name'];
        $this->Content = $dataArray['Content'];
        $this->DataStart = $dataArray['DataStart'];
        $this->DataEnd = $dataArray['DataEnd'];
        $this->NPlaces = $dataArray['NPlaces'];
        $this->DNICoach = $dataArray['DNICoach'];

    }


    public function addExercise(Course $users){
        $this->users[] = $users;
    }

    /**
     * @return array
     */
    public function getUsers()
    {
        return $this->Users;
    }





    /**
     * @return mixed
     */
    public function getIDCourses()
    {
        return $this->IDCourses;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->Name;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->Content;
    }

    /**
     * @return mixed
     */
    public function getDataStart()
    {
        return $this->DataStart;
    }

    /**
     * @return mixed
     */
    public function getDataEnd()
    {
        return $this->DataEnd;
    }

    /**
     * @return mixed
     */
    public function getNPlaces()
    {
        return $this->NPlaces;
    }

    /**
     * @return mixed
     */
    public function getDNICoach()
    {
        return $this->DNICoach;
    }








}



?>