<?php
require_once "../config/conexionpoo.php";

class Consultorio extends Conectar
{
	
	protected $Numconsul;
	protected $Nombreconsul;

	public function _construct()
   {
    parent::_construct();
   }
public function registroconsultorio($Numconsul,$Nombreconsul){
	$sql1 = "SELECT * FROM consultorios WHERE NumeroC ='$Numconsul' ";
	$resultado=$this->_bd->query($sql1);
	$fila = mysqli_num_rows($resultado);
	if($fila >0){
		echo "<script>alert('Consultorio ya esta registrado');window.location='../view/Fconsultorio.php';</script>";
	}

	else
	{
		$sql = "INSERT INTO consultorios(NumeroC,NombreC)VALUES('".$Numconsul."','".$Nombreconsul."')";
		$resultado=$this->_bd->query($sql);
		if(!$resultado){
			print "<script>alert(\"fallo al ingresar datos.\");window.location='../view/Fconsultorio.php';</script>";
		}else{
			return $resultado;
			print "<script>alert(\"Consultorio registrado.\");window.location='../view/Fconsultorio.php';</script>";
			$resultado->close();
			$this->_bd->close();


		}
	}



}

public function listarconsultorios(){
$sql1 = "SELECT * FROM consultorios ORDER BY NumeroC";
$resultado=$this->_bd->query($sql1);
if($resultado->num_rows>0){
	while ($row = $resultado->fetch_assoc()) {
		$resultset[]=$row;
	}
}
return $resultset;
}

public function eliminarconsultorio(){
	$query ="DELETE FROM consultorios WHERE NumeroC='$id'";
	$resultado=$this->_bd->query($query);
if(!$resultado){
	print "<script>alert(\"Registro eliminado\");window.location='../view/Fconsultorio.php';</script>";
}else{
	print "<script>alert(\"No se puede eliminar\");window.location='../view/Fconsultorio.php';</script>";
}


}


}

?>