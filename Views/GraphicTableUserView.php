<?php
/**
 * Created by PhpStorm.
 * User: osboxes
 * Date: 16/01/18
 * Time: 20:03
 */

class GraphicTableUserView
{
    var $Sessions;
    function __construct($Sessions){
        $this->Sessions = $Sessions;
        $this->render();
    }
    function render(){

        include '../Templates/header.html';
        $usuarioTipo = $_SESSION['type'];
        switch ($usuarioTipo){
            case 'ADMIN': include '../Templates/lateralBarAdmin.php';
                break;
            case 'COACH': include '../Templates/lateralBarCoach.php';
                break;
            case 'TDU' : include '../Templates/lateralBarDeportista.php';
                break;
            case 'PEF' : include '../Templates/lateralBarDeportista.php';
                break;
        }

        ?>
        <script type="text/javascript" src="https://www.google.com/jsapi"></script>
        <script>
            google.load("visualization", "1", {packages:["corechart"]});
            google.setOnLoadCallback(dibujarGrafico);
            function dibujarGrafico() {
                // Tabla de datos: valores y etiquetas de la gráfica
                var data = google.visualization.arrayToDataTable([
                    ['Fecha', 'Minutos'],
                    <?php
                        foreach ($this->Sessions as $Session) {

                            echo "['".$Session->getSesionTime()."',".$Session->getRecord()."],";
                        }
                    ?>
                ]);
                var options = {
                    title: 'Datos Sesiones',
                    hAxis: {title: 'Fecha',  titleTextStyle: {color: '#333'}},
                    vAxis: {title: 'Tiempo', minValue: 0}

                }
                // Dibujar el gráfico
                new google.visualization.AreaChart(
                    //ColumnChart sería el tipo de gráfico a dibujar
                    document.getElementById('Grafico')
                ).draw(data, options);
            }
        </script>

        <div id="Grafico" style="width: 100%; height: 400px">
        </div>
        <br>

        <div class="row mt">
            <div style="display: flex; justify-content: center;" >
                <a href="../Controllers/TableShowAllController.php"><img src="../Templates/img2/atras.png" style="width:45px;heigh:45px;margin-left: 10px;" title="Atrás"></a>
            </div>
        </div>
        <br><br><br><br><br><br><br>
        <?php

        include '../Templates/footer.html';

    }

}

?>