<?php
// Conexión a la base de datos (debes reemplazar estos valores con los de tu propia configuración)
class Cconexion {
    function ConexionBD(){
        $host = "127.0.0.1";
        $database = "registro";
        $username = "root";
        $password = "";
        


        try{
            $conn = new PDO ("mysql:host= $host; dbname= $database ", $username, $password );
            echo ("Se conecto correctamente a la base de datos");
        } catch (PDOException $exp){

        echo("no se logro conectar correctamente con la base de datos: $database, error : $exp");
        }
        return $conn;
    }

}


require_once 'conexion.php';

// Verifica si se enviaron datos desde el formulario
include 'prosear_registro.php'; // Incluye el archivo de conexión

// Verifica si se ha enviado el formulario
if (isset($_POST['registrar'])) {
    // Recibe los datos del formulario
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $correo = $_POST["correo"];
    $contrasena = $_POST["contrasena"];

    // Establece la conexión a la base de datos
    $conexion = new Cconexion();
    $conn = $conexion->ConexionBD();

    // Prepara la consulta SQL para insertar los datos en la tabla de usuarios
    $sql = "INSERT INTO usuarios (nombre, apellido, correo, contrasena) VALUES (:nombre, :apellido, :correo, :contrasena)";

    // Prepara y ejecuta la consulta
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':apellido', $apellido);
    $stmt->bindParam(':correo', $correo);
    $stmt->bindParam(':contrasena', $contrasena);

    // Ejecuta la consulta y maneja cualquier error
    if ($stmt->execute()) {
        echo "Registro exitoso";
    } else {
        echo "Error al registrar: " . $stmt->errorInfo()[2];
    }
}
?>
// // Crear conexión
// $conn = new mysqli($servername, $username, $password, $database,$port);

// // Verificar conexión
// if ($conn->connect_error) {
//     die("Conexión fallida: " . $conn->connect_error);
// }

// // Recibir los datos del formulario
// $nombre = $_POST['nombre'];
// $apellido = $_POST['apellido'];
  // $correo = $_POST['correo'];
// $contrasena = $_POST['contrasena'];

// // Hash de la contraseña
// $hashed_password = password_hash($contrasena, PASSWORD_DEFAULT);

// // Insertar los datos en la base de datos
// $sql = "INSERT INTO datos (nombre, apellido, correo, contrasena) VALUES ('$nombre', '$apellido', '$correo', '$hashed_password')";

// if ($conn->query($sql) === TRUE) {
//     echo "Registro exitoso";
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// // Cerrar conexión
// $conn->close();
?>