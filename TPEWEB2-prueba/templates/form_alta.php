<div class="container mt-5">
    <h1>Ingresar nuevo producto</h1>
    <form action="route.php?action=addProducto" method="POST">
       
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" step="0.01" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" step="0.01" class="form-control" id="descripcion" name="descripcion" required>   
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" class="form-control" id="precio" name="precio" required>
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
            <select class="form-control" id="id_categoria" name="categoria" required>
                <option value="">--Seleccione una categoría--</option>
                <!-- Aquí puedes insertar las opciones de categoría dinámicamente desde la base de datos -->
    
                <option value="1">Calzado</option>
                <option value="2">Remeras</option>
                <option value="3">Camperas</option>
                <option value="4">Pantalones</option>
                <option value="5">Accesorios</option>
               
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
</div>