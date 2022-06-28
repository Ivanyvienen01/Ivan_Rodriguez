<?php

include("conexion.php");
$con=conectar();

$id=$_POST['id'];
$nombre_producto=$_POST['nombre_producto'];
$cantidad_producto=$_POST['cantidad_producto'];
$precio_mayor=$_POST['precio_mayor'];
$precio_unidad=$_POST['precio_unidad'];


$sql="UPDATE productos SET  nombre_producto='$nombre_producto', cantidad_producto='$cantidad_producto', precio_mayor='$precio_mayor', precio_unidad='$precio_unidad' WHERE id='$id'";
$query=mysqli_query($con,$sql);

    if($query){
        Header("Location: bienvenida.php");
    }
?>