<?php

class ComercioView {
    public function mostrarProductos($productos) {
        require_once 'templates/listado-items.phtml';
    }

    public function showErrorMessage($error) {
        require_once 'templates/error.phtml';
    }

    public function mostrarCategorias($categorias) {
        require_once 'templates/categorias.phtml';
    }

    public function mostrarDetalleItem($item) {
        require_once 'templates/detalle-item.phtml';
    }

    public function mostrarProductosPorCategoria($productos, $categorias) {
        require_once 'templates/productos_por_categoria.phtml';
    }

    public function renderItemEliminado() {
        require_once 'templates/item-eliminado.phtml';
    }

   




}

    

    