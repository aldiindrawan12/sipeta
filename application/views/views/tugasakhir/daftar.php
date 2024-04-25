            <div id="page-loader" class="show"></div>        
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
                        <div class="col-12 col-md-6 col-lg-12 col-xl-12">
                            <div class="block block-rounded block-link-pop border-10x ">
                                <div class="block-header block-header-default block-header-rtl">
                                    <h3 class="block-title text-left">PENDAFTARAN TUGAS AKHIR</h3>
                                </div>
                                    <?php if($periode == NULL){?>
                                        <div class="block-content block-content-full">
                                            <div class="font-size-6 font-w400 text-danger text-center"><strong><i>Sekarang Bukan Masa Pendaftaran Tugas Akhir</i></strong></div>
                                        </div>
                                        <button class="btn btn-block btn-primary m-auto" data-toggle="modal" data-target="#modal-insert-periode">
                                            Buka Pendaftaran
                                        </button>
                                    <?php }else{?>
                                        <?php if($periode["periode_progress"] == "Verifikasi"){ ?>
                                            <div class="block-content block-content-full">
                                                <div class="font-size-6 font-w400 text-center"><strong><i>Proses Verifikasi Pendaftaran Tugas Akhir Oleh Calon Dosen Pembimbing</i></strong></div>
                                            </div>
                                            <button class="btn btn-block btn-primary m-auto" onclick="verifikasi_ploting()">
                                                Tutup Verifikasi dan Ploting Pembimbing Otomatis
                                            </button>
                                        <?php } else if($periode["periode_progress"]=="Ploting"){?>
                                                <div class="block-content block-content-full">
                                                    <div class="font-size-6 font-w400 text-center"><strong><i>Tahap Akhir Proses Pendaftaran</i></strong></div>
                                                </div>
                                                <button class="btn btn-block btn-primary m-auto" onclick="verifikasi_kunci()">
                                                    Kunci Data
                                                </button>
                                        <?php } else if($periode["periode_progress"]=="Validasi"){?>
                                        <div class="block-content block-content-full">
                                            <div class="block-content block-content-full">
                                                <div class="font-size-6 font-w400 text-center"><strong><i>Proses Validasi Koordinator Tugas Akhir</i></strong></div>
                                            </div>
                                            <button class="btn btn-block btn-primary m-auto" onclick="verifikasi_verifikasi()">
                                                Kirim Email Pengumuman ke Pembimbing dan Mulai Proses Verifikasi Pembimbing
                                            </button>
                                        </div>
                                        <?php } else if($periode["periode_progress"]=="Aktif"){?>
                                        <div class="block-content block-content-full">
                                            <div class="font-size-h6 font-w400 text-center"><strong><i>Pendaftaran Tugas Akhir Berlangsung</i></strong>
                                            <div class="font-size-h4 font-w400 text-center"><?= substr($periode["periode_buka"],0,10)." s/d ".substr($periode["periode_tutup"],0,10)?></div>
                                            <div class="row justify-content-center">
                                                <div class="col-md-3 col-xl-3">
                                                    <button class="btn btn-block btn-primary" data-toggle="modal" data-target="#modal-update-tanggal">
                                                        <i class="far fa-calendar-alt mr-1"></i> Ubah Tanggal
                                                    </button>
                                                </div>
                                                <div class="col-md-3 col-xl-3">
                                                    <button class="btn btn-block btn-danger" onclick="confirm_close_periode('<?= $periode['periode_id']?>')">
                                                        <i class="far fa-calendar-times mr-1"> Tutup</i> 
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }
                                    }?>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                            <a class="block block-rounded block-link-pop p-2">
                                <div class="block-header">
                                    <h3 class="block-title">Data Pendaftaran Tugas Akhir</h3>
                                </div>
                                <?php if($periode){?>
                                    <div class="table-responsive">
                                        <table class="table table-vcenter table-striped table-bordered text-sm" id="daftar-tabel">
                                            <thead class="bg-secondary text-white">
                                                <tr>
                                                    <th rowspan=2 class="text-center" style="width: 5%;"><small>NIM</small></th>
                                                    <th rowspan=2 class="text-center" style="width: 35%;"><small>Judul</small></th>
                                                    <th colspan=2 class="text-center" style="width: 25%;"><small>Pembimbing 1</small></th>
                                                    <th colspan=2 class="text-center" style="width: 25%;"><small>Pembimbing 2</small></th>
                                                    <th rowspan=2 class="text-center" style="width: 10%"><small>Aksi</small></th>
                                                </tr>
                                                <tr>
                                                    <th class="text-center" style="width: 15%;"><small>Nama</small></th>
                                                    <th class="text-center" style="width: 5%;"><small>Status</small></th>
                                                    <th class="text-center" style="width: 15%;"><small>Nama</small></th>
                                                    <th class="text-center" style="width: 5%;"><small>Status</small></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                <?php }?>
                            </a>
                        </div>
                    </div>
                    <!-- END Stats -->
                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->

            