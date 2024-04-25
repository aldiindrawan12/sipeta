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
                                    <div class="text-center">
                                        <h1 class="h4 mb-1">
                                            Welcome to SIPETA IF 
                                        </h1>
                                        <h2 class="h6 font-w400 text-muted mb-3">
                                            SISTEM INFORMASI PENDAFTARAN TUGAS AKHIR INFORMATIKA
                                        </h2>
                                    </div>
                                    <!-- END Header -->
                                    <p class="font-size-sm text-muted">
                                        <?php if($state == "Verifikasi"){?>
                                            <strong>Akun Anda Belum Terverifikasi, Silakan Cek Kode Otp Yang Dikirim ke Email <?= substr($akun["akun_email"],0,7)?>********itera.ac.id</strong>
                                        <?php }else{?>
                                            <strong>Silakan Cek Kode Otp Yang Dikirim ke Email <?= substr($akun["akun_email"],0,7)?>********itera.ac.id</strong>
                                        <?php }?>
                                    </p>
                                    <form class="js-validation-signin" action="postvalidasi?email=<?= $akun["akun_email"]?>" method="POST" onsubmit="return validateOTP(<?= $akun['akun_otp']?>)">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="akun_otp" name="akun_otp" placeholder="Kode OTP" required>
                                                <div class="input-group-append">
                                                    <span class="input-group-text" id="countdown">
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-center mb-0">
                                            <div class="col-md-12 col-xl-12 text-center"> 
                                                <a href="" onclick="resendEmail()" id="resend">
                                                    Kirim Ulang Kode OTP
                                                </a>
                                            </div>
                                            <div class="col-md-12 col-xl-12">
                                                <button type="submit" class="btn btn-block btn-primary" id="kirim">
                                                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Kirim
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