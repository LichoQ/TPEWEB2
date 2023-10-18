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
        header("Location: " . BASE_URL . "listado-items");
    }

    function borrarProducto($id) {
        $this->model->borrarProducto($id);
        header("Location: " . BASE_URL . "item-eliminado");
    }

    function mostrarEditarProducto($id) {
        $producto = $this->model->getProductoById($id);
        $this->view->renderEditarProducto($producto);
    }

    function editarProducto($id) {
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $id_categoria = $_POST['id_categoria'];
        $id = $_POST['id'];
        $this->model->editarProducto($nombre, $descripcion, $precio, $id_categoria, $id);
        header("Location: " . BASE_URL . "listado-items");
    }

    function filtrarProductos() {
        $id_categoria = $_POST['id_categoria'];
        $productos = $this->model->filtrarProductos($id_categoria);
        $categorias = $this->model->listarCategorias();
        $this->view->mostrarProductosPorCategoria($productos, $categorias);
    }

    function listarCategoria() {
        $categorias = $this->model->listarCategorias();
        $this->view->mostrarCategorias($categorias);
    }

    function renderItemEliminado() {
        $this->view->renderItemEliminado();
    }


    function borrarCategoria($id) {
        $this->model->borrarCategoria($id);
        header("Location: " . BASE_URL . "listarCategoria");
    }

    function editarCategoria($id) {
        $nombre = $_POST['nombre'];
        $id = $_POST['id'];
        $this->model->editarCategoria($nombre, $id);
        header("Location: " . BASE_URL . "listarCategoria");
    }

    function detalleProducto($id) {
        $producto = $this->model->detalleItem($id);
        $this->view->mostrarDetalleItem($producto);
    }

    function agregarCategoria() {
        if (isset($_POST['nombre_categoria'])) {  // Aquí cambiamos 'nombre' por 'nombre_categoria'
            $nombre_categoria = $_POST['nombre_categoria'];
            $this->model->agregarCategoria($nombre_categoria);
            header("Location: " . BASE_URL . "listarCategoria");
        } else {
            $this->view->renderAgregarCategoria();
        }
    }
    


    

}