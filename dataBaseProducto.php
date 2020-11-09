<?php

class dataBaseProducto{

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

    public function createProducto($nombre, $descripcion, $valor, $tienda, $imagen){
	     $sql = "INSERT INTO producto (Nombre, Descripcion, Valor, Tienda, Imagen) VALUES ('$nombre', '$descripcion', '$valor', '$tienda', '$imagen')";
	     $res = mysqli_query($this->con, $sql);
	     if($res){
	        return true;
	    }else{
	        return false;
        }
	}


	public function uploadImage($image){
        $url = "imagenes/".$image["imagen"]["name"];
        move_uploaded_file($image["imagen"]["tmp_name"], $url);
        $SQLStatement = $this->con->prepare("INSERT INTO producto (urlimage) VALUES(:url)");
        $SQLStatement->bindParam(":url", $url);
        $SQLStatement->execute();
    }
	
	// El metodo read permite leer los datos de la base de datos

	public function readProducto(){
		$sql = "SELECT * FROM producto";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}

	public function single_record($sku){
		$sql = "SELECT * FROM producto WHERE SKU='$sku'";
		$res = mysqli_query($this->con, $sql);
		$return = mysqli_fetch_object($res );
		return $return ;
	}
  
	// El metodo update permite actualizar los datos de la base de datos

	public function updateProducto($nombre, $descripcion, $valor, $tienda, $imagen, $sku){
		$sql = "UPDATE producto SET Nombre='$nombre', Descripcion='$descripcion', Valor='$valor', Tienda='$tienda', Imagen='$imagen'  WHERE SKU='$sku'";
		$res = mysqli_query($this->con, $sql);
		if($res){
			return true;
		}else{
			return false;
		}
    }

	public function deleteProducto($sku){
		$sql = "DELETE FROM producto WHERE SKU='$sku'";
		$res = mysqli_query($this->con, $sql);
		if($res){
		   return true;
		}else{
		   return false;
		}
		
	}
}