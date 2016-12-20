<?php 
function get_row($table,$row, $id, $equal){
	global $con;
	$query=mysqli_query($con,"select $row from $table where $id='$equal'");
	$rw=mysqli_fetch_array($query);
	$value=$rw[$row];
	return $value;
}
function guardar_historial($id_producto,$user_id,$fecha,$nota,$reference,$quantity){
	global $con;
	$sql="INSERT INTO historial (id_historial, id_producto, user_id, fecha, nota, referencia, cantidad)
	VALUES (NULL, '$id_producto', '$user_id', '$fecha', '$nota', '$reference', '$quantity');";
	$query=mysqli_query($con,$sql);
	
	
}
function agregar_stock($id_producto,$quantity){
	global $con;
	$update=mysqli_query($con,"update products set stock=stock+'$quantity' where id_producto='$id_producto'");
	if ($update){
			return 1;
	} else {
		return 0;
	}	
		
}
function eliminar_stock($id_producto,$quantity){
	global $con;
	$update=mysqli_query($con,"update products set stock=stock-'$quantity' where id_producto='$id_producto'");
	if ($update){
			return 1;
	} else {
		return 0;
	}	
		
}
?>