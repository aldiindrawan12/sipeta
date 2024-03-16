    <body>
        <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">
            <nav id="sidebar" aria-label="Main Navigation">
                <!-- Side Header -->
                <div class="content-header bg-white-5">
                    <!-- Logo -->
                    <a class="font-w600 text-dual" href="index.html">
                        <!-- <i class="fa fa-circle-notch text-primary"></i> -->
                        <span class="smini-hide">
                            <span class="font-w700 font-size-h5">SIPETA</span> <span class="font-w400">IF</span>
                        </span>
                    </a>
                    <!-- END Logo -->

                    <!-- Options -->
                    <div>

                        <!-- Close Sidebar, Visible only on mobile screens -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <a class="d-lg-none text-dual ml-3" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                            <i class="fa fa-times"></i>
                        </a>
                        <!-- END Close Sidebar -->
                    </div>
                    <!-- END Options -->
                </div>
                <!-- END Side Header -->

                <!-- Side Navigation -->
                <div class="content-side content-side-full">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="<?= base_url('index.php/'.$_SESSION["akun_role"])?>">
                                <i class="nav-main-link-icon fa fa-home"></i>
                                <span class="nav-main-link-name">Dashboard</span>
                            </a>
                            <li class="nav-main-heading">Pendaftaran TA</li>
                            <li class="nav-main-item">
                                <?php if($_SESSION["akun_role"]=="Koordinator"){?>
                                <a class="nav-main-link" href="<?= base_url('index.php/TugasAkhir/daftar')?>">
                                    <i class="nav-main-link-icon fa fa-user-friends"></i>
                                    <span class="nav-main-link-name">Pendaftaran</span>
                                </a>
                                <?php }?>
                                <a class="nav-main-link" href="<?= base_url('index.php/TugasAkhir/arsip')?>">
                                    <i class="nav-main-link-icon fa fa-user-clock"></i>
                                    <span class="nav-main-link-name">Arsip Pendaftaran</span>
                                </a>
                            </li>
                        </li>
                        <?php if($_SESSION["akun_role"] != "Mahasiswa"){?>
                            <li class="nav-main-heading">Pendaftaran TA Saya</li>
                            <li class="nav-main-item">
                                <a class="nav-main-link" href="<?= base_url('index.php/TugasAkhir/daftarsaya/1')?>">
                                    <i class="nav-main-link-icon fa fa-user-tag"></i>
                                    <span class="nav-main-link-name">Pembimbing 1</span>
                                </a>
                                <a class="nav-main-link" href="<?= base_url('index.php/TugasAkhir/daftarsaya/2')?>">
                                    <i class="nav-main-link-icon fa fa-user-tag"></i>
                                    <span class="nav-main-link-name">Pembimbing 2</span>
                                </a>
                            </li>
                        <?php }?>
                    </ul>
                </div>
                <!-- END Side Navigation -->
            </nav>
            <!-- END Sidebar -->

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="d-flex align-items-center">
                        <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div class="d-flex align-items-center">
                        <!-- User Dropdown -->
                        <div class="dropdown d-inline-block ml-2">
                            <button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded" src="<?= base_url('assets/admin4/assets/media/avatars/avatar10.jpg')?>" alt="Header Avatar" style="width: 18px;">
                                <?php if($_SESSION["akun_role"]=="Mahasiswa"){?>
                                    <span class="d-none d-sm-inline-block ml-1"><?= $akun["mhs_nama"]?></span>
                                <?php }else{?>
                                    <span class="d-none d-sm-inline-block ml-1"><?= $akun["dosen_nama"]?></span>
                                <?php }?>
                                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown">
                                <div class="p-3 text-center bg-primary">
                                    <img class="img-avatar img-avatar48 img-avatar-thumb" src="<?= base_url('assets/admin4/assets/media/avatars/avatar10.jpg')?>" alt="">
                                </div>
                                <div class="p-2">
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="<?= base_url("index.php/auth/logout")?>">
                                        <span>Log Out</span>
                                        <i class="si si-logout ml-1"></i>
                                    </a>
                                    <a href="" data-toggle="modal" data-target="#modal-ubah-password" class="dropdown-item d-flex align-items-center justify-content-between">
                                        <span>Ubah Password</span>
                                        <i class="fa fa-key ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- END User Dropdown -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->

                <!-- Header Loader -->
                <!-- Please check out the Loaders page under Components category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-white">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->