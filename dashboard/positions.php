 <?php require_once "vistas/parte_superior.php"?>
 <?php include ('../database.php'); ?>
<!--inicio del cont principal-->

<div class="container">
   <h1>Administración de Cargos</h1>

   <?php
			if(isset($_GET['aksi']) == 'delete'){
				// escaping, additionally removing everything that could be (html/javascript-) code
				$nik = mysqli_real_escape_string($mysql,(strip_tags($_GET["nik"],ENT_QUOTES)));
				$cek = $mysql->query("SELECT * FROM cargos WHERE idCargo='$nik'");
				if(mysqli_num_rows($cek) == 0){
					echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> No se encontraron datos.</div>';
				}else{
					$delete = $mysql->query("DELETE FROM cargos WHERE idCargo='$nik'");
					if($delete){
						echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Datos eliminado correctamente.</div>';
					}else{
						echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Error, no se pudo eliminar los datos.</div>';
					}
				}
			}
	?>

            <form class="form-inline" method="get">
				<div class="form-group">
                    <input name="filter" class="form-control" onchange="form.submit()" placeholder="Filtros de datos" />
					<?php $filter = (isset($_GET['filter']) ? strtolower($_GET['filter']) : NULL);  ?>
                </div>
                &nbsp; &nbsp;
                <input type="submit"value="Buscar" class="btn btn-sm btn-secondary">
                &nbsp; &nbsp;
                <a href="create_position.php" class="btn btn-sm btn-info">Crear nuevo</a>
			</form>
			<br />
			<div class="table-responsive">
			<table class="table table-striped table-hover">
				<tr>
               <th>No</th>
					<th>Nombre</th>
               <th>Hora Entrada</th>
               <th>Hora Salida</th>
					<th>Empresa</th>
               <th>Acciones</th>
				</tr>
				<?php
				if(strlen($filter) > 1){ //valida que en el filtro venga mas de un caracter
					$sql = $mysql->query("SELECT c.*,e.idEmpresa, e.nombre as nombreEmpresa FROM cargos c inner join empresas e on c.idEmpresa = e.IdEmpresa WHERE c.nombre like '%$filter%' ORDER BY c.nombre ASC");
				}else{
					$sql = $mysql->query("SELECT c.*,e.idEmpresa, e.nombre as nombreEmpresa FROM cargos c inner join empresas e on c.idEmpresa = e.IdEmpresa ORDER BY c.nombre ASC");
				}
				if(mysqli_num_rows($sql) == 0){
					echo '<tr><td colspan="8">No hay datos.</td></tr>';
				}else{
					$no = 1;
					while($row = mysqli_fetch_assoc($sql)){
						echo '
						<tr>
							<td>'.$no.'</td>
							<td><a href="positions.php?nik='.$row['idCargo'].'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$row['nombre'].'</a></td>
                            <td>'.$row['entrada'].'</td>
							<td>'.$row['salida'].'</td>
                     <td>'.$row['nombreEmpresa'].'</td>
							<td>
 
                                <a href="edit_position.php?nik='.$row['idCargo'].'" title="Editar datos" class="btn btn-primary btn-sm">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                    </svg>
                                </a>
								<a href="positions.php?aksi=delete&nik='.$row['idCargo'].'" title="Eliminar" onclick="return confirm(\'Esta seguro de borrar los datos '.$row['nombre'].'?\')" class="btn btn-danger btn-sm"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                              </svg></span></a>
							</td>
						</tr>
						';
						$no++;
					}
				}
				?>
			</table>
            
</div>



<!--Fin del cont principal-->

<?php require_once "vistas/parte_inferior.php"?>
