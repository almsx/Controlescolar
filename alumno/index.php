<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>.:: Sistema de Control Escolar ::.</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="demo.js"></script>
<script type="text/javascript" src="https://getfirebug.com/firebug-lite.js"></script>
</head>
<body id="main_body" >
	<div id="top">
	</div>
	<div id="form_container">
	
					<div class="form_description">
			<h3>Sistema de Control Escolar -> Alumnos</h3>
			<p><a href="../">Inicio</a> | <a href="alumnos.php">Agregar Alumnos</a></p>
		</div>						
<?php

//indexalumnos.php

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

if (isset($_GET['si'])&&is_numeric($_GET['si'])) // si presiono el boton es para mandarlo al sistema de documentacion
{
	$alumno=new Alumno();
	//print " Consulta ejecutada: ". $asesor->deleteAsesor($_GET['br']); // elimina el cliente y muestra el resultado
	$alumno->insertSistema($_GET['si']);
	echo "Asereje";
}



$alumno=new Alumno();
$alumnos= $alumno->getAlumnos(); // obtiene todos los clientes para despues mostrarlos

print '<br/><br/><table border=1>'
		  .'<th scope="col">Numero de Control:</td>'
		  .'<th scope="col">Nombre(s):</td>'
		  .'<th scope="col">Apellido Paterno:</td>'
		  .'<th scope="col">Apellido Materno:</td>'
		  .'<th scope="col">Modificar</td>'
		  .'<th scope="col">Borrar</td>'
		  .'<th scope="col">Reporte</td></tr>';

while ($row=mysql_fetch_Array($alumnos)) // recorre los clientes uno por uno hasta el fin de la tabla
{
	print '<tr>'
		  .'<td>'.$row['numerocontrol'] .'</td>'
		  .'<td>'.$row['nombrealumno'] .'</td>'
		  .'<td>'.$row['apellidopaterno'] .'</td>'
		  .'<td>'.$row['apellidomaterno'] .'</td>'
		  .'<td><a href="modialumnos.php?md='.$row['id'].'">Modificar</a></td>'   // en este ejemplo para simplificar se envian los parametros por get utilizando un href
		  .'<td><a href="index.php?br='.$row['id'].'">Borrar</a></td>'		// lo correcto seria enviarlos por post con un submit por ejem.
		  .'<td><a href="index.php?si='.$row['id'].'">Sistema</a></td>'
		  .'</tr>';
}
print '</table>';
?>
<br>
<br>


<div id="footer">
<br/>
<br/>
<br/>
Secretar&iacute;a de Educaci&oacute;n
<br>
Subsecretar&iacute;a de Educaci&oacute;n Media Superior y Superior
<br>
Copyright &copy; 2011 Centro de Bachillerato Tecnol&oacute;gico Agropecuario Numero 35
		</div>
</body>
</html>
