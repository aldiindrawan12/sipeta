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
                                            <p class="text-danger">Khusus Mahasiswa</p>
                                        </h2>
                                    </div>
                                    <!-- END Header -->
                                    <form class="" action="postregister" method="POST" onsubmit="return validateEmail()">
                                        <div class="py-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-lg form-control-alt" id="mhs_nim" name="mhs_nim" placeholder="NIM" autocomplete=off required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-lg form-control-alt" id="mhs_nama" name="mhs_nama" placeholder="Nama" autocomplete=off required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-lg form-control-alt" id="mhs_telp" name="mhs_telp" placeholder="Telp/WA" autocomplete=off required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-lg form-control-alt" id="mhs_semester" name="mhs_semester" placeholder="Semester" autocomplete=off required>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-lg form-control-alt" id="akun_email" name="akun_email" placeholder="Email" autocomplete=off required>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control form-control-lg form-control-alt" id="akun_password" name="akun_password" placeholder="Password" autocomplete=off required>
                                            </div>
                                        </div>
                                        <div class="form-group row justify-content-center mb-0">
                                            <div class="col-md-6 col-xl-6">
                                                <button type="submit" class="btn btn-block btn-primary">
                                                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Registrasi
                                                </button>
                                            </div>
                                            <div class="col-md-6 col-xl-6">
                                                <button type="reset" class="btn btn-block btn-danger">
                                                    <i class="fa fa-fw fa-sign-in-alt mr-1"></i> Reset
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