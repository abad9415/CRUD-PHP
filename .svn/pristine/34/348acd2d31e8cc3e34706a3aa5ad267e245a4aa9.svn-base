<?php
class empleados{
	var $id;
  
  function __construct($datosConexionBD){
    $this->datosConexionBD=$datosConexionBD;
  }
  public function consultarEmpleados(){
        try {
            $conexion = new PDO('mysql:host='.$this->datosConexionBD[0].';dbname='.$this->datosConexionBD[3], $this->datosConexionBD[1], $this->datosConexionBD[2],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $resultado = $conexion->prepare("SELECT * FROM tbl_empleado INNER JOIN tbl_datos_economicos ON tbl_empleado.id = tbl_datos_economicos.tbl_empleado_id");
          $resultado->execute();
            return $resultado;
        } catch (PDOException $e) {
            return false;
        }
      }
	public function consultarEmpleadosXnombre(){
        try {
            $conexion = new PDO('mysql:host='.$this->datosConexionBD[0].';dbname='.$this->datosConexionBD[3], $this->datosConexionBD[1], $this->datosConexionBD[2],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $resultado = $conexion->prepare("SELECT * FROM tbl_empleado INNER JOIN tbl_datos_economicos ON tbl_empleado.id = tbl_datos_economicos.tbl_empleado_id WHERE tbl_empleado.nombre LIKE '%".$this->nombre."%'");
          $resultado->execute();
            return $resultado;
        } catch (PDOException $e) {
            return false;
        }
      }
	public function consultarEmpleadoXid(){
        try {
            $conexion = new PDO('mysql:host='.$this->datosConexionBD[0].';dbname='.$this->datosConexionBD[3], $this->datosConexionBD[1], $this->datosConexionBD[2],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $resultado = $conexion->prepare("SELECT * FROM tbl_empleado INNER JOIN tbl_datos_economicos ON tbl_empleado.id = tbl_datos_economicos.tbl_empleado_id WHERE tbl_empleado.id = '".$this->id."'");
          $resultado->execute();
            return $resultado;
        } catch (PDOException $e) {
            return false;
        }
      }
	 public function altaEmpleado(){
					try {
						$conexion = new PDO('mysql:host='.$this->datosConexionBD[0].';dbname='.$this->datosConexionBD[3], $this->datosConexionBD[1], $this->datosConexionBD[2]);
						$conexion -> exec("set names utf8");
						$query = "INSERT INTO tbl_empleado
								(nombre,
								edad,
								direccion,
								estado,
                fecha_nacimiento,
                telefono)
								VALUES ('".$this->nombre."',
								'".$this->edad."',
								'".$this->direccion."',
								'".$this->estado."',
								'".$this->fecha_nacimiento."',
								'".$this->telefono."')";
						$statement = $conexion->prepare($query);
						$statement->execute();
						return $conexion->lastInsertId('id');
					}catch(PDOException $e){
						return "Error: " . $e->getMessage();
					}
   }
	public function altaDatosEconomicosEmpleados(){
					try {
						$conexion = new PDO('mysql:host='.$this->datosConexionBD[0].';dbname='.$this->datosConexionBD[3], $this->datosConexionBD[1], $this->datosConexionBD[2]);
						$conexion -> exec("set names utf8");
						$query = "INSERT INTO tbl_datos_economicos
								(puesto,
								salario,
								tbl_empleado_id)
								VALUES ('".$this->puesto."',
								'".$this->salario."',
								'".$this->tbl_empleado_id."')";
						$statement = $conexion->prepare($query);
						$statement->execute();
						return "Empleado Guardado";
					}catch(PDOException $e){
						return "Error: " . $e->getMessage();
					}
   }
	
	public function modificarEmpleado(){
					try {
						$conexion = new PDO('mysql:host='.$this->datosConexionBD[0].';dbname='.$this->datosConexionBD[3], $this->datosConexionBD[1], $this->datosConexionBD[2]);
						$conexion -> exec("set names utf8");
						// Prepared Statements
						$query ="UPDATE tbl_empleado 
									SET
										nombre = '".$this->nombre."',
										edad = '".$this->edad."',
										direccion = '".$this->direccion."',
										estado = '".$this->estado."',
										fecha_nacimiento = '".$this->fecha_nacimiento."',
										telefono = '".$this->telefono."'
										WHERE id = '".$this->id."' ";
						$statement = $conexion->prepare($query);
						$statement->execute();
						return "Cambio Exitoso";
					}catch(PDOException $e){
						return "Error: " . $e->getMessage();
					}
		}	
	public function modificarDatosEconomicosEmpleados(){
					try {
						$conexion = new PDO('mysql:host='.$this->datosConexionBD[0].';dbname='.$this->datosConexionBD[3], $this->datosConexionBD[1], $this->datosConexionBD[2]);
						$conexion -> exec("set names utf8");
						// Prepared Statements
						$query ="UPDATE tbl_datos_economicos 
									SET
										puesto = '".$this->puesto."',
										salario = '".$this->salario."'
										WHERE tbl_empleado_id = '".$this->tbl_empleado_id."'";
						$statement = $conexion->prepare($query);
						$statement->execute();
						return "Cambio Exitoso";
					}catch(PDOException $e){
						return "Error: " . $e->getMessage();
					}
		}
	public function eliminarEmpleadoXid(){
					try {
							$conexion = new PDO('mysql:host='.$this->datosConexionBD[0].';dbname='.$this->datosConexionBD[3], $this->datosConexionBD[1], $this->datosConexionBD[2],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
							$resultado = $conexion->prepare("DELETE FROM tbl_empleado WHERE id = '$this->id'");
							$resultado->execute();
							return $resultado;
					} catch (PDOException $e) {
							return false;
					}
				}
	 public function consultarEmpleadosNoInscritosXidCurso(){
        try {
            $conexion = new PDO('mysql:host='.$this->datosConexionBD[0].';dbname='.$this->datosConexionBD[3], $this->datosConexionBD[1], $this->datosConexionBD[2],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $resultado = $conexion->prepare("SELECT * FROM tbl_empleado where id not in (select tbl_empleado_id from tbl_conocimientos WHERE tbl_lenguajes_id = $this->id)");
          $resultado->execute();
            return $resultado;
        } catch (PDOException $e) {
            return false;
        }
      }
	
}
  ?>