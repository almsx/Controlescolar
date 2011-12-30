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
 					<h3>Sistema de Control Escolar -> Buscador</h3>
                        <p><a href="../">Inicio</a> | <a href="../alumno">Sistema de Alumnos</a> | <a href="../alumno">Sistema de Documentaci&oacute;n</a></p>			
		</div>
		
		<h2>Por favor ingrese la matricula del Alumno:</h2>
		<p>
		</p>

<form action="index.php" method="POST">

<input classtype="text" id="keywords" name="keywords" size="30" maxlength="30">
<input type="submit" name="search" id="search" value="Buscar">
</form>

<?php
//Si se ha pulsado el boton de buscar
if (isset($_POST['search'])) {
    //Recogemos las claves enviadas
    $keywords = $_POST['keywords'];

    //Conectamos con la base de datos en la que vamos a buscar
    $conexion = mysql_connect("localhost", "root", "buttons");
    mysql_select_db("SistemaCE", $conexion);

    $query = "SELECT Alumnos.numerocontrol, Alumnos.id, Alumnos.nombrealumno, Alumnos.apellidopaterno, Alumnos.apellidomaterno, Doctos.id, Doctos.docto1, Doctos.docto2, Doctos.docto3, Doctos.docto4, Doctos.docto5, Doctos.docto6, Doctos.docto7, Doctos.docto8, Doctos.docto9, Doctos.doctoa FROM Doctos INNER JOIN Alumnos ON Alumnos.id = Doctos.idAlumno
                WHERE Alumnos.numerocontrol LIKE '%" . $keywords . "%' ORDER BY Alumnos.numerocontrol ASC";

    $query_searched = mysql_query($query, $conexion);

    $count_results = mysql_num_rows($query_searched);

    //Si ha resultados
    if ($count_results > 0) {

        echo '<h4>Se ha encontrado '.$count_results.' Alumno.</h2>';

        echo '<ul>';
        while ($row_searched = mysql_fetch_array($query_searched)) {
            //En este caso solo mostramos el titulo y fecha de la entrada
            echo '<li><a href="../doctos/modidoctos.php?md='.$row_searched['id'].'">'.$row_searched['numerocontrol'].' - ('.$row_searched['apellidopaterno'].' '.$row_searched['apellidomaterno'].' '.$row_searched['nombrealumno'].' )</a></li>';


			//modialumnos.php?md='.$row['id'].'"
        }
        echo '</ul>';
    }
    else {
        //Si no hay registros encontrados
        echo '<h4>No se encuentran resultados con los criterios de b&uacute;squeda.</h4>';
    }
}
?>


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
