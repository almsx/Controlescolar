<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>.:: Sistema de Control Escolar ::.</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>

</head>
<body id="main_body" >
	
	<img id="top" src="top.png" alt="">
	<div id="form_container">
	
		<h1><a>Alta de Alumnos</a></h1>
		<form id="form_300698" class="appnitro"  method="post" action="">
					<div class="form_description">
			<h2>Alta de Alumnos</h2>
			<p>Por favor ingrese los datos que son requeridos.</p>
		</div>						
<?php
include_once ("clase.php"); // incluye las clases
	$numerocontrol="";
	$nombrealumno="";
	$apellidopaterno="";
	$apellidomaterno="";
	$grado="";
	$grupo="";
	$id="";

if (isset($_GET['md'])) // si la operacion es modificar, este valor viene seteado y ejecuta el siguiente codigo
{
	$alumno=new Alumno($_GET['md']);  // instancio la clase cliente pasandole el nro de cliente, de esta forma lo busca
	
	$nombrealumno=$alumno->getNombreAlumno();		// obtengo el nombre
	$apellidopaterno=$alumno->getApellidoPaterno();	// obtengo el apellido
	$apellidomaterno=$alumno->getApellidoMaterno(); // obtengo el otro apellido
	$numerocontrol=$alumno->getNumeroControl(); //obtengo el num de control
	$grado=$alumno->getGrado(); //obtengo el grado
	$grupo=$alumno->getGrupo(); //obtengo el grupo
	$id=$alumno->getID();	// obtengo el id
}
?>

<div >
<form method="POST" action="index.php"> 
<input type="hidden" name="id" value="<?php print $id ?>">

	<li id="li_1" >
	<label class="description" for="element_1">Numero de Control:</label>
	<div>
	<input class="element text medium" type="text" name="numerocontrol" value = "<?php print $numerocontrol ?>">
	</div>

	<li id="li_1">
	<label class="description" for="element_1">Nombre(s):</label>
	<div>
	<input class="element text medium" type="text" name="nombrealumno" value = "<?php print $nombrealumno ?>">
	</div>
	
	<li id="li_1">
	<label class="description" for="element_1">Apellido Paterno:</label>
	<div>
	<input class="element text medium" type="text" name="apellidopaterno" value = "<?php print $apellidopaterno ?>">
	</div>

	<li id="li_1">
	<label class="description" for="element_1">Apellido Materno:</label>
	<div>
	<input class="element text medium" type="text" name="apellidomaterno" value = "<?php print $apellidomaterno ?>">
	</div>

	<li id="li_1">
	<label class="description" for="element_1">Grado:</label>
	<div>
	<input class="element text medium" type="text" name="grado" value = "<?php print $grado ?>">
	</div>
	
	<li id="li_1">
	<label class="description" for="element_1">Grupo:</label>
	<div>
	<input class="element text medium" type="text" name="grupo" value = "<?php print $grupo ?>">
	</div>

	<input type="submit" name="submit" value ="<?php if(is_numeric($id)) print "Modificar"; else print "Ingresar";?>"></p>

<?php




if (isset($_POST['submit'])&&!is_numeric($_POST['id'])) // si presiono el boton ingresar
{
	$alumno=new Alumno();
	//print_r($_POST);
	$alumno->setNombreAlumno($_POST['nombrealumno']); // setea los datos
	$alumno->setApellidoPaterno($_POST['apellidopaterno']);	
	$alumno->setApellidoMaterno($_POST['apellidomaterno']); // setea los datos
	$alumno->setNumeroControl($_POST['numerocontrol']);	
	$alumno->setGrado($_POST['grado']); // setea los datos
	$alumno->setGrupo($_POST['grupo']);	
	
	//print " Consulta ejecutada: ". $asesor->insertAsesor(); // inserta y muestra el resultado
	$alumno->insertAlumno();
	echo "Registro guardado con exito";
}
if (isset($_POST['submit'])&&is_numeric($_POST['id'])) // si presiono el boton y es modificar
{
	$alumno=new Alumno($_POST['id']);  // instancio la clase pasandole el nro de cliente para cargar los datos
	$alumno->setNombreAlumno($_POST['nombrealumno']); // setea los datos nuevos
	$alumno->setApellidoPaterno($_POST['apellidopaterno']);	
	$alumno->setApellidoMaterno($_POST['apellidomaterno']);	
	$alumno->setNumeroControl($_POST['numerocontrol']);	
	$alumno->setGrado($_POST['grado']);	
	$alumno->setGrupo($_POST['grupo']);	

	//print " Consulta ejecutada: ". $asesor->updateAsesor(); // inserta y muestra el resultado
	$alumno->updateAlumno();
	echo "registro actualizado";
}
if (isset($_GET['br'])&&is_numeric($_GET['br'])) // si presiono el boton y es eliminar
{
	$alumno=new Alumno();
	//print " Consulta ejecutada: ". $asesor->deleteAsesor($_GET['br']); // elimina el cliente y muestra el resultado
	$alumno->deleteAlumno($_GET['br']);
	echo "registro eliminado";
}



$alumno=new Alumno();
$alumnos= $alumno->getAlumnos(); // obtiene todos los clientes para despues mostrarlos

print '<br/><br/><table border=1>'
		  .'<tr><td>Nombre:</td>'
		  .'<td>Apellido:</td>'
		  .'<td>Modificar</td>'
		  .'<td>Borrar</td></tr>';

while ($row=mysql_fetch_Array($alumnos)) // recorre los clientes uno por uno hasta el fin de la tabla
{
	print '<tr>'
		  .'<td>'.$row['nombrealumno'] .'</td>'
		  .'<td>'.$row['apellidopaterno'] .'</td>'
		  .'<td><a href="index.php?md='.$row['id'].'">Modificar</a></td>'   // en este ejemplo para simplificar se envian los parametros por get utilizando un href
		  .'<td><a href="index.php?br='.$row['id'].'">Borrar</a></td>'		// lo correcto seria enviarlos por post con un submit por ejem.
		  .'</tr>';
}
print '</table>';
?>
</body>
</html>
