            <!-- Main Container -->
            <main id="main-container">

                <!-- Hero -->
                <div class="bg-image overflow-hidden" style="background-image: url('<?= base_url('assets/admin4/assets/media/photos/photo3@2x.jpg')?>');">
                    <div class="bg-primary-dark-op">
                        <div class="content content-narrow content-full">
                            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center mt-5 mb-2 text-center text-sm-left">
                                <div class="flex-sm-fill">
                                    <h1 class="font-w600 text-white mb-0 invisible" data-toggle="appear">Sistem Informasi Pendaftaran Tugas Akhir</h1>
                                    <h2 class="h4 font-w400 text-white-75 mb-0 invisible" data-toggle="appear" data-timeout="250">Selamat Datang <?= $akun["mhs_nama"]?></h2>
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
                        <div class="col-md-12">
                            <?php echo form_open_multipart(base_url('index.php/mahasiswa/postta'), array('onsubmit' => 'return validasiform()'));?>
                                <div class="block">
                                    <div class="block-header block-header-default block-header-rtl">
                                        <h3 class="block-title">Pendaftaran Tugas Akhir <br> <?= substr($periode["periode_buka"],0,10)." s/d ".substr($periode["periode_tutup"],0,10)?></h3>
                                    </div>
                                    <div class="block-content">
                                        <div class="row justify-content-center py-sm-3 py-md-5">
                                            <div class="col-sm-10 col-md-8">
                                                <input class="form-control" id="periode_id" name="periode_id" value="<?= $periode["periode_id"]?>" required hidden>
                                                <div class="form-group">
                                                    <label for="ta_judul">Judul Tugas Akhir</label>
                                                    <textarea class="form-control" id="ta_judul" name="ta_judul" rows="4" style="height: 125px;" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="kk_id">Tujuan Kelompok Keahlian Sesuai Judul</label>
                                                    <select class="form-control" id="kk_id" name="kk_id">
                                                        <?php foreach($kk as $value){
                                                            echo "<option value='".$value["kk_id"]."'>".$value["kk_nama"]."</option>";
                                                        }?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ta_status">Status Tugas Akhir</label>
                                                    <div class="font-size-sm text-dark"><em>dispensasi hanya berlaku untuk 1 semester aktif, jika lewat dari 1 semester wajib mencari topik yang baru</em></div>
                                                    <select class="form-control" id="ta_status" name="ta_status" onchange="dispensasi()">
                                                        <option value="Baru">Baru</option>
                                                        <option value="Dispensasi">Dispensasi</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" style="display:none" id="file_dispensasi">
                                                    <label for="ta_dispensasi">Surat dispensasi (wajib ttd basah pembimbing)</label>
                                                    <div class="font-size-sm text-dark"><em>wajib diupload, bagi mahasiswa yang lewat 1 semester aktif tetapi tidak selesai seminar proposal dan ingin mengajukan topik yang sama di semester ganjil ini.file = pdf</em></div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="ta_dispensasi" name="ta_dispensasi" onchange="cekextensionpdf('ta_dispensasi')">
                                                        <label class="custom-file-label" for="ta_dispensasi">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ta_kebaharuan">Resume kebaharuan topik dari penelitian pembanding (minimal 5 jurnal)</label>
                                                    <textarea class="form-control" id="ta_kebaharuan" name="ta_kebaharuan" rows="4" style="height: 125px;" required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="dosen1">Pilihan Dosen Pembimbing Prioritas Ke-1</label>
                                                    <div class="font-size-sm text-dark"><em>dosen tubel(tugas belajar) sifatnya ajuan dan persetujuan dari dosen ybs. untuk peluang bimbingan sangat kecil.</em></div>
                                                    <select class="form-control" id="dosen1" name="dosen1">
                                                        <?php foreach($dosen as $value){
                                                            echo "<option value='".$value["dosen_nip"]."'>".$value["dosen_nama"]."</option>";
                                                        }?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="dosen2">Pilihan Dosen Pembimbing Prioritas Ke-2</label>
                                                    <select class="form-control" id="dosen2" name="dosen2" >
                                                        <?php foreach($dosen as $value){
                                                            echo "<option value='".$value["dosen_nip"]."'>".$value["dosen_nama"]."</option>";
                                                        }?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ta_asal">Topik Diajukan Dari</label>
                                                    <select class="form-control" id="ta_asal" name="ta_asal">
                                                        <option value="Sendiri">Sendiri</option>
                                                        <option value="Tawaran Topik Dosen">Tawaran Topik Dosen</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ta_pkl">Pengembangan Dari Kerja Praktek</label>
                                                    <select class="form-control" id="ta_pkl" name="ta_pkl">
                                                        <option value="Ya">Ya</option>
                                                        <option value="Tidak">Tidak</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ta_tim">Tugas Akhir TIM/Capstone</label>
                                                    <div class="font-size-sm text-dark"><em>wajib dari tawaran pembimbing atau instansi, tidak bisa diajukan sendiri </em></div>
                                                    <select class="form-control" id="ta_tim" name="ta_tim" onchange="tim()">
                                                        <option value="Regular">Regular/Mandiri</option>
                                                        <option value="Tim">Tugas Akhir TIM (Wajib mengajukan form pendaftaran ke TIM Tugas Akhir)</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" style="display:none" id="nama-tim">
                                                    <label for="ta_tim_nama">Anggota Tugas Akhir TIM/Capstone</label>
                                                    <div class="font-size-sm text-dark"><em>(Nama1, NIM1; Nama2;NIM2)-> Wajib diisi jika Tugas Akhir TIM</em></div>
                                                    <textarea class="form-control" id="ta_tim_nama" name="ta_tim_nama" rows="4" style="height: 125px;"></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ta_draft">Draft Tugas Akhir</label>
                                                    <div class="font-size-sm text-dark"><em>(BAB 1,2,3)  (Sesuaikan Template TA, Penamaan File = NIM_Nama Lengkap), Ukuran file pdf: maksimal 1 mb.</em></div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="ta_draft" name="ta_draft" onchange="cekextensionpdf('ta_draft')" required>
                                                        <label class="custom-file-label" for="ta_draft">Choose file</label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="ta_pendukung">File Tambahan</label>
                                                    <div class="font-size-sm text-dark"><em>(excel, pdf, word) pendukung draft TA. Ukuran file maksimal 1 mb.</em></div>
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" data-toggle="custom-file-input" id="ta_pendukung" name="ta_pendukung" onchange="ceksize('ta_pendukung')" required>
                                                        <label class="custom-file-label" for="ta_pendukung">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="block-header block-header-default block-header-rtl">
                                        <div class="block-header block-header-default block-header-rtl">
                                            <div class="block-options">
                                                <button type="reset" class="btn btn-sm btn-secondary">
                                                    Reset
                                                </button>
                                                <button type="submit" class="btn btn-sm btn-primary" onclick="validasiform()">
                                                    Daftar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php echo form_close();?>
                        </div>
                    </div>
                    <!-- END Stats -->
                </div>
                <!-- END Page Content -->

            </main>
            <!-- END Main Container -->

            