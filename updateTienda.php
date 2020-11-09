<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Actualizar Tienda </title>
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
                    <div class="col-sm-10"><h2>Editar <b>Tienda</b></h2></div>
                    <div class="col-sm-2">
                        <a href="indexTienda.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            
            <?php
				
				include ("dataBaseTienda.php");
				$Tienda= new dataBaseTienda();
                
                
                if(isset($_POST) && !empty($_POST)){
                    $nombre = $Tienda->sanitize($_POST['nombre']);
					$fecha_apertura = $Tienda->sanitize($_POST['fecha_apertura']);
					$ID_tienda=intval($_POST['ID_tienda']);
                  
					$res = $Tienda->updateTienda($nombre, $fecha_apertura, $ID_tienda);
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
						
					}else{
						$message="No se pudieron actualizar los datos";
						$class="alert alert-danger";
					}
					
					?>
				<div class="<?php echo $class?>">
				  <?php echo $message;?>
				</div>	
				<?php
				}
				
			?>

			<div class="row">
				<form method="post">
				<div class="col-md-6">
					<label for="nombre">Nombre:</label>
					<input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required>
					<input type="hidden" name="ID_tienda" id="ID_tienda" class='form-control' maxlength="100" >
				</div>
				<div class="col-md-6">
					<label for="fecha_apertura">Fecha de apertura:</label>
					<input type="date" name="fecha_apertura" id="fecha_apertura" class='form-control' maxlength="255"  required></input>
				</div>
				
				<div class="col-md-12 pull-right">
				<hr>
					<button type="submit" class="btn btn-success">Actualizar datos</button>
				</div>
			</form>
            <div>
        </div>
    </div>     
</body>
</html>