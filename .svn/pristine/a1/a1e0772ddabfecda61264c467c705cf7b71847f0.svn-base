<?php
class cursos{
  function __construct($datosConexionBD){
    $this->datosConexionBD=$datosConexionBD;
  }
	  public function consultarCursos(){
        try {
            $conexion = new PDO('mysql:host='.$this->datosConexionBD[0].';dbname='.$this->datosConexionBD[3], $this->datosConexionBD[1], $this->datosConexionBD[2],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $resultado = $conexion->prepare("SELECT * FROM tbl_lenguajes");
          $resultado->execute();
            return $resultado;
        } catch (PDOException $e) {
            return false;
        }
      }
	public function consultarInscritosXidCurso(){
        try {
            $conexion = new PDO('mysql:host='.$this->datosConexionBD[0].';dbname='.$this->datosConexionBD[3], $this->datosConexionBD[1], $this->datosConexionBD[2],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $resultado = $conexion->prepare("SELECT * FROM tbl_conocimientos INNER JOIN tbl_empleado ON tbl_conocimientos.tbl_empleado_id = tbl_empleado.id WHERE tbl_lenguajes_id = $this->tbl_lenguajes_id");
          $resultado->execute();
            return $resultado;
        } catch (PDOException $e) {
            return false;
        }
      }
	public function consultarCursosXnombre(){
        try {
            $conexion = new PDO('mysql:host='.$this->datosConexionBD[0].';dbname='.$this->datosConexionBD[3], $this->datosConexionBD[1], $this->datosConexionBD[2],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $resultado = $conexion->prepare("SELECT * FROM tbl_lenguajes WHERE lenguaje LIKE '%".$this->lenguaje."%'");
          $resultado->execute();
            return $resultado;
        } catch (PDOException $e) {
            return false;
        }
      }
	public function totalDeEmpleadosInscritosXidCurso(){
        try {
            $conexion = new PDO('mysql:host='.$this->datosConexionBD[0].';dbname='.$this->datosConexionBD[3], $this->datosConexionBD[1], $this->datosConexionBD[2],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $resultado = $conexion->prepare("SELECT count(*) as total FROM tbl_conocimientos WHERE tbl_lenguajes_id = ".$this->tbl_lenguajes_id."");
          $resultado->execute();
            return $resultado;
        } catch (PDOException $e) {
            return false;
        }
      }
	
	public function consultarCursoXid(){
        try {
            $conexion = new PDO('mysql:host='.$this->datosConexionBD[0].';dbname='.$this->datosConexionBD[3], $this->datosConexionBD[1], $this->datosConexionBD[2],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            $resultado = $conexion->prepare("SELECT * FROM tbl_lenguajes WHERE id = '".$this->id."'");
          $resultado->execute();
            return $resultado;
        } catch (PDOException $e) {
            return false;
        }
      }
	 public function altaCurso(){
					try {
						$conexion = new PDO('mysql:host='.$this->datosConexionBD[0].';dbname='.$this->datosConexionBD[3], $this->datosConexionBD[1], $this->datosConexionBD[2]);
						$conexion -> exec("set names utf8");
						$query = "INSERT INTO tbl_lenguajes
								(lenguaje)
								VALUES ('".$this->lenguaje."')";
						$statement = $conexion->prepare($query);
						$statement->execute();
						return "Lenguaje Registrado";
					}catch(PDOException $e){
						return "Error: " . $e->getMessage();
					}
   } 
	public function altaConocimiento(){
					try {
						$conexion = new PDO('mysql:host='.$this->datosConexionBD[0].';dbname='.$this->datosConexionBD[3], $this->datosConexionBD[1], $this->datosConexionBD[2]);
						$conexion -> exec("set names utf8");
						$query = "INSERT INTO tbl_conocimientos
								(curso,
								porcentaje,
								tbl_empleado_id,
								tbl_lenguajes_id)
								VALUES ('".$this->curso."',
								'".$this->porcentaje."',
								'".$this->tbl_empleado_id."',
								'".$this->tbl_lenguajes_id."')";
						$statement = $conexion->prepare($query);
						$statement->execute();
						return $conexion->lastInsertId('id');
					}catch(PDOException $e){
						return "Error: " . $e->getMessage();
					}
   }
		public function modificarCurso(){
					try {
						$conexion = new PDO('mysql:host='.$this->datosConexionBD[0].';dbname='.$this->datosConexionBD[3], $this->datosConexionBD[1], $this->datosConexionBD[2]);
						$conexion -> exec("set names utf8");
						// Prepared Statements
						$query ="UPDATE tbl_lenguajes 
									SET
										lenguaje = '".$this->lenguaje."'
										WHERE id = '".$this->id."' ";
						$statement = $conexion->prepare($query);
						$statement->execute();
						return "Cambio Exitoso";
					}catch(PDOException $e){
						return "Error: " . $e->getMessage();
					}
		}	
	public function eliminarCursoXid(){
					try {
							$conexion = new PDO('mysql:host='.$this->datosConexionBD[0].';dbname='.$this->datosConexionBD[3], $this->datosConexionBD[1], $this->datosConexionBD[2],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
							$resultado = $conexion->prepare("DELETE FROM tbl_lenguajes WHERE id = '$this->id'");
							$resultado->execute();
							return $resultado;
					} catch (PDOException $e) {
							return false;
					}
				}
	public function removerEmpleadoDeConocimiento(){
					try {
							$conexion = new PDO('mysql:host='.$this->datosConexionBD[0].';dbname='.$this->datosConexionBD[3], $this->datosConexionBD[1], $this->datosConexionBD[2],array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
							$resultado = $conexion->prepare("DELETE FROM tbl_conocimientos WHERE tbl_empleado_id = '$this->tbl_empleado_id' AND tbl_lenguajes_id = '$this->tbl_lenguajes_id'");
							$resultado->execute();
							return $resultado;
					} catch (PDOException $e) {
							return false;
					}
				}
}
  ?>