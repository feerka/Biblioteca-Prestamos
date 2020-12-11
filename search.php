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
                    <div class="col-sm-8"><h2><b>Comentarios</b></h2></div>
                    <div class="col-sm-4">
                    
                    <a href="comentario.php" class="btn btn-secondary btn-lg active"><i class="fa fa-arrow-left"></i> Regresar</a>
                    </div>
                </div>
                <div class="row">
                
                <h4><b>Buscar comentario</b></h4>
<form method="POST" action="search.php" method="get" onSubmit="return validarForm(this)">
 
 <input type="text" placeholder="Ingrese id" name="palabra">

 <input type="submit" value="Buscar" name="buscar"> <i class="fa fa-search"></i>

</form>
<hr style="border-color:red;">
            <table class="table table-bordered">
                <thead>
                    <tr>
                    <th>Comentario</th>
                    <th>id</th>
                    
                    </tr>
                </thead>


                <?php 
                
         
				include ('database.php');
                $clientes = new Database();
                $palabra = $_POST['palabra'];
              
				$listado=$clientes->search($palabra);
				?>
                <tbody>
               
				<?php 
					while ($row=mysqli_fetch_object($listado)){
                        $comentario=$row->comentario;
						$id=$row->id;
                       
				?>
                
					<tr>
                    <td><?php echo $comentario;?></td>
                    <td><?php echo $id;?></td>
                       
                       
                    </tr>	
				<?php
					}
				?>


                
                    
                    
                 
        </div>
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