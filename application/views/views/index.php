            <!-- Main Container -->
            <main id="main-container">

                <!-- Hero -->
                <div class="bg-image overflow-hidden" style="background-image: url('<?= base_url('assets/admin4/assets/media/photos/photo3@2x.jpg')?>');">
                    <div class="bg-primary-dark-op">
                        <div class="content content-narrow content-full">
                            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                                <div class="flex-sm-fill">
                                    <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Sistem Informasi Pendaftaran Tugas Akhir</h1>
                                    <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Selamat Datang <?php if($_SESSION["akun_role"]!="Mahasiswa"){echo $akun["dosen_nama"];}else{echo $akun["mhs_nama"];}?></h2>
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
                                <?php if($ta == NULL){ ?>
                                    <?php if($periode == NULL){ ?>
                                        <div class="block-content block-content-full">
                                            <div class="font-size-6 font-w400 text-danger text-center"><strong><i>Sekarang Bukan Masa Pendaftaran Tugas Akhir</i></strong></div>
                                        </div>
                                    <?php } else {?>
                                        <?php if($periode["periode_progress"] != "Aktif" ){?>
                                            <div class="block-content block-content-full">
                                                <div class="ont-w400 text-center"><strong><i>Verifikasi Pendaftaran Tugas Akhir Oleh Koordinator Tugas Akhir dan Calon Dosen Pembimbing Sedang Berlangsung</i></strong></div>
                                            </div>
                                        <?php }else if($periode["periode_progress"]=="Aktif"){?>
                                            <div class="block-content block-content-full">
                                                <div class="font-size-h6 font-w400 text-center"><strong><i>Pendaftaran Tugas Akhir Berlangsung</i></strong>
                                                <div class="font-size-h4 font-w400 text-center"><?= substr($periode["periode_buka"],0,10)." s/d ".substr($periode["periode_tutup"],0,10)?></div>
                                                <?php if($page == "Dashboard Mahasiswa"){?>
                                                    <div class="font-size-h4 font-w400 text-center">
                                                        <a href="mahasiswa/daftar" class="btn btn-block btn-primary text-white" onclick="redirect_daftar()">
                                                            <i class="far fa-clipboard mr-1"></i> Pendaftaran Tugas Akhir
                                                        </a>
                                                    </div>
                                                <?php }?>
                                            </div>
                                    <?php }}?>
                                <?php } else {?>
                                    <div class="block-content block-content-full">
                                        <div class="row justify-content-center">
                                            <div class="col-sm-12 col-md-12 text-center">
                                                <h3 class="text-w600 text-center">
                                                    "<?= $ta["ta_judul"]?>"
                                                </h3>
                                            </div>
                                            <div class="col-sm-12 col-md-12 border border-dark border-2x rounded">
                                                <div class="block">
                                                    <div class="block-header block-header-default block-header-rtl">
                                                        <?php if($ta["ta_progres"]=="Ditolak"){?>
                                                            <h3 class="block-title text-center text-primary"><?= $ta["ta_progres"]?> Saat Validasi Oleh Koordinator TA</h3>
                                                        <?php }else{?>
                                                            <h3 class="block-title text-center text-primary"><?= $ta["ta_progres"]?></h3>
                                                        <?php }?>
                                                    </div>
                                                    <div class="block-content">
                                                        <div class="font-size-sm push row">
                                                            <div class="col-sm-12 col-md-7">
                                                                <div class="row mb-2">
                                                                    <p class="col-sm-12 col-md-5 mb-0 font-w600 text-left">Status Tugas Akhir</p>
                                                                    <p class="col-sm-12 col-md-7 mb-0 font-w600 text-left">: <?= $ta["ta_status"]?></p>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <p class="col-sm-12 col-md-5 mb-0 font-w600 text-left">Pembimbing 1</p>
                                                                    <p class="col-sm-12 col-md-7 mb-0 font-w600 text-left">: <?= $dosen1["dosen_nama"]?></p>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <p class="col-sm-12 col-md-5 mb-0 font-w600 text-left">Status Pembimbing 1</p>
                                                                    <?php if($ta["dosen1_status"]=="Diajukan"){?>
                                                                        <p class="col-sm-12 col-md-7 mb-0 font-w600 text-left">: Menunggu Verifikasi</p>
                                                                    <?php }else{?>
                                                                        <p class="col-sm-12 col-md-7 mb-0 font-w600 text-left">: <?= $ta["dosen1_status"]?></p>
                                                                    <?php }?>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <p class="col-sm-12 col-md-5 mb-0 font-w600 text-left">Pembimbing 2</p>
                                                                    <p class="col-sm-12 col-md-7 mb-0 font-w600 text-left">: <?= $dosen2["dosen_nama"]?></p>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <p class="col-sm-12 col-md-5 mb-0 font-w600 text-left">Status Pembimbing 2</p>
                                                                    <?php if($ta["dosen2_status"]=="Diajukan"){?>
                                                                        <p class="col-sm-12 col-md-7 mb-0 font-w600 text-left">: Menunggu Verifikasi</p>
                                                                    <?php }else{?>
                                                                        <p class="col-sm-12 col-md-7 mb-0 font-w600 text-left">: <?= $ta["dosen2_status"]?></p>
                                                                    <?php }?>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <p class="col-sm-12 col-md-5 mb-0 font-w600 text-left">Sumber Judul</p>
                                                                    <p class="col-sm-12 col-md-7 mb-0 font-w600 text-left">: <?= $ta["ta_asal"]?></p>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <p class="col-sm-12 col-md-5 mb-0 font-w600 text-left">Perkembangan KP</p>
                                                                    <p class="col-sm-12 col-md-7 mb-0 font-w600 text-left">: <?= $ta["ta_pkl"]?></p>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-12 col-md-5">
                                                                <div class="row mb-2">
                                                                    <p class="col-sm-12 col-md-6 mb-0 font-w600 text-left">Tim / Sendiri</p>
                                                                    <p class="col-sm-12 col-md-6 mb-0 font-w600 text-left">: <?= $ta["ta_tim"]?></p>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <p class="col-sm-12 col-md-6 mb-0 font-w600 text-left">Anggota Tim</p>
                                                                    <p class="col-sm-12 col-md-6 mb-0 font-w600 text-left">: <?= $ta["ta_tim_nama"]?></p>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <p class="col-sm-12 col-md-12 mb-0 font-w600 text-left">Kebaharuan Tugas Akhir</p>
                                                                    <p class="col-sm-12 col-md-12 mb-0 font-w600 text-left"><i><?= $ta["ta_kebaharuan"]?></i></p>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <p class="col-sm-12 col-md-12 mb-0 font-w600 text-left">Catatan Koordinator dan Pembimbing</p>
                                                                    <p class="col-sm-12 col-md-12 mb-0 font-w600 text-left"><i><?= $ta["ta_catatan"]?></i></p>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <p class="col-sm-12 col-md-6 mb-0 font-w600 text-left">Draft Tugas Akhir</p>
                                                                    <p class="col-sm-12 col-md-6 mb-0 font-w600 text-left">: <a target="_blank" href="<?= base_url("index.php/mahasiswa/openpdf?url=").$ta["ta_draft"]?>">Buka</a></p>
                                                                </div>
                                                                <div class="row mb-2">
                                                                    <p class="col-sm-12 col-md-6 mb-0 font-w600 text-left">Dokumen Pendukung</p>
                                                                    <p class="col-sm-12 col-md-6 mb-0 font-w600 text-left">: <a  href="<?= $ta["ta_pendukung"]?>">Buka</a></p>
                                                                </div>
                                                                <?php if($ta["ta_dispensasi"]!=NULL){?>
                                                                <div class="row mb-2">
                                                                    <p class="col-sm-12 col-md-6 mb-0 font-w600 text-left">Dispensasi</p>
                                                                    <p class="col-sm-12 col-md-6 mb-0 font-w600 text-left">: <a target="_blank" href="<?= base_url("index.php/mahasiswa/openpdf?url=").$ta["ta_dispensasi"]?>">Buka</a></p>
                                                                </div>
                                                                <?php }?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                        </div>
                        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                            <a class="block block-rounded block-link-pop p-2">
                                <div class="block-header">
                                    <h3 class="block-title">Dosen Teknik Informatika</h3>
                                    <?php if($_SESSION["akun_role"]=="Koordinator"){?>
                                        <div class="block-options"><button class="btn btn-md btn-primary" data-toggle="modal" data-target="#modal-add-dosen"><i class="far fa-plus-square"></i> Dosen IF</button></div>
                                        <div class="block-options"><button class="btn btn-md btn-primary" data-toggle="modal" data-target="#modal-add-dosen-luar"><i class="far fa-plus-square"></i> Dosen Luar</button></div>
                                    <?php }?>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-vcenter table-striped table-bordered" width="100%" id="dosen-tabel">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width: 5%;"><small>#</small></th>
                                                <th class="text-center" style="width:25%"><small>Nama</small></th>
                                                <th class="text-center" style="width: 25%;"><small>Bidang Keahlian</small></th>
                                                <?php if($_SESSION["akun_role"]=="Koordinator"){?>
                                                    <th class="text-center" style="width: 15%;"><small>Bimb. 1 / Bimb. 2</small></th>
                                                    <th class="text-center" style="width: 15%;"><small>Aksi</small></th>
                                                <?php }?>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- END Stats -->
                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->

            