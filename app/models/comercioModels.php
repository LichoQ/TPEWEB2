<?php
require_once 'config.php';

class ComercioModel {

    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host='.MYSQL_HOST.';dbname='.MYSQL_DB.';charset=utf8', MYSQL_USER, MYSQL_PASS);

    }

    function listarProductos() {
        $sentencia = $this->db->prepare("SELECT * FROM producto");
        $sentencia->execute();
        $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }

    function listarCategorias() {
        $sentencia = $this->db->prepare("SELECT * FROM categoria");
        $sentencia->execute();
        $categorias = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $categorias;
    }

    function detalleItem($id) {
        $sentencia = $this->db->prepare("SELECT * FROM producto WHERE id=?");
        $sentencia->execute(array($id));
        $producto = $sentencia->fetch(PDO::FETCH_OBJ);
        return $producto;
    }

    function filtrarProductos($id_categoria) {
        $sentencia = $this->db->prepare("SELECT * FROM producto WHERE id_categoria=?");
        $sentencia->execute(array($id_categoria));
        $productos = $sentencia->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }
    function agregarProducto($nombre, $descripcion, $precio, $id_categoria){
        $sentencia = $this->db->prepare("INSERT INTO producto (nombre, descripcion, precio, id_categoria)VALUES(?,?,?,?)");
        $sentencia->execute([$nombre, $descripcion, $precio, $id_categoria]);
    }

    function borrarProducto($id) {
        $sentencia = $this->db->prepare("DELETE FROM producto WHERE id=?");
        $sentencia->execute([$id]);
        
    }

    function editarProducto($id, $nombre, $descripcion, $precio, $id_categoria) {
        $sentencia = $this->db->prepare("UPDATE producto SET nombre=?, descripcion=?, precio=?, id_categoria=? WHERE id=?");
        $sentencia->execute([$nombre, $descripcion, $precio, $id_categoria, $id]);
    }

    function getProductoById($id) {
        $sentencia = $this->db->prepare("SELECT * FROM producto WHERE id=?");
        $sentencia->execute([$id]);
        $producto = $sentencia->fetch(PDO::FETCH_OBJ);
        return $producto;
    }

    function agregarCategoria($nombre) {
        $sentencia = $this->db->prepare("INSERT INTO categoria (nombre_categoria)VALUES(?)");
        $sentencia->execute([$nombre]);
    }

    function borrarCategoria($id) {
        $sentencia = $this->db->prepare("DELETE FROM categoria WHERE id=?");
        $sentencia->execute([$id]);
    }

    function editarCategoria($id, $nombre) {
        $sentencia = $this->db->prepare("UPDATE categoria SET nombre=? WHERE id=?");
        $sentencia->execute([$nombre, $id]);

    }



    
}