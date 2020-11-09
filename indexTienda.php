<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista de Tiendas</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 
</head>
<body>
    <div class="container">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Listado de  <b>Tiendas</b></h2></div>
                    <div class="col-sm-2">
                        <a href="indexProducto.php" class="btn btn-info add-new"><i class="fa fa-arrow-left" style="transform: rotate(180deg)"></i> Listado de productos</a>
                    </div>
                    <div class="col-sm-2">
                        <a href="createTienda.php" class="btn btn-info add-new"><i class="fa fa-plus"></i> Agregar Tienda</a>
                    </div>              
            </div>
            
            <div class="row">
               <div class="col-sm-12">
                    <table class="table table-bordered ">
                        <thead>
                            <tr class="bg-primary">
                                <th style="text-align: center">ID</th>
                                <th style="text-align: center">Nombre</th>
                                <th style="text-align: center">Fecha_apertura</th>	
                                <th style="text-align: center">Acciones</th>	                    
                            </tr>
                        </thead>
                 
                        <tbody> 

                        <?php 
                        /*
                          incluimos el archivo de clase de base de datos dataBase.php en el 
                          archivo index.php para instanciar a la clase de base de datos.
                        */
                        include ('dataBaseTienda.php');
                        include ('dataBaseProducto.php');

                        $Productos= new dataBaseProducto();
                        $Tienda= new dataBaseTienda();
                        $listado_Tiendas=$Tienda->readTienda();

                        while ($row=mysqli_fetch_object($listado_Tiendas)){
                            
                           
                            $ID=$row->ID;
                            $nombre=$row->Nombre;
                            $fecha_apertura=$row->Fecha_apertura;
                            
        
                        ?>
                        <tr>
                           <td style="text-align: center"><?php echo $ID;?></td>
                           <td style="text-align: center"><?php echo $nombre;?></td>
                           <td style="text-align: center"><?php echo $fecha_apertura;?></td>
                          
                           <td style="text-align: center">
                              <a href="updateTienda.php?ID=<?php echo $ID;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                              <a href="deleteTienda.php?ID=<?php echo $ID;?>" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                           </td>
                        </tr>	
                        <?php
                        }
                        ?>          
                        </tbody>
                   </table>
                </div>
            </div>
        </div>
    </div>     
</body>
</html>