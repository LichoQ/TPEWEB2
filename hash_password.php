<?php
// Conexión a la base de datos
$db = new PDO('mysql:host=localhost;dbname=comercio_ropa;charset=utf8', 'root', '');

// Tu contraseña en texto plano
$password = "admin";

// Hasheo de la contraseña
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Actualización de la contraseña en la base de datos
$username = "webadmin"; // Asegúrate de que este sea el nombre de usuario correcto en tu base de datos
$query = "UPDATE administrador SET password = :hashed_password WHERE username = :username";
$stmt = $db->prepare($query);
$stmt->bindParam(':hashed_password', $hashed_password);
$stmt->bindParam(':username', $username);
$stmt->execute();

echo "Contraseña hasheada y actualizada con éxito";
?>
