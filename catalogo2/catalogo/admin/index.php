<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MenuCatalogo</title>
    <link rel="icon" type="image/png" href="img/logo/favicon.png">

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
</head>

<body>

    <link rel="stylesheet" href="css/login.css">
    <div class="container">
        <div class="d-flex justify-content-center h-100">

            <div class="card">
                <div class="card-header">

                    <!-- <div class="d-flex justify-content-end social_icon">
                        <span><i class="fab fa-facebook-square"></i></span>
                        <span><i class="fab fa-google-plus-square"></i></span>
                        <span><i class="fab fa-twitter-square"></i></span>
                </div>-->
                    <div align="center"> <img src="img/logo/logo.png" width="200px">

                    </div>
                    <div class="card-body">
                        <!--<h3>Sign In</h3>-->
                        <p align="center" style="color:#FF0000"><?php echo $_GET['login'] ?></p>
                    <div class="card-body"></div>
                        <form method="post" action="login/login.php?slug=<?php echo $_GET['c'] ?>">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="email" name="email" class="form-control" placeholder="E-mail" required>

                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="pass" class="form-control" placeholder="Contraseña" required>
                            </div>
                            <!--<div class="row align-items-center remember">
                            <input type="checkbox">Remember Me
                </div>-->
                            <div class="form-group">
                               <!-- <a href="conexion/altaUsuario.php">User registration</a>
                                <br>
                                <a href="#">Forgot password?</a>
                                &nbsp;&nbsp;-->
                             <!--<a href="conexion/altaUsuario.php"><input type="button" value="Registration" class="btn float-left login_btnreg"></a>-->
                            <input type="submit" value="Entrar" class="btn float-right login_btn">


                            </div>
                        </form><br><br>
                            <div align="center"><a href="#">Olvidaste tu contraseña?</a></div>
                    </div>

                </div>

               <!-- <div align="center"><a href="http://myworkfiles.com" target="_blank">www.myworkfiles.com</a></div>  -->
            </div>
        </div>

</body>

</html>