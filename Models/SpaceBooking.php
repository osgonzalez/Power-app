<?php
/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 15/01/2018
 * Time: 17:33
 */

class SpaceBooking
{
    private $IDSpace;
    private $DNI;
    private $DateBooking;
    private $TimeBooking;
    private $Commentary;


    public function __construct($IDSpace,$DNI,$DateBooking,$TimeBooking)
    {
        $this->IDSpace = $IDSpace;
        $this->DNI = $DNI;
        $this->DateBooking = $DateBooking;
        $this->TimeBooking = $TimeBooking;
    }



    public function loadDataAssoc($dataArray)
    {
        // $result = $dataArray->fetch_assoc();
        $this->IDSpace = $dataArray['IDSpace'];
        $this->DNI = $dataArray['DNI'];
        $this->DateBooking = $dataArray['DateBooking'];
        $this->TimeBooking = $dataArray['TimeBooking'];
        $this->Commentary = $dataArray['Commentary'];

    }

    public function loadData($IDSpace, $DNI, $DateBooking, $TimeBooking, $Commentary)
    {

        $this->IDSpace = $IDSpace;
        $this->DNI = $DNI;
        $this->DateBooking = $DateBooking;
        $this->TimeBooking = $TimeBooking;
        $this->Commentary = $Commentary;

    }

    /**
     * @return mixed
     */
    public function getIDSpace()
    {
        return $this->IDSpace;
    }

    /**
     * @return mixed
     */
    public function getDNI()
    {
        return $this->DNI;
    }

    /**
     * @return mixed
     */
    public function getDateBooking()
    {
        return $this->DateBooking;
    }

    /**
     * @return mixed
     */
    public function getTimeBooking()
    {
        return $this->TimeBooking;
    }

    /**
     * @return mixed
     */
    public function getCommentary()
    {
        return $this->Commentary;
    }
}