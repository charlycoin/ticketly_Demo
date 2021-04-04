<?
require_once '../config/config.php';//CONEXION A LA BD

$fecha1=$_POST['fecha1'];
$fecha2=$_POST['fecha2'];

if(isset($_POST['generar_reporte']))
{
	// NOMBRE DEL ARCHIVO Y CHARSET
	header('Content-Type:text/csv; charset=latin1');
	header('Content-Disposition: attachment; filename="Reporte_Fechas_Ingreso.csv"');

	// SALIDA DEL ARCHIVO
	$salida=fopen('php://output', 'w');
	// ENCABEZADOS
	fputcsv($salida, array('TICKET', 'ASUNTO', 'ESTADO', 'FECHA', 'ASESOR'));
	// QUERY PARA CREAR EL REPORTE
	//$reporteCsv=$conexion->query("SELECT *  FROM alumnos where fecha_ingreso BETWEEN '$fecha1' AND '$fecha2' ORDER BY id_alumno");
	$reporteCsv=$con->query("SELECT *  FROM ticket where created_at BETWEEN '$fecha1' AND '$fecha2' ORDER BY created_at desc");
	while($filaR= $reporteCsv->fetch_assoc())
		fputcsv($salida, array($filaR['id'], 
								$filaR['nombre'],
								$filaR['title'],
								$filaR['status_id'],
								$filaR['created_at']));

}

?>