<!-- **********************************************************************************************************************************************************
     MAIN SIDEBAR MENU
     *********************************************************************************************************************************************************** -->
<!--sidebar start-->
<aside>
    <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">

            <h5 style="color: #000000" class="centered">Bienvenido: <span style="color:#A81D23;"><?php echo $_SESSION['login'] ?></span></h5>

            <li class="mt">
                <a href="../Controllers/loginController.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Principal</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-play"></i>
                    <span>Cursos</span>
                </a>
                <ul class="sub">
                    <li><a  href="../Controllers/CoursesShowAllController.php">Ver todos los cursos</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-book"></i>
                    <span>Mis reservas</span>
                </a>
                <ul class="sub">
                    <li><a  href="">Ver reservas de CURSOS</a></li>
                    <li><a  href="">Ver reservas de ESPACIOS</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-table"></i>
                    <span>Tablas</span>
                </a>
                <ul class="sub">
                    <li><a  href="../Controllers/TableShowAllController.php">Ver todas las tablas</a></li>
                </ul>
                <ul class="sub">
                    <li><a  href="../Controllers/TableSessionShowAllController.php">Ver todas las Sesiones</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class=" fa fa-calendar-o"></i>
                    <span>Calendario</span>
                </a>
                <ul class="sub">
                    <li><a  href="../Controllers/calendarioController.php">Ver calendario</a></li>
                </ul>
            </li>
            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-table"></i>
                    <span>Gestión de Notificaciones</span>
                </a>
                <ul class="sub">
                    <li><a  href="../Controllers/NotificationShowAllController.php">Ver Notificaciones</a></li>
                </ul>
            </li>

        </ul>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->


<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <div class="row">
