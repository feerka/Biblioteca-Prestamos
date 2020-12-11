<?php 
if (isset($_GET['idco'])){
	include('database.php');
	$comentario = new Database();
	$idco=intval($_GET['idco']);
	$res = $comentario->deleteComentario($idco);
	if($res){
		header('location: comentario.php');
	}else{
		echo "Error al eliminar el registro";
	}
}
?>