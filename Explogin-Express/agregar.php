<?php

    include 'code_agregar.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Explogin Express</title>
    <link rel="stylesheet" href="css/style.css">

</head>


<body>
    <div class="ctn-welcome">

        <div class="">
            <img src="img/logo.png" alt="" class="logo">
            <h1 class="title-welcome">Agregar Mercancia</h1>
            
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">


                <label for="">Nombre de la Mercancia</label>
                <input type="text" name="produc">
                <span class="msg-error"><?php echo $produc_err; ?></span>
                <label for="">Cantidad de Mercancia</label>
                <input type="number" name="canti">
                <span class="msg-error"><?php echo $canti_err; ?></span>
                <label for="">Precio por Mayoreo</label>
                <input type="number" name="price_m">
                <span class="msg-error"><?php echo $price_m_err; ?></span>
                <label for="">Precio por Unidad</label>
                <input type="number" name="price_u">
                <span class="msg-error"><?php echo $price_u_err; ?></span>
                

                <input type="submit" value="Agregar">

            </form>

        </div>


    </div>
</body>

</html>
