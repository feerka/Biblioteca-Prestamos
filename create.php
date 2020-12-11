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
                    <div class="col-sm-8"><h2> <b>Agregar Cliente</b></h2></div>
                    <div class="col-sm-4">
                        <a href="clientes.php" class="btn btn-secondary btn-lg active"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
            </div>
            <?php
				include ("database.php");
				$clientes= new Database();
				if(isset($_POST) && !empty($_POST)){
					$id = $clientes->sanitize($_POST['id']);

					$nombres = $clientes->sanitize($_POST['nombres']);
					$apellidos = $clientes->sanitize($_POST['apellidos']);
					$telefono = $clientes->sanitize($_POST['telefono']);
					$direccion = $clientes->sanitize($_POST['direccion']);
					$provincia = $clientes->sanitize($_POST['provincia']);
					$correo_electronico = $clientes->sanitize($_POST['correo_electronico']);
					$res = $clientes->createClien($id, $nombres, $apellidos, $telefono, $direccion,$provincia, $correo_electronico);
				
					if($res){
						$message= "Datos insertados con éxito";
						$class="alert alert-success";
					}else{
						$message="No se pudieron insertar los datos";
						$class="alert alert-danger";
					}
				
					?>
				<div class="<?php echo $class?>"><
				  <?php echo $message;?>
				</div>	
					<?php
						
				}
			?>
			<form method="post">
			<div class="row">
				
				<div class="form-group col-md-6">
					<label>ID:</label>
					<input type="text" name="id" id="id" class='form-control' maxlength="10" required >
				</div>
				<div class="form-group col-md-6">
					<label>Nombres:</label>
					<input type="text" name="nombres" id="nombres" class='form-control' maxlength="100" required  >
				</div>
				<div class="form-group col-md-6">
					<label>Apellidos:</label>
					<input type="text" name="apellidos" id="apellidos" class='form-control' maxlength="100" required>
				</div>
				<div class="form-group col-md-12">
					<label>Dirección:</label>
					<textarea  name="direccion" id="direccion" class='form-control' maxlength="255" ></textarea>
				</div>
				<div class="form-group col-md-6">
					<label>Teléfono:</label>
					<input type="text" name="telefono" id="telefono" class='form-control' maxlength="15"  required>
				</div>
				<div class="form-group col-md-6">
					<label>Correo electrónico:</label>
					<input type="email" name="correo_electronico" id="correo_electronico" class='form-control' maxlength="64"  >
				
				</div>
				<div class="form-group col-sm-3">
                   <label for="prov">Provincia</label>
					<select id="prov" class="form-control" name = "provincia">
						<option selected>Cucuta</option>
						<option>Buenos Aires</option>
						<option>Cordoba</option>
						<option>Santa Fe</option>
						<option>Mendoza</option>
					</select>
			</div>



				
				
				
				</div>
				
			<div class="col-md-12 pull-right">
				<hr>
					<button  type="submit" class="btn btn-secondary active" style="margin-bottom:20px;margin-top:-25px;">Agregar Cliente</button>
				</div>
			</div>
				</form>



			
        </div>
    </div>     
</body>
</html>                            