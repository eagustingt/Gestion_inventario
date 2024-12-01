<?php include ("db.php")?>
<!DOCTYPE html>
<html lang="en">

 <!-- aqui va header-->
 <?php include ("includes/header.php")?>



<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <!-- Sidebar -->
     <!-- aqui va el Sidebar -->
     <?php include ("includes/sidebar.php")?>
        <!-- Sidebar -->
   
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                 <!-- Aqui va el Topbar -->
                 <?php include ("includes/topbar.php")?>
                
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Control de usuarios</h1>
                    <p class="mb-4">Sistema de integracion y administracion de usuarios <a target="_blank"
                            href="https://wa.link/pqddme">Asistencia Tecnica</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Registro de usuarios activos</h6>

                            <!--inicio modal ingresar usuario-->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Ingresar Usuarios</button>
                                

                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">agregar usuario</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="controlusuarios/createusuarios.php" method="POST">
                                            <div class ="mb-3">
                                                <label for="name">Correo Electronico</label>
                                                <input type="text" name="email" class="form-control" require>
                                            </div>

                                            <div class ="mb-3">
                                                <label for="password">Contrasena</label>
                                                <input type="text" name="password" class="form-control" require>
                                            </div>

                                            <div class ="mb-3">
                                                <label for="phone">Telefono</label>
                                                <input type="number" name="phone" class="form-control" require>
                                            </div>
                                        </div>
                                    
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Agregar</button>
                                            </div>
                                        </form>
                                   
                                    </div>
                                </div>
                                </div>
                            <!-- end modal -->
                                              

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>id</th>
                                            <th>Nombre</th>
                                          
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                
                                    <?php include ("includes/selecttable.php")?>

                                    </tbody>
                                  
                                    
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <!--aqui va el Footer -->
            <?php include ("includes/footer.php")?>
          

</html>