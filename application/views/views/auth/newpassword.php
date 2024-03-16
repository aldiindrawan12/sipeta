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
                                    <div class="text-center">
                                        <h1 class="h4 mb-1">
                                            Welcome to SIPETA IF 
                                        </h1>
                                        <h2 class="h6 font-w400 text-muted mb-3">
                                            SISTEM INFORMASI PENDAFTARAN TUGAS AKHIR INFORMATIKA
                                        </h2>
                                    </div>
                                    <!-- END Header -->
                                    <form class="js-validation-signin" action="postnewpassword?email=<?= $akun["akun_email"]?>" method="POST" onsubmit="return cekpassword()">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="pass_new" name="pass_new" placeholder="Password Baru" required>
                                            </div>
                                            <div class="input-group">
                                                <input type="password" class="form-control" id="pass_renew" name="pass_renew" placeholder="Ulangi Password Baru" required>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-center mb-0">
                                            <div class="col-md-12 col-xl-12">
                                                <button type="submit" class="btn btn-block btn-primary" id="kirim">
                                                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Simpan
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <!-- END Sign In Form -->
                                </div>
                            </div>
                        </div>
                        <!-- END Sign In Section -->

                        <!-- Footer -->
                        <div class="font-size-sm text-center text-muted py-3">
                            <!-- <strong>Teknik Informatika - Institut Teknologi Sumatera</strong> &copy; <span data-toggle="year-copy"></span> -->
                            <a class="font-w600" href="http://if.itera.ac.id/" target="_blank">Teknik Informatika Institut Teknologi Sumatera</a> &copy; <span data-toggle="year-copy"></span>
                        </div>
                        <!-- END Footer -->
                    </div>
                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->
        </div>