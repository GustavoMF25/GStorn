<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
        </li>
        <!--        <li class="nav-item d-none d-sm-inline-block">
                    Seja bem vindo!!
                </li>-->
        <!--       
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>-->
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->


        <!-- Messages Dropdown Menu -->
        <!-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-comments"></i>
                <span class="badge badge-danger navbar-badge">3</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Brad Diesel
                                <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">Call me whenever you can...</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                John Pierce
                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">I got your message bro</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <div class="media">
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                Nora Silvester
                                <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                            </h3>
                            <p class="text-sm">The subject goes here</p>
                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                        </div>
                    </div>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
            </div>
        </li> -->
        <!-- Notifications Dropdown Menu -->

        <!-- <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-bell"></i>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span class="dropdown-item dropdown-header">15 Notifications</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li> -->
        <li class="nav-item dropdown">
            <a href="javascript:void(0);" class="nav-link" data-toggle="dropdown" aria-expanded="false">
                <img class="rounded-circle " src="<?= isset($_SESSION['perfil']['foto'])? $_SESSION['perfil']['foto'] : BASED . "/assets/images/avatar.png"; ?>" width="30" alt="">
                <span class="badge badge-success navbar-badge">2</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg p-2 dropdown-menu-right">
                <div class="p-3 d-flex justify-content-center">
                    <div class="m-r-10">
                        <img src="<?= isset($_SESSION['perfil']['foto'])? $_SESSION['perfil']['foto'] : BASED . "/assets/images/avatar.png"; ?>" alt="Usuário" width="100" class="img-circle " style="">
                    </div>
                </div>
                <div class="drop-right text-center">
                    <h4><?=$_SESSION['nome']?></h4>
                    <p class="user-name"><?=$_SESSION['email']?></p>
                    <!--<i class="fa fa-thumbs-down" aria-hidden="true"></i>-->
                </div>
                <div class="m-t-10 p-3 drop-list">
                    <ul class="list-unstyled text-center">
<!--                        <li><a href="#"><i class="icon-user"></i>My Profile</a></li>
                        <li><a href="#"><i class="icon-envelope-open"></i>Messages</a></li>
                        <li><a href="#"><i class="icon-settings"></i>Settings</a></li>-->
                        <li>
                            <a href="<?=BASED?>/sair.php" class="dropdown-item">
                                <i class="fa fa-power-off" aria-hidden="true"></i>
                                <!--<i class="fa fa-sign-out" aria-hidden="true"></i>-->
                                Sair 
                                
                               <i class="fa fa-sign-out" aria-hidden="true"></i>

                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </li>


    </ul>
</nav>
<!-- /.navbar -->