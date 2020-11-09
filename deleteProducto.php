<?php 
if (isset($_GET['SKU'])){
	include('dataBaseProducto.php');
	$Productos = new dataBaseProducto();
	$sku=intval($_GET['SKU']);
	$res = $Productos->deleteProducto($sku);
	if($res){
		header('location: indexProducto.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>