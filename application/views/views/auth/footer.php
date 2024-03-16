        <!-- MODAL EMAIL LUPA PASSWORD -->
        <div class="modal" id="email-lupa-password" tabindex="-1" role="dialog" aria-labelledby="email-lupa-password" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="block block-themed block-transparent mb-0">
                        <div class="block-header bg-primary-dark">
                            <h3 class="block-title">Email</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option" data-dismiss="modal" aria-label="Close">
                                    <i class="fa fa-fw fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <form action="<?= base_url('index.php/auth/otplupapassword'); ?>" method="POST" onsubmit="return cekemail()">
                            <div class="block-content font-size-sm">
                                <div class="block">
                                    <div class="block-content">
                                        <div class="row justify-content-center py-sm-3 py-md-5">
                                            <div class="col-sm-10 col-md-8">
                                                <div class="form-group">
                                                    <input class="form-control" id="email_lupa_password" name="email_lupa_password" required placeholder="Masukkan Email Anda"></input>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="block-content block-content-full text-right border-top">
                                <button type="submit" class="btn btn-sm btn-primary">
                                    Kirim
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- MODAL EMAIL LUPA PASSWORD -->
        <!-- END Page Container -->
        <script src="<?= base_url('assets/admin4/assets/js/oneui.core.min.js')?>"></script>

        <script src="<?= base_url('assets/admin4/assets/js/oneui.app.min.js')?>"></script>

        <!-- Page JS Plugins -->
        <script src="<?= base_url('assets/admin4/assets/js/plugins/chart.js/Chart.bundle.min.js')?>"></script>

        <!-- Page JS Code -->
        <script src="<?= base_url('assets/js/auth.js')?>"></script>
        <script src="<?= base_url('assets/admin4/assets/js/pages/be_pages_dashboard.min.js')?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

        <!-- script alert-alert -->
        <script>
            var status_login = '<?= $this->session->flashdata('status-login'); ?>';
            var status_register = '<?= $this->session->flashdata('status-register'); ?>';
            var false_login = '<?= $this->session->flashdata('status-login'); ?>';
            var update_password = '<?= $this->session->flashdata('update-password'); ?>';
            var email_password = '<?= $this->session->flashdata('email-password'); ?>';
            var ubah_password = '<?= $this->session->flashdata('ubah-password'); ?>';
            if(status_register == "Berhasil"){
                Swal.fire({
                        title: 'Berhasil Registrasi',
                        icon:'success',
                        text: 'Akun Anda Berhasil Dibuat',
                        timer: 2000
                    });
            }
            if(ubah_password == "Berhasil"){
                Swal.fire({
                        title: 'Berhasil',
                        icon:'success',
                        text: 'Password Akun Anda Berhasil Diperbaharui',
                        timer: 2000
                    });
            }
            if(update_password == "Berhasil"){
                Swal.fire({
                        title: 'Berhasil',
                        icon:'success',
                        text: 'Password Anda Berhasil Diperbaharui, Silakan Login Ulang',
                        timer: 2000
                    });
            }
            if(email_password == "Berhasil"){
                Swal.fire({
                        title: 'Berhasil',
                        icon:'success',
                        text: 'Kode OTP untuk ubah password dikirim ke alamat email yang dimasukkan',
                        timer: 2000
                    });
            }
            if(status_login == "Username"){
                Swal.fire({
                        title: 'Gagal Login',
                        icon:'error',
                        text: 'Username tidak ditemukan',
                        timer: 2000
                    });
            }
            if(status_login == "Password"){
                Swal.fire({
                        title: "Gagal Login",
                        text: "Password salah",
                        icon: 'error',
                        timer: 2000
                    });
            }
            if(false_login == "False"){
                Swal.fire({
                        title: "Gagal Masuk",
                        text: "Silakan login terlebih dahulu",
                        icon: 'error',
                        timer: 2000
                    });
            }
            if(false_login == "Aktif"){
                Swal.fire({
                        title: "Gagal Masuk",
                        text: "Anda Sedang Login Di Device Lain, Sialakan Logout Terlebih Dahulu atau Tunggu 1 Menit Lagi",
                        icon: 'error',
                    });
            }
        </script>
        <!-- end script alert -->

        <?php if($page == "Register"){?>
        <!-- validasi email registrasi -->
        <script>
            email_data = [];
            nim_data = [];
            <?php for($i=0;$i<count($email);$i++){?>
                email_data.push("<?= $email[$i]?>");
            <?php }?>
            <?php for($i=0;$i<count($mhs);$i++){?>
                nim_data.push("<?= $mhs[$i]?>");
            <?php }?>
            function validateEmail(){
                email = document.getElementById("akun_email").value;
                nim = document.getElementById("mhs_nim").value;
                domain = email.substring(email.length-19,email.length);
                if(nim_data.includes(nim)){
                    Swal.fire({
                        title: 'Cek Kembali NIM Anda',
                        icon:'error',
                        text: 'NIM Yang Anda Masukkan Sudah Terdaftar'
                    });
                    return false;
                }else{
                    if(domain == "student.itera.ac.id"){
                        if(email_data.includes(email)){
                            Swal.fire({
                                title: 'Cek Kembali Email Anda',
                                icon:'error',
                                text: 'Email Yang Anda Masukkan Sudah Terdaftar'
                            });
                            return false;
                        }else{
                            One.loader('show');
                            setTimeout(function () {
                                One.loader('hide');
                            },1000000);
                            return true;
                        }
                    }else{
                        Swal.fire({
                            title: 'Cek Kembali Email Anda',
                            icon:'error',
                            text: 'Harap Gunakan Email Itera'
                        });
                        return false;
                    }
                }
            }
        </script>
        <!-- end validasi email registrasi -->
        <?php }?>
        
        <?php if($page == "OTP"){?>
        <!-- validasi OTP registrasi -->
        <script>
            function validateOTP(otp){
                otp_validasi = document.getElementById("akun_otp").value;
                if(otp == otp_validasi){
                    return true;
                }else{
                    Swal.fire({
                        title: 'Cek Kembali Kode OTP Anda',
                        icon:'error',
                        text: 'Kode OTP Yang Dimasukkan Salah'
                    });
                    return false;
                }
            }
        </script>
        <!-- end validasi OTP registrasi -->
        <!-- countdown OTP -->
        <script>
            waktu = "<?= $akun["otp_time"]?>"
            function countDown() {
                waktu = waktu-1;
                if(waktu == 0){
                    $('#countdown').text("Waktu Habis");
                    document.getElementById("resend").style.display = 'block';
                    document.getElementById("kirim").style.display = 'none';
                }else{
                    $.ajax({ //ajax ambil data bon
                        type: "POST",
                        url: "<?php echo base_url('index.php/auth/updateOTPtime') ?>",
                        dataType: "text",
                        data: {
                            email: "<?= $akun["akun_email"]?>",
                            time:waktu
                        },
                        success: function(data) {
                        }
                    });
                    $('#countdown').text(waktu+"s");        
                    document.getElementById("resend").style.display = 'none';
                    document.getElementById("kirim").style.display = 'block';
                    setTimeout("countDown()", 1000);
                }
            }
            countDown();
        </script>
        <!-- end countdown OTP -->
        <!-- resend email otp -->
        <script>
            function resendEmail(){
                One.loader('show');
                setTimeout(function () {
                    One.loader('hide');
                },1000000);
                $.ajax({ //ajax ambil data bon
                    type: "POST",
                    url: "<?php echo base_url('index.php/auth/resendOTP') ?>",
                    dataType: "text",
                    data: {
                        email: "<?= $akun["akun_email"]?>"
                    },
                    success: function(data) {
                    }
                });
            }
        </script>
        <!-- end resend email otp -->
        <?php }?>

        <?php if($page == "Login"){?>
        <!-- cek email -->
        <script>
            email_data = [];
            <?php for($i=0;$i<count($email);$i++){?>
                email_data.push("<?= $email[$i]?>");
            <?php }?>
            function cekemail(){
                email = $("#email_lupa_password").val();
                if(email_data.includes(email)){
                    One.loader('show');
                    setTimeout(function () {
                        One.loader('hide');
                    },1000000);
                    return true;
                }else{
                    Swal.fire({
                        title: 'Email Tidak Ditemukan',
                        icon:'error',
                        text: 'Email Yang Anda Masukkan Tidak Ditemukan',
                        timer:1500
                    });
                    return false;
                }
            }
        </script>
        <!-- end cek email -->
        <?php }?>
        
        <?php if($page == "New Password"){?>
        <!-- cek password -->
        <script>
            function cekpassword(){
                passnew = $("#pass_new").val();
                renew = $("#pass_renew").val();
                if(passnew == renew){
                    return true;
                }else{
                    Swal.fire({
                        title: "Gagal",
                        icon: "error",
                        text: "Password Baru dan Ulangi Password Baru Tidak Sesuai",
                        type: "error",
                        timer: 2000
                    });
                    return false;
                }
            }
        </script>
        <!-- end cek password -->
        <?php }?>
    </body>
</html>
