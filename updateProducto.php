<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Actualizar Producto </title>
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
                    <div class="col-sm-10"><h2>Editar <b>Producto</b></h2></div>
                    <div class="col-sm-2">
                        <a href="indexProducto.php" class="btn btn-info add-new"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            
            <?php
				
				include ("dataBaseProducto.php");
				$Productos= new dataBaseProducto();
                
                
                if(isset($_POST) && !empty($_POST)){
                    $nombre = $Productos->sanitize($_POST['nombre']);
                    $descripcion = $Productos->sanitize($_POST['descripcion']);
                    $valor = $Productos->sanitize($_POST['valor']);
                    $tienda = $Productos->sanitize($_POST['tienda']);
                    $imagen = $Productos->sanitize($_POST['imagen']);
                    $sku_producto= intval($_POST['sku_producto']);

					$res = $Productos->updateProducto($nombre, $descripcion, $valor, $tienda, $imagen, $sku_producto);
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
				//$datos_producto=$Productos->single_record();
			?>

			<div class="row">
				<form method="post">
				<div class="col-md-6">
					<label for="nombre">Nombre:</label>
					<input type="text" name="nombre" id="nombre" class='form-control' maxlength="100" required >
					<input type="hidden" name="sku_producto" id="sku_producto" class='form-control' maxlength="100" >
				</div>
				<div class="col-md-6">
					<label for="descripcion">Descripcion:</label>
					<textarea  name="descripcion" id="descripcion" class='form-control' maxlength="255" rows="1" required></textarea >
				</div>
				<div class="col-md-6">
					<label for="valor">Valor:</label>
					<input type="text" name="valor" id="valor" class='form-control' maxlength="15" required >
				</div>
				<div class="col-md-6">
					<label for="tienda">Tienda:</label>
					<input type="text" name="tienda" id="tienda" class='form-control' maxlength="64" required >
				
				</div>
                <div class="col-md-6">
					<label for="imagen">Imagen:</label>
					<input type="file" name="imagen" id="imagen" class='form-control' maxlength="64"  >
				|   
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