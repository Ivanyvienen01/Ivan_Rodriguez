<?php

    //Incluir archivo de conexion a la base de datos
    require_once "conexion.php";

    //Definir variable e inicializar con valores vacios
    $username = $email = $password = "";
    $username_err = $email_err = $password_err = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        //Validando Inmput de Nombre de Usuario
        if(empty(trim($_POST["username"]))){
            $username_err = "Ingrese un Nombre de Usuario";
        }else{
            //prepara una declaracion de seleccion
            $sql = "SELECT id FROM usuarios WHERE usuario = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_username);

                $param_username = trim($_POST["username"]);

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $username_err = "Este Nombre de Usuario ya está Registrado";
                    }else{
                        $username = trim($_POST["username"]);
                    }
                }else{
                    echo "Algo salio mal, Intentalo mas tarde";
                }
            }
        }
        //Validando Inmput de Email
        if(empty(trim($_POST["email"]))){
            $email_err = "Ingrese un Email";
        }else{
            //prepara una declaracion de seleccion
            $sql = "SELECT id FROM usuarios WHERE email = ?";

            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "s", $param_email);

                $param_username = trim($_POST["email"]);

                if(mysqli_stmt_execute($stmt)){
                    mysqli_stmt_store_result($stmt);

                    if(mysqli_stmt_num_rows($stmt) == 1){
                        $email_err = "Este Nombre de Email ya está Registrado";
                    }else{
                        $email = trim($_POST["email"]);
                    }
                }else{
                    echo "Algo salio mal, Intentalo mas tarde";
                }
            }
        }




        //Validando Contraseña
        if(empty(trim($_POST["password"]))){
            $password_err = "Ingrese una Contraseña";
        }elseif(strlen(trim($_POST["password"])) < 4){
            $password_err = "la contraseña debe tener al menos 4 caracteres";
        } else{
            $password = trim($_POST["password"]);
        }

        //Comprobando los errores de entrada antes de insertar los datos de la BD
        if(empty($username_err) && empty($email_err) && empty($password_err)){

            $sql = "INSERT INTO usuarios (usuario, email, clave) VALUES (?, ?, ?)";

            if($stmt = mysqli_prepare($link, $sql)){
                mysqli_stmt_bind_param($stmt, "sss", $param_username, $param_email, $param_password);

                // Estableciendo Parametros
                $param_username = $username;
                $param_email = $email;
                $param_password = password_hash($password, PASSWORD_DEFAULT);//Encriptando Contraseña


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
