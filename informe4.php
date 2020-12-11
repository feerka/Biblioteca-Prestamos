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
                    <div class="col-sm-8"><h2><b>Informe 4</b></h2></div>
                    <div class="col-sm-4">
                    <a href="informes.php" class="btn btn-secondary btn-lg active"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
                <h4>Se muestra el numero y  la fecha de prestamo, el id y el titulo del libro donde la fecha de prestamo se realizo hace un año y donde el titulo del libro contiene la palabra programacion.</h4>
       <h4> "select p.nump, p.fechap, p.idli, l.titulo from prestamo as p inner join libros as l on l.id=p.idli  where idli = any(select id from libros where titulo like '%programacion%') 
			and fechap >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) ";</h4>
           
<hr style="border-color:red;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                   
                        <th>Numero de Prestamo</th>
                        <th>Fecha de Prestamo</th>
                        <th>ID del Libro</th>
                        <th>Titulo del Libro</th>
                    </tr>
                </thead>
				<?php 
				include ('database.php');
				$informe4 = new Database();
				$listado=$informe4->readInforme4();
				?>
                <tbody>
				<?php 
					while ($row=mysqli_fetch_object($listado)){
                        $nump =$row->nump;
                        $fechap=$row->fechap;
                        $idli=$row->idli;
                        $titulo=$row->titulo;
                        
				?>
					<tr>
                    <td><?php echo $nump;?></td>
                        <td><?php echo $fechap;?></td>
                        <td><?php echo $idli;?></td>
                        <td><?php echo $titulo;?></td>
                      
                    </tr>	
				<?php
					}
				?>


                
                    
                    
                          
    
    </div>   
  
</body>
</html>               