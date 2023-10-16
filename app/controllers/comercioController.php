<?php
require_once 'app/models/comercioModels.php';
require_once 'app/views/comercioView.php';

class ComercioController {

    private $model;
    private $view;

    function __construct() {
        $this->model = new ComercioModel();
        $this->view = new ComercioView();
    }

    function listarProductos() {
        $productos = $this->model->listarProductos();
        
        $this->view->mostrarProductos($productos);
    }

    function agregarProducto() {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $id_categoria = $_POST['id_categoria'];
        $this->model->agregarProducto($nombre, $descripcion, $precio, $id_categoria);
        header("Location: " . BASE_URL . "home");
    }

    function borrarProducto($id) {
        $this->model->borrarProducto($id);
        header("Location: " . BASE_URL . "home");
    }

    function editarProducto($id) {
        $producto = $this->model->editarProducto($id);
        $categorias = $this->model->listarCategorias();
        $this->view->mostrarEditarProducto($producto, $categorias);
    }

    function guardarEditarProducto() {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $id_categoria = $_POST['id_categoria'];
        $id = $_POST['id'];
        $this->model->guardarEditarProducto($nombre, $descripcion, $precio, $id_categoria, $id);
        header("Location: " . BASE_URL . "home");
    }

    function filtrarProductos() {
        $id_categoria = $_POST['id_categoria'];
        $productos = $this->model->filtrarProductos($id_categoria);
        $categorias = $this->model->listarCategorias();
        $this->view->mostrarProductosPorCategoria($productos, $categorias);
    }

    function filtrarProductosPorPrecio() {
        $precio = $_POST['precio'];
        $productos = $this->model->filtrarProductosPorPrecio($precio);
        $categorias = $this->model->listarCategorias();
        $this->view->mostrarProductosPorPrecio($productos, $categorias);
    }

    function prueba() {
        $this->view->mostrarPrueba();
    }

    

}