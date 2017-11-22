<?php


class Exercise{


    private $IDExercise;
    private $Name;
    private $ExerciseType;
    private $Content;

    /**
     * Exercise constructor.
     * @param $IDExercise
     * @param $Name
     * @param $ExerciseType
     * @param $Content
     */
    public function __construct($IDExercise)
    {
        $this->IDExercise = $IDExercise;

    }


    public function loadData($Name, $ExerciseType, $Content)
    {
        $this->Name = $Name;
        $this->ExerciseType = $ExerciseType;
        $this->Content = $Content;
    }

    public function loadDataAssoc($dataArray)
    {
        $this->IDExercise = $dataArray['IDExercise'];
        $this->Name = $dataArray['Name'];
        $this->ExerciseType = $dataArray['ExerciseType'];
        $this->Content = $dataArray['Content'];
    }

    /**
     * @return mixed
     */
    public function getIDExercise()
    {
        return $this->IDExercise;
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
    public function getExerciseType()
    {
        return $this->ExerciseType;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->Content;
    }







}