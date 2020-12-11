<?php 
if (isset($_GET['nump'])){
	include('database.php');
	$prestamo = new Database();
	$nump=intval($_GET['nump']);
	$res = $prestamo->deletePrestamo($nump);
	if($res){
		header('location: prestamos.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>