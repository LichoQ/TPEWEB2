<?php

class ComercioView {
    public function mostrarProductos($productos) {
        require_once 'templates/comercioList.phtml';
    }

    public function showErrorMessage($error) {
        require_once 'templates/error.phtml';
    }

    
}

    

    