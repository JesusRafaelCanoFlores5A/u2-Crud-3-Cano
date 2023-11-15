<?php include_once "encabezado.php" ?>

<div class="col-xs-12">
	<h1>Nuevo producto</h1>
	<form method="post" action="nuevo.php">
	<label for="id_producto">ID_Producto:</label>
			<input class="form-control" name="id_producto" required type="text" id="id_producto" placeholder="Escribe el ID_Producto">

			<label for="nombre_producto">Nombre_Producto:</label>
			<textarea required id="nombre_producto" name="nombre_producto" cols="30" rows="5" class="form-control"></textarea>

			<label for="precio">Precio:</label>
			<input class="form-control" name="precio" required type="number" id="precio" placeholder="Precio">

			<label for="categoria">Categoría:</label>
			<input class="form-control" name="categoria" required type="text" id="categoria" placeholder="Escribe la Categoría">

			<label for="descuento">Descuento:</label>
			<input class="form-control" name="descuento" required type="number" id="descuento" placeholder="Descuento">

			<label for="numero_existencias">Numero_Existencias:</label>
			<input class="form-control" name="numero_existencias" required type="number" id="numero_existencias" placeholder="Número de Existencias">
			
			<label for="proveedor">Proveedor:</label>
			<input class="form-control" name="proveedor" required type="text" id="proveedor" placeholder="Escribe el proveedor">
			
			<label for="fecha_llegada">Fecha de Llegada:</label>
			<input class="form-control" name="fecha_llegada" required type="date" id="fecha_llegada" placeholder="Escribe la fecha de llegada">
		<br><br><input class="btn btn-info" type="submit" value="Guardar">
	</form>
</div>
<?php include_once "pie.php" ?>