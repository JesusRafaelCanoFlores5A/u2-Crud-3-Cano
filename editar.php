<?php
if(!isset($_GET["id"])) exit();
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT * FROM productos WHERE id = ?;");
$sentencia->execute([$id]);
$producto = $sentencia->fetch(PDO::FETCH_OBJ);
if($producto === FALSE){
	echo "¡No existe algún producto con ese ID!";
	exit();
}

?>
<?php include_once "encabezado.php" ?>
	<div class="col-xs-12">
		<h1>Editar producto con el ID <?php echo $producto->id; ?></h1>
		<form method="post" action="guardarDatosEditados.php">
			<input type="hidden" name="id" value="<?php echo $producto->id; ?>">
	
			<label for="id_producto">ID_Producto:</label>
			<input value="<?php echo $producto->id_producto ?>" class="form-control" name="id_producto" required type="text" id="id_producto" placeholder="Escribe el ID_Producto">

			<label for="nombre_producto">Nombre_Producto:</label>
			<textarea required id="nombre_producto" name="nombre_producto" cols="30" rows="5" class="form-control"><?php echo $producto->nombre_producto ?></textarea>

			<label for="precio">Precio:</label>
			<input value="<?php echo $producto->precio ?>" class="form-control" name="precio" required type="number" id="precio" placeholder="Precio">

			<label for="categoria">Categoría:</label>
			<input value="<?php echo $producto->categoria ?>" class="form-control" name="categoria" required type="text" id="categoria" placeholder="Escribe la Categoría">

			<label for="descuento">Descuento:</label>
			<input value="<?php echo $producto->descuento ?>" class="form-control" name="descuento" required type="number" id="descuento" placeholder="Descuento">

			<label for="numero_existencias">Numero_Existencias:</label>
			<input value="<?php echo $producto->numero_existencias ?>" class="form-control" name="numero_existencias" required type="number" id="numero_existencias" placeholder="Número de Existencias">
			
			<label for="proveedor">Proveedor:</label>
			<input value="<?php echo $producto->proveedor ?>" class="form-control" name="proveedor" required type="text" id="proveedor" placeholder="Escribe el proveedor">
			
			<label for="fecha_llegada">Fecha de Llegada:</label>
			<input value="<?php echo $producto->fecha_llegada ?>" class="form-control" name="fecha_llegada" required type="date" id="fecha_llegada" placeholder="Escribe la fecha de llegada">
			
			<br><br><input class="btn btn-info" type="submit" value="Guardar">
			<a class="btn btn-warning" href="./listar.php">Cancelar</a>
		</form>
	</div>
<?php include_once "pie.php" ?>
