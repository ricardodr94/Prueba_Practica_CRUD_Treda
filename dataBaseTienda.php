<?php

class dataBaseTienda{

	private $con;
	private $userServer="localhost";
	private $userName="root";
	private $password="";
    private $dataBase="crud_tienda_producto";
    
	function __construct(){
		$this->connect_db();
    }
    
	public function connect_db(){
		$this->con = mysqli_connect($this->userServer, $this->userName, $this->password, $this->dataBase);
		if(mysqli_connect_error()){
			die("Conexión a la base de datos falló " . mysqli_connect_error() . mysqli_connect_errno());
		}else{
            //echo "conexion exitosa a base de datos";
        }
    }
    
	/*
	
	El metodo sanitize se encarga de limpiar las variables antes de poder registrar en la base de datos, esto se hace para evitar 
	posibles inyecciones SQL en la base de datos.

	*/
    public function sanitize($var){
         $return = mysqli_real_escape_string($this->con, $var);
         return $return;
	}
	
	/*
      El método “create” se encargará de guardar los datos en nuestra base de datos mysql.
	*/

    public function createTienda( $nombre, $fecha_apertura ){
	     $sql = "INSERT INTO tienda (Nombre, Fecha_apertura) 
		 VALUES ('$nombre', '$fecha_apertura')";
	     $res = mysqli_query($this->con, $sql);
	     if($res){
	        return true;
	    }else{
	        return false;
        }
	}

	
	// El metodo read permite leer los datos de la base de datos

	public function readTienda(){
		$sql = "SELECT ID,Nombre, Fecha_apertura FROM tienda";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	
	// El metodo update permite actualizar los datos de la base de datos

	public function updateTienda($ID, $nombre, $fecha_apertura){
		$sql = "UPDATE tienda SET Nombre='$nombre', Fecha_apertura='$fecha_apertura' WHERE ID='$ID'";
		$res = mysqli_query($this->con, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
    }

	public function deleteTienda($ID){
		$sql = "DELETE T, P FROM tienda T INNER JOIN producto P WHERE T.ID = P.Tienda AND tienda='$ID' ";
		$res = mysqli_query($this->con, $sql);
		if($res){
		   return true;
		}else{
		   return false;
		}
		
	}
}

