<?php
    session_start();

    include ('database.php');
    if (isset($_POST['cc']) && !empty($_POST['cc'])) { //para verificar mejor 
        $cc = $_POST['cc']; 
        $psw = $_POST['psw'];
    } else{
        echo "<h2>Algo no ha servido :( </h2>";
        echo "<a href=index.html><h3>Regrese a la página de inicio</h3></a>";
    }
    $consulta = "select * FROM empleados where cc =" . $cc  . " AND pw = " . $psw; 
   

    if ( $empleados = $mysql->query($consulta)) {
     
        /* determinar el número de filas del resultado */

        $row_cnt = $empleados->num_rows;
    
            if ($row_cnt >= 1){
                $valores = mysqli_fetch_array($empleados);
                $_SESSION["idEmpleado"] = $valores["idEmpleado"];    

                header("Location: dashboard/index.php?idEmpleado=" . $valores['idEmpleado']);
                

            }else{
            echo "verifique sus datos";

            }
         
        } else {
            echo "Error: " . $sql . "<br>" . $mysql->error;
    }

?>