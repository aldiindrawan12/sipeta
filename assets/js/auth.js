
        
            var status_login = '<?= $this->session->flashdata("status-login"); ?>';
            var status_register = '<?= $this->session->flashdata("status-register"); ?>';
            var false_login = '<?= $this->session->flashdata("status-login"); ?>';
            var update_password = '<?= $this->session->flashdata("update-password"); ?>';
            if(status_register == "Berhasil"){
                Swal.fire({
                        title: 'Berhasil Registrasi',
                        icon:'success',
                        text: 'Akun Anda Berhasil Dibuat',
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