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
                    <h1 class="h3 mb-2 text-gray-800">Control de usuarios</h1>
                    <p class="mb-4">Sistema de integración y administración de usuarios<a target="_blank"
                            href="https://wa.link/pqddme"> -> Asistencia Técnica</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Registro de usuarios activos</h6>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Ingresar usuarios</button>
                           
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar usuarios</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <form action="controlUsuarios/createUsuarios.php" method="POST">

                                        <div class="mb-3">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" name="nombre" class="form-control" require>
                                        </div>

                                        <div class="mb-3">
                                            <label for="usuario">Usuario</label>
                                            <input type="text" name="usuario" class="form-control" require>
                                        </div>

                                        <div class="mb-3">
                                            <label for="password">Contraseña</label>
                                            <input type="text" name="password" class="form-control" require>
                                        </div>

                                        <div class="mb-3">
                                            <label for="email">Correo Electrónico</label>
                                            <input type="email" name="email" class="form-control" require>
                                        </div>


                                        <div class="mb-3">
                                            <label for="phone">Teléfono</label>
                                            <input type="text" name="phone" class="form-control" require>
                                        </div>

                                        
                                        <!-- inicia select ROL -->
                                        <div class="mb-3">

                                            <?php
                                                    $query = "SELECT id_rol, nombre FROM rol";
                                                    $result = $conn->query($query);

                                                    if( $result->num_rows>0){
                                                        echo '<label for="">  Rol  </label>';
                                                        echo '<select name="id_rol" class="form-select">';
                                                    while($row = $result->fetch_assoc()){
                                                        echo '<option value=   "'.$row['id_rol'].'">'   .$row['nombre'].   '</option>';
                                                    }
                                                        echo '</select>';
                                                    } else{
                                                        echo 'no hay Rol';
                                                    }
                                            ?>
                                        </div>
                                        <!-- fin select ROL -->
                                            
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
                                        <th>Fecha de Creacion</th>
                                        <th>Nombre</th>
                                        <th>Usuario</th>
                                        <th>contraseña</th>
                                        <th>Rol</th>
                                        <th>email</th>
                                        <th>Teléfono</th>
                                        <th>Acciones</th>
                                    </tr>  
                                    </thead>
                                    <tbody>
                                    <?php include("controlusuarios/selecttable.php") ?>
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
