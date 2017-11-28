<?php


class Exercise{


    private $IDExercise;
    private $Name;
    private $ExerciseType;
    private $UrlImage;
    private $UrlVideo;
    private $Content;

    /**
     * Exercise constructor.
     * @param $IDExercise
     * @param $Name
     * @param $ExerciseType
     * @param $UrlImage
     * @param $UrlVideo
     * @param $Content
     */
    public function __construct($IDExercise)
    {
        $this->IDExercise = $IDExercise;

    }


    public function loadData($Name,$ExerciseType,$UrlImage,$UrlVideo,$Content)
    {
        $this->Name = $Name;
        $this->ExerciseType = $ExerciseType;
        $this->UrlImage = $UrlImage;
        $this->UrlVideo = $UrlVideo;
        $this->Content = $Content;
    }

    public function loadDataAssoc($dataArray)
    {
        $this->IDExercise = $dataArray['IDExercise'];
        $this->Name = $dataArray['Name'];
        $this->ExerciseType = $dataArray['ExerciseType'];
        $this->UrlImage = $dataArray['UrlImage'];
        $this->UrlVideo = $dataArray['UrlVideo'];
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

    /**
     * @return mixed
     */
    public function getUrlImage()
    {
        return $this->UrlImage;
    }

    /**
     * @return mixed
     */
    public function getUrlVideo()
    {
        return $this->UrlVideo;
    }







}