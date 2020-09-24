<?php
    include ('database.php');
    if (isset($_POST['nombre']) && !empty($_POST['nombre'])) { //para verificar mejor 
          //$conn = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
        $nombre = $_POST['nombre']; 
        $apellido = $_POST['apellido'];
        $cc = $_POST['cc'];
        $telefono = $_POST['telefono'];
        $cargo = $_POST['cargo'];
        $email = $_POST['email'];
        $pw = $_POST['pw'];
        $pw2 = $_POST['pw2'];
        $empresa = $_POST['empresa'];

        //Esto es lo del tío de Alejandro
        if($pw !== $pw2){
            echo "<script>alert('Error, la contraseña no coinciden con su confirmación, por favor ingresar de nuevo');</script>";
        }

        //Realizamos la inserción de datos en empleados
        $registrar = "INSERT INTO empleados (nombre , apellido , pw , cc , cargo , telefono , email , idEmpresa )". 
        " VALUES ('". $nombre."','" . $apellido."','" . $pw . "','" . $cc  . "','" . $cargo . "','" . $telefono . "','" . $email . "'," .  $empresa . ")";

        //Ejecutar inserción
        //$ejecutar = $mysql->query($registrar);
        //echo "<h2>Se ha ingresado el usuario</h2>";
        if ($mysql->query($registrar) === TRUE) {
            echo "Se registro correctamente";
            echo "<button><a href='login.html'>Ingresar</a></button>";
          } else {
            echo "Error: " . $sql . "<br>" . $mysql->error;
          }

    }
    else{
        echo "<h2>Algo no ha servido :( </h2>";
        echo "<a href=index.html><h3>Regrese a la página de inicio</h3></a>";
    }
?>