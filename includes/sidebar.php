 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Edgar   <sup>Mazariegos</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="index.php">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Home</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    GESTION DE PRODUCTOS
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu1"
        aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-solid fa-store"></i>
        <span>Gestion de Inventario</span>
    </a>
    <div id="menu1" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Inventario:</h6>
            <a class="collapse-item" href="nuevoproducto.php">Nuevo Producto</a>
            <a class="collapse-item" href="mostrarproducto.php">Mostrar producto</a>
            <a class="collapse-item" href="editarproducto.php">Editar producto</a>
            <a class="collapse-item" href="eliminarproducto.php">Eliminar producto</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu2"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fa-solid fa-user-tag"></i>
        <span>Categorias y Proveedores</span>
    </a>
    <div id="menu2" class="collapse" aria-labelledby="headingUtilities"
        data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion de Inventario</h6>
            <a class="collapse-item" href="#">Control de inventario</a>
            <a class="collapse-item" href="#">Control de Categoria</a>
            
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Movimientos de Inventario
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#menu3"
        aria-expanded="true" aria-controls="collapsePages">
        <i class="fas fa-solid fa-up-down-left-right"></i>
        <span>Movimientos</span>
    </a>
    <div id="menu3" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Gestion de Movimientos</h6>
            <a class="collapse-item" href="#">Entrada de Productos</a>
            <a class="collapse-item" href="#">Salida de Productos</a>
            <a class="collapse-item" href="#">Consulta de Movimientos</a>
        </div>
    </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="#">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Reportes</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="controlusuarios.php">
        <i class="fas fa-fw fa-table"></i>
        <span>Control de usuarios</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>