<?php
	if (isset($_GET['idco'])){
		$idco=intval($_GET['idco']);
	} else {
		header("location:comentario.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Fercadev</title>
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
		
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2> <b>Actualizar Comentario</b></h2></div>
                    <div class="col-sm-4">
                        <a href="comentario.php" class="btn btn-secondary btn-lg active"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				include ("database.php");
				$comentarios= new Database();
				if(isset($_POST) && !empty($_POST)){
					$id = $comentarios->sanitize($_POST['id']);
					$comentario = $comentarios->sanitize($_POST['comentario']);
					$res = $comentarios->updateComentario($idco, $id, $comentario);
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
					}else{
						$message="El ID del cliente no existe, no se pudieron actualizar los datos";
						$class="alert alert-danger";
					}
				
					?>
				<div class="<?php echo $class?>"><
				  <?php echo $message;?>
				</div>	
					<?php
						
                }
                $datos_comentario=$comentarios->single_record_comentario($idco);
			?>
			<form method="post">
			<div class="row">
				
				<div class="form-group col-md-6">
					<label>ID:</label>
					<input type="text" name="id" id="id" class='form-control' maxlength="10" required value="<?php echo $datos_comentario->id;?>">
				</div>
				
				
				</div>
				<div class="row">
				<div class="form-group col-md-12">
				<label for="comentario">Comentario</label>
				<textarea class="form-control" name="comentario" id="comentario" rows="6" required value="<?php echo $datos_comentario->comentario;?>"></textarea>
			</div>
			<div class="col-md-12 pull-right">
				<hr>
					<button  type="submit" class="btn btn-secondary active" style="margin-bottom:20px;margin-top:-25px;">Actualizar Comentario</button>
				</div>
			</div>
				</form>



			
        </div>
    </div>     
</body>
</html>                            