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
                    <div class="col-sm-8"><h2><b>Informe 6</b></h2></div>
                    <div class="col-sm-4">
                    <a href="informes.php" class="btn btn-secondary btn-lg active"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
                <h4>Mostrar numeros de prestamos, fechas de prestamos, fecha de devolucion, autor del libro y el id del cliente de los
                 prestamos en donde el autor del libro contega la silaba il o donde el cliente contenga la vocal a y sea de la provincia 
                 de Cucuta o Santa Fe. Ademas la fecha de prestamo debe ser no mayor a 8 meses y la fecha de devolucion debe ser no mayor
                  a 1 mes de la fecha actual.</h4>
       <h4> "select p.nump, p.fechap, p.fechad, l.autor, idcl from libros as l inner join prestamo as p on l.id=p.idli 
       inner join clientes as c on p.idcl=c.id where (idli = (select id from libros where autor like '%il%') OR idcl in 
       (select id from clientes where nombres like '%a%' and (provincia = 'Cucuta' or provincia ='Santa Fe' )))and 
       (fechap >= DATE_SUB(CURDATE(), INTERVAL 8 MONTH) and fechad >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH))";</h4>
           
<hr style="border-color:red;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                   
                        <th>Numero de Prestamo</th>
                        <th>Fecha de Prestamo</th>
                        <th>Fecha de Devolucion</th>
                        <th>Autor del Libro</th>
                        <th>ID del Cliente</th>
                    </tr>
                </thead>
				<?php 
				include ('database.php');
				$informe5 = new Database();
				$listado=$informe5->readInforme6();
				?>
                <tbody>
				<?php 
					while ($row=mysqli_fetch_object($listado)){
                        $nump =$row->nump;
                        $fechap=$row->fechap;
                        $fechad=$row->fechad;
                        $autor=$row->autor;
                        $idcl=$row->idcl;
                        
				?>
					<tr>
                    <td><?php echo $nump;?></td>
                    <td><?php echo $fechap;?></td>
                        <td><?php echo $fechad;?></td>
                        <td><?php echo $autor;?></td>
                        <td><?php echo $idcl;?></td>
                      
                    </tr>	
				<?php
					}
				?>
     
                    
                          
    
    </div>   
  
</body>
</html>               