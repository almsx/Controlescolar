
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>.:: Sistema de Control Escolar ::.</title>
<link rel="stylesheet" type="text/css" href="view.css" media="all">
<script type="text/javascript" src="view.js"></script>
<script type="text/javascript" src="demo.js"></script>

</head>
<body id="main_body" >
	<div id="top">
	</div>
	<div id="form_container">
	
					<div class="form_description">
			<h3>Sistema de Control Escolar -> Documentaci&oacute;n</h3>
			<p><a href="../">Inicio</a> | <a href="../alumno/alumnos.php">Agregar Alumnos</a></p>
		</div>						
<?php
//index.php
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
	$docto1=$docto->getDocto1(); //obtengo el grado
	$docto2=$docto->getDocto2(); //obtengo el grado
	$docto3=$docto->getDocto3(); //obtengo el grado
	$docto4=$docto->getDocto4(); //obtengo el grado
	$docto5=$docto->getDocto5(); //obtengo el grado
	$docto6=$docto->getDocto6(); //obtengo el grado
	$docto7=$docto->getDocto7(); //obtengo el grado
	$docto8=$docto->getDocto8(); //obtengo el grado
	$docto9=$docto->getDocto9(); //obtengo el grado
	$doctoa=$docto->getDoctoa(); //obtengo el grado
	$id=$docto->getID();	// obtengo el id
}
?>

<?php




if (isset($_POST['submit'])&&!is_numeric($_POST['id'])) // si presiono el boton ingresar
{
	$docto=new Documento();
	//print_r($_POST);
	
	$docto->setNombreAlumno($_POST['nombrealumno']); // setea los datos
	$docto->setApellidoPaterno($_POST['apellidopaterno']);	
	$docto->setApellidoMaterno($_POST['apellidomaterno']); // setea los datos
	$docto->setNumeroControl($_POST['numerocontrol']);	
	$docto->setGrado($_POST['grado']); // setea los datos
	$docto->setGrupo($_POST['grupo']);	
	
	//print " Consulta ejecutada: ". $asesor->insertAsesor(); // inserta y muestra el resultado
	$docto->insertDocumento();
	echo "Registro guardado con exito";
}
if (isset($_POST['submit'])&&is_numeric($_POST['id'])) // si presiono el boton y es modificar
{
	$docto=new Documento($_POST['id']);  // instancio la clase pasandole el nro de cliente para cargar los datos
	$docto->setDocto1($_POST['docto1']); // setea los datos nuevos
	$docto->setDocto2($_POST['docto2']); // setea los datos nuevos
	$docto->setDocto3($_POST['docto3']); // setea los datos nuevos
	$docto->setDocto4($_POST['docto4']); // setea los datos nuevos
	$docto->setDocto5($_POST['docto5']); // setea los datos nuevos
	$docto->setDocto6($_POST['docto6']); // setea los datos nuevos
	$docto->setDocto7($_POST['docto7']); // setea los datos nuevos
	$docto->setDocto8($_POST['docto8']); // setea los datos nuevos
	$docto->setDocto9($_POST['docto9']); // setea los datos nuevos
	$docto->setDoctoa($_POST['doctoa']); // setea los datos nuevos

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



$docto=new Documento();
$doctos= $docto->getDocumentos(); // obtiene todos los clientes para despues mostrarlos


print '<br/><br/><table border=1>'
		  .'<th scope="col">Numero de Control:</td>'
		  .'<th scope="col">Nombre(s):</td>'
		  .'<th scope="col">Apellido Paterno:</td>'
		  .'<th scope="col">Apellido Materno:</td>'
		  .'<th scope="col">Modificar</td>'
		  .'<th scope="col">Borrar</td>'
		  .'<th scope="col">Reporte</td></tr>';

while ($row=mysql_fetch_Array($doctos)) // recorre los clientes uno por uno hasta el fin de la tabla
{
	print '<tr>'
		  .'<td>'.$row['numerocontrol'] .'</td>'
		  .'<td>'.$row['nombrealumno'] .'</td>'
		  .'<td>'.$row['apellidopaterno'] .'</td>'
		  .'<td>'.$row['apellidomaterno'] .'</td>'
		  .'<td><a href="modidoctos.php?md='.$row['id'].'">Modificar</a></td>'   // en este ej parametros por get utilizando un href
		  .'<td><a href="index.php?br='.$row['id'].'">Borrar</a></td>'	
		  .'<td><a href="index.php?br='.$row['id'].'">Reporte</a></td>'	
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
