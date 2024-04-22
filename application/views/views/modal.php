        <?php if($page == "Data Pendaftaran Tugas Akhir"){?>
        <!-- MODAL BUKA PENDAFTARAN -->
        <div class="modal" id="modal-insert-periode" tabindex="-1" role="dialog" aria-labelledby="modal-update-status" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Buka Pendaftaran Tugas Akhir</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <?php echo form_open_multipart(base_url('index.php/TugasAkhir/postperiode')); ?>
                        <div class="block-content font-size-sm">
                            <div class="block">
                                <div class="block-content">
                                    <div class="row justify-content-center py-sm-3 py-md-5">
                                        <div class="col-sm-10 col-md-8">
                                            <div class="form-group">
                                                <label for="block-form2-username">Tahun Ajaran</label>
                                                <input class="form-control" id="periode_tahun" name="periode_tahun" required value="<?= (date('Y')-1).'/'.date('Y')?>"></input>
                                            </div>
                                            <div class="form-group">
                                                <label for="block-form2-username">Semester</label>
                                                <select class="form-control" id="periode_semester" name="periode_semester">
                                                    <option value="Ganjil">Ganjil</option>
                                                    <option value="Genap">Genap</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <input type="text" class="js-datepicker form-control" id="periode_buka" name="periode_buka" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="Tanggal Mulai" required autocomplete="off">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <input type="text" class="js-datepicker form-control" id="periode_tutup" name="periode_tutup" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy-mm-dd" placeholder="Tanggal Selesai" required autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="reset" class="btn btn-sm btn-secondary">
                                Reset
                            </button>
                            <button type="submit" class="btn btn-sm btn-primary">
                                Simpan
                            </button>
                        </div>
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL BUKA PENDAFTARAN -->
        <!-- MODAL UPDATE TANGGAL PENDAFTARAN -->
        <div class="modal" id="modal-update-tanggal" tabindex="-1" role="dialog" aria-labelledby="modal-update-status" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Update Tanggal Pendaftaran</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <?php echo form_open_multipart(base_url('index.php/TugasAkhir/updateperiode/?periode_id=').$periode["periode_id"]); ?>
                        <div class="block-content font-size-sm">
                            <div class="block">
                                <div class="block-content">
                                    <div class="row justify-content-center py-sm-3 py-md-5">
                                        <div class="col-sm-10 col-md-8">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <input type="text" class="js-datepicker form-control" id="periode_buka" name="periode_buka" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy/mm/dd" placeholder="Tanggal Mulai" value="<?= substr($periode["periode_buka"],0,10)?>" required>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <input type="text" class="js-datepicker form-control" id="periode_tutup" name="periode_tutup" data-week-start="1" data-autoclose="true" data-today-highlight="true" data-date-format="yyyy/mm/dd" value="<?= substr($periode["periode_tutup"],0,10)?>" placeholder="Tanggal Berakhir" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="reset" class="btn btn-sm btn-secondary">
                                Reset
                            </button>
                            <button type="submit" class="btn btn-sm btn-primary">
                                Simpan
                            </button>
                        </div>
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL UPDATE TANGGAL PENDAFTARAN -->
        <?php }?>
        <!-- MODAL VIEW DOSEN -->
        <div class="modal" id="modal-view-dosen" tabindex="-1" role="dialog" aria-labelledby="modal-update-status" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Data Dosen</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                            <div class="block">
                                <div class="block-content">
                                    <div class="row justify-content-center py-sm-3 py-md-5">
                                        <div class="col-sm-10 col-md-8">
                                            <div class="form-group">
                                                <input class="form-control" id="dosen_nip_view" readonly></input>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" id="dosen_nama_view" readonly></input>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" id="dosen_telp_view" readonly></input>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" id="akun_role_view" readonly></input>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" id="kk_nama_view" readonly></input>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" id="dosen_ketersediaan_view" readonly></input>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" id="akun_email_view" readonly></input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL VIEW DOSEN -->
        <?php if($page == "Dashboard Koordinator"){?>
        <!-- MODAL TAMBAH DOSEN -->
        <div class="modal" id="modal-add-dosen" tabindex="-1" role="dialog" aria-labelledby="modal-update-status" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Tambah Data Dosen</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <form action="<?= base_url('index.php/Koordinator/postdosen'); ?>" method="POST" onsubmit="return ceknip()">
                        <div class="block-content font-size-sm">
                            <div class="block">
                                <div class="block-content">
                                    <div class="row justify-content-center py-sm-3 py-md-5">
                                        <div class="col-sm-10 col-md-8">
                                            <div class="form-group">
                                                <input class="form-control" id="dosen_nip" name="dosen_nip" required placeholder="NIP"></input>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" id="dosen_nama" name="dosen_nama" required placeholder="Nama"></input>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" id="dosen_telp" name="dosen_telp" required placeholder="Telp/Wa"></input>
                                            </div>
                                            <div class="form-group">
                                                <label for="block-form2-username">Bidang Keahlian</label>
                                                <select class="form-control" id="kk_id" name="kk_id">
                                                    <?php foreach($kk as $value){?>
                                                        <option value="<?= $value["kk_id"]?>"><?= $value["kk_nama"]?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="block-form2-username">Role Dosen</label>
                                                <select class="form-control" id="akun_role" name="akun_role">
                                                    <option value="Pembimbing">Pembimbing</option>
                                                    <option value="Koordinator">Koordinator</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="block-form2-username">Ketersediaan Bimbingan</label>
                                                <select class="form-control" id="dosen_ketersediaan" name="dosen_ketersediaan">
                                                    <option value="Tersedia">Tersedia</option>
                                                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" id="akun_email" name="akun_email" required placeholder="Email"></input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="reset" class="btn btn-sm btn-secondary">
                                Reset
                            </button>
                            <button type="submit" class="btn btn-sm btn-primary">
                                Simpan
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL TAMBAH DOSEN -->
        <!-- MODAL UPDATE DOSEN -->
        <div class="modal" id="modal-update-dosen" tabindex="-1" role="dialog" aria-labelledby="modal-update-status" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Tambah Data Dosen</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <?php echo form_open_multipart(base_url('index.php/Koordinator/updatedosen')); ?>
                        <div class="block-content font-size-sm">
                            <div class="block">
                                <div class="block-content">
                                    <div class="row justify-content-center py-sm-3 py-md-5">
                                        <div class="col-sm-10 col-md-8">
                                            <div class="form-group">
                                                <input class="form-control" id="dosen_nip_asli" name="dosen_nip_asli" hidden></input>
                                            </div>
                                            <div class="form-group">
                                                <label>NIP</label>
                                                <input class="form-control" id="dosen_nip_update" name="dosen_nip" required placeholder="NIP"></input>
                                            </div>
                                            <div class="form-group">
                                                <label>Nama</label>
                                                <input class="form-control" id="dosen_nama_update" name="dosen_nama" required placeholder="Nama"></input>
                                            </div>
                                            <div class="form-group">
                                                <label>Telp/WA</label>
                                                <input class="form-control" id="dosen_telp_update" name="dosen_telp" required placeholder="Telp/Wa"></input>
                                            </div>
                                            <div class="form-group">
                                                <label for="block-form2-username">Role Dosen</label>
                                                <select class="form-control" id="akun_role_update" name="akun_role">
                                                    <option value="Pembimbing">Pembimbing</option>
                                                    <option value="Koordinator">Koordinator</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="block-form2-username">Bidang Keahlian</label>
                                                <select class="form-control" id="kk_id_update" name="kk_id">
                                                    <?php foreach($kk as $value){?>
                                                        <option value="<?= $value["kk_id"]?>"><?= $value["kk_nama"]?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="block-form2-username">Ketersediaan Bimbingan</label>
                                                <select class="form-control" id="dosen_ketersediaan_update" name="dosen_ketersediaan">
                                                    <option value="Tersedia">Tersedia</option>
                                                    <option value="Tidak Tersedia">Tidak Tersedia</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input class="form-control" id="akun_email_update" name="akun_email" required placeholder="Email"></input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="reset" class="btn btn-sm btn-secondary">
                                Reset
                            </button>
                            <button type="submit" class="btn btn-sm btn-primary">
                                Simpan
                            </button>
                        </div>
                        <?php echo form_close();?>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL UPDATE DOSEN -->
        <?php }?>
        <!-- MODAL UBAH PASSWORD -->
        <div class="modal" id="modal-ubah-password" tabindex="-1" role="dialog" aria-labelledby="modal-ubah-password" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Ubah Password</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <form action="<?= base_url('index.php/Auth/updatepassword'); ?>" method="POST" onsubmit="return cekpassword()">
                        <div class="block-content font-size-sm">
                            <div class="block">
                                <div class="block-content">
                                    <div class="row justify-content-center py-sm-3 py-md-5">
                                        <div class="col-sm-10 col-md-8">
                                            <div class="form-group">
                                                <input type="password" class="form-control" id="pass_now" name="pass_now" required placeholder="Password Sekarang"></input>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" id="pass_new" name="pass_new" required placeholder="Password Baru"></input>
                                            </div>
                                            <div class="form-group">
                                                <input type="password" class="form-control" id="pass_renew" name="pass_renew" required placeholder="Ulangi Password Baru"></input>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="block-content block-content-full text-right border-top">
                            <button type="reset" class="btn btn-sm btn-secondary">
                                Reset
                            </button>
                            <button type="submit" class="btn btn-sm btn-primary">
                                Simpan
                            </button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL UBAH PASSWORD -->
        <!-- MODAL VIEW DAFTAR -->
        <div class="modal" id="view-daftar" tabindex="-1" role="dialog" aria-labelledby="modal-update-status" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Detail Pendaftar Tugas Akhir</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content font-size-sm">
                            <div class="block">
                                <div class="block-content">
                                    <div class="mb-2">
                                        <p class="mb-0 h4 text-center" id="ta_judul">asdasd</p>
                                    </div>
                                    <div class="font-size-sm push row">
                                        <div class="col-sm-12 col-md-6">
                                            <div class="row mb-2">
                                                <p class="col-sm-12 col-md-4 mb-0 font-w600 text-left">NIM</p>
                                                <p class="col-sm-12 col-md-8 mb-0 font-w600 text-left" id="mhs_nim">: </p>
                                            </div>
                                            <div class="row mb-2">
                                                <p class="col-sm-12 col-md-4 mb-0 font-w600 text-left">Nama</p>
                                                <p class="col-sm-12 col-md-8 mb-0 font-w600 text-left" id="mhs_nama">: </p>
                                            </div>
                                            <div class="row mb-2">
                                                <p class="col-sm-12 col-md-4 mb-0 font-w600 text-left">Status Pengajuan</p>
                                                <p class="col-sm-12 col-md-8 mb-0 font-w600 text-left" id="ta_status_pengajuan">: </p>
                                            </div>
                                            <div class="row mb-2">
                                                <p class="col-sm-12 col-md-4 mb-0 font-w600 text-left">Status Tugas Akhir</p>
                                                <p class="col-sm-12 col-md-8 mb-0 font-w600 text-left" id="ta_status">: </p>
                                            </div>
                                            <div class="row mb-2">
                                                <p class="col-sm-12 col-md-4 mb-0 font-w600 text-left">Pembimbing 1</p>
                                                <p class="col-sm-12 col-md-8 mb-0 font-w600 text-left" id="dosen1">: </p>
                                            </div>
                                            <div class="row mb-2">
                                                <p class="col-sm-12 col-md-4 mb-0 font-w600 text-left">Pembimbing 2</p>
                                                <p class="col-sm-12 col-md-8 mb-0 font-w600 text-left" id="dosen2">: </p>
                                            </div>
                                            <div class="row mb-2">
                                                <p class="col-sm-12 col-md-4 mb-0 font-w600 text-left">Sumber Judul</p>
                                                <p class="col-sm-12 col-md-8 mb-0 font-w600 text-left" id="ta_asal">: </p>
                                            </div>
                                            <div class="row mb-2">
                                                <p class="col-sm-12 col-md-4 mb-0 font-w600 text-left">Perkembangan KP</p>
                                                <p class="col-sm-12 col-md-8 mb-0 font-w600 text-left" id="ta_pkl">: </p>
                                            </div>
                                            <div class="row mb-2">
                                                <p class="col-sm-12 col-md-4 mb-0 font-w600 text-left">Tim / Sendiri</p>
                                                <p class="col-sm-12 col-md-8 mb-0 font-w600 text-left" id="ta_tim">: </p>
                                            </div>
                                            <div class="row mb-2">
                                                <p class="col-sm-12 col-md-4 mb-0 font-w600 text-left">Anggota Tim</p>
                                                <p class="col-sm-12 col-md-8 mb-0 font-w600 text-left" id="ta_tim_nama">: </p>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="row mb-2">
                                                <p class="col-sm-12 col-md-12 mb-0 font-w600 text-left">Kebaharuan Penelitian</p>
                                                <i class="col-sm-12 col-md-12 mb-0 font-w600 text-left" id="ta_kebaharuan">: </i>
                                            </div>
                                            <div class="row mb-2">
                                                <p class="col-sm-12 col-md-6 mb-0 font-w600 text-left">Draft Tugas Akhir</p>
                                                <p class="col-sm-12 col-md-6 mb-0 font-w600 text-left">: <a id="ta_draft" target="_blank" href="">Buka</a></p>
                                            </div>
                                            <div class="row mb-2">
                                                <p class="col-sm-12 col-md-6 mb-0 font-w600 text-left">Dokumen Pendukung</p>
                                                <p class="col-sm-12 col-md-6 mb-0 font-w600 text-left">: <a id="ta_pendukung" target="_blank" href="">Buka</a></p>
                                            </div>
                                            <div class="row mb-2">
                                                <p class="col-sm-12 col-md-6 mb-0 font-w600 text-left">Dispensasi</p>
                                                <p class="col-sm-12 col-md-6 mb-0 font-w600 text-left">: <a id="ta_dispensasi" target="_blank" href="">Buka</a></p>
                                            </div>
                                            <div class="row mb-2">
                                                <p class="col-sm-12 col-md-6 mb-0 font-w600 text-left">Status Saat Ini</p>
                                                <p class="col-sm-12 col-md-6 mb-0 font-w600 text-left" id="dosen_status"></p>
                                            </div>
                                            <div class="row justify-content-center border border-danger border-1x w-75 m-auto rounded p-2" id="btn-validasi">
                                                <p class="col-sm-12 col-md-12 mb-0 font-w600 text-center" id="verif_title">Persetujuan Pembimbing</p>
                                                <button class="col-sm-8 col-md-3 m-auto btn btn-md border border-secondary" id="btn-acc"><i class="fa fa-check text-success"></i></button>
                                                <button class="col-sm-8 col-md-3 m-auto btn btn-md border border-secondary" id="btn-tolak"><i class="fa fa-times text-danger"></i></button>
                                                <button class="col-sm-8 col-md-3 m-auto btn btn-md border border-secondary text-warning" id="btn-batal">Batal</button>
                                                <label for="ta_catatan">Catatan</label>
                                                <textarea class="form-control" id="ta_catatan" name="ta_catatan" rows="4" style="height: 100px;"></textarea>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MODAL VIEW DAFTAR -->