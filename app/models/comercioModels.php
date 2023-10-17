<?php

class ComercioModel {

    private $db;

    function __construct() {
        $this->db = new PDO('mysql:host=localhost;'.'dbname=comercio_ropa;charset=utf8', 'root', '');
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
}