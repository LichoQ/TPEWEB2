<?php
require_once 'app/comercio.php';

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'listar'; // default action
if(!empty($_GET['action'])) {
    $action = $_GET['action'];
}

// listar todas las tareas de la base de datos showPagos()


//parse la accion para separar accion real de parametros
$params = explode('/', $action);

// Inicializa $id con un valor por defecto
$id = null;

// Verifica si $params[1] existe
if(isset($params[1])) {
    $id = $params[1];
}

//determina que camino seguir según la acción
switch($params[0]) {
    case 'listar':
        mostrarProductos();
        break;
    case 'addProducto':
        addProducto($id);
        break;   
    default:
        echo '404 - Página no encontrada';
        break;
}
