<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <title>Login | Innovation Point</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<meta content="Nazox - MVC5 & ASP.Net Core Admin & Dashboard Template, Premium Multipurpose Admin & Dashboard Template" name="description" />-->

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico"> <!-- ICONE -->

        <!-- Bootstrap Css -->
        <link href="./app/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="./app/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="./app/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    </head>
    <body class="auth-body-bg">
        <div>
            <div class="container-fluid p-0">
                <div class="row g-0">
                    <div class="col-lg-4">
                        <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                            <div class="w-100">
                                <div class="row justify-content-center">
                                    <div class="col-lg-9">
                                        <div>
                                            <div class="text-center">
                                                <div>
                                                    <a href="#" class="">
                                                        <img src="./app/assets/images/logo-dark.png" alt="" height="20" class="auth-logo logo-dark mx-auto">
                                                        <img src="./app/assets/images/logo-light.png" alt="" height="20" class="auth-logo logo-light mx-auto">
                                                    </a>
                                                </div>

                                                <h4 class="font-size-18 mt-4">Bem vindo !</h4>
                                                <p class="text-muted">Login - Innovation Point</p>
                                            </div>

                                            <div class="p-2 mt-5">
                                                <form class="" method="post" action="./login/verLogin.php">
                                                    <div class="mb-3 auth-form-group-custom mb-4">
                                                        <i class="ri-user-2-line auti-custom-input-icon"></i>
                                                        <label for="username">Usuario</label>
                                                        <input type="text" required class="form-control" name="usuario" id="username" placeholder="Enter username">
                                                    </div>

                                                    <div class="mb-3 auth-form-group-custom mb-4">
                                                        <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                        <label for="userpassword">Senha</label>
                                                        <input type="password" class="form-control" required name="password" id="userpassword" placeholder="Enter password">
                                                    </div>

<!--                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" id="customControlInline">
                                                        <label class="form-check-label" for="customControlInline">Relembrar senha</label>
                                                    </div>-->

                                                    <div class="mt-4 text-center">
                                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                                    </div>

<!--                                                    <div class="mt-4 text-center">
                                                        <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock me-1"></i> Esqueceu a senha?</a>
                                                    </div>-->
                                                </form>
                                            </div>

                                            <div class="mt-5 text-center">
                                                <p>Não tem conta? <a href="auth-register.html" class="fw-medium text-primary"> Register </a> </p>
                                                <p>© <script>document.write(new Date().getFullYear())</script> Innovation Point - Painel <br> <i class="mdi mdi-heart text-danger"></i> by Innovation Point</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="authentication-bg">
                            <div class="bg-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- JAVASCRIPT -->
        <script src="./app/assets/libs/jquery/jquery.min.js"></script>
        <script src="./app/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="./app/assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="./app/assets/libs/simplebar/simplebar.min.js"></script>
        <script src="./app/assets/libs/node-waves/waves.min.js"></script>
        <script src="./app/assets/js/app.js"></script>
    </body>

</html>
