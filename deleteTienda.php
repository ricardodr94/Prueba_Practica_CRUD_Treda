<?php 
if (isset($_GET['ID'])){
	include('dataBaseTienda.php');
	$Tienda = new dataBaseTienda();
	$ID=intval($_GET['ID']);
	$res = $Tienda->deleteTienda($ID);
	if($res){
		header('location: indexTienda.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>