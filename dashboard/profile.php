<?php require_once "vistas/parte_superior.php"?>

<?php include ('../database.php'); ?>

<!--inicio del cont principal-->

<div class="container">
   <h1>Perfil</h1>
   <?php 
         echo $_SESSION["idEmpleado"]; 
         $consulta = " select * FROM empleados where idEmpleado =" . $_SESSION["idEmpleado"]; 
   

        if ( $empleados = $mysql->query($consulta)) {
         $valores = mysqli_fetch_array($empleados);
         echo $valores["nombre"];
         echo $valores["apellido"];
         echo $valores["cargo"];
         echo $valores["telefono"];


        };
   ?> 

   <head>
   <style>
      table, th, td {
      border: 1px solid black;
}
   </style>
   </head>

   <table style="width:100%">
   
    <tr>
      <th>Firstname</th>
      <th>Lastname</th>
      <th>Age</th>
   </tr>
   <tr>
      <td>Jill</td>
      <td>Smith</td>
      <td>50</td>
   </tr>
   <tr>
       <td>Eve</td>
       <td>Jackson</td>
       <td>94</td>
   </tr>
 </table>




</div>


<!--Fin del cont principal-->

<?php require_once "vistas/parte_inferior.php"?>