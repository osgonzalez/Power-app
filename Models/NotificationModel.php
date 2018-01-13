<?php

class NotificationDAO
{
  private $DBLink;
  private $serverName ="localhost";
  private $userName = "admin";
  private $passWord = "admin";
  private $DBName = "powerAppDB";
  private $lastResult;


  function __construct(){

      $this->DBLink =  new mysqli($this->serverName,$this->userName,$this->passWord,$this->DBName);

  }

  /**
   * @param Notification $notification
   */

   function add(Notification $notification){

       $statement = $this->DBLink->prepare("SELECT * FROM Notifications WHERE  IDNotification = ?");

        $IDNotification = $notification->getIDNotification();
       $statement->bind_param("i",$IDNotification);

       if(!$statement->execute()) {
           return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;
       }
       $resultado = $statement->get_result();

       if($resultado->num_rows != 0){
           return "La notificacion: ". $IDNotification . " ya existe en la base de datos.";
       }else{

           $statement = $this->DBLink->prepare("INSERT INTO Notifications(Notification,Notificationdate)
                                                                   VALUES (?,?)");
           $Notification = $notification->getNotification();
           $Notificationdate = $notification->getNotificationDate();



           $statement->bind_param("ss",$Notification,$Notificationdate);

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
       $statement = $this->DBLink->prepare("SELECT * FROM Notifications");
       if(!$statement->execute()) {
           return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

       }else{
           $result = $statement->get_result();
           $toRet = array();

           while ($row = $result->fetch_assoc()){
               $Notifications = new Notification($row['IDNotification']);
               $Notifications->loadDataAssoc($row);
               array_push($toRet,$Notifications);
           }
           $this->lastResult = $toRet;
           return "ok";
       }
   }


   function get(Notification $notification){


       $statement = $this->DBLink->prepare("SELECT * FROM Notifications WHERE IDNotification=?");
       $IDNotification = $notification->getIDNotification();


       $statement->bind_param("s",$IDNotification);

       if(!$statement->execute()) {
           return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

       }else{
           $result = $statement->get_result();
           $row = $result->fetch_assoc();
           $notification = new Notification($row['IDNotification']);
           $notification->loadDataAssoc($row);

           $this->lastResult = $notification;
           return "ok";
       }

   }

   function delete(Notification $notification){
       $statement = $this->DBLink->prepare("DELETE FROM Notifications WHERE IDNotification=?");

       $IDNotification = $notification->getIDNotification();
       $statement->bind_param("s",$IDNotification);

       if(!$statement->execute()) {
           return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

       }else{
           return 'Borrado realizado con exito';
       }
   }


   function edit(Notification $notification){

       $statement = $this->DBLink->prepare("SELECT * FROM Notifications WHERE IDNotification=?");
       $IDNotification = $notification->getIDNotification();


       $statement->bind_param("s",$IDNotification);

       if(!$statement->execute()) {
           return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;

       }else{
           $resultado = $statement->get_result();
           if($resultado->num_rows == 0){
               return 'La notificacion no existe.';
           }else{
               $statement = $this->DBLink->prepare("UPDATE Notifications SET Notification= ?, Notificationdate= ?
                                                         WHERE IDNotification= ?");
               $IDNotification = $notification->getIDNotification();
               $Notification = $notification->getNotification();
               $Notificationdate = $notification->getNotificationDate();

               $statement->bind_param("ssi", $Notification, $Notificationdate,$IDNotification);

               if(!$statement->execute()) {
                   return "Falló la ejecución: (" . $statement->errno . ") " . $statement->error;
               }else{
                   return 'Se ha actualizado con exito.';
               }
           }
       }
   }

}
?>
