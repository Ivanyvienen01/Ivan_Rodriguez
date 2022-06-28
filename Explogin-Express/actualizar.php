<?php 
    include("conexion.php");
    $con=conectar();

$id=$_GET['id'];

$sql="SELECT * FROM productos WHERE id='$id'";
$query=mysqli_query($con,$sql);

$row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/style.css">
        <title>Actualizar</title>
        
    </head>
    <body>
        <div class="ctn-welcome">

        <div>
                    <form action="code_actualizar.php" method="POST">
                    
                                <input type="hidden" name="id" value="<?php echo $row['id']  ?>">
                                
                                <input type="text" name="nombre_producto" placeholder="Nombre del Producto" value="<?php echo $row['nombre_producto']  ?>">
                                <input type="number" name="cantidad_producto" placeholder="Cantidad de Mercancia" value="<?php echo $row['cantidad_producto']  ?>">
                                <input type="number" name="precio_mayor" placeholder="Precio al Mayor" value="<?php echo $row['precio_mayor']  ?>">
                                <input type="number" name="precio_unidad" placeholder="Precio por Unidad" value="<?php echo $row['precio_unidad']  ?>">

                                
                            <input type="submit" value="Actualizar">
                    </form>
                    
                </div>
        </div>
                
    </body>
</html>