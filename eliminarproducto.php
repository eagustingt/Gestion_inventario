<!DOCTYPE html>
<html lang="en">

 <!-- aqui va el header -->
<!--  header -->
 <?php include ("includes/header.php");
        include('db.php');
 ?>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- aqui va el Sidebar -->
        <?php include ("includes/sidebar.php")?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- aqui va el Topbar -->
                <!--  Topbar -->
                <?php include ("includes/topbar.php")?>
                
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Eliminar producto</h1>
                

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

             <!-- Exampol Table -->
             <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Listado de Productos</h6>
                                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>idproducto</th>
                                            <th>Producto</th>
                                            <th>Descripción</th>
                                            <th>Cantidad</th>
                                            <th>Precio Unitario</th>
                                            <th>Categoría</th>
                                            <th>Proveedor</th>
                                            <th>Fecha Ingreso</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                       
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>idproducto</th>
                                            <th>producto</th>
                                            <th>descripción</th>
                                            <th>cantidad</th>
                                            <th>precio unitario</th>
                                            <th>categoría</th>
                                            <th>proveedor</th>
                                            <th>fecha_ingreso</th>
                                            <th>estado</th>
                                            <th>acciones</th>
                                         
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php include("controlinventario/selectTableInventarioDelete.php") ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        
            
                </div>
                 <!--Fin Exampol Table -->
          

             <!--aqui va el Footer -->
              <!-- Footer -->
             <?php include ("includes/footer.php")?>
           
            