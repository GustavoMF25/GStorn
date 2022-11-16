<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=BASED?>" class="brand-link">
        <img src="<?= BASE ?>/assets/images/logoGStor.png" class="brand-image img-circle " style="">
        <!--<i class="fa fa-cogs elevation-3 brand-image " aria-hidden="true"  style="opacity: .8"></i>-->
        <span class="brand-text font-weight-light" style="font-family: 'Abril Fatface', cursive; font-size: 20px;"> GStorn</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= BASE ?>/assets/images/eu.jpg" alt="AdminLTE Logo" class="img-circle elevation-2" style="">
              <!--<img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">-->
              <!--<i class="fa fa-user-circle img-circle elevation-2" aria-hidden="true" style="color: #fafafa;"></i>-->
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= isset($_SESSION['nome']) ? $_SESSION['nome'] : 'Sem usuário' ?></a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!--        <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>-->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fa fa-list-alt" aria-hidden="true"></i>
                        <p>
                            Cadastro
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?=BASED?>/cadastro/produtos/" class="nav-link">
                                <i class="fa fa-cubes" aria-hidden="true"></i>
                                <p>Produtos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?=BASED?>/cadastro/categorias/" class="nav-link">
                                <i class="fa fa-sitemap" aria-hidden="true"></i>
                                <p>Categorias</p>
                            </a>
                        </li>

                    </ul>
                </li>           
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>