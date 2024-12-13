<?php include("db.php"); ?>

<?php include("includes/header.php") ?>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

         <!-- AQUI VA EL SIDEBAR -->
         <?php include("includes/sidebar.php") ?>
        
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Aqui va el topbar -->
              <?php include("includes/topbar.php") ?>
              
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Control de Proveedores</h1>
                    <p class="mb-4">Sistema de integración y administración de Provedores<a target="_blank"
                            href="https://wa.link/pqddme"> -> Asistencia Técnica</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Registro de Proveedores activos</h6>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Ingresar Proveedores</button>
                           
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar proveedor</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form action="controlProveedor/createproveedor.php" method="POST">

                                        <div class="mb-3">
                                            <label for="nombre_proveedor">Nombre</label>
                                            <input type="text" name="nombre_proveedor" class="form-control" require>
                                        </div>

                                        <div class="mb-3">
                                            <label for="telefono_proveedor">Telefono</label>
                                            <input type="text" name="telefono_proveedor" class="form-control" require>
                                        </div>

                                        <div class="mb-3">
                                            <label for="direccion_proveedor">Direccion</label>
                                            <input type="text" name="direccion_proveedor" class="form-control" require>
                                        </div>

                       
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                            <button type="submit" name="submit" class="btn btn-primary">Agregar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Teléfono</th>
                                        <th>Direccion</th>
                                        <th>Acciones</th>
                                    </tr>  
                                    </thead>
                                    <tbody>
                                    <?php include("controlProveedor/selectproveedor.php") ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php include("includes/footer.php") ?>
