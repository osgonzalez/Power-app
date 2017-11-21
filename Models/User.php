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
     * @return mixed
     */
    public function getDNI()
    {
        return $this->DNI;
    }

    /**
     * @return mixed
     */
    public function getUserType()
    {
        return $this->UserType;
    }

    /**
     * @return mixed
     */
    public function getPasswordHash()
    {
        return $this->PasswordHash;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->FirstName;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->LastName;
    }

    /**
     * @return mixed
     */
    public function getEmail()
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
    public function getCity()
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