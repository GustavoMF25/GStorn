<?php
$msg = isset($_GET['msg']) ? $_GET['msg'] : '';
?>

<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title>Login | GStorn </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="./assets/images/logoGStor.png" />
    <!--<meta content="Nazox - MVC5 & ASP.Net Core Admin & Dashboard Template, Premium Multipurpose Admin & Dashboard Template" name="description" />-->

    <!-- App favicon -->
    <!--<link rel="shortcut icon" href="./app/assets/images/favicon.ico">  ICONE -->

    <!-- Bootstrap Css -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">

    <link href="./assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="./assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="./assets/css/main.css" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body style="background-color: #E8E8E8;">
    <!-- <div id="particles-js" ></div> -->
    <section class="h-100 gradient-form">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-12 col-sm-12 col-lg-8 ">
                    <div class="card rounded-3 text-black">
                        <div class="card-header card-outline card-primary text-center">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 text-center">
                                    <b> Bem vindo! </b>
                                </div>
                                <!--                                    <div class="d-flex col-lg-6 col-md-6 col-sm-12 justify-content-end" >
                                                                            <i class="fa fa-info-circle" data-toggle="tooltip" data-html="true" data-placement="top" title="<b>Informações</b>"></i>
                                                                        </div>-->

                            </div>
                        </div>
                        <div class="card-body mx-md-4">
                            <div class="row g-0">
                                <div class="col-lg-6 col-md-6 col-sm-12 align-items-center">

                                    <div class="text-center d-flex justify-content-center">
                                        <lottie-player src="./assets/animation/checked_box_green.json" background="transparent" speed="1" style="width: 300px; height: 300px;" loop autoplay>
                                        </lottie-player>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="text-center ">
                                        <img src="./assets/images/logoGStor.png" style="width: 80px;" alt="logo">
                                    </div>
                                    <div class="text-center ">
                                        <span style="font-family: 'Abril Fatface', cursive; font-size: 20px;">GStorn</span>
                                    </div>
                                    <form method="post" action="./login/verlogin.php">
                                        <div class="mb-2">
                                            <label class="form-label"><small>E-mail</small></label>
                                            <div class="input-group input-group-sm">
                                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                                <input class="form-control" type="text" id="Login" name="login" placeholder="Login">
                                            </div>
                                        </div>
                                        <div class="mb-2">
                                            <label class="form-label"><small>Senha</small></label>
                                            <div class="input-group input-group-sm">
                                                <span onclick="showPass()" data-toggle="tooltip" data-placement="top" title="Ver senha" class="input-group-text"><i id="iconPass" class="fa fa-lock"></i></span>
                                                <input class="form-control" type="password" id="password" name="password" placeholder="Senha">
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-center mb-2 mt-5 pb-1">
                                            <button class="btn btn-grad btn-block fa-lg gradient-custom-2 mb-3" type="submit">Login</button>
                                        </div>
                                        <div class="d-flex justify-content-center mb-2 mt-2 pb-1">
                                            <a href="#">Esqueci a senha</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- JAVASCRIPT -->
    <script type="text/javascript" src="./app/assets/js/particles.min.js"></script>
    <script type="text/javascript" src="./app/assets/js/particles.js"></script>
    <script src="./assets/js/lottie-player.js"></script>

    <!--<script src="./assets/js/particules.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
    <script src="./assets/js/main.js"></script>
</body>

</html>