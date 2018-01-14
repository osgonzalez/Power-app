<?php

/**
 * Created by PhpStorm.
 * User: RaquelMarcos
 * Date: 14/1/18
 * Time: 1:58
 */
class Space
{
    private $IDSpace;
    private $NameSpace;
    private $Description;
    private $Capacity;

    /**
     * User constructor.
     * @param $IDSpace
     */
    public function __construct($IDSpace)
    {
        $this->IDSpace = $IDSpace;
    }

    /**
     * User constructor.
     * @param $IDSpace
     * @param $NameSpace
     * @param $Description
     * @param $Capacity
     */

    public function loadData($NameSpace, $Description, $Capacity){
        $this->NameSpace = $NameSpace;
        $this->Description = $Description;
        $this->Capacity = $Capacity;
    }

    public function loadDataAssoc($dataArray)
    {
        $this->IDSpace = $dataArray['IDSpace'];
        $this->NameSpace = $dataArray['NameSpace'];
        $this->Description = $dataArray['Description'];
        $this->Capacity = $dataArray['Capacity'];
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
    public function getNameSpace()
    {
        return $this->NameSpace;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->Description;
    }

    /**
     * @return mixed
     */
    public function getCapacity()
    {
        return $this->Capacity;
    }






}
?>