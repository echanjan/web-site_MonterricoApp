

<?php

include("conexion.php");

if(isset($_POST['send'])) {

    if(
        strlen($_POST['nombre']) >= 1 &&
        strlen($_POST['apellido']) >= 1 &&
        strlen($_POST['email']) >= 1 &&
        strlen($_POST['numero']) >= 1 &&
        strlen($_POST['empresa']) >= 1
    ) {
        $nombre = trim($_POST['nombre']);
        $apellido = trim($_POST['apellido']);
        $email = trim($_POST['email']);
        $numero = trim($_POST['numero']);
        $empresa = trim($_POST['empresa']);
        $fecha = date("d/m/y");
        $consulta = "INSERT INTO datos_formulario(nombre, apellido, email, numero, empresa, fecha)
                    VALUES ('$nombre', '$apellido', '$email', '$numero', '$empresa', '$fecha')";

        $resultado = mysqli_query($conexion, $consulta);
        if($resultado) {
            echo '<script>
                    document.getElementById("mensaje").innerHTML = "<h3 class=\'success\'>Tu registro se ha completado</h3>";
                  </script>';
        } else {
            echo '<script>
                    document.getElementById("mensaje").innerHTML = "<h3 class=\'error\'>Ocurrió un error</h3>";
                  </script>';
        }
        
    } else {
        // Mensaje de error como ventana emergente usando JavaScript
        echo '<script>alert("Llene todos los campos");</script>';
    }

}
?>

