<?php

#Salir si alguno de los datos no está presente
if(
	!isset($_POST["id_producto"]) || 
	!isset($_POST["nombre_producto"]) || 
	!isset($_POST["precio"]) || 
	!isset($_POST["descuento"]) || 
	!isset($_POST["categoria"]) || 
	!isset($_POST["numero_existencias"]) || 
	!isset($_POST["proveedor"]) || 
	!isset($_POST["fecha_llegada"]) || 
	!isset($_POST["id"])
) exit();

#Si todo va bien, se ejecuta esta parte del código...

include_once "base_de_datos.php";
$id = $_POST["id"];
$id_producto = $_POST["id_producto"];
$nombre_producto = $_POST["nombre_producto"];
$precio = $_POST["precio"];
$descuento = $_POST["descuento"];
$categoria = $_POST["categoria"];
$numero_existencias = $_POST["numero_existencias"];
$proveedor = $_POST["proveedor"];
$fecha_llegada = $_POST["fecha_llegada"];

$sentencia = $base_de_datos->prepare("UPDATE productos SET id_producto = ?, nombre_producto = ?, precio = ?, descuento = ?, categoria = ?, numero_existencias = ?, proveedor = ?, fecha_llegada = ? WHERE id = ?;");
$resultado = $sentencia->execute([$id_producto, $nombre_producto, $precio, $descuento, $categoria, $numero_existencias, $proveedor, $fecha_llegada, $id]);

if($resultado === TRUE){
	header("Location: ./listar.php");
	exit;
}
else echo "Algo salió mal. Por favor verifica que la tabla exista, así como el ID del producto";
?>