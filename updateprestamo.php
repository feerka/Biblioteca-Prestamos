<?php
	if (isset($_GET['nump'])){
		$nump=intval($_GET['nump']);
	} else {
		header("location:prestamos.php");
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
                    <div class="col-sm-8"><h2> <b>Actualizar prestamo</b></h2></div>
                    <div class="col-sm-4">
                        <a href="prestamos.php" class="btn btn-secondary btn-lg active"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				include ("database.php");
				$prestamo= new Database();
				if(isset($_POST) && !empty($_POST)){
                    $idcl = $prestamo->sanitize($_POST['idcl']);
                    $idli = $prestamo->sanitize($_POST['idli']);
					$fechap = $prestamo->sanitize($_POST['fechap']);
					$fechad = $prestamo->sanitize($_POST['fechad']);
					$res = $prestamo->updatePrestamo($nump, $idcl, $idli, $fechap, $fechad);
                     
					if($res){
						$message= "Datos actualizados con éxito";
						$class="alert alert-success";
					}else{
						$message="No se pudieron actualizar los datos, el ID del libro o del cliente no existen";
						$class="alert alert-danger";
					}
				
					?>
				<div class="<?php echo $class?>"><
				  <?php echo $message;?>
				</div>	
					<?php
						
				}
				$datos_prestamo=$prestamo->single_record_prestamo($nump);
			?>
			<form method="post">
			<div class="row">
				
				<div class="form-group col-md-6">
					<label>ID del libro:</label>
					<input type="text" name="idli"  class='form-control' maxlength="10" required value="<?php echo $datos_prestamo->idli;?>">
				</div>
				<div class="form-group col-md-6">
					<label>ID del cliente:</label>
					<input type="text" name="idcl"  class='form-control' maxlength="100" value="<?php echo $datos_prestamo->idcl;?>" >
				</div>
                <div class="form-group col-md-6">
					<label>Fecha de prestamo:</label>
					<input type="text" name="fechap"  class='form-control' maxlength="100" value="<?php echo $datos_prestamo->fechap;?>" >
				</div>
                <div class="form-group col-md-6">
					<label>Fecha de devolución:</label>
					<input type="text" name="fechad"  class='form-control' maxlength="100" value="<?php echo $datos_prestamo->fechad;?>" >
				</div>
			<div class="col-md-12 pull-right">
				<hr>
					<button  type="submit" class="btn btn-secondary active">Actualizar prestamo</button>
				</div>
			</div>
				</form>		
        </div>
    </div>     
</body>
</html>                            