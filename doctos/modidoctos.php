<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>.:: Sistema de Control Escolar ::.</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
<div id="top">
</div>
	<div id="form_container">
	
		<form id="form_300698" class="appnitro"  method="post" action="">
					<div class="form_description">
			<h3>Modificaci&oacute;n de Documentaci&oacute;n</h3>
			<p><a href="../">Inicio</a> | <a href="index.php">Mostrar Alumnos</a></p>
		</div>						
<?php
include_once ("clase.php"); // incluye las clases
	$numerocontrol="";
	$nombrealumno="";
	$apellidopaterno="";
	$apellidomaterno="";
	$docto1="";
	$docto2="";
	$docto3="";
	$docto4="";
	$docto5="";
	$docto6="";
	$docto7="";
	$docto8="";
	$docto9="";
	$doctoa="";
	$id="";

if (isset($_GET['md'])) // si la operacion es modificar, este valor viene seteado y ejecuta el siguiente codigo
{
	$docto=new Documento($_GET['md']);  // instancio la clase cliente pasandole el nro de cliente, de esta forma lo busca
	
	$nombrealumno=$docto->getNombreAlumno();		// obtengo el nombre
	$apellidopaterno=$docto->getApellidoPaterno();	// obtengo el apellido
	$apellidomaterno=$docto->getApellidoMaterno(); // obtengo el otro apellido
	$numerocontrol=$docto->getNumeroControl(); //obtengo el num de control
	$docto1=$docto->getDocto1(); // obtengo el otro apellido
	$docto2=$docto->getDocto2(); //obtengo el num de control
	$docto3=$docto->getDocto3(); // obtengo el otro apellido
	$docto4=$docto->getDocto4(); //obtengo el num de control
	$docto5=$docto->getDocto5(); // obtengo el otro apellido
	$docto6=$docto->getDocto6(); //obtengo el num de control
	$docto7=$docto->getDocto7(); // obtengo el otro apellido
	$docto8=$docto->getDocto8(); //obtengo el num de control
	$docto9=$docto->getDocto9(); // obtengo el otro apellido
	$doctoa=$docto->getDoctoa(); //obtengo el num de control
	
	$id=$docto->getID();	// obtengo el id
}
?>

<div >
<form method="POST" action="index.php"> 
<input type="hidden" name="id" value="<?php print $id ?>">

	<li id="li_1" >
	<label class="description" for="element_1">Solicitud:</label>
	<div>
	<input class="element text medium" type="text" name="docto1" value = "<?php print $docto1 ?>">
	</div>

	<li id="li_1">
	<label class="description" for="element_1">Copia de Carta de Presentaci&oacute;n:</label>
	<div>
	<input class="element text medium" type="text" name="docto2" value = "<?php print $docto2 ?>">
	</div>
	
	<li id="li_1">
	<label class="description" for="element_1">Copia de Carta de Asignaci&oacute;n:</label>
	<div>
	<input class="element text medium" type="text" name="docto3" value = "<?php print $docto3 ?>">
	</div>

	<li id="li_1">
	<label class="description" for="element_1">Copia de Constancia de Asistencia al Curso:</label>
	<div>
	<input class="element text medium" type="text" name="docto4" value = "<?php print $docto4 ?>">
	</div>

	<li id="li_1">
	<label class="description" for="element_1">Hoja de Control:</label>
	<div>
	<input class="element text medium" type="text" name="docto5" value = "<?php print $docto5 ?>">
	</div>
	
	<li id="li_1" >
	<label class="description" for="element_1">Plan de Trabajo: </label>
	<div>
	<input class="element text medium" type="text" name="docto6" value = "<?php print $docto6 ?>">
	</div>

	<li id="li_1">
	<label class="description" for="element_1">Reporte Mensual:</label>
	<div>
	<input class="element text medium" type="text" name="docto7" value = "<?php print $docto7 ?>">
	</div>
	
	<li id="li_1">
	<label class="description" for="element_1">Reporte Final:</label>
	<div>
	<input class="element text medium" type="text" name="docto8" value = "<?php print $docto8 ?>">
	</div>

	<li id="li_1">
	<label class="description" for="element_1">Carta de Terminaci&oacute;n elaborada en el plantel:</label>
	<div>
	<input class="element text medium" type="text" name="docto9" value = "<?php print $docto9 ?>">
	</div>

	<li id="li_1">
	<label class="description" for="element_1">Copia de Constancia del Servicio Social</label>
	<div>
	<input class="element text medium" type="text" name="doctoa" value = "<?php print $doctoa ?>">
	</div>

	
	<input type="submit" name="submit" value ="<?php if(is_numeric($id)) print "Modificar"; else print "Ingresar";?>"></p>

<?php




if (isset($_POST['submit'])&&!is_numeric($_POST['id'])) // si presiono el boton ingresar
{
	$docto=new Documento();
	//print_r($_POST);
	$docto->setDocto1($_POST['docto1']); // setea los datos nuevos
	$docto->setDocto2($_POST['docto2']);	
	$docto->setDocto3($_POST['docto3']);	
	$docto->setDocto4($_POST['docto4']);
	$docto->setDocto5($_POST['docto5']);
	$docto->setDocto6($_POST['docto6']); // setea los datos nuevos
	$docto->setDocto7($_POST['docto7']);	
	$docto->setDocto8($_POST['docto8']);	
	$docto->setDocto9($_POST['docto9']);
	$docto->setDoctoa($_POST['doctoa']);

	
	
	//print " Consulta ejecutada: ". $asesor->insertAsesor(); // inserta y muestra el resultado
	$docto->insertDocumento();
	echo "Registro guardado con exito";
}
if (isset($_POST['submit'])&&is_numeric($_POST['id'])) // si presiono el boton y es modificar
{
	$docto=new Documento($_POST['id']);  // instancio la clase pasandole el nro de cliente para cargar los datos
	$docto->setDocto1($_POST['docto1']); // setea los datos nuevos
	$docto->setDocto2($_POST['docto2']);	
	$docto->setDocto3($_POST['docto3']);	
	$docto->setDocto4($_POST['docto4']);
	$docto->setDocto5($_POST['docto5']);
	$docto->setDocto6($_POST['docto6']); // setea los datos nuevos
	$docto->setDocto7($_POST['docto7']);	
	$docto->setDocto8($_POST['docto8']);	
	$docto->setDocto9($_POST['docto9']);
	$docto->setDoctoa($_POST['doctoa']);



	//print " Consulta ejecutada: ". $asesor->updateAsesor(); // inserta y muestra el resultado
	$docto->updateDocumento();
	echo "registro actualizado";
}
if (isset($_GET['br'])&&is_numeric($_GET['br'])) // si presiono el boton y es eliminar
{
	$docto=new Documento();
	//print " Consulta ejecutada: ". $asesor->deleteAsesor($_GET['br']); // elimina el cliente y muestra el resultado
	$docto->deleteDocumento($_GET['br']);
	echo "registro eliminado";
}



?>
</body>
</html>
