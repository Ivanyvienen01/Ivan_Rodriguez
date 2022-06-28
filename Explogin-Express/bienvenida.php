<!DOCTYPE html>
<html lang="en">
<?php 
    include("conexion.php");
    $con=conectar();

    $sql="SELECT *  FROM productos";
    $query=mysqli_query($con,$sql);
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Explogin Express</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">


</head>

<body>

    <div class="ctn-welcome">

        <img src="img/logo.png" alt="" class="logo-welcome">
        <h1 class="title-welcome">Bienvenido a <b>Explogin Express</b></h1>

        <h2 class="title-table">Mercancia Registradas</h2>
        <table class="table">
            <thead class="t-head">
                <tr class="">
                    <th>Mercancias</th>
                    <th>Cantidad de Mercancia</th>
                    <th>Precio al Mayo</th>
                    <th>Precio por Unidad</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php
                    while($row=mysqli_fetch_array($query)){
                ?>
                     <tr>
                        <th><?php  echo $row['nombre_producto']?></th>
                        <th><?php  echo $row['cantidad_producto']?></th>
                        <th><?php  echo $row['precio_mayor']?></th>
                        <th><?php  echo $row['precio_unidad']?></th>
                        <th><a href="actualizar.php?id=<?php echo $row['id'] ?>" class="btn btn-info">Editar</a></th>
                        <th><a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Eliminar</a></th>                                     
                    </tr>
                <?php 
                }
                ?>
            </tbody>
        </table>

        <a href="agregar.php" class="close-sesion">Agregar Producto</a>
        <a href="cierre-sesion.php" class="close-sesion">Cerrar Sesión</a>


    
        
    </div>
   





</body>

</html>
