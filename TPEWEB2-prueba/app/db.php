<?php
//abrimos la conexion a la base de datos
function getConnection() {
    //dbname es el nombre de la base de datos
    $db = new PDO('mysql:host=localhost;'.'dbname=comercio_ropa;charset=utf8', 'root', '');
    return $db;
}

/**
 * obteiene y devuelve todas las tareas de la base de datos
 */

function listarProductos() {
    //abrimos la conexion a la base de datos usando la funcion getConnection()
    //dbname es el nombre de la base de datos
    $db = getConnection();
    //enviamos la consulta y obtenemos las tareas
    //FROM tareas es la tabla de la base de datos
    $sentencia = $db->prepare("SELECT * FROM producto");
    $sentencia->execute();
    //obtengo todos los daos que arroja la query
    $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
    return $productos;

    var_dump($productos);

    //3 mostrar las tareas obtenidas

    //4 cerrar la conexion


}

//funcion para insertar producto
function insertProducto($nombre, $descripcion, $precio, $id_categoria) {
    $db = getConnection();
    $sentencia = $db->prepare("INSERT INTO producto(nombre, descripcion, precio, id_categoria) VALUES(?,?,?,?)");
    $sentencia->execute(array($nombre, $descripcion, $precio, $id_categoria));
    return $db->lastInsertId();
    var_dump($sentencia->errorInfo());
}






