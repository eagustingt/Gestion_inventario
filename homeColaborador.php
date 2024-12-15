<?php   session_start();  ?>

<?php
   if(isset($_COOKIE['usuarioCookie'])){
       $nombre=$_COOKIE['usuarioCookie'];
   }else{
       header("location: ../index.php");
   }
?>

<!DOCTYPE html>
<html lang="en">

 <!-- aqui va header-->
 <?php include ("includes/header.php")?>
 <?php include ("db.php")?>



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


            
                <!-- Aqui va el Topbar -->
                <?php include ("includes/topbar.php")?>
                <!-- Topbar -->
                
                <!-- End of Topbar -->





                <!-- Begin Page Content -->
                <div class="container-fluid">

                            <!-- Page Heading -->
                            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                <h1 class="h3 mb-0 text-gray-800">Dashboard Inventario</h1>
                                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                        class="fas fa-download fa-sm text-white-50"></i> Generer Reporte</a>
                            </div>
                            <!-- Page Heading -->



                    <!-- Content Row 1 -->
                    <div class="row">

                          <!--precio total card  -->
                       <?php 
                        $query = "SELECT SUM(cantidad*precio_unitario) AS total FROM inventario";
                        $result = $conn->query($query);

                        if($fila= $result->fetch_assoc()){
                            echo '
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card border-left-primary shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            Total costos</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Q'
                                                           .number_format($fila['total'], 2).
                                                        '</div>
                                                    </div>
                                                        <div class="col-auto">
                                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                                '; 
                             }
                        ?>
                         <!--fin precio total card  -->

                             <!--productos productos disponibles card  -->
                        <?php
                        $query = "SELECT SUM(cantidad) AS total_productos FROM inventario";
                        $result = $conn->query($query);

                        if($fila= $result->fetch_assoc()){
                            echo '
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card border-left-primary shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            Total de productos disponibles</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Q'
                                                           .number_format($fila['total_productos']).
                                                        '</div>
                                                    </div>
                                                        <div class="col-auto">
                                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                                '; 
                             }
                        ?>
                         <!--fin productos productos disponibles card  -->

                         


                              <!--total proveedores card  -->
                        <?php
                        $query = "SELECT SUM(id_proveedor) AS total_proveedores FROM inventario";
                        $result = $conn->query($query);

                        if($fila= $result->fetch_assoc()){
                            echo '
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card border-left-primary shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            Total de proveedores</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Q'
                                                           .number_format($fila['total_proveedores']).
                                                        '</div>
                                                    </div>
                                                        <div class="col-auto">
                                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                                '; 
                             }
                        ?>
                         <!--fin productos productos disponibles card  -->


                         
                              <!--total proveedores card  -->
                        <?php
                        $query = "SELECT c.nombre_categoria, SUM(i.cantidad*i.precio_unitario) as totalxcategoria 
                        FROM inventario i 
                        join categorias c ON c.id_categoria=i.id_categoria
                        WHERE c.nombre_categoria='Libreria'
                        GROUP by c.nombre_categoria";
                        $result = $conn->query($query);

                        if($fila= $result->fetch_assoc()){
                            echo '
                                    <div class="col-xl-3 col-md-6 mb-4">
                                        <div class="card border-left-primary shadow h-100 py-2">
                                            <div class="card-body">
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                            Total de costos por categoria Libreria</div>
                                                        <div class="h5 mb-0 font-weight-bold text-gray-800">Q'
                                                           .number_format($fila['totalxcategoria'],2).
                                                        '</div>
                                                    </div>
                                                        <div class="col-auto">
                                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            
                                '; 
                             }
                        ?>
                         <!--fin productos productos disponibles card  -->



                        <!--  Card 2 Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Titulo</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">precio</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-sack-dollar fa-2x text-gray-300"></i>  
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--fin  Card 2 Example -->

                      


                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Earnings (Annual)</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                </div>
                                                <div class="col">
                                                    <div class="progress progress-sm mr-2">
                                                        <div class="progress-bar bg-info" role="progressbar"
                                                            style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                            aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Edgar Agustin</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pending Requests Card Example -->


                    </div>
                    <!-- FIN Content Row 1 -->


                    <!-- Content Row 2-->
                    <!-- Grafica COLUMNAS / PIE 1 --> 
                    <div class="row">

                        <!-- Area Grafica de barras producto por categoria -->
                        <div class="col-xl-7 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary"> Cantidad de Productos por Categorias</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <div id="graficoCol1">Grafico 1</div>
                                </div>
                            </div>
                        </div>
                         <!-- FIN Area Grafica de barras producto por categoria -->



                        <!--Area grafica de  Pie producto por proveedor -->
                        <div class="col-xl-5 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">% Cantidad de Productos por Proveedor</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                     <div id="graficoPie1" class= "grafico">Grafico 2</div>
                                </div>
                            </div>
                        </div>
                        <!--Area grafica de  Pie producto por proveedor -->

                    </div>
                    <!-- FIN Content Row  2 -->
                    <!-- FIN Grafica COLUMNAS / PIE 1 --> 




                    <!-- Content Row 3-->
                    <!-- Grafica COLUMNAS / PIE 2 --> 
                    <div class="row">

                        <!-- Area Grafica de barras producto por categoria 2 -->
                        <div class="col-xl-7 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Costo de Productos por Categoria</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                <div id="graficoCol2">Grafico 3</div>
                                </div>
                            </div>
                        </div>
                         <!-- FIN Area Grafica de barras producto por categoria -->



                        <!--Area grafica de  Pie producto por proveedor -->
                        <div class="col-xl-5 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">% Costo  de Productos por Proveedor</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                     <div id="graficoPie2" class= "grafico">Grafico 4</div>
                                </div>
                            </div>
                        </div>
                        <!--Area grafica de  Pie producto por proveedor -->

                    </div>
                    <!-- FIN Content Row  3 -->
                    <!-- FIN Grafica COLUMNAS / PIE 2 --> 



                    






                    <!-- Content Row 4-->
                    <div class="row">


                        <!-- Content Column 2 -->
                        <div class="col-lg-6 mb-4">


                                <!-- Project Card Example -->
                                <div class="card shadow mb-4">

                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Projects</h6>
                                    </div>

                                    <div class="card-body">


                                    <P>PROYECTS</P>

                                        
                                        
                                    </div>

                                </div>
                                <!-- FIN  Project Card Example -->



                                <!-- Color System -->
                                <div class="row">

                                    <div class="col-lg-6 mb-4">

                                        <div class="card bg-primary text-white shadow">

                                                <div class="card-body">
                                                    Primary
                                                
                                                </div>

                                        </div>

                                    </div>

                                </div>
                                <!--FIN Color System -->
                            

                        </div>
                        <!--fin Content Column 2 -->





                        <!-- Content Column 3 -->
                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
                                </div>
                                
                                <div class="card-body">
                                    <div class="text-center">
                                        <P>Ilustration</P>
                                    </div>
                                   
                                </div>
                            </div>
                             <!-- FIN Illustrations -->



                            <!-- Approach -->
                            <div class="card shadow mb-4">

                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
                                </div>

                                <div class="card-body">
                                    <p>Enfoque del desarrollo</p>
                                 
                                </div>

                            </div>
                             <!-- FIN Approach -->                             

                        </div>
                        <!--FIN Content Column 3 -->




                    </div>
                    <!-- Content Row 4-->


                </div>
                <!-- FIN  Begin Page Content -->



            </div>
            <!-- End of Main Content -->

            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                                
            <!--    grafica ColumnChart 1 barras -->
            <script type="text/javascript" src="script_graficos/ColumnChart.js"></script>
            <!-- FIN grafica ColumnChart 1 barras -->
            
            <!-- grafica PieChart 1 Dona-->
            <script type="text/javascript" src="script_graficos/PieChart.js"></script>
            <!-- grafica PieChart 1 Dona -->

            <!--     grafica ColumnChart 2 barras -->
            <script type="text/javascript" src="script_graficos/ColumnChart2.js"></script>
            <!-- FIN grafica ColumnChart 2 barras -->
            
            <!-- grafica PieChart 2 Dona-->
            <script type="text/javascript" src="script_graficos/PieChart2.js"></script>
            <!-- grafica PieChart 2 Dona -->


            <!--aqui va el Footer -->
            <?php include ("includes/footer.php")?>
            