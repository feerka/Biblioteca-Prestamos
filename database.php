
<?php

	class Database{
		private $con;
		private $dbhost="localhost";
		private $dbuser="root";
		private $dbpass="";
		private $dbname="clientecp";
		function __construct(){
			$this->connect_db();
		}
		public function connect_db(){
			$this->con = mysqli_connect($this->dbhost, $this->dbuser, $this->dbpass, $this->dbname);
			if(mysqli_connect_error()){
				die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
			}
		}
	
		

public function inicioS( $email, $password){
	$sql = "SELECT email, password FROM administrador WHERE email = '$email'";
	$res = mysqli_query($this->con, $sql);
	return $res;
}
		public function sanitize($var){
			$return = mysqli_real_escape_string($this->con, $var);
			return $return;
		}
	
		public function createClien($id, $nombres, $apellidos, $telefono, $direccion,$provincia, $correo_electronico){
			$sql = "INSERT INTO `clientes` (id, nombres, apellidos, telefono, direccion, provincia, correo_electronico ) 
			VALUES ('$id', '$nombres', '$apellidos', '$telefono', '$direccion', '$provincia', '$correo_electronico')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function createPrestamo($idcl, $idli, $fechap, $fechad){
			$sql = "INSERT INTO `prestamo` (idcl, idli, fechap, fechad) 
			VALUES ('$idcl', '$idli', '$fechap', '$fechad')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		
		public function createAdministrador( $nombre,$email, $password){
			$sql = "INSERT INTO `administrador` (nombre, email, password) 
			VALUES ('$nombre', '$email', '$password')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}


		public function createLibro($id, $titulo, $autor){
			
			$sql = "INSERT INTO `libros` (id, titulo, autor) 
			VALUES ('$id', '$titulo', '$autor')";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
			
		}


		public function createCom($comentario,$id){
		$sql = "INSERT INTO `comentarios` (comentario,id) VALUES ('$comentario','$id')";
		$res = mysqli_query($this->con, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
	}

		public function readPrestamo(){
			$sql = 'SELECT * FROM prestamo';
			$res = mysqli_query($this->con, $sql);
			return $res;
		}

		public function readComentario(){
			$sql = 'SELECT * FROM comentarios';
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		public function readInforme1(){
			$sql = "SELECT titulo, nombres, apellidos, correo_electronico, provincia
			 FROM libros as l inner join prestamo as p on l.id=p.idli 
			 inner join clientes as c on p.idcl=c.id where c.provincia ='Cordoba'";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		public function readInforme2(){
			$sql = " SELECT l.titulo, l.autor, c.nombres, c.apellidos, c.id FROM libros as l inner join prestamo as p on l.id=p.idli inner join clientes as c on p.idcl=c.id 
			where (c.nombres like '%lo%' or c.apellidos like '%lo%') or l.titulo like '%lo%' GROUP BY c.nombres";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		public function readInforme3(){
			$sql = " SELECT l.titulo, l.autor, c.nombres, c.apellidos, provincia
			FROM libros as l inner join prestamo as p on l.id=p.idli 
			inner join clientes as c on p.idcl=c.id where c.provincia ='Mendoza' and l.autor = 'Robin Sharma'";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		public function readInforme4(){
			$sql = "select p.nump, p.fechap, p.idli, l.titulo from prestamo as p inner join libros as l on l.id=p.idli  where idli = any(select id from libros where titulo like '%programacion%') 
			and fechap >= DATE_SUB(CURDATE(), INTERVAL 1 YEAR) ";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		public function readInforme5(){
			$sql = "select p.nump, p.fechad, l.titulo, c.nombres from libros as l inner join 
			prestamo as p on l.id=p.idli inner join clientes as c on p.idcl=c.id where 
			(idli = any(select id from libros where titulo like '%inteligencia%')
			 OR idcl in (select id from clientes where nombres like '%Fernando%' and provincia = 'Buenos Aires'))
			 and fechad >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH)";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		public function readInforme6(){
			$sql = "select p.nump, p.fechap, p.fechad, l.autor, idcl from libros as l inner join prestamo as p on l.id=p.idli 
			inner join clientes as c on p.idcl=c.id where (idli = (select id from libros where autor like '%il%') OR idcl in
			 (select id from clientes where nombres like '%a%' and (provincia = 'Cucuta' or provincia ='Santa Fe' )))and
			  (fechap >= DATE_SUB(CURDATE(), INTERVAL 8 MONTH) and fechad >= DATE_SUB(CURDATE(), INTERVAL 1 MONTH))";
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		public function read(){
			$sql = 'SELECT * FROM clientes';
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		
		public function single_record($id){
			$sql = "SELECT * FROM clientes where id='$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}

		public function single_record_libro($id){
			$sql = "SELECT * FROM libros where id='$id'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}

		public function single_record_comentario($idco){
			$sql = "SELECT * FROM comentarios where idco='$idco'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}
		
		
		public function single_record_prestamo($nump){
			$sql = "SELECT * FROM prestamo where nump='$nump'";
			$res = mysqli_query($this->con, $sql);
			$return = mysqli_fetch_object($res );
			return $return ;
		}
		
		public function update($nombres,$apellidos,$telefono,$direccion,$correo_electronico, $id){
			$sql = "UPDATE clientes SET nombres='$nombres', apellidos='$apellidos', telefono='$telefono', direccion='$direccion', correo_electronico='$correo_electronico' WHERE id=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function updateLibro($id, $titulo, $autor){
			$sql = "UPDATE libros SET id='$id', titulo='$titulo', autor='$autor' WHERE id=$id";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function updateComentario($idco, $id, $comentario ){
			$sql = "UPDATE comentarios SET id='$id', comentario='$comentario' WHERE idco=$idco";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function updatePrestamo($nump, $idcl, $idli, $fechap, $fechad){
			$sql = "UPDATE prestamo SET idli='$idli',idcl='$idcl', fechap='$fechap', fechad='$fechad' WHERE nump=$nump";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function delete($id){
			$sql = "DELETE FROM clientes WHERE id='$id'";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function deleteComentario($idco){
			$sql = "DELETE FROM comentarios WHERE idco='$idco'";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function deletePrestamo($nump){
			$sql = "DELETE FROM prestamo WHERE nump='$nump'";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function deleteLibro($id){
			$sql = "DELETE FROM libros WHERE id='$id'";
			$res = mysqli_query($this->con, $sql);
			if($res){
				return true;
			}else{
				return false;
			}
		}
		public function search($palabra){
			$sql = "SELECT * FROM clientes as cl inner join comentarios as co on cl.id=co.id where cl.id like '%$palabra%'" ;
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		public function searchlibros($palabra){
			$sql = "SELECT * FROM libros as l where l.titulo like '%$palabra%' or l.autor like '%$palabra%' or l.id like '%$palabra%'" ;
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
		public function readlibros(){
			$sql = "SELECT * FROM libros" ;
			$res = mysqli_query($this->con, $sql);
			return $res;
		}
	}
?>
	

