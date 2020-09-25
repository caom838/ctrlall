<?php require_once "vistas/parte_superior.php"?>

<?php include ('../database.php'); ?>

<!--inicio del cont principal-->

<div class="container">
   <h1>Perfil</h1>
   <?php 
         
         $consulta = "select e.*,em.nombre as nombreempresa , c.nombre as nombrecargo FROM empleados e"
         ." inner join empresas em on e.idEmpresa = em.IdEmpresa "
         ." inner join cargos c on e.idCargo = c.idCargo "
         ." where idEmpleado =" . $_SESSION["idEmpleado"]; 
         $sql = $mysql->query($consulta);
         $row = mysqli_fetch_assoc($sql);
        
   ?> 

<table class="table table-striped table-condensed">
				<tr>
					<th width="20%">Cédula</th>
					<td><?php echo $row['cc']; ?></td>
				</tr>
				<tr>
					<th>Nombre del empleado</th>
					<td><?php echo $row['nombre']; ?></td>
				</tr>
				<tr>
					<th>Apellido</th>
					<td><?php echo $row['apellido']; ?></td>
				</tr>
				<tr>
					<th>Teléfono</th>
					<td><?php echo $row['telefono']; ?></td>
            </tr>
            <tr>
					<th>E-Mail</th>
					<td><?php echo $row['email']; ?></td>
            </tr>
            <tr>
					<th>Cargo</th>
					<td><?php echo $row['nombrecargo']; ?></td>
				</tr>
				<tr>
					<th>Empresa</th>
					<td><?php echo $row['nombreempresa']; ?></td>
				</tr>
				
				
			</table>  
         <a href="edit_profile.php?nik=<?php echo $row['idEmpleado']; ?>" class="btn btn-sm btn-success"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span> Editar datos</a>




</div>


<!--Fin del cont principal-->

<?php require_once "vistas/parte_inferior.php"?>