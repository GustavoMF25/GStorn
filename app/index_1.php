<?php
include './config/config.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

    <!-- Mirrored from admin.pixelstrap.com/zeta/theme/sample-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Sep 2022 02:09:57 GMT -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Zeta admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
        <meta name="keywords" content="admin template, Zeta admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="pixelstrap">
        <!--        <link rel="icon" href="../assets/images/logo/favicon-icon.png" type="image/x-icon">
                <link rel="shortcut icon" href="../assets/images/logo/favicon-icon.png" type="image/x-icon">-->
        <title>Estoque - Syntax Web </title>
        <!-- Google font-->
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin="">
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet">
        <!-- FONT-AWEASOME-->
        <link rel="stylesheet" type="text/css" href="<?= BASE ?>/assets/vendor/font-awesome/css/font-awesome.min.css">
        <!-- Plugins css start-->
        <link rel="stylesheet" type="text/css" href="<?= BASED ?>/assets/css/vendors/scrollbar.css">
        <!-- Plugins css Ends-->
        <!-- Bootstrap css-->
        <link rel="stylesheet" type="text/css" href="<?= BASED ?>/assets/css/vendors/bootstrap.css">
        <!-- App css-->
        <link rel="stylesheet" type="text/css" href="<?= BASED ?>/assets/css/style.css">
        <link id="color" rel="stylesheet" href="<?= BASED ?>/assets/css/color-1.css" media="screen">
        <!-- Responsive css-->
        <link rel="stylesheet" type="text/css" href="<?= BASED ?>/assets/css/responsive.css">
        <style>
            .sidebar-link {
                color: #fafafa!important;
            }
            .sidebar-link:active {
                color: #333!important;
            }
        </style>
    </head>
    <body>
        <div class="page-wrapper compact-wrapper" id="pageWrapper">
            <?php
            include './include/nav-top.php';
            ?>
            <div class="page-body-wrapper">
                <?php
                include './include/sidebar.php';
                ?>
                <div class="page-body">
                    <div class="container-fluid">
                        <div class="page-title">
                            <div class="row">
                                <div class="col-12 col-sm-6">
                                    <h3>Página Inicial</h3>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="#">     
                                                <i data-feather="home"></i>
                                            </a>
                                        </li>
                                        <li class="breadcrumb-item active">Home</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">
                                    <div class="card-header pb-0">
                                        <h5>Sample Card</h5><span>lorem ipsum dolor sit amet, consectetur adipisicing elit</span>
                                    </div>
                                    <div class="card-body">
                                        <p>"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 footer-copyright text-center">
                                <p class="mb-0">Copyright 2022 © By Syntax Web </p>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- latest jquery-->
        <script src="<?= BASED ?>/assets/js/jquery-3.5.1.min.js"></script>
        <!-- Bootstrap js-->
        <script src="<?= BASED ?>/assets/js/bootstrap/bootstrap.bundle.min.js"></script>
        <!-- scrollbar js-->
        <script src="<?= BASED ?>/assets/js/scrollbar/simplebar.js"></script>
        <script src="<?= BASED ?>/assets/js/scrollbar/custom.js"></script>
        <!-- Sidebar jquery-->
        <script src="<?= BASED ?>/assets/js/config.js"></script>
        <!-- Plugins JS start-->
        <script src="<?= BASED ?>/assets/js/sidebar-menu.js"></script>
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="<?= BASED ?>/assets/js/script.js"></script>
        <!--<script src="<?= BASED ?>/assets/js/theme-customizer/customizer.js"></script>-->
    </body>

    <!-- Mirrored from admin.pixelstrap.com/zeta/theme/sample-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 20 Sep 2022 02:09:57 GMT -->
</html>