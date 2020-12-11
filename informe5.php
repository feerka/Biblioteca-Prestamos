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
                    <div class="col-sm-8"><h2><b>Informe 5</b></h2></div>
                    <div class="col-sm-4">
                    <a href="informes.php" class="btn btn-secondary btn-lg active"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
                <h4>Se muestra el numero y la fecha de devolucion del prestamo, el titulo del libro y el nombre del cliente donde la fecha de devolucion se realizo hace no más de 3 meses, donde 
                el titulo del libro contiene la palabra inteligencia y el nombre del Cliente es Fernando y es de la ciudad de Buenos Aires. Cualquiera de la 2 o 3era opción</h4>
       <h4> "select p.nump, p.fechad, l.titulo, c.nombres from libros as l inner join 
			prestamo as p on l.id=p.idli inner join clientes as c on p.idcl=c.id where 
			(idli = any(select id from libros where titulo like '%inteligencia%')
			 OR idcl in (select id from clientes where nombres like '%Fernando%' and provincia = 'Buenos Aires'))
			 and fechad >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH)";</h4>
           
<hr style="border-color:red;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                   
                        <th>Numero de Prestamo</th>
                        <th>Titulo del Libro</th>
                        <th>Nombre del Cliente</th>
                        <th>Fecha de devolucion</th>
                    </tr>
                </thead>
				<?php 
				include ('database.php');
				$informe5 = new Database();
				$listado=$informe5->readInforme5();
				?>
                <tbody>
				<?php 
					while ($row=mysqli_fetch_object($listado)){
                        $nump =$row->nump;
                        $titulo=$row->titulo;
                        $nombres=$row->nombres;
                        $fechad=$row->fechad;
                        
				?>
					<tr>
                    <td><?php echo $nump;?></td>
                        <td><?php echo $titulo;?></td>
                        <td><?php echo $nombres;?></td>
                        <td><?php echo $fechad;?></td>
                      
                    </tr>	
				<?php
					}
				?>
     
                    
                          
    
    </div>   
  
</body>
</html>               