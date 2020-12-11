<?php 
if (isset($_GET['id'])){
	include('database.php');
	$libros = new Database();
	$id=intval($_GET['id']);
	$res = $libros->deleteLibro($id);
	if($res){
		header('location: libros.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>