<?php 
  $server = 'localhost';
  $username = 'ctrall_team';
  $password = '1234567890';
  $database = 'ctrlall';

  

if (isset($_POST['nombre'])) {
  try {
      //$conn = new PDO("mysql:host=$server;dbname=$database;",$username,$password);
    $nombre = $_POST["nombre"]; 
    $apellido = $_POST["apellido"];
    $documento = $_POST["doc"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $email = $_POST["email"];
    $contrasena = $_POST["contrasena"];
    $contrasena_confir = $_POST["contrasena_confirm"];
    $nitEmpresa = 12345;
    $idCargo = 1;

    
    if($contrasena != $contrasena_confir)
    {
      echo "<script>alert('Error, la contraseña no coinciden con su confirmación, por favor ingresar de nevo');</script>";
      exit;
    }


    $con = mysqli_connect($server, $username, $password, $database);
    if (!$con) {
      echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
      echo "errno de depuración: " . mysqli_connect_errno() . PHP_EOL;
      echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
      exit;
    }


    // prepare and bind
    $stmt = $con->prepare("INSERT INTO empleados (nombre, apellido, pw , cc, telefono , email, direccion,nitEmpresa, idcargo ) VALUES (?, ?, ?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssssii", $nombre, $apellido, $password, $documento, $telefono, $email, $direccion,$nitEmpresa,$idCargo );

    //ejecuta sql dentro de bd
    $stmt->execute();


    //consultar
    $sql       = "SELECT * FROM empresas";
    $resultado = $con-> query($sql);
    /* obtener el array de objetos */
    while ($fila = $resultado->fetch_row()) {
      printf ("%s (%s)\n", $fila[0], $fila[1]);
  }

    //cierra la coneccion con la bd
    $stmt->close();
    $con->close();

    // Renderizar en pantalla
    echo "<H3>Se ingresó nuevamente el empleado</H3>";
    echo "<form action='Login.php'><input type='submit' value='Iniciar Sesión' /></form>";

    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
  } 
?>