<?php

    include 'code_register.php';

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
    <div class="continer-all">

        <div class="ctn-form">
            <img src="img/logo.png" alt="" class="logo">
            <h1 class="title">Registrarse</h1>

            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">


                <label for="">Nombre de Usuario</label>
                <input type="text" name="username">
                <span class="msg-error"><?php echo $username_err; ?></span>
                <label for="">Email</label>
                <input type="email" name="email">
                <span class="msg-error"><?php echo $email_err; ?></span>
                <label for="">Contraseña</label>
                <input type="password" name="password">
                <span class="msg-error"><?php echo $password_err; ?></span>

                <input type="submit" value="Registrarse">

            </form>

            <span class="text-footer">¿Aún no te has Resgistrado? <a href="index.php">Iniciar Sesión</a></span>
        </div>

        <div class="ctn-text">
            <div class="capa"></div>
            <h1 class="title-descrip">Explogin Express</h1>
            <p class="text-descrip">Es un Gestor y explorador de registros de Productos 
                para facilitar y aumentar la productividad y eficiencia, actualmente este 
                sitio web aún está en desarrollo, así como también su aplicación, posteriormente 
                se lanzará una versión más completa.</p>
        </div>

    </div>
</body>

</html>
