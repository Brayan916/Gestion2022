<?php
require_once "../config/conexionpoo.php";
require_once "../model/Consultorio.php";
require_once "../view/Fconsultorio.php";


if (isset($_POST['registroConsul']))
{
$idconsultorio=$_POST['txtnumconsul'];

$nombreconsultorio=$_POST['txtnomconsul'];


$consul= new Consultorio();
$reg =$consul->registroconsultorio($idconsultorio,$nombreconsultorio);

if($reg)
{
print "<script>alert(\"Consultorio registrado.\");window.location='../view/Fconsultorio.php';</script>";
}else
{
print "<script>alert(\"No se puede registrar consultorio.\");window.location='../view/Fconsultorio.php';</script>";



}
}



?>