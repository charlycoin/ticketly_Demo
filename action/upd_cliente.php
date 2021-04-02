<?php	

	//upd asesor by Carlos Bejarano
	session_start();

		if (empty($_POST['mod_id_rol'])) {
           $errors[] = "ID vacío";
        }else if (empty($_POST['mod_Nit'])) {
           $errors[] = "Nit de la empresa vacío";
        }else if (empty($_POST['mod_name_Empresa'])){
			$errors[] = "Nombre de la empresa  vacío";
        }
		  else if (
		  	!empty($_POST['mod_Nit']) &&
			!empty($_POST['mod_name_Empresa']) &&			 			
		){

		include "../config/config.php";//Contiene funcion que conecta a la base de datos

		$id=$_POST["mod_id_cliente"];		
		//$nit=$_POST["mod_Nit"];
		$nit=intval($_POST['mod_Nit']);
		$empresa = $_POST["mod_name_Empresa"];
		//$telefono = $_POST["mod_telefono"];
		$telefono=intval($_POST['mod_telefono']);
		$email = $_POST["mod_email"];
		//$Fecha_Ini_Contrato = $_POST["mod_Fecha_Ini_Contrato"];	
		$Fecha_Ini_Contrato=date('Y-m-d H:i:s', $_POST["mod_Fecha_Ini_Contrato"]);
		//$Fecha_Fin_Contrato = $_POST["mod_Fecha_Fin_Contrato"];	
		$Fecha_Fin_Contrato=date('Y-m-d H:i:s', $_POST["mod_Fecha_Fin_Contrato"]);	
		$Observaciones = $_POST["mod_Observaciones"];
		//$Fecha_Ini_Servicio = $_POST["mod_Fecha_Ini_Servicio"];
		$Fecha_Ini_Servicio=date('Y-m-d H:i:s', $_POST["mod_Fecha_Ini_Servicio"]);
		//$Fecha_Fin_Servicio = $_POST["mod_Fecha_Fin_Servicio"];	
		$Fecha_Fin_Servicio=date('Y-m-d H:i:s', $_POST["mod_Fecha_Fin_Servicio"]);	
		$user_id = $_SESSION["user_id"];
		$asesor=$_POST["mod_asigned_id"];
		//$status=$_POST["mod_status_cliente"];
		$status=intval($_POST['mod_status_cliente']);


		/*$nit=mysqli_real_escape_string($con,(strip_tags($_POST["mod_Nit"],ENT_QUOTES)));
		$empresa=mysqli_real_escape_string($con,(strip_tags($_POST["mod_name_Empresa"],ENT_QUOTES)));
		$represent=mysqli_real_escape_string($con,(strip_tags($_POST["mod_name_Representante"],ENT_QUOTES)));
		$telefono=intval($_POST['mod_telefono']);
		$email=$_POST["mod_email"];
		$Fecha_Ini_Contrato=$_POST["mod_Fecha_Ini_Contrato"];
		$Fecha_Fin_Contrato=$_POST["mod_Fecha_Fin_Contrato"];		
		$Observaciones=$_POST["mod_Observaciones"];
		$Fecha_Ini_Servicio=$_POST["mod_Fecha_Ini_Servicio"];
		$Fecha_Fin_Servicio=$_POST["mod_Fecha_Fin_Servicio"];
		$user_id = $_SESSION["user_id"];
		$asesor=mysqli_real_escape_string($con,(strip_tags($_POST["mod_asigned_id"],ENT_QUOTES)));
		$status=$_POST["mod_status_cliente"];	*/	

		//$sql="UPDATE asesor SET username=\"$nit\", name=\"$name\", telefono=\"$telefono\", email=\"$email\",is_active=$status  WHERE id=$id";
		/*$sql="UPDATE clientes SET Nit=\"$nit\",name_Empresa=\"$empresa\",name_Representante=\"$represent\",telefono=\"$telefono\",email=\"$email\",Fecha_Ini_Contrato=\"$Fecha_Ini_Contrato\",Fecha_Fin_Contrato=\"$Fecha_Fin_Contrato\",Observaciones=\"$Observaciones\",
		  Fecha_Ini_Servicio=\"$Fecha_Ini_Servicio\",Fecha_Fin_Servicio=\"$Fecha_Fin_Servicio\",user_id=\"$user_id\",asigned_id=\"$asesor\",is_active=\"$status\"  WHERE id_cliente=$id"; */

		  //$sql = "UPDATE clientes SET is_active=1 WHERE id_cliente=$id";
		 
		//$sql="UPDATE clientes SET (Nit, name_Empresa, name_Representante, telefono, email, Fecha_Ini_Contrato, Fecha_Fin_Contrato, Observaciones, Fecha_Ini_Servicio, Fecha_Fin_Servicio, asigned_id, is_active) VALUES ('$nit','$empresa', '$represent', '$telefono', '$email', '$Fecha_Ini_Contrato', '$Fecha_Fin_Contrato', '$Observaciones', '$Fecha_Ini_Servicio', '$Fecha_Fin_Servicio', '$asesor', $status) WHERE id_cliente=$id";

		$sql2="update clientes SET Nit=\"$nit\",name_Empresa=\"$empresa\",name_Representante=\"$represent\",telefono=\"$telefono\",email=\"$email\",Fecha_Ini_Contrato='$Fecha_Ini_Contrato',Fecha_Fin_Contrato='$Fecha_Fin_Contrato',Observaciones=\"$Observaciones\",Fecha_Ini_Servicio='$Fecha_Ini_Servicio',Fecha_Fin_Servicio='$Fecha_Fin_Servicio',user_id=\"$user_id\",asigned_id=\"$asesor\",is_active=\"$status\"  WHERE id_cliente=$id";

		//$sql2= "UPDATE clientes SET telefono=\"$telefono\",user_id=\"$user_id\",is_active=\"$status\" WHERE id_cliente=$id";
		
		$query_update = mysqli_query($con,$sql2);
			if ($query_update){
				$messages[] = "Datos actualizados satisfactoriamente.";
			} else{
				$errors []= "Lo siento algo ha salido mal intenta nuevamente.".mysqli_error($con);
			}
		} else {
			$errors []= "Error desconocido.";
		}
		
		if (isset($errors)){
			
			?>
			<div class="alert alert-danger" role="alert">
				<button type="button" class="close" data-dismiss="alert">&times;</button>
					<strong>Error!</strong> 
					<?php
						foreach ($errors as $error) {
								echo $error;
							}
						?>
			</div>
			<?php
			}
			if (isset($messages)){
				
				?>
				<div class="alert alert-success" role="alert">
						<button type="button" class="close" data-dismiss="alert">&times;</button>
						<strong>¡Bien hecho!</strong>
						<?php
							foreach ($messages as $message) {
									echo $message;
								}
							?>
				</div>
				<?php
			}

?>