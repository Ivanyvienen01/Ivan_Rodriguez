<?php

    //Incluir archivo de conexion a la base de datos
    require_once "conexion.php";

    //Definir variable e inicializar con valores vacios
    $produc = $canti = $price_m = $price_u = "";
    $produc_err = $canti_err = $price_m_err = $price_u_err = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        //Validando Inmput de Nombre de Mercancia
        if(empty(trim($_POST["produc"]))){
            $produc_err = "Ingrese el Nombre de la Mercancia";
        }else{
            //prepara una declaracion de seleccion
            $sql = "SELECT id FROM productos WHERE nombre_producto = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_produc);

                $param_produc = trim($_POST["produc"]);

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $produc_err = "Esta Mercancia ya está Registrado";
                    }else{
                        $produc = trim($_POST["produc"]);
                    }
                }else{
                    echo "Algo salio mal, Intentalo mas tarde";
                }
            }
        }
        //Validando Inmput de Cantidad de Mercancia
        if(empty(trim($_POST["canti"]))){
            $canti_err = "Ingrese la Cantidad de la Mercancia";
        }else{
            //prepara una declaracion de seleccion
            $sql = "SELECT id FROM productos WHERE cantidad_producto = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_canti);

                $param_canti = trim($_POST["canti"]);

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $canti_err = "";
                    }else{
                        $canti = trim($_POST["canti"]);
                    }
                }else{
                    echo "Algo salio mal, Intentalo mas tarde";
                }

            }
        }

        //Validando Inmput de Precio por mayoreo
        if(empty(trim($_POST["price_m"]))){
            $price_m_err = "Ingrese el precio de la mercancia por mayoreo";
        }else{
            //prepara una declaracion de seleccion
            $sql = "SELECT id FROM productos WHERE precio_mayor = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_price_m);

                $param_price_m = trim($_POST["price_m"]);

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $price_m_err = "";
                    }else{
                        $price_m = trim($_POST["price_m"]);
                    }
                }else{
                    echo "Algo salio mal, Intentalo mas tarde";
                }
            }
        }

        //Validando Inmput de Precio por unidad
        if(empty(trim($_POST["price_u"]))){
            $price_u_err = "Ingrese el precio de la mercancia por unidad";
        }else{
            //prepara una declaracion de seleccion
            $sql = "SELECT id FROM productos WHERE precio_unidad = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_price_u);

                $param_price_u = trim($_POST["price_u"]);
                
                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $price_u_err = "";
                    }else{
                        $price_u = trim($_POST["price_u"]);
                    }
                }else{
                    echo "Algo salio mal, Intentalo mas tarde";
                }
            }
        }



        //Comprobando los errores de entrada antes de insertar los datos de la BD
        if(empty($produc_err)){

            $sql = "INSERT INTO productos (nombre_producto, cantidad_producto, precio_mayor, precio_unidad) VALUES (?, ?, ?, ?)";

            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "ssss", $param_produc, $param_canti, $param_price_m, $param_price_u );

                // Estableciendo Parametros
                $param_produc = $produc;
                $param_price = $price;
                $param_price_m = $price_m;
                $param_price_u = $price_u;


                if(mysqli_stmt_execute($stmt)){
                    header("location: index.php");
                }else{
                    echo "Algo salio mal, intentalo despues";
                }
            }
        }

        mysqli_close($link);



    }

?>
