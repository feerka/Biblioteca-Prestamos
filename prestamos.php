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
                    <div class="col-sm-6"><h2><b>Lista de Prestamos</b></h2></div>
                    <div class="col-sm-3">
                        <a href="createprestamo.php" class="btn btn-secondary btn-lg active"><i class="fa fa-plus"></i>Crear prestamo</a>
                    </div>
                    <div class="col-sm-3">
                    
                    <a href="home.php" class="btn btn-secondary btn-lg active"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
                
  
<hr style="border-color:red;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>NumP</th>
                        <th>idCl</th>
                        <th>idLi</th>
                        <th>fechap</th>
                        <th>fechad</th>
                        <th>Operacion</th>
                    </tr>
                </thead>
				<?php 
				include ('database.php');
				$prestamo = new Database();
				$listado=$prestamo->readPrestamo();
				?>
                <tbody>
				<?php 
					while ($row=mysqli_fetch_object($listado)){
                        $nump =$row->nump;
						$idcl =$row->idcl;
						$idli =$row->idli;
                        $fechap=$row->fechap;
                        $fechad=$row->fechad;
                   
				?>
					<tr>
                    <td><?php echo $nump;?></td>
                    <td><?php echo $idcl;?></td>
                        <td><?php echo $idli;?></td>
                        <td><?php echo $fechap;?></td>
                        <td><?php echo $fechad;?></td>
                        <td>
						    <a href="updateprestamo.php?nump=<?php echo $nump;?>" class="edit" title="Editar" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                            <a href="deleteprestamo.php?nump=<?php echo $nump;?>" class="delete" title="Eliminar" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                        </td>
                    </tr>	
				<?php
					}
				?>


                
                    
                    
                          
                </tbody>
           
       
    </div>   
    <script type="text/javascript">
    function validarForm(formulario) 
    {
        if(formulario.palabra.value.length==0) 
        { //¿Tiene 0 caracteres?
            formulario.palabra.focus();  // Damos el foco al control
            alert('Debes rellenar este campo'); //Mostramos el mensaje
            return false; 
         } //devolvemos el foco  
         return true; //Si ha llegado hasta aquí, es que todo es correcto 
     }   
</script>  
</body>
</html>               