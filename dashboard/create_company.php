
 <?php require_once "vistas/parte_superior.php"?>
 <?php include ('../database.php'); ?>
 <!--inicio del cont principal-->

 <div class="container">
 <h1>Empresa</h1>
    <h2> Crear</h2>


    <?php
			if(isset($_POST['add'])){
				$nitEmpresa		     = mysqli_real_escape_string($mysql,(strip_tags($_POST["nitEmpresa"],ENT_QUOTES)));//Escanpando caracteres 
				$nombre		     = mysqli_real_escape_string($mysql,(strip_tags($_POST["nombre"],ENT_QUOTES)));//Escanpando caracteres 
				$telefono	 = mysqli_real_escape_string($mysql,(strip_tags($_POST["telefono"],ENT_QUOTES)));//Escanpando caracteres 
				$direccion	     = mysqli_real_escape_string($mysql,(strip_tags($_POST["direccion"],ENT_QUOTES)));//Escanpando caracteres 
				$email		 = mysqli_real_escape_string($mysql,(strip_tags($_POST["email"],ENT_QUOTES)));//Escanpando caracteres 
				
			
 
				$cek = mysqli_query($mysql, "SELECT * FROM empresas WHERE nitEmpresa='$nitEmpresa'");
				if(mysqli_num_rows($cek) == 0){
						$insert = mysqli_query($mysql, "INSERT INTO empresas(nitEmpresa, nombre, direccion, telefono, email)
															VALUES('$nitEmpresa','$nombre','$direccion', '$telefono', '$email')") or die(mysqli_error());
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
					<label class="col-sm-3 control-label">Nit Empresa</label>
					<div class="col-sm-2">
						<input type="text" name="nitEmpresa" class="form-control" placeholder="Nit Empresa" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Nombre</label>
					<div class="col-sm-4">
						<input type="text" name="nombre" class="form-control" placeholder="Nombre" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Dirección</label>
					<div class="col-sm-3">
						<textarea name="direccion" class="form-control" placeholder="Dirección"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">Teléfono</label>
					<div class="col-sm-3">
						<input type="text" name="telefono" class="form-control" placeholder="Teléfono" required>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label">E-mail</label>
					<div class="col-sm-3">
						<input type="text" name="email" class="form-control" placeholder="E-mail" required>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-sm-3 control-label">&nbsp;</label>
					<div class="col-sm-6">
						<input type="submit" name="add" class="btn btn-sm btn-primary" value="Guardar datos">
						<a href="companies.php" class="btn btn-sm btn-danger">Cancelar</a>
					</div>
				</div>
			</form>


 </div>

 

 <!--Fin del cont principal-->
 
 <?php require_once "vistas/parte_inferior.php"?>
 
 
 