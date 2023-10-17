<?php

require_once './app/comercio.php';
require_once './app/db.php';


function mostrarProductos() {
    $productos = listarProductos(); 
    
  
    require 'templates/header.php';

    require 'templates/form_alta.php';

    //otengo las tareas del modelo
    

    ?>

    

    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">id</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
                <th scope="col">Categoria</th>
            
            </tr>
        </thead>
        <tbody>
    <?php foreach($productos as $producto): ?>
        <tr>
            <td><?php echo $producto->id ?></td>
            <td><?php echo $producto->nombre ?></td>
            <td><?php echo $producto->descripcion ?></td>
            <td><?php echo $producto->precio ?></td>
            <td><?php echo $producto->id_categoria ?></td>

            
            
        </tr>
    <?php endforeach; ?>
</tbody>

  
</table>

    
    <?php
    require 'templates/footer.php';
}



function addProducto() {

    //Materias validar los datos
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $id_categoria = $_POST['id_categoria'];

    //Producto guardar en la base de datos
    $success = insertProducto($nombre, $descripcion, $precio, $id_categoria);

    
    if($success) {
        header('Location: ' . BASE_URL . 'listar');
    } else {
        echo "Error al agregar el producto";
        
    }

  
}