        <div id="page-loader" class="show"></div>
        <div id="page-container">
            <!-- Main Container -->
            <main id="main-container">

                <!-- Page Content -->
                <div class="hero-static d-flex align-items-center">
                    <div class="w-100">
                        <!-- Sign In Section -->
                        <div class="content content-full">
                            <div class="row justify-content-center">
                                <div class="col-md-8 col-lg-6 col-xl-4 py-4 bg-gray">
                                    <div class="text-center">
                                        <img class="img-fluid" src="<?= base_url("assets/img/logo-if.png")?>" alt="">
                                    </div>
                                    <!-- Header -->
                                    <div class="text-center flex-sm-fill">
                                        <h1 class="h4 mb-1">
                                            Welcome to SIPETA IF 
                                        </h1>
                                        <h2 class="h6 font-w400 text-muted mb-3">
                                            SISTEM INFORMASI PENDAFTARAN TUGAS AKHIR INFORMATIKA
                                        </h2>
                                    </div>
                                    <!-- END Header -->
                                    <form class="js-validation-signin" action="index.php/auth/login" method="POST">
                                        <div class="py-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-lg form-control-alt" id="akun_email" name="akun_email" placeholder="Email" required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-lg form-control-alt" id="akun_password" name="akun_password" placeholder="Password" required>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-center mb-0">
                                            <div class="col-md-6 col-xl-5">
                                                <button type="submit" class="btn btn-block btn-primary">
                                                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Sign In
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="text-center">
                                        <a href="<?= base_url("index.php/auth/register")?>">Registrasi</a>
                                    </div>
                                    <div class="text-center">
                                        <a href="" data-toggle="modal" data-target="#email-lupa-password" >Lupa Password</a>
                                    </div>
                                    <!-- END Sign In Form -->
                                </div>
                            </div>
                        </div>
                        <!-- END Sign In Section -->

                        <!-- Footer -->
                        <div class="font-size-sm text-center text-muted py-3">
                            <a class="font-w600" href="http://if.itera.ac.id/" target="_blank">Teknik Informatika Institut Teknologi Sumatera</a> &copy; <span data-toggle="year-copy"></span>
                            <!-- <strong>Teknik Informatika - Institut Teknologi Sumatera</strong> &copy; <span data-toggle="year-copy"></span> -->
                        </div>
                        <!-- END Footer -->
                    </div>
                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->
        </div>