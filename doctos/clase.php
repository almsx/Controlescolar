<?php
class Conexion  // se declara una clase para hacer la conexion con la base de datos
{
	
	//clase.php
	var $con;
	function Conexion()
		   	 
	{
		// se definen los datos del servidor de base de datos 
		$conection['server']="localhost";  //host
		$conection['user']="root";         //  usuario
		$conection['pass']="buttons";		//password
		$conection['base']="SistemaCE";			//base de datos
		
		
		// crea la conexion pasandole el servidor , usuario y clave
		$conect= mysql_pconnect($conection['server'],$conection['user'],$conection['pass']);


			
		if ($conect) // si la conexion fue exitosa , selecciona la base
		{
			mysql_select_db($conection['base']);			
			$this->con=$conect;
		}
	}
	function getConexion() // devuelve la conexion
	{
		return $this->con;
	}
	function Close()  // cierra la conexion
	{
		mysql_close($this->con);
	}	

}




class sQuery   // se declara una clase para poder ejecutar las consultas, esta clase llama a la clase anterior
{

	var $pconeccion;
	var $pconsulta;
	var $resultados;
	function sQuery()  // constructor, solo crea una conexion usando la clase "Conexion"
	{
		$this->pconeccion= new Conexion();
	}
	function executeQuery($cons)  // metodo que ejecuta una consulta y la guarda en el atributo $pconsulta
	{
		$this->pconsulta= mysql_query($cons,$this->pconeccion->getConexion());
		return $this->pconsulta;
	}	
	function getResults()   // retorna la consulta en forma de result.
	{return $this->pconsulta;}	
	
	function Close()		// cierra la conexion
	{$this->pconeccion->Close();}	
	
	function Clean() // libera la consulta
	{mysql_free_result($this->pconsulta);}
	
	function getResultados() // debuelve la cantidad de registros encontrados
	{return mysql_affected_rows($this->pconeccion->getConexion()) ;}
	
	function getAffect() // devuelve las cantidad de filas afectadas
	{return mysql_affected_rows($this->pconeccion->getConexion()) ;}
}




class Documento
{
	var $nombrealumno;     //se declaran los atributos de la clase, que son los atributos del cliente
	var $apellidopaterno;
	var $apellidomaterno;
	var $numerocontrol;
	var $docto1;
	var $docto2;
	var $docto3;
	var $docto4;
	var $docto5;
	var $docto6;
	var $docto7;
	var $docto8;
	var $docto9;
	var $doctoa;
	Var $id;
	function Documento($nro=0) 
	{
		if ($nro!=0)
		{
			$obj_documento=new sQuery();
			$result=$obj_documento->executeQuery("SELECT Alumnos.numerocontrol, Alumnos.nombrealumno, Alumnos.apellidopaterno, Alumnos.apellidomaterno, Doctos.id, Doctos.docto1, Doctos.docto2, Doctos.docto3, Doctos.docto4, Doctos.docto5, Doctos.docto6, Doctos.docto7, Doctos.docto8, Doctos.docto9, Doctos.doctoa FROM Doctos INNER JOIN Alumnos ON Alumnos.id = Doctos.idAlumno WHERE Doctos.id = $nro ORDER BY Alumnos.numerocontrol ASC");  
			$row=mysql_fetch_array($result);
			$this->id=$row['id'];
			$this->nombrealumno=$row['nombrealumno'];
			$this->apellidopaterno=$row['apellidopaterno'];
			$this->apellidomaterno=$row['apellidomaterno'];
			$this->numerocontrol=$row['numerocontrol'];
			$this->docto1=$row['docto1'];
			$this->docto2=$row['docto2'];
			$this->docto3=$row['docto3'];
			$this->docto4=$row['docto4'];
			$this->docto5=$row['docto5'];
			$this->docto6=$row['docto6'];
			$this->docto7=$row['docto7'];
			$this->docto8=$row['docto8'];
			$this->docto9=$row['docto9'];
			$this->doctoa=$row['doctoa'];
			
			
		}
	}
	function getDocumentos() // este metodo podria no estar en esta clase, se incluye para simplificar el codigo, lo que hace es traer todos los clientes 
		{
			$obj_documento=new sQuery();
			$result=$obj_documento->executeQuery("SELECT Alumnos.numerocontrol, Alumnos.nombrealumno, Alumnos.apellidopaterno, Alumnos.apellidomaterno, Doctos.id, Doctos.docto1, Doctos.docto2, Doctos.docto3, Doctos.docto4, Doctos.docto5, Doctos.docto6, Doctos.docto7, Doctos.docto8, Doctos.docto9, Doctos.doctoa FROM Doctos INNER JOIN Alumnos ON Alumnos.id = Doctos.idAlumno ORDER BY Alumnos.numerocontrol ASC");
			return $result; // retorna todos los alumnos
		}
		
