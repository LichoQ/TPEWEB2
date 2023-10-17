


<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'app/controllers/comercioController.php';
require_once 'app/controllers/auth.controller.php';
require_once 'app/controllers/about.controller.php';

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
    case 'login':
        $controller = new AuthController();
        $controller->showLogin();
        break;
    case 'listado-items':
        $controller = new ComercioController();
        $controller->listarProductos();
        break;
    case 'listarCategoria':
        $controller = new ComercioController();
        $controller->listarCategoria();
        break;
    case 'item-por-categoria':
        $controller = new ComercioController();
        $controller->filtrarProductosCategoria();
        break;
    case 'detalle-item':
        $controller = new ComercioController();
        $controller->detalleProducto($id);
        break;
    case 'addProducto':
        addProducto($id);
        break; 
    case 'about':
        $controller = new AboutController();
        $controller->showAbout();
        break;
    
    default:
        echo '404 - Página no encontrada';
        break;
}
