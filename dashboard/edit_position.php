 <?php require_once "vistas/parte_superior.php"?>
 <?php include ('../database.php'); ?>
 <!--inicio del cont principal-->

 <div class="container">
    <h1>Cargos</h1>
    <h2> Editar datos</h2>
			<hr />
			
			<?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($mysql,(strip_tags($_GET["nik"],ENT_QUOTES)));
			$sql = mysqli_query($mysql, "SELECT * FROM cargos WHERE idCargo='$nik'");
			if(mysqli_num_rows($sql) == 0){
            header("Location: positions.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
            	
				$nombre		    = mysqli_real_escape_string($mysql,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 
				$entrada	 	= mysqli_real_escape_string($mysql,(strip_tags($_POST["entrada"],ENT_QUOTES)));//Escanpando caracteres 
				$salida	    = mysqli_real_escape_string($mysql,(strip_tags($_POST["salida"],ENT_QUOTES)));//Escanpando caracteres 
				$idEmpresa		= mysqli_real_escape_string($mysql,(strip_tags($_POST["idEmpresa"],ENT_QUOTES)));//Escanpando caracteres 
				
				
            $update = $mysql->query("UPDATE cargos SET idEmpresa='$idEmpresa', nombre='$nombre', entrada='$entrada', salida='$salida' WHERE idCargo='$nik'") or die(mysqli_error());
            
				if($update){
               echo '<script type="text/javascript">window.location.replace("edit_position.php?nik='.$nik.'&pesan=sukses")</script>';
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
					<label class="col-sm-3 control-label">Hora de Entrada</label>
					<div class="col-sm-3">
					<input type="text" name="entrada" value="<?php echo $row ['entrada']; ?>" class="form-control" placeholder="Hora de entrada" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Hora de Salida</label>
					<div class="col-sm-3">
						<input type="text" name="salida" value="<?php echo $row ['salida']; ?>" class="form-control" placeholder="Hora de Salida" required>
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
						<a href="positions.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
 </div>

 

 <!--Fin del cont principal-->
 
 <?php require_once "vistas/parte_inferior.php"?>
 
 
 