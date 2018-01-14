<?php
class NotificationEditView
{
    var $notification;

    function __construct(Notification $notification)
    {

        $this->notification = $notification;
        $this->render();
    }

    function render()
    {
?>
<div class="row mt">
    <div class="col-lg-12">
        <div class="form-panel">
            <h4 class="mb"><i class="fa fa-angle-right"></i> Editar notificacion</h4>
            <form method="post" class="form-horizontal style-form" action="../Controllers/NotificationActionController.php?action=EDIT">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">ID Notificacione</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control round-form" name="IDNotification" value="<?php echo $this->notification->getIDNotification();?>" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Notificacion</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control round-form" name="Notification" value="<?php echo $this->notification->getNotification();?>">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Fecha</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="Notificationdate" value="<?php echo $this->notification->getNotificationDate() ?>">
                    </div>
                </div>


                <button class="submit" type="submit"><img src="../Templates/img2/add.png"></button>
                <a class="submit" href="../Controllers/NotificationShowAllController.php"><img src="../Templates/img2/atras.png"></a>
            </form>
        </div>
    </div>
</div>

<?php
}
} ?>
