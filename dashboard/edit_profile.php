 <?php require_once "vistas/parte_superior.php"?>
 <?php include ('../database.php'); ?>
 <!--inicio del cont principal-->

 <div class="container">
    <h1>Perfil</h1>
    <h2> Editar datos</h2>
			<hr />
			
			<?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($mysql,(strip_tags($_GET["nik"],ENT_QUOTES)));
			$consulta = "select e.*,em.nombre as nombreempresa , c.nombre as nombrecargo FROM empleados e"
			." inner join empresas em on e.idEmpresa = em.IdEmpresa "
			." inner join cargos c on e.idCargo = c.idCargo "
			." where idEmpleado ='$nik'"; 

			$sql = $mysql->query($consulta);
			if(mysqli_num_rows($sql) == 0){
            header("Location: profile.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
            	
				$nombre		     = mysqli_real_escape_string($mysql,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 
				$apellido		     = mysqli_real_escape_string($mysql,(strip_tags($_POST["apellido"],ENT_QUOTES)));//Escanpando caracteres 
				$telefono	 = mysqli_real_escape_string($mysql,(strip_tags($_POST["telefono"],ENT_QUOTES)));//Escanpando caracteres 
				$cc	     = mysqli_real_escape_string($mysql,(strip_tags($_POST["cc"],ENT_QUOTES)));//Escanpando caracteres 
				$email		 = mysqli_real_escape_string($mysql,(strip_tags($_POST["email"],ENT_QUOTES)));//Escanpando caracteres 
				$cargo		 = mysqli_real_escape_string($mysql,(strip_tags($_POST["cargo"],ENT_QUOTES)));//Escanpando caracteres 
				$idCargo		 = mysqli_real_escape_string($mysql,(strip_tags($_POST["idCargo"],ENT_QUOTES)));//Escanpando caracteres 
				$idEmpresa		 = mysqli_real_escape_string($mysql,(strip_tags($_POST["idEmpresa"],ENT_QUOTES)));//Escanpando caracteres 
				
				
            $update = $mysql->query("UPDATE empleados SET idEmpresa='$idEmpresa', nombre='$nombre',apellido='$apellido',cc='$cc', cargo='$cargo', idCargo='$idCargo', telefono='$telefono', email='$email' WHERE idEmpleado='$nik'") or die(mysqli_error());
            
				if($update){
               echo '<script type="text/javascript">window.location.replace("profile.php?nik='.$nik.'&pesan=sukses")</script>';
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error, no se pudo guardar los datos.</div>';
				}
			}
			
			if(isset($_GET['pesan']) == 'sukses'){
				echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Los datos han sido guardados con éxito.</div>';
			}
			?>
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombre</label>
					<div class="col-sm-4">
						<input type="text" name="nombre" value="<?php echo $row ['nombre']; ?>" class="form-control" placeholder="Nombre" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">apellido</label>
					<div class="col-sm-4">
					<input type="text" name="apellido" value="<?php echo $row ['apellido']; ?>" class="form-control" placeholder="Apellido" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Cédula</label>
					<div class="col-sm-3">
					<input type="text" name="cc" value="<?php echo $row ['cc']; ?>" class="form-control" placeholder="Cédula" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Teléfono</label>
					<div class="col-sm-3">
						<input type="text" name="telefono" value="<?php echo $row ['telefono']; ?>" class="form-control" placeholder="Teléfono" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Email</label>
					<div class="col-sm-3">
						
						<input type="text" name="email" value="<?php echo $row ['email']; ?>" class="form-control" placeholder="E-Mail" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Cargo</label>
					<div class="col-sm-3">
						<select name="idCargo" required class="form-control"> 
								<option>Seleccione</option>
									<?php
										$empresas= $mysql -> query ("SELECT * FROM cargos");
										while ($valores = mysqli_fetch_array($empresas)) {
											echo '<option value="'.$valores['idCargo'].'" ';
											if($valores['idCargo']==$row['idCargo'] || $valores['nombre']==$row['cargo']){echo "selected";}  
											echo ' >'.$valores['nombre'].'</option>';
									}
									?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Empresa</label>
					<div class="col-sm-3">
						<select name="idEmpresa" required class="form-control"> 
								<option>Seleccione</option>
									<?php
										$empresas= $mysql -> query ("SELECT * FROM empresas");
										while ($valores = mysqli_fetch_array($empresas)) {
											echo '<option value="'.$valores['idEmpresa'].'" ';
											if($valores['idEmpresa']==$row['idEmpresa']){echo "selected";}  
											echo ' >'.$valores['nombre'].'</option>';
									}
									?>
						</select>
					</div>
				</div>
							
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="profile.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
 </div>

 

 <!--Fin del cont principal-->
 
 <?php require_once "vistas/parte_inferior.php"?>
 
 
 