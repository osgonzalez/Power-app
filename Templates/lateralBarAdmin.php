
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
                <a href="../index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Principal</span>
                </a>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-desktop"></i>
                    <span>Entradas</span>
                </a>
                <ul class="sub">
                    <li><a  href="">Ver entradas</a></li>
                    <li><a  href="">Dar entradas</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-user"></i>
                    <span>Gestión de Usuarios</span>
                </a>
                <ul class="sub">
                    <li><a  href="../Controllers/UserShowAllController.php">Ver todos los usuarios</a></li>
                    <li><a  href="../Controllers/formLoader.php?form=userAdd">Añadir usuario</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-play"></i>
                    <span>Gestión de Cursos</span>
                </a>
                <ul class="sub">
                    <li><a  href="../Controllers/CoursesShowAllController.php">Ver todos los cursos</a></li>
                    <li><a  href="../Controllers/formLoader.php?form=courseAdd">Añadir curso</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-book"></i>
                    <span>Reserva de Cursos</span>
                </a>
                <ul class="sub">
                    <li><a  href="">Ver todas las reservas</a></li>
                    <li><a  href="">Crear reserva</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-location-arrow"></i>
                    <span>Gestión de Espacios</span>
                </a>
                <ul class="sub">
                    <li><a  href="">Ver todos los espacios</a></li>
                    <li><a  href="">Añadir espacio</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-book"></i>
                    <span>Reserva de Espacios</span>
                </a>
                <ul class="sub">
                    <li><a  href="">Ver todas las reservas</a></li>
                    <li><a  href="">Crear reserva</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-bomb"></i>
                    <span>Gestión de Ejercicios</span>
                </a>
                <ul class="sub">
                    <li><a  href="../Controllers/ExerciseShowAllController.php">Ver todos los ejercicios</a></li>
                    <li><a  href="../Controllers/formLoader.php?form=exerciseAdd">Añadir ejercicio</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class="fa fa-table"></i>
                    <span>Gestión de Tablas</span>
                </a>
                <ul class="sub">
                    <li><a  href="../Controllers/TableShowAllController.php">Ver todas las tablas</a></li>
                </ul>
            </li>

            <li class="sub-menu">
                <a href="javascript:;" >
                    <i class=" fa fa-calendar-o"></i>
                    <span>Calendario</span>
                </a>
                <ul class="sub">
                    <li><a  href="">Ver calendario</a></li>
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
    <section class="wrapper site-min-height">
        <div class="row">