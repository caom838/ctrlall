<?php
    include('database.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrate</title>
    <link href="https://fonts.googleapis.com/css2?family=Merienda+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Assets/Css/Stylesignup.css">
</head>
<body>
    <h1>Registrate</h1>
    <form action="signup.php" method="post">
        <input type="text" name="nombre" placeholder="Ingrese su Nombre">

        <input type="text" name="apellido" placeholder="Ingrese su Apellido">

        <input type="text" name="cc" placeholder="Ingrese su No.Cedula">

        <input type="tel" name="telefono" placeholder="Telefono/Celular">
        <br>

        <!--- Desplegable de cargos-->
        <p>Seleccione una un cargo:</p>          
        <select name="cargo" id="cargo">
        <option>seleccione</option>
            <?php
                $cargos= $mysql -> query ("SELECT * FROM cargos");
                while ($valores = mysqli_fetch_array($cargos)) {
                   echo "<option>";
                   echo $valores['nombre'];
                   echo "</option>";
               }
            ?>
        </select>
        
        <p>Seleccione una empresa:</p>
        <select name="empresa"> 
                 <option>Seleccione</option>
                    <?php
                        $empresas= $mysql -> query ("SELECT * FROM empresas");
                        while ($valores = mysqli_fetch_array($empresas)) {
                            echo '<option value="'.$valores['idEmpresa'].'">'.$valores['nombre'].'</option>';
                       }
                    ?>
        </select>
        <br>

        <input type="email" name="email" placeholder="Dirección de Correo Electronico">

        <input type="password" name="pw" placeholder="Ingrese su Contraseña">

        <input type="password" name="pw2" placeholder="Confirme su Contraseña">
        <br>
         
        <input type="submit" value="Registrarse">
    </form>   
    
</body>
</html>