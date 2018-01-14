<?php
class Notification
{
  private $IDNotification;
  private $Notification;
  private $Notificationdate;


  public function __construct($IDNotification)
  {
      $this->IDNotification = $IDNotification;

  }
  /**
   * User constructor.
   * @param $IDNotification
   * @param $Notification
   * @param $Notificationdate
   */

  public function loadData($Notification,$Notificationdate)
  {
      $this->Notification = $Notification;
      $this->Notificationdate = $Notificationdate;

  }


  public function loadDataAssoc($dataArray)
  {
      $this->IDNotification = $dataArray['IDNotification'];
      $this->Notification = $dataArray['Notification'];
      $this->Notificationdate = $dataArray['Notificationdate'];

  }

  /**
   * @return mixed
   */
  public function getIDNotification()
  {
      return $this->IDNotification;
  }

  /**
   * @return mixed
   */
  public function getNotification()
  {
      return $this->Notification;
  }

  /**
   * @return mixed
   */
  public function getNotificationDate()
  {
      return $this->Notificationdate;
  }

}

 ?>
