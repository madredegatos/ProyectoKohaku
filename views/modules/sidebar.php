
<!-- Sidebar -->
<ul class="navbar-nav bg-light sidebar-light sidebar accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="brand">
            <img class="mw-100" src="<?php echo SERVERURL; ?>views/assets/img/logokohaku.png" alt="">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">


    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Nav Item - Tables -->
    
    <label><?php echo $_SESSION['firstname_sk']; ?></label>
    <li class="nav-item">
        <a class="nav-link" href="index.php">
            <i class="fas fa-house-user"></i>
            <span> Inicio</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="/ProyectoKohaku/userupdate">
            <i class="fas fa-house-user"></i>
            <span>Administrador</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="/ProyectoKohaku/class">
            <i class="far fa-calendar-alt"></i>
            <span> Clases</span></a>
           
    </li>
    
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="404.php">
            <i class="fas fa-cash-register"></i>
            <span>Pagos</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="/ProyectoKohaku/adminList">
            <i class="fas fa-tasks"></i>
            <span>Progreso</span></a>
    </li>
    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="404.php">
            <i class="far fa-file-alt"></i>
            <span>Trámites</span></a>
    </li>
    


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
</ul>
<!-- End of Sidebar -->