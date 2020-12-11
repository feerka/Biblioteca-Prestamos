<?php
	if (isset($_GET['id'])){
		$id=intval($_GET['id']);
	} else {
		header("location:libros.php");
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
                    <div class="col-sm-8"><h2> <b>Agregar Libro</b></h2></div>
                    <div class="col-sm-4">
                        <a href="libros.php" class="btn btn-secondary btn-lg active"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>


            <?php
				include ("database.php");
				$libros= new Database();
				if(isset($_POST) && !empty($_POST)){
					$titulo = $libros->sanitize($_POST['titulo']);
					$autor = $libros->sanitize($_POST['autor']);
                    $id=intval($_POST['id']);
                    $res = $libros->updateLibro($id, $titulo, $autor);
                     
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
					}else{
						$message="El ID del libro no existe, no se actualizaron los datos";
						$class="alert alert-danger";
					}
				
					?>
				<div class="<?php echo $class?>"><
				  <?php echo $message;?>
				 
				</div>	
					<?php
						
                }
                $datos_libro=$libros->single_record_libro($id);
			?>
			<form method="post">
			<div class="row">
				
				
				<div class="form-group col-md-6">
					<label>Titulo:</label>
					<input type="text" name="titulo" id="nombres" class='form-control' maxlength="100"  value="<?php echo $datos_libro->titulo;?>">
				</div>
				<div class="form-group col-md-6">
					<label>Autor:</label>
					<input type="text" name="autor" id="apellidos" class='form-control' maxlength="100" value="<?php echo $datos_libro->autor;?>">
				</div>
			
			<div class="col-md-12 pull-right">
				<hr>
					<button  type="submit" class="btn btn-secondary active">Actualizar Libro</button>
				</div>
			</div>
				</form>



			
        </div>
    </div>     
</body>
</html>                            