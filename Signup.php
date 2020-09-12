<?php
   //require 'database.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrate</title>

</head>
<body>
    <h1>Registrate</h1>
    <spam>o <a href="Signup.php">Iniciar sesion</a></spam>
 
    <link href="https://fonts.googleapis.com/css2?family=Merienda+One&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="Assets/Css/stylesignup.css">
<form action="database.php" method="post">
    <input type="text" name="nombre" placeholder="Ingrese su Nombre">
    <input type="text" name="apellido" placeholder="Ingrese su Apellido">
    <input type="text" name="doc" placeholder="Ingrese su No.Cedula">
    <input type="text" name="telefono" placeholder="Telefono/Celular">
    <input type="text" name="direccion" placeholder=" Ingrese su Dirección">
    <input type="text" name="email" placeholder="Dirección de Correo Electronico">
    <input type="password" name="contrasena" placeholder="Ingrese su Contraseña">
    <input type="password" name="contrasena_confirm" placeholder="Confirme su Contraseña">
    <span ><a Style="color:black;"href="Login.php">Inicia sesión</a></span>
    <input type="submit" value="Registrarse">
</form>   
    
</body>
</html>