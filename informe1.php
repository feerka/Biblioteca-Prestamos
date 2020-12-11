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
                <div class="row">
                    <div class="col-sm-8"><h2><b>Informe 1</b></h2></div>
                    <div class="col-sm-4">
                    <a href="informes.php" class="btn btn-secondary btn-lg active"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
                <h4>Se muestra el titulo, el nombre con el apellido, el email y la provincia de los prestamos que se hayan realizado desde la provincia de Cordoba.</h4>
       <h4> "SELECT titulo, nombres, apellidos, correo_electronico, provincia
			 FROM libros as l inner join prestamo as p on l.id=p.idli 
			 inner join clientes as c on p.idcl=c.id where c.provincia ='Cordoba'";</h4>
<hr style="border-color:red;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                   
                        <th>Titulo</th>
                        <th>Nombre</th>
                        <th>E-mail</th>
                        <th>Provincia</th>
                    </tr>
                </thead>
				<?php 
				include ('database.php');
				$informe = new Database();
				$listado=$informe->readInforme1();
				?>
                <tbody>
				<?php 
					while ($row=mysqli_fetch_object($listado)){
						$titulo =$row->titulo;
                        $nombres=$row->nombres." ".$row->apellidos;
                        $email=$row->correo_electronico;
                        $provincia=$row->provincia;
                        
				?>
					<tr>
                    <td><?php echo $titulo;?></td>
                        <td><?php echo $nombres;?></td>
                        <td><?php echo $email;?></td>
                        <td><?php echo $provincia;?></td>
                      
                    </tr>	
				<?php
					}
				?>


                
                    
                    
                          
    
    </div>   
  
</body>
</html>               