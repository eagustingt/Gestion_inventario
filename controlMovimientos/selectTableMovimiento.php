<?php 
        $query = "SELECT m.id_movimiento, m.tipo_movimiento, m.cantidad, m.fecha_movimiento, m.observacion, i.producto
                  FROM	movimientos m
                  JOIN inventario i ON m.id_producto= i.id_producto
                  ";
                      
        $result= $conn->query($query);

        while($row = $result->fetch_assoc()){
        ?>

        <tr>
               <!-- pendiente para asignar variables -->
               <td><?php echo $row['id_movimiento'];  ?></td>
               <td><?php echo $row['producto'];  ?></td>
               <td><?php echo $row['tipo_movimiento'];  ?></td>
               <td><?php echo $row['cantidad'];  ?></td>
               <td><?php echo $row['fecha_movimiento'];  ?></td>
               <td><?php echo $row['observacion'];  ?></td>
               
                <!-- 
                        <td> 
                            <a href="controlusuarios/updateusuario.php?id=<?php echo $row['id_movimiento']; ?>" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#UpdateModal" data-bs-whatever="@mdo">actualizar</a>
                            <a href="controlusuarios/deleteusuarios.php?id=<?php echo $row['id_movimiento'];?>" class= "btn btn-danger">Eliminar </a>
                        </td>

                -->

                    

        </tr>
        <?php }?>

       
















