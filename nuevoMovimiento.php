

 <!-- aqui va el header -->
<!--  header -->
 <?php include ("includes/header.php");
       include ("db.php") 
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
                    <h1 class="h3 mb-4 text-gray-800">Nuevo Movimiento</h1>

                </div>
                <!-- /.container-fluid -->

                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Ingresar nuevo Movimiento</h6>

                            <!-- inicio modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Ingresar Movimiento</button>
                           
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de Movimientos</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                    <div class="modal-body">
                                        <form action="controlMovimientos/createMovimiento.php" method="POST">


                                                <!-- 
                                                <div class="mb-3">
                                                    <label for="producto">Producto</label>
                                                    <input type="text" name="producto" class="form-control" require>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="descripción">Descripción</label>
                                                    <input type="text" name="descripción" class="form-control" require>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="cantidad">Cantidad</label>
                                                    <input type="number" name="cantidad" class="form-control" require>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="precio_unitario">Precio Unitario</label>
                                                    <input type="number" step="0.01" name="precio_unitario" class="form-control" require>
                                                </div>


                                                -->



                                                    <!-- inicia select proveedor -->
                                                <div class="mb-3">
                                                   <?php
                                                    $query = "SELECT id_producto, producto FROM inventario";
                                                    $result = $conn->query($query);

                                                    if($result->num_rows>0){
                                                        echo '<label for="proveedor">Producto</label>';
                                                        echo '<select name="producto" class="form-select">';
                                                    while($row = $result->fetch_assoc()){
                                                        echo '<option value="'.$row['id_producto'].'">'.$row['producto'].'</option>';
                                                    }
                                                    echo '</select>';
                                                    } else
                                                    {
                                                        echo 'no hay Movimientos';
                                                    }
                                                   ?>
                                                </div>
                                                    <!-- fin select proveedor -->
                                                    


                                                 <!-- inicia select categoria -->  
                                                <div class="mb-3">
                                                <?php
                                                $query = "SELECT distinct tipo_movimiento FROM movimientos";
                                                $result = $conn->query($query);

                                                if( $result->num_rows>0){
                                                    echo '<label for="tipo_movimiento">Tipo de Movimiento</label>';
                                                    echo '<select name="tipo_movimiento" class="form-select">';
                                                while($row = $result->fetch_assoc()){
                                                    echo '<option value=   "'.$row['tipo_movimiento'].'">   '.$row['tipo_movimiento'].'   </option>';
                                                }
                                                echo '</select>';
                                                } else
                                                {
                                                    echo 'no hay categorias';
                                                }
                                                ?>
                                                </div>
                                                <!-- fin select categoria -->



                                                <div class="mb-3">
                                                    <label for="cantidad">Cantidad</label>
                                                    <input type="number" name="cantidad" class="form-control" require>

                                                    <div class="mb-3">
                                                    <label for="observacion">Observacion</label>
                                                    <textarea name="observacion" class="form-control" require></textarea>
                                                </div>
                                                </div>
                                            <!--  </div> -->
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="submit" name="submit" class="btn btn-primary">Agregar</button>
                                                </div>
                                        </form>
                                    </div>
                            </div>
                            </div>


                            <!-- fin modal -->
                            

                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
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
                                        
                                         
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php include("controlinventario/selectTableInventario.php") ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                </div>



            </div>
            <!-- End of Main Content -->

             <!--aqui va el Footer -->
              <!-- Footer -->
             <?php include ("includes/footer.php")?>
           
            