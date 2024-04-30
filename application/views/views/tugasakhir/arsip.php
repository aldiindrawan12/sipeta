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
                        <div class="col-12 col-md-12 col-lg-12 col-xl-12">
                            <a class="block block-rounded block-link-pop p-2">
                                <div class="block-header">
                                    <h3 class="block-title">Arsip Pendaftaran Tugas Akhir</h3>
                                </div>
                                    <div class="table-responsive">
                                        <table class="table table-vcenter table-striped table-bordered text-sm" id="arsip-tabel">
                                            <thead class="bg-secondary text-white">
                                                <tr>
                                                    <th  class="text-center" style="width: 5%;"><small>No</small></th>
                                                    <th  class="text-center" style="width: 25%"><small>Kode</small></th>
                                                    <th  class="text-center" style="width: 10%;"><small>Tahun</small></th>
                                                    <th  class="text-center" style="width: 10%;"><small>Semester</small></th>
                                                    <th  class="text-center" style="width: 15%;"><small>Tanggal Mulai</small></th>
                                                    <th  class="text-center" style="width: 15%;"><small>Tanggal Selesai</small></th>
                                                    <th  class="text-center" style="width: 10%;"><small>Unduh</small></th>
                                                    <th  class="text-center" style="width: 10%;"><small>Unduh Bimbingan Saya</small></th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!-- END Stats -->
                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->

            