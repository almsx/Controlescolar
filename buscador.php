<form action="buscador.php" method="POST">
Palabras clave
<input type="text" id="keywords" name="keywords" size="30" maxlength="30">
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

        echo '<h2>Se han encontrado '.$count_results.' resultados.</h2>';

        echo '<ul>';
        while ($row_searched = mysql_fetch_array($query_searched)) {
            //En este caso solo mostramos el titulo y fecha de la entrada
            echo '<li><a href="doctos/modidoctos.php?md='.$row_searched['id'].'">'.$row_searched['numerocontrol'].' ('.$row_searched['apellidopaterno'].')</a></li>';


			//modialumnos.php?md='.$row['id'].'"
        }
        echo '</ul>';
    }
    else {
        //Si no hay registros encontrados
        echo '<h2>No se encuentran resultados con los criterios de b&uacute;squeda.</h2>';
    }
}
?>