		// metodos que devuelven valores
	function getID()
	 { return $this->id;}
	function getNombreAlumno()
	 { return $this->nombrealumno;}
	function getApellidoPaterno()
	 { return $this->apellidopaterno;}
	function getApellidoMaterno()
         { return $this->apellidomaterno;}
	function getNumeroControl()
         { return $this->numerocontrol;}
	function getDocto1()
         { return $this->docto1;}
	function getDocto2()
         { return $this->docto2;}
	function getDocto3()
         { return $this->docto3;}
	function getDocto4()
         { return $this->docto4;}
	function getDocto5()
         { return $this->docto5;}
	function getDocto6()
         { return $this->docto6;}
	function getDocto7()
         { return $this->docto7;}
	function getDocto8()
         { return $this->docto8;}
	function getDocto9()
         { return $this->docto9;}
	function getDoctoa()
         { return $this->doctoa;}
	
	
	 
		// metodos que setean los valores
	function setNombreAlumno($val)
	 { $this->nombrealumno=$val;}
 	function setApellidoPaterno($val)
         {  $this->apellidopaterno=$val;}
	function setApellidoMaterno($val)
         {  $this->apellidomaterno=$val;}
	function setNumeroControl($val)
	 {  $this->numerocontrol=$val;}
	function setDocto1($val)
	 {  $this->docto1=$val;}
	function setDocto2($val)
	 {  $this->docto2=$val;}
	function setDocto3($val)
	 {  $this->docto3=$val;}
	function setDocto4($val)
	 {  $this->docto4=$val;}
	function setDocto5($val)
	 {  $this->docto5=$val;}
	function setDocto6($val)
	 {  $this->docto6=$val;}
	function setDocto7($val)
	 {  $this->docto7=$val;}
	function setDocto8($val)
	 {  $this->docto8=$val;}
	function setDocto9($val)
	 {  $this->docto9=$val;}
	function setDoctoa($val)
	 {  $this->doctoa=$val;}


	function updateDocumento()	// actualiza el cliente cargado en los atributos
	{
			$obj_documento=new sQuery();
			$query="UPDATE Doctos SET docto1='$this->docto1', docto2='$this->docto2', docto3='$this->docto3', docto4='$this->docto4', docto5='$this->docto5', docto6='$this->docto6', docto7='$this->docto7', docto8='$this->docto8', docto9='$this->docto9', doctoa='$this->doctoa' WHERE id = $this->id";
			$obj_documento->executeQuery($query); // ejecuta la consulta para traer al alumno
			return $query .'<br/>Registros afectados: '.$obj_documento->getAffect(); // retorna todos los registros afectados
	
	}
	function insertDocumento()	// inserta el alumno cargado en los atributos
	{
			$obj_documento=new sQuery();
			$query="INSERT INTO Doctos(
			docto1,
			docto2
			)
			VALUES(
			'$this->docto1',
			'$this->docto2'			
			)";
			
			$obj_documento->executeQuery($query); // ejecuta la consulta para traer al alumno
			return $query .'<br/>Registros afectados: '.$obj_documento->getAffect(); // retorna todos los registros afectados
	
	}	
	function deleteDocumento($val)	// elimina el alumno
	{
			$obj_documento=new sQuery();
			$query="DELETE FROM Doctos WHERE id=$val";
			$obj_documento->executeQuery($query); // ejecuta la consulta para  borrar el alumno
			return $query .'<br/>Registros afectados: '.$obj_documento->getAffect(); // retorna todos los registros afectados
	
	}	
	
}


?>
