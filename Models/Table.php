<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 11/22/17
 * Time: 8:14 PM
 */

class Table
{

    private $IDTable;
    private $TableType;
    private $TotalScore;
    private $NumberOfVotes;
    private $Content;
    private $Exercises;
    private $Visibility;


    public function __construct($IDTable)
    {
        $this->IDTable = $IDTable;
        $this->Exercises = array();
    }



    public function loadDataAssoc($dataArray)
    {
        // $result = $dataArray->fetch_assoc();
        $this->IDTable = $dataArray['IDTable'];
        $this->TableType = $dataArray['TableType'];
        $this->TotalScore = $dataArray['TotalScore'];
        $this->NumberOfVotes = $dataArray['NumberOfVotes'];
        $this->Content = $dataArray['Content'];
        $this->Content = $dataArray['Visibility'];

    }

    public function loadData($IDTable, $TableType, $TotalScore, $NumberOfVotes, $Content,$Visibility)
    {

        $this->IDTable = $IDTable;
        $this->TableType = $TableType;
        $this->TotalScore = $TotalScore;
        $this->NumberOfVotes = $NumberOfVotes;
        $this->Content = $Content;
        $this->Visibility = $Visibility;

    }


    public function addExercise(Exercise $exercise){
        $this->Exercises[] = $exercise;
    }



    public function getExercises()
    {
        return $this->Exercises;
    }



    /**
     * @return mixed
     */
    public function getIDTable()
    {
        return $this->IDTable;
    }

    /**
     * @return mixed
     */
    public function getTableType()
    {
        return $this->TableType;
    }

    /**
     * @return mixed
     */
    public function getTotalScore()
    {
        return $this->TotalScore;
    }

    /**
     * @return mixed
     */
    public function getVisibility()
    {
        return $this->Visibility;
    }

    /**
     * @return mixed
     */
    public function getNumberOfVotes()
    {
        return $this->NumberOfVotes;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->Content;
    }


}