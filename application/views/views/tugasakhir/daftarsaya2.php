            <!-- Main Container -->
            <main id="main-container">
                <!-- Hero -->
                <div class="bg-image overflow-hidden" style="background-image: url('<?= base_url('assets/admin4/assets/media/photos/photo3@2x.jpg')?>');">
                    <div class="bg-primary-dark-op">
                        <div class="content content-narrow content-full">
                            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                                <div class="flex-sm-fill">
                                    <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Sistem Informasi Pendaftaran Tugas Akhir</h1>
                                    <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Selamat Datang <?= $akun["dosen_nama"]?></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->
                <!-- Page Content -->
                <div class="content content-narrow">
                    <!-- Stats -->
                    <div class="row">
                        <div class="col-12 col-md-21 col-lg-12 col-xl-12">
                            <div class="block lock-rounded block-link-pop p-2">
                                <div class="block-header">
                                    <h3 class="block-title">Data Pendaftaran Tugas Akhir</h3>
                                </div>
                                <?php if($periode != NULL && ($periode["periode_progress"]!="Aktif")){?>
                                    <?php if($periode["periode_progress"]=="Validasi"){?>
                                        <div class="block-content block-content">
                                            <div class="font-size-h4 font-w400 text-danger text-center">Data Pendaftaran Tugas Akhir Dalam Proses Validasi Koordinator Tugas Akhir</div>
                                        </div>
                                    <?php }else{?>
                                        <div class="table-responsive">
                                            <div class="row mb-2 w-50">
                                                <p class="col-sm-12 col-md-6 mb-0 font-w600 text-left">Sebagai</p>
                                                <p class="col-sm-12 col-md-6 mb-0 font-w600 text-left">: Pembimbing 2</p>
                                            </div>
                                            <!-- <div class="row mb-2 w-50">
                                                <p class="col-sm-12 col-md-6 mb-0 font-w600 text-left">Maksimal Bimbingan</p>
                                                <p class="col-sm-12 col-md-6 mb-0 font-w600 text-left">: <?= $kuota?></p>
                                            </div> -->
                                            <div class="row mb-2 w-50">
                                                <p class="col-sm-12 col-md-6 mb-0 font-w600 text-left">Sisa Kuota Bimbingan</p>
                                                <p class="col-sm-12 col-md-6 mb-0 font-w600 text-left">: <?= $akun["dosen_kuota2"]?></p>
                                            </div>
                                            <p class="font-size-sm text-muted">
                                                Catatan : Utamakan verifikasi pendaftar dengan status judul <strong class="text-danger">DISPENSASI</strong> dan tipe judul <strong class="text-danger">TIM/CAPSTONE</strong><br>
                                                <a class='btn btn-sm btn-outline-primary btn-success'><small><i class='fa fa-check mr-1 text-light'></i></small><i class='far fa-eye text-light'></i></a> Diterima
                                                <a class='btn btn-sm btn-outline-primary btn-warning'><small><i class='fa fa-question mr-1 text-light'></i></small><i class='far fa-eye text-light'></i></a> Menunggu
                                                <a class='btn btn-sm btn-outline-primary btn-danger'><small><i class='fa fa-times mr-1 text-light'></i></small><i class='far fa-eye text-light'></i></a> Ditolak
                                            </p>
                                            <table class="table table-vcenter table-striped table-bordered" id="daftar-saya-tabel">
                                                <thead class="bg-secondary text-white">
                                                    <tr>
                                                        <th class="text-center" style="width: 5%;">NIM</th>
                                                        <th class="text-center" style="width: 25%;">Judul</th>
                                                        <th class="text-center" style="width: 15%;">Pembimbing 1</th>
                                                        <th class="text-center" style="width: 15%;">Pembimbing 2</th>
                                                        <th class="text-center" style="width: 10%;">Status Judul</th>
                                                        <th class="text-center" style="width: 10%;">Tipe Judul</th>
                                                        <th class="text-center" style="width: 10%;">Aksi</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    <?php }?>
                                <?php }else{?>
                                    <div class="block-content block-content">
                                        <div class="font-size-h4 font-w400 text-danger text-center">Pendaftaran Tugas Akhir Masih Berlangsung atau Ditutup</div>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                    <!-- END Stats -->
                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->

            