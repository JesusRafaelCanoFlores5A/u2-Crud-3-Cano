<?php
session_start();
include_once "encabezado.php";
if (!isset($_SESSION["carrito"])) $_SESSION["carrito"] = [];
$granTotal = 0;
?>
<div class="col-xs-12">
	<h1>Vender</h1>
	<?php
	if (isset($_GET["status"])) {
		if ($_GET["status"] === "1") {
	?>
			<div class="alert alert-success">
				<strong>¡Correcto!</strong> Venta realizada correctamente
			</div>
		<?php
		} else if ($_GET["status"] === "2") {
		?>
			<div class="alert alert-info">
				<strong>Venta cancelada</strong>
			</div>
		<?php
		} else if ($_GET["status"] === "3") {
		?>
			<div class="alert alert-info">
				<strong>Ok</strong> Producto quitado de la lista
			</div>
		<?php
		} else if ($_GET["status"] === "4") {
		?>
			<div class="alert alert-warning">
				<strong>Error:</strong> El producto que buscas no existe
			</div>
		<?php
		} else if ($_GET["status"] === "5") {
		?>
			<div class="alert alert-danger">
				<strong>Error: </strong>El producto está agotado
			</div>
		<?php
		} else {
		?>
			<div class="alert alert-danger">
				<strong>Error:</strong> Algo salió mal mientras se realizaba la venta
			</div>
	<?php
		}
	}
	?>
	<br>
	<form method="post" action="agregarAlCarrito.php">
		<label for="id_producto">ID_Producto:</label>
		<input autocomplete="off" autofocus class="form-control" name="id_producto" required type="text" id="id_producto" placeholder="Escribe el id_producto">
	</form>
	<br><br>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>ID_Producto</th>
				<th>Nombre_Producto</th>
				<th>Precio</th>
				<th>Descuento</th>
				<th>Cantidad</th>
				<th>Total</th>
				<th>Quitar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($_SESSION["carrito"] as $indice => $producto) {
				
			?>
				<tr>
					<td><?php echo $producto->id ?></td>
					<td><?php echo $producto->id_producto ?></td>
					<td><?php echo $producto->nombre_producto ?></td>
					<td><?php echo $producto->precio ?></td>
					<td><?php echo $producto->descuento ?></td>
					<td>
						<form action="cambiar_cantidad.php" method="post">
						<input name="descuento" type="hidden" value="<?php echo $producto->descuento; ?>">
							<input name="indice" type="hidden" value="<?php echo $indice; ?>">
							<input min="1" name="cantidad" class="form-control" required type="number" step="1" value="<?php echo $producto->cantidad; ?>">
						</form>
					</td>
					<?php $desc = ($producto->total*$producto->descuento)/100 ?>
					<td><?php echo $producto->total-$desc ?></td>
					<td><a class="btn btn-danger" href="<?php echo "quitarDelCarrito.php?indice=" . $indice ?>"><i class="fa fa-trash"></i></a></td>
				</tr>
			<?php $granTotal += $producto->total-$desc;} ?>
		</tbody>
	</table>

	<h3>Total: <?php echo $granTotal; ?></h3>
	<form action="./terminarVenta.php" method="POST">
		<input name="total" type="hidden" value="<?php echo $granTotal; ?>">
		<button type="submit" class="btn btn-success">Terminar venta</button>
		<a href="./cancelarVenta.php" class="btn btn-danger">Cancelar venta</a>
	</form>
</div>
<?php include_once "pie.php" ?>