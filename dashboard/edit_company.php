 <?php require_once "vistas/parte_superior.php"?>
 <?php include ('../database.php'); ?>
 <!--inicio del cont principal-->

 <div class="container">
    <h1>Empresa</h1>
    <h2> Editar datos</h2>
			<hr />
			
			<?php
			// escaping, additionally removing everything that could be (html/javascript-) code
			$nik = mysqli_real_escape_string($mysql,(strip_tags($_GET["nik"],ENT_QUOTES)));
			$sql = $mysql->query("SELECT * FROM empresas WHERE idEmpresa='$nik'");
			if(mysqli_num_rows($sql) == 0){
            header("Location: companies.php");
			}else{
				$row = mysqli_fetch_assoc($sql);
			}
			if(isset($_POST['save'])){
            	$nitEmpresa		     = mysqli_real_escape_string($mysql,(strip_tags($_POST["nitEmpresa"],ENT_QUOTES)));//Escanpando caracteres 
				$nombre		     = mysqli_real_escape_string($mysql,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 
				$telefono	 = mysqli_real_escape_string($mysql,(strip_tags($_POST["telefono"],ENT_QUOTES)));//Escanpando caracteres 
				$direccion	     = mysqli_real_escape_string($mysql,(strip_tags($_POST["direccion"],ENT_QUOTES)));//Escanpando caracteres 
				$email		 = mysqli_real_escape_string($mysql,(strip_tags($_POST["email"],ENT_QUOTES)));//Escanpando caracteres 
				
				
            $update = $mysql->query("UPDATE empresas SET nitEmpresa='$nitEmpresa', nombre='$nombre', direccion='$direccion', telefono='$telefono', email='$email' WHERE idEmpresa='$nik'") or die(mysqli_error());
            
				if($update){
               echo '<script type="text/javascript">window.location.replace("edit_company.php?nik='.$nik.'&pesan=sukses")</script>';
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
					<label class="col-sm-3 control-label">Nit Empresa</label>
					<div class="col-sm-2">
						<input type="text" name="nitEmpresa" value="<?php echo $row ['nitEmpresa']; ?>" class="form-control" placeholder="Nit" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombre</label>
					<div class="col-sm-4">
						<input type="text" name="nombre" value="<?php echo $row ['nombre']; ?>" class="form-control" placeholder="Nombre" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Dirección</label>
					<div class="col-sm-3">
						<textarea name="direccion" class="form-control" placeholder="Dirección"><?php echo $row ['direccion']; ?></textarea>
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
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="save" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="companies.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>
 </div>

 

 <!--Fin del cont principal-->
 
 <?php require_once "vistas/parte_inferior.php"?>
 
 
 