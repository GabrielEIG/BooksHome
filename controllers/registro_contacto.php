<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnRegister"])) {
    // Obtiene los datos del formulario
    include "models/conexion.php";

    $name = $_POST["name"];
    $email = $_POST["email"];
    $asunt = $_POST["asunt"];
    $coment = $_POST["coment"];
    $date = date("Y-m-d H:i:s", time());

    if (empty($name) || empty($email) || empty($asunt) || empty($coment)) {
        echo '<div class="alert alert-warning" role="alert">
        Llenar todos los campos!.
      </div>';    
    }else{
        $sql = $conexion->query(" insert into contacto (fecha, correo, nombre, asunto, comentario) values('$date','$email','$name','$asunt','$coment') ");

        if ($sql == 1) {
            echo '<div class="alert alert-success" role="alert">
            Contacto guardado correctamente.
          </div>';
        }else{
            echo '<div class="alert alert-warning" role="alert">
            Error al guardar contacto!.
          </div>';
        }

        die();

    }


}
?>