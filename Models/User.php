<?php 


/**
* 
*/
class User
{
	private $DNI;
    private $UserType;
    private $PasswordHash;
    private $FirstName;
    private $LastName;
    private $Email;
    private $Telephone;
    private $City;
    private $Birthdate;


    /**
     * User constructor.
     * @param $DNI
    */
    public function __construct($DNI)
    {
        $this->DNI = $DNI;
    }

    /**
     * User constructor.
     * @param $DNI
     * @param $UserType
     * @param $PasswordHash
     * @param $FirstName
     * @param $LastName
     * @param $Email
     * @param $Telephone
     * @param $City
     * @param $Birthdate
     */
    public function loadDataAssoc($dataArray)
    {
       // $result = $dataArray->fetch_assoc();
        $this->UserType = $dataArray['UserType'];
        $this->PasswordHash = $dataArray['PasswordHash'];
        $this->FirstName = $dataArray['FirstName'];
        $this->LastName = $dataArray['LastName'];
        $this->Email = $dataArray['Email'];
        $this->Telephone = $dataArray['Telephone'];
        $this->City = $dataArray['City'];
        $this->Birthdate = $dataArray['Birthdate'];
    }

    public function loadData($UserType, $PasswordHash, $FirstName, $LastName, $Email, $Telephone, $City, $Birthdate)
    {

        $this->UserType = $UserType;
        $this->PasswordHash = $PasswordHash;
        $this->FirstName = $FirstName;
        $this->LastName = $LastName;
        $this->Email = $Email;
        $this->Telephone = $Telephone;
        $this->City = $City;
        $this->Birthdate = $Birthdate;
    }


    public function hashPassword(){
        $this->PasswordHash = md5($this->PasswordHash);
    }

    /**
     * @param mixed $PasswordHash
     */
    public function setPasswordHash($PasswordHash){
        $this->PasswordHash = $PasswordHash;
    }



    /**
     * @return mixed
     */
    public function getDNI():string
    {
        return $this->DNI;
    }

    /**
     * @return mixed
     */
    public function getUserType():string
    {
        return $this->UserType;
    }

    public function setUserType(string $UserType)
    {
        $this->UserType = $UserType;
    }

    /**
     * @return mixed
     */
    public function getPasswordHash():string
    {
        return $this->PasswordHash;
    }

    /**
     * @return mixed
     */
    public function getFirstName():string
    {
        return $this->FirstName;
    }

    /**
     * @return mixed
     */
    public function getLastName():string
    {
        return $this->LastName;
    }

    public function getFullName():string
    {
        return $this->FirstName." ".$this->LastName;
    }

    /**
     * @return mixed
     */
    public function getEmail():string
    {
        return $this->Email;
    }

    /**
     * @return mixed
     */
    public function getTelephone()
    {
        return $this->Telephone;
    }

    /**
     * @return mixed
     */
    public function getCity():string
    {
        return $this->City;
    }

    /**
     * @return mixed
     */
    public function getBirthdate()
    {
        return $this->Birthdate;
    }




}


 ?>