
 <?php require_once "vistas/parte_superior.php"?>
 <?php include ('../database.php'); ?>
 <!--inicio del cont principal-->

 <div class="container">
 <h1>Cargos</h1>
    <h2> Crear</h2>


    <?php
			if(isset($_POST['add'])){
				$nombre		    = mysqli_real_escape_string($mysql,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 
				$entrada	 	= mysqli_real_escape_string($mysql,(strip_tags($_POST["entrada"],ENT_QUOTES)));//Escanpando caracteres 
				$salida	    	= mysqli_real_escape_string($mysql,(strip_tags($_POST["salida"],ENT_QUOTES)));//Escanpando caracteres 
				$idEmpresa		= mysqli_real_escape_string($mysql,(strip_tags($_POST["idEmpresa"],ENT_QUOTES)));//Escanpando caracteres 
				
			
 
				$cek = mysqli_query($mysql, "SELECT * FROM cargos WHERE nombre='$nombre'");
				if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($mysql, "INSERT INTO cargos(nombre, entrada, salida, idEmpresa)
															VALUES('$nombre','$entrada', '$salida', $idEmpresa)") or die(mysqli_error());
						if($insert){
							echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Bien hecho! Los datos han sido guardados con éxito.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. No se pudo guardar los datos !</div>';
						}
					 
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Error. código exite!</div>';
				}
			}
			?>
 
			<form class="form-horizontal" action="" method="post">
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombre del Cargo</label>
					<div class="col-sm-4">
						<input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Hora de Entrada</label>
					<div class="col-sm-3">
						<input type="text" name="entrada" class="form-control" placeholder="Hora de Entrada" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Hora de Salida</label>
					<div class="col-sm-3">
						<input type="text" name="salida" class="form-control" placeholder="Hora de Salida" required>
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
											echo ' >'.$valores['nombre'].'</option>';
									}
									?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="positions.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>


 </div>

 

 <!--Fin del cont principal-->
 
 <?php require_once "vistas/parte_inferior.php"?>
 
 
 