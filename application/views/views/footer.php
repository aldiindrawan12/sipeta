            <!-- Footer -->
            <footer id="page-footer" class="bg-body-light">
                <div class="content py-3">
                    <div class="font-size-sm order-sm-1 py-1 text-center">
                        <a class="font-w600" href="http://if.itera.ac.id/" target="_blank">Teknik Informatika Institut Teknologi Sumatera</a> &copy; <span data-toggle="year-copy"></span>
                    </div>
                </div>
            </footer>
            <!-- END Footer -->
        </div>
        <!-- END Page Container -->
        <script src="<?= base_url('assets/admin4/assets/js/oneui.core.min.js')?>"></script>
        <script src="<?= base_url('assets/admin4/assets/js/oneui.app.min.js')?>"></script>
        <script src="<?= base_url('assets/admin4/assets/js/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>jQuery(function(){ One.helpers(['datepicker', 'colorpicker', 'maxlength', 'select2', 'masked-inputs', 'rangeslider']); });</script>

        <!-- datatables script -->
        <script src="<?= base_url('assets/admin4/assets/js/plugins/datatables/jquery.dataTables.min.js')?>"></script>
        <script src="<?= base_url('assets/admin4/assets/js/plugins/datatables/dataTables.bootstrap4.min.js')?>"></script>
        <script src="<?= base_url('assets/admin4/assets/js/plugins/datatables/buttons/dataTables.buttons.min.js')?>"></script>
        <script src="<?= base_url('assets/admin4/assets/js/plugins/datatables/buttons/buttons.print.min.js')?>"></script>
        <script src="<?= base_url('assets/admin4/assets/js/plugins/datatables/buttons/buttons.html5.min.js')?>"></script>
        <script src="<?= base_url('assets/admin4/assets/js/plugins/datatables/buttons/buttons.flash.min.js')?>"></script>
        <script src="<?= base_url('assets/admin4/assets/js/plugins/datatables/buttons/buttons.colVis.min.js')?>"></script>
        <script src="<?= base_url('assets/admin4/assets/js/pages/be_tables_datatables.min.js')?>"></script>

        <!-- script alert-alert -->
        <script>
            $(document).ready(function() {
                var insert_proposal = '<?= $this->session->flashdata('insert_proposal'); ?>';
                var update_dosen = '<?= $this->session->flashdata('update-dosen'); ?>';
                var update_max_dosen = '<?= $this->session->flashdata('update-max-dosen'); ?>';
                var status_redirect = '<?= $this->session->flashdata('status-redirect'); ?>';
                var status_ploting = '<?= $this->session->flashdata('status-ploting'); ?>';
                var status_kunci = '<?= $this->session->flashdata('status-kunci'); ?>';
                var close_periode = '<?= $this->session->flashdata('close-periode'); ?>';
                var update_periode = '<?= $this->session->flashdata('update-periode'); ?>';
                var insert_periode = '<?= $this->session->flashdata('insert-periode'); ?>';
                var validasi_periode = '<?= $this->session->flashdata('validasi-periode'); ?>';
                var insert_dosen = '<?= $this->session->flashdata('insert-dosen'); ?>';
                var delete_dosen = '<?= $this->session->flashdata('delete-dosen'); ?>';
                var login = '<?= $this->session->flashdata('status-login'); ?>';
                var acc = '<?= $this->session->flashdata('acc'); ?>';
                var acc_validasi = '<?= $this->session->flashdata('acc-validasi'); ?>';
                var insert_ta = '<?= $this->session->flashdata('insert-ta'); ?>';
                if(insert_ta == "Berhasil"){
                    Swal.fire({
                            title: "Berhasil Daftar",
                            icon: "success",
                            text: "Data Pendaftaran Tugas Akhir Anda Sudah Diajukan",
                            type: "success",
                            timer: 2000
                        });
                }
                if(status_ploting == "Selesai"){
                    Swal.fire({
                            title: "Selesai",
                            icon: "success",
                            text: "Proses Ploting Pembimbing Selesai",
                            type: "success",
                            timer: 2000
                        });
                }
                if(status_kunci == "Selesai"){
                    Swal.fire({
                            title: "Selesai",
                            icon: "success",
                            html: "Proses Kunci Data Selesai <br> Arsip Pedaftaran Dapat Dilihat Pada Menu Arsip Pendaftaran",
                            type: "success"
                        });
                }
                if(login == "Berhasil"){
                    Swal.fire({
                            title: "Berhasil Login",
                            icon: "success",
                            text: "Selamat Datang",
                            type: "success",
                            timer: 2000
                        });
                }
                if(acc == "Berhasil"){
                    Swal.fire({
                            title: "Berhasil",
                            icon: "success",
                            text: "Status Verifikasi Berhasil Diperbaharui",
                            type: "success",
                            timer: 2000
                        });
                }
                if(acc_validasi == "Berhasil"){
                    Swal.fire({
                            title: "Berhasil",
                            icon: "success",
                            text: "Status Validasi Berhasil Diperbaharui",
                            type: "success",
                            timer: 2000
                        });
                }
                if(status_redirect == "False"){
                    Swal.fire({
                            title: "Gagal",
                            icon: "error",
                            text: "Anda Tidak Diizinkan Mengakses Halaman Tersebut",
                            type: "error",
                            timer: 2000
                        });
                }
                if(insert_proposal == "Berhasil"){
                    Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        text: "Permintaan Sidang Proposal Anda Diajukan",
                        type: "success",
                        timer: 4500
                    });
                }
                if(update_dosen == "Berhasil"){
                    Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        text: "Data Dosen Berhasil Diperbaharui",
                        type: "success",
                        timer: 4500
                    });
                }
                if(update_max_dosen == "Berhasil"){
                    Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        text: "Data Maksimal Bimbingan Dosen Berhasil Diperbaharui",
                        type: "success",
                        timer: 4500
                    });
                }
                if(close_periode == "Berhasil"){
                    Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        text: "Pendaftaran Berhasil Ditutup",
                        type: "success",
                        timer: 4500
                    });
                }
                if(delete_dosen == "Berhasil"){
                    Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        text: "Data Dosen Berhasil di Hapus",
                        type: "success",
                        timer: 4500
                    });
                }
                if(update_periode == "Berhasil"){
                    Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        text: "Tanggal Pendaftaran Diperbaharui",
                        type: "success",
                        timer: 4500
                    });
                }
                if(validasi_periode == "Berhasil"){
                    Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        text: "Email Pemberitahuan Proses Verifikasi Berhasil Dikirim ke Calon Pembimbing",
                        type: "success",
                        timer: 4500
                    });
                }
                if(insert_periode == "Berhasil"){
                    Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        text: "Pendaftaran Tugas Akhir Dibuka",
                        type: "success",
                        timer: 4500
                    });
                }
                if(insert_dosen == "Berhasil"){
                    Swal.fire({
                        title: "Berhasil",
                        icon: "success",
                        text: "Data Dosen Berhasil di Tambah",
                        type: "success",
                        timer: 4500
                    });
                }
            });
        </script>
        <!-- end script alert -->

        <!-- cek password sebelum ubah password-->
        <script>
            function cekpassword(){
                now = $("#pass_now").val();
                passnew = $("#pass_new").val();
                renew = $("#pass_renew").val();
                if(passnew == renew){
                    if(now == "<?= $akun["akun_password"]?>"){
                        return true;
                    }else{
                        Swal.fire({
                            title: "Gagal",
                            icon: "error",
                            text: "Password Sekarang Yang Anda Masukkan Salah",
                            type: "error",
                            timer: 2000
                        });    
                        return false;
                    }
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
        <!-- end cek password sebelum ubah password-->

        <?php if($page == "Daftar Tugas Akhir"){?>
        <!-- script validasi file pendaftaran -->
        <script>
            function ceksize(id){
                var inputFile = document.getElementById(id);
                var size = inputFile.files[0].size;
                var pathFile = inputFile.value;
                var ekstensiOk = /(\.pdf)$/i;
                if(size > 1000000){
                    Swal.fire({
                        title: "Gagal",
                        icon: "error",
                        text: "Silakan Upload File Sesuai Ekstensi dan Ukuran Yang Diizinkan",
                        type: "error",
                        timer: 4500
                    });
                    inputFile.value = '';
                    return false;
                }
            }
            function cekextensionpdf(id){
                var inputFile = document.getElementById(id);
                var size = inputFile.files[0].size;
                var pathFile = inputFile.value;
                var ekstensiOk = /(\.pdf)$/i;
                if(!ekstensiOk.exec(pathFile) || size > 1000000){
                    Swal.fire({
                        title: "Gagal",
                        icon: "error",
                        text: "Silakan Upload File Sesuai Ekstensi dan Ukuran Yang Diizinkan",
                        type: "error",
                        timer: 4500
                    });
                    inputFile.value = '';
                    return false;
                }
            }
            function cekextensionzip(id){
                var inputFile = document.getElementById(id);
                var pathFile = inputFile.value;
                var ekstensiOk = /(\.zip)$/i;
                if(!ekstensiOk.exec(pathFile)){
                    Swal.fire({
                        title: "Gagal",
                        icon: "error",
                        text: "Silakan Upload File Sesuai Ekstensi dan Ukuran Yang Diizinkan",
                        type: "error",
                        timer: 4500
                    });
                    inputFile.value = '';
                    return false;
                }
            }
            function dispensasi(){
                if($("#ta_status").val()=="Dispensasi"){
                    document.getElementById("file_dispensasi").style.display = "block";
                }else{
                    document.getElementById("file_dispensasi").style.display = "none";
                }
            }
            function tim(){
                if($("#ta_tim").val()=="Tim"){
                    document.getElementById("nama-tim").style.display = "block";
                }else{
                    document.getElementById("nama-tim").style.display = "none";
                }
            }
            function validasiform(){
                dosen1 = $("#dosen1").val();
                dosen2 = $("#dosen2").val();
                if(dosen1==dosen2){
                    Swal.fire({
                        title: "Peringatan",
                        icon: "warning",
                        text: "Dosen Pembimbing 1 dan Dosen Pembimbing 2 Tidak Boleh Sama",
                        type: "warning",
                        timer: 4000
                    });
                    return false;
                }else{
                    return true;
                }
            }
        </script>
        <!-- end script validasi file pendaftaran -->
        <?php }?>

        <!-- datatables dosen -->
        <script>
            $(document).ready(function() {
                var table = null;
                table = $('#dosen-tabel').DataTable({
                    language: {
                        searchPlaceholder: 'Nama Dosen'
                    },
                    "processing": true,
                    "serverSide": true,
                    "ordering": true,
                    "order": [
                        [0, 'asc']
                    ],
                    "ajax": {
                        "url": "<?= base_url('index.php/Datatables/dosen_tabel') ?>",
                        "type": "POST",
                    },
                    "deferRender": true,
                    "aLengthMenu": [
                        [10, 30, 50, 100],
                        [10, 30, 50, 100]
                    ],
                    "columns": [
                        {
                            "data": "dosen_nip",
                            render: function(data, type, row) {
                                let html = "<small>"+row["no"]+"</small>";
                                return html;
                            }
                        },
                        {
                            "data": "dosen_nama",
                            "orderable": false,
                            className : "text-center",
                            render: function(data, type, row) {
                                let html = "<small>"+data+"</small>";
                                return html;
                            }
                        },
                        {
                            "data": "kk_nama",
                            "orderable": false,
                            className : "text-center",
                            render: function(data, type, row) {
                                let html = "<small>"+data+"</small>";
                                return html;
                            }
                        },
                        <?php if($page == "Dashboard Koordinator"){?>
                        {
                            "data": "dosen_max1",
                            "orderable": false,
                            className : "text-center",
                            render: function(data, type, row) {
                                let html = "";
                                if(row["dosen_ketersediaan"]=="Tersedia"){
                                    if(data=="0"){
                                        if(row["dosen_max2"]=="0"){
                                            html += "<a onclick='view_maks_pemb(`"+data+"`,`"+row["dosen_max2"]+"`,`"+row["dosen_nip"]+"`)' data-toggle='modal' data-target='#view-maks-pemb' class='btn btn-sm btn-outline-primary'><small>Maks. / Maks.</small>  <i class='far fa-edit'></i></a>";
                                        }else{
                                            html += "<a onclick='view_maks_pemb(`"+data+"`,`"+row["dosen_max2"]+"`,`"+row["dosen_nip"]+"`)' data-toggle='modal' data-target='#view-maks-pemb' class='btn btn-sm btn-outline-primary'><small>Maks. / "+row["dosen_max2"]+"</small>  <i class='far fa-edit'></i></a>";
                                        }
                                    }else{
                                        if(row["dosen_max2"]=="0"){
                                            html += "<a onclick='view_maks_pemb(`"+data+"`,`"+row["dosen_max2"]+"`,`"+row["dosen_nip"]+"`)' data-toggle='modal' data-target='#view-maks-pemb' class='btn btn-sm btn-outline-primary'><small>"+data+" / Maks.</small>  <i class='far fa-edit'></i></a>";
                                        }else{
                                            html += "<a onclick='view_maks_pemb(`"+data+"`,`"+row["dosen_max2"]+"`,`"+row["dosen_nip"]+"`)' data-toggle='modal' data-target='#view-maks-pemb' class='btn btn-sm btn-outline-primary'><small>"+data+" / "+row["dosen_max2"]+"</small>  <i class='far fa-edit'></i></a>";
                                        }
                                    }
                                }else{
                                    html += "-";
                                }
                                return html;
                            }
                        },
                        {
                            "data": "dosen_nip",
                            className: 'text-center',
                            "orderable": false,
                            render: function(data, type, row) {
                                let html =
                                "<div class='btn-group'>"+
                                "<button data-toggle='modal' data-target='#modal-view-dosen' onclick='viewdosen(`"+data+"`)' type='button' class='btn btn-sm btn-light bg-grey'>"+
                                "<i class='far fa-eye'></i>"+
                                "</button>";
                                html +=    "</div><div class='btn-group'>"+
                                "<button data-toggle='modal' data-target='#modal-update-dosen' onclick='updatedosen(`"+data+"`)' type='button' class='btn btn-sm btn-light bg-grey'>"+
                                "<i class='far fa-edit'></i>"+
                                "</button></div>";
                                if(data!="19930314 201903 1 018"){
                                            html += "<div class='btn-group'>"+
                                                "<a href='javascript:void(0)' onclick='deletedosen(`"+row["dosen_nama"]+"`,`"+data+"`)' class='btn btn-sm btn-light bg-grey'>"+
                                                    "<i class='far fa-trash-alt'></i>"+
                                                "</a>"+
                                            "</div>";
                                }
                                return html;
                                }
                            },
                        <?php }?>
                    ],
                });
            });
            function view_maks_pemb(now,now2,nip){
                $("#dosen_max1").val(now);
                $("#dosen_max2").val(now2);
                $("#dosen_nip_max").val(nip);
            }
        </script>
        <!-- end datatables dosen -->

         <!-- datatables dosen Luar-->
         <script>
            $(document).ready(function() {
                var table = null;
                table = $('#dosen-luar-tabel').DataTable({
                    language: {
                        searchPlaceholder: 'Nama Dosen'
                    },
                    "processing": true,
                    "serverSide": true,
                    "ordering": true,
                    "order": [
                        [0, 'asc']
                    ],
                    "ajax": {
                        "url": "<?= base_url('index.php/Datatables/dosen_luar_tabel') ?>",
                        "type": "POST",
                    },
                    "deferRender": true,
                    "aLengthMenu": [
                        [10, 30, 50, 100],
                        [10, 30, 50, 100]
                    ],
                    "columns": [
                        {
                            "data": "dosen_nip",
                            render: function(data, type, row) {
                                let html = "<small>"+data+"</small>";
                                return html;
                            }
                        },
                        {
                            "data": "dosen_nama",
                            "orderable": false,
                            className : "text-center",
                            render: function(data, type, row) {
                                let html = "<small>"+data+"</small>";
                                return html;
                            }
                        },
                        <?php if($page == "Dashboard Koordinator"){?>
                        {
                            "data": "dosen_nip",
                            className: 'text-center',
                            "orderable": false,
                            render: function(data, type, row) {
                                let html = "<div class='btn-group'>"+
                                                "<a href='javascript:void(0)' onclick='deletedosenluar(`"+row["dosen_nama"]+"`,`"+data+"`)' class='btn btn-sm btn-light bg-grey'>"+
                                                    "<i class='far fa-trash-alt'></i>"+
                                                "</a>"+
                                            "</div>";
                                            return html;
                            }
                        },
                        <?php }?>
                    ],
                });
            });
            function view_maks_pemb(now,now2,nip){
                $("#dosen_max1").val(now);
                $("#dosen_max2").val(now2);
                $("#dosen_nip_max").val(nip);
            }
        </script>
        <!-- end datatables dosen Luar-->

        <!-- <?php if($page == "Dashboard Koordinator"){?> -->
        <!-- set view dosen -->
        <script>
            function viewdosen(nip){
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url('index.php/Koordinator/ajaxdosen') ?>",
                    dataType: "JSON",
                    data: {
                        nip: nip
                    },
                    success: function(data) { //jika ambil data sukses
                        $("#dosen_nip_view").val(data["dosen_nip"]);
                        $("#dosen_nama_view").val(data["dosen_nama"]);
                        $("#dosen_telp_view").val(data["dosen_telp"]);
                        $("#akun_role_view").val(data["akun_role"]);
                        $("#kk_nama_view").val(data["kk_nama"]);
                        $("#akun_email_view").val(data["akun_email"]);
                        $("#dosen_ketersediaan_view").val(data["dosen_ketersediaan"]);
                    }
                });
            }
        </script>
        <!-- end set view dosen -->
        <!-- set update dosen -->
        <script>
            function updatedosen(nip){
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url('index.php/Koordinator/ajaxdosen') ?>",
                    dataType: "JSON",
                    data: {
                        nip: nip
                    },
                    success: function(data) { //jika ambil data sukses
                        $("#dosen_nip_asli").val(data["dosen_nip"]);
                        $("#dosen_nip_update").val(data["dosen_nip"]);
                        $("#dosen_nama_update").val(data["dosen_nama"]);
                        $("#dosen_telp_update").val(data["dosen_telp"]);
                        $("#kk_id_update").val(data["kk_id"]);
                        $("#akun_role_update").val(data["akun_role"]);
                        $("#akun_email_update").val(data["akun_email"]);
                        $("#dosen_ketersediaan_update").val(data["dosen_ketersediaan"]);
                    }
                });
            }
        </script>
        <!-- end set update dosen -->
        <!-- script confirm delete dosen -->
        <script>
            function deletedosen(a,nip){
                Swal.fire({
                    title: "Hapus Data Dosen "+a+"?",
                    showDenyButton: true,
                    confirmButtonText: "Ya",
                    denyButtonText: `Batal`
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        window.location.href = "<?= base_url("index.php/Koordinator/deletedosen/")?>"+nip
                    }
                });
            }
        </script>
        <!-- end script confirm delete dosen -->
        <!-- script confirm delete dosen luar -->
            <script>
            function deletedosenluar(a,nip){
                Swal.fire({
                    title: "Hapus Data Dosen "+a+"?",
                    showDenyButton: true,
                    confirmButtonText: "Ya",
                    denyButtonText: `Batal`
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        window.location.href = "<?= base_url("index.php/Koordinator/deletedosenluar/")?>"+nip
                    }
                });
            }
        </script>
        <!-- end script confirm delete dosen luar -->
        <!-- cek nip dan email -->
        <script>
            nip_data = [];
            email_data = [];
            <?php for($i=0;$i<count($nip);$i++){?>
                nip_data.push("<?= $nip[$i]?>");
            <?php }?>
            <?php for($i=0;$i<count($email);$i++){?>
                email_data.push("<?= $email[$i]?>");
            <?php }?>
            function ceknip(){
                nip = $("#dosen_nip").val();
                email = $("#akun_email").val();
                if(nip_data.includes(nip)){
                    Swal.fire({
                            title: "Gagal",
                            icon: "error",
                            text: "NIP Dosen Yang Anda Masukkan Sudah Terdaftar",
                            type: "error",
                            timer: 2000
                        });
                    return false;
                }else if(email_data.includes(email)){
                    Swal.fire({
                            title: "Gagal",
                            icon: "error",
                            text: "EMAIL Yang Anda Masukkan Sudah Terdaftar",
                            type: "error",
                            timer: 2000
                        });
                    return false;
                }else{
                    return true;
                }
            }
        </script>
        <!-- end cek nip dan email -->
        <?php }?>

        <?php if($page == "Data Pendaftaran Tugas Akhir"){?>
         <!-- datatables all pendaftar -->
         <script>
            $(document).ready(function() {
                var table = null;
                table = $('#daftar-tabel').DataTable({
                    language: {
                        searchPlaceholder: 'NIM Mahasiswa'
                    },
                    "processing": true,
                    "serverSide": true,
                    "ordering": true,
                    "order": [
                        [0, 'asc']
                    ],
                    "ajax": {
                        "url": "<?= base_url('index.php/Datatables/daftar_tabel') ?>",
                        "type": "POST",
                    },
                    "deferRender": true,
                    "aLengthMenu": [
                        [10, 30, 50, 100],
                        [10, 30, 50, 100]
                    ],
                    "columns": [
                        {
                            "data": "sipeta_ta.mhs_nim",
                            render: function(data, type, row) {
                                let html = "<small>"+row["sipeta_ta.mhs_nim"]+"</small>";
                                return html;
                            }
                        },
                        {
                            "data": "ta_judul",
                            "orderable": false,
                            render: function(data, type, row) {
                                let html = "<small>"+data+"</small>";
                                return html;
                            }
                        },
                        {
                            "data": "dosen1",
                            "orderable": false,
                            render: function(data, type, row) {
                                let html = "<small>"+data+"</small>";
                                return html;
                            }
                        },
                        {
                            "data": "dosen1_status",
                            "orderable": false,
                            className : "text-center",
                            render: function(data, type, row) {
                                let html = "";
                                if(data=="Diajukan"){
                                    html += "<small><i class='fa fa-question mr-1 text-warning'></i></small>";
                                }else if(data=="Ditolak"){
                                    html += "<small><i class='fa fa-times mr-1 text-danger'></i></small>";
                                }else{
                                    html += "<small><i class='fa fa-check mr-1 text-success'></i></small>";
                                }
                                return html;
                            }
                        },
                        {
                            "data": "dosen2",
                            "orderable": false,
                            render: function(data, type, row) {
                                let html = "<small>"+data+"</small>";
                                return html;
                            }
                        },
                        {
                            "data": "dosen2_status",
                            "orderable": false,
                            className : "text-center",
                            render: function(data, type, row) {
                                let html = "";
                                if(data=="Diajukan"){
                                    html += "<small><i class='fa fa-question mr-1 text-warning'></i></small>";
                                }else if(data=="Ditolak"){
                                    html += "<small><i class='fa fa-times mr-1 text-danger'></i></small>";
                                }else{
                                    html += "<small><i class='fa fa-check mr-1 text-success'></i></small>";
                                }
                                return html;
                            }
                        },
                        {
                            "data": "ta_id",
                            "orderable": false,
                            className : "text-center",
                            render: function(data, type, row) {
                                let html = "";
                                if(row["periode"]=="Validasi"){
                                    if(row["ta_progres"]=="Ditolak"){
                                        html = 
                                        "<a onclick='viewdaftar(`"+data+"`)' data-toggle='modal' data-target='#view-daftar' class='btn btn-sm btn-outline-primary btn-danger'><i class='fa fa-times text-danger'></i> <i class='far fa-eye text-light'></i></a>";
                                    }else{
                                        html = 
                                        "<a onclick='viewdaftar(`"+data+"`)' data-toggle='modal' data-target='#view-daftar' class='btn btn-sm btn-outline-primary btn-warning'><i class='fa fa-question text-warning'></i> <i class='far fa-eye text-light'></i></a>";
                                    }
                                }else{    
                                    html = 
                                    "<a onclick='viewdaftar(`"+data+"`)' data-toggle='modal' data-target='#view-daftar' class='btn btn-sm btn-outline-primary btn-primary'><i class='far fa-eye text-light'></i></a>";
                                }
                                return html;
                            }
                        },
                    ],
                });
            });
        </script>
        <!-- end datatables all pendaftar -->
        <!-- acc validasi -->
        <script>
            function validasi(id,status){
                Swal.fire({
                    icon: "question",
                    title: "Ubah Validasi",
                    text: status+" Validasi Tugas Akhir Ini?",
                    showDenyButton: true,
                    confirmButtonText: "Ya",
                    denyButtonText: `Batal`
                    }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        // ajax save catatan
                        $.ajax({
                            type: "GET",
                            url: "<?php echo base_url('index.php/TugasAkhir/catatan') ?>",
                            dataType: "text",
                            data: {
                                catatan: $("#ta_catatan").val(),
                                id: id
                            },
                            success: function(data) { //jika ambil data sukses
                                window.location.href = "<?= base_url("index.php/TugasAkhir/accvalidasi/")?>"+status+"?id="+id;
                            }
                        });
                    }
                });
            }
        </script>
        <!-- end acc validasi -->
        <!-- view pendaftar -->
        <script>
            function viewdaftar(id){
                document.getElementById("btn-acc").style.display = "none";
                <?php if($periode["periode_progress"]=="Validasi"){?>
                    document.getElementById("btn-validasi").style.display = "block";
                <?php }else{?>
                    document.getElementById("btn-validasi").style.display = "none";
                <?php }?>
                $("#verif_title").text("Validasi Koordinator");
                $("#btn-tolak").attr("onclick","validasi('"+id+"','TOLAK')");
                $("#btn-batal").attr("onclick","validasi('"+id+"','MEMBATALKAN')");
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url('index.php/TugasAkhir/ajaxdaftar') ?>",
                    dataType: "JSON",
                    data: {
                        ta_id: id
                    },
                    success: function(data) { //jika ambil data sukses
                        //tampil button sesuai status saat ini dan set onclick
                        if('<?= $periode["periode_progress"]?>' == 'Validasi'){
                            if(data["ta_progres"]=="Ditolak"){
                                document.getElementById("btn-tolak").style.display = "none";
                                document.getElementById("btn-batal").style.display = "block";
                            }else{
                                document.getElementById("btn-batal").style.display = "none";
                                document.getElementById("btn-tolak").style.display = "block";
                            }
                        }else{
                            document.getElementById("btn-tolak").style.display = "none";
                            document.getElementById("btn-batal").style.display = "none";
                        }
                        if(data["ta_progres"]=="Diajukan"){
                            $("#dosen_status").text(": Menunggu Validasi");
                        }else{
                            $("#dosen_status").text(": "+data["ta_progres"]);
                        }
                        $("#ta_catatan_view").text(data["ta_catatan"]);
                        // $("#ta_catatan").val(data["ta_catatan"]);
                        $("#ta_judul").text('"'+data["ta_judul"]+'"');
                        $("#mhs_nim").text(': '+data["mhs_nim"]);
                        $("#mhs_nama").text(': '+data["mhs_nama"]);
                        $("#ta_status_pengajuan").text(': '+data["ta_progres"]);
                        $("#ta_status").text(': '+data["ta_status"]);
                        $("#dosen1").text(': '+data["pembimbing1"]);
                        $("#dosen2").text(': '+data["pembimbing2"]);
                        $("#ta_asal").text(': '+data["ta_asal"]);
                        $("#ta_pkl").text(': '+data["ta_pkl"]);
                        $("#ta_tim").text(': '+data["ta_tim"]);
                        $("#ta_tim_nama").text(': '+data["ta_tim_nama"]);
                        $("#ta_kebaharuan").text(data["ta_kebaharuan"]);
                        $("#ta_pendukung").attr("href",data["ta_pendukung"]);
                        $("#ta_draft").attr("href","<?= base_url("index.php/Mahasiswa/openpdf?url=")?>"+data["ta_draft"]);
                        if(data["ta_status"]=="Dispensasi"){
                            $("#ta_dispensasi").attr("href","<?= base_url("index.php/Mahasiswa/openpdf?url=")?>"+data["ta_dispensasi"]);
                        }else{
                            $("#ta_dispensasi").removeAttr("href");
                        }
                    }
                });
            }
        </script>
        <!-- end view pendaftar -->
        <!-- download -->
        <script>
            function download(tipe){
                window.location.href = "<?= base_url("index.php/Download/")?>"+tipe;
            }
        </script>
        <!-- end download -->
        <!-- script confirm close periode -->
        <script>
            function confirm_close_periode(id){
                Swal.fire({
                    title: "Tutup Pendaftaran Tugas Akhir?",
                    showDenyButton: true,
                    confirmButtonText: "Ya",
                    denyButtonText: `Batal`
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = "<?= base_url("index.php/TugasAkhir/closeperiode/?periode_id=")?>"+id
                    }
                });
            }
        </script>
        <!-- end script confirm close periode -->   
        <!-- script confirm ploting -->
        <script>
            function verifikasi_ploting(id){
                Swal.fire({
                    title: "Proses Ploting Pembimbing",
                    text: "Yakin Akan Proses Ploting Pembimbing?",
                    icon: "question",
                    showDenyButton: true,
                    confirmButtonText: "Ya",
                    denyButtonText: `Batal`
                    }).then((result) => {
                    if (result.isConfirmed) {
                        One.loader('show');
                        setTimeout(function () {
                            One.loader('hide');
                        },100000)
                        window.location.href = "<?= base_url("index.php/TugasAkhir/ploting")?>"
                    }
                });
            }
        </script>
        <!-- end script confirm ploting -->   
        <!-- script confirm kunci data -->
        <script>
            function verifikasi_kunci(){
                Swal.fire({
                    title: "Yakin Ingin Kunci Data",
                    text: "Setelah Kunci Data. Data Dalam Sistem Tidak Dapat Diubah Lagi",
                    icon: "question",
                    showDenyButton: true,
                    confirmButtonText: "Ya",
                    denyButtonText: `Batal`
                    }).then((result) => {
                    if (result.isConfirmed) {
                        One.loader('show');
                        setTimeout(function () {
                            One.loader('hide');
                        },100000)
                        window.location.href = "<?= base_url("index.php/TugasAkhir/kunci")?>"
                    }
                });
            }
        </script>
        <!-- end script confirm kunci data -->   
         <!-- script confirm validasi -->
         <script>
            function verifikasi_verifikasi(){
                Swal.fire({
                    title: "Mulai Proses Verifikasi",
                    text: "Yakin Ingin Mulai Proses Verifikasi?",
                    icon: "question",
                    showDenyButton: true,
                    confirmButtonText: "Ya",
                    denyButtonText: `Batal`
                    }).then((result) => {
                    if (result.isConfirmed) {
                        One.loader('show');
                        setTimeout(function () {
                            One.loader('hide');
                        },100000)
                        window.location.href = "<?= base_url("index.php/TugasAkhir/validasiperiode")?>"
                    }
                });
            }
        </script>
        <!-- end script confirm validasi -->   
        <!-- script cek tanggal -->
        <script>
            function cek_tanggal_update(tipe){
                input_tgl_mulai = $("#periode_buka_update").val();
                input_tgl_tutup = $("#periode_tutup_update").val();
                tgl_mulai = new Date();
                tgl_mulai.setFullYear(input_tgl_mulai.split("-")[0],input_tgl_mulai.split("-")[1],input_tgl_mulai.split("-")[2]);
                tgl_tutup = new Date();
                tgl_tutup.setFullYear(input_tgl_tutup.split("-")[0],input_tgl_tutup.split("-")[1],input_tgl_tutup.split("-")[2]);
                // alert(tgl_mulai);
                if(tgl_mulai > tgl_tutup){
                    $("#"+tipe).val("");
                    Swal.fire({
                            title: "Peringatan",
                            icon: "warning",
                            text: "Tanggal Mulai Tidak Boleh Lebih Cepat Dari Tanggal Selesai",
                            type: "error",
                            timer: 5000
                        });
                }
            }
            function cek_tanggal(tipe){
                input_tgl_mulai = $("#periode_buka").val();
                input_tgl_tutup = $("#periode_tutup").val();
                tgl_mulai = new Date();
                tgl_mulai.setFullYear(input_tgl_mulai.split("-")[0],input_tgl_mulai.split("-")[1],input_tgl_mulai.split("-")[2]);
                tgl_tutup = new Date();
                tgl_tutup.setFullYear(input_tgl_tutup.split("-")[0],input_tgl_tutup.split("-")[1],input_tgl_tutup.split("-")[2]);
                // alert(tgl_mulai);
                if(tgl_mulai > tgl_tutup){
                    $("#"+tipe).val("");
                    Swal.fire({
                            title: "Peringatan",
                            icon: "warning",
                            text: "Tanggal Mulai Tidak Boleh Lebih Cepat Dari Tanggal Selesai",
                            type: "error",
                            timer: 5000
                        });
                }
            }
        </script>
        <!-- end script cek tanggal -->
        <?php }?>

        <?php if($page=="Data Pendaftaran Saya"){?>
        <!-- datatables pendaftar saya-->
        <script>
            $(document).ready(function() {
                var table = null;
                table = $('#daftar-saya-tabel').DataTable({
                    language: {
                        searchPlaceholder: 'NIM Mahasiswa'
                    },
                    "processing": true,
                    "serverSide": true,
                    "ordering": true,
                    "order": [
                        [0, 'asc']
                    ],
                    "ajax": {
                        "url": "<?= base_url('index.php/Datatables/daftar_tabel') ?>",
                        "type": "POST",
                        'data': function(data) {
                            data.dosen_nip = "<?= $akun["dosen_nip"]?>";
                            data.tipe = "<?= $tipe?>";
                        }

                    },
                    "deferRender": true,
                    "aLengthMenu": [
                        [50, 100],
                        [50, 100]
                    ],
                    "columns": [
                        {
                            "data": "sipeta_ta.mhs_nim",
                            "orderable": false,
                            render: function(data, type, row) {
                                let html = "<small>"+row["sipeta_ta.mhs_nim"]+"</small>";
                                return html;
                            }
                        },
                        {
                            "data": "ta_judul",
                            "orderable": false,
                            render: function(data, type, row) {
                                let html = "<small>"+data+"</small>";
                                return html;
                            }
                        },
                        {
                            "data": "dosen1",
                            "orderable": false,
                            render: function(data, type, row) {
                                let html = "<small>"+data+"</small>";
                                return html;
                            }
                        },
                        {
                            "data": "dosen2",
                            "orderable": false,
                            render: function(data, type, row) {
                                let html = "<small>"+data+"</small>";
                                return html;
                            }
                        },
                        {
                            "data": "ta_status",
                            "orderable": false,
                            className : "text-center",
                            render: function(data, type, row) {
                                let html = "";
                                if(data=="Dispensasi"){
                                    html += "<small class='text-danger'>"+data+"</small>";
                                }else{
                                    html += "<small>"+data+"</small>";
                                }
                                return html;
                            }
                        },
                        {
                            "data": "ta_tim",
                            "orderable": false,
                            className : "text-center",
                            render: function(data, type, row) {
                                let html = "";
                                if(data=="Tim"){
                                    html += "<small class='text-danger'>"+data+"/Capstone</small>";
                                }else{
                                    html += "<small>"+data+"</small>";
                                }
                                return html;
                            }
                        },
                        {
                            "data": "dosen"+<?= $tipe?>+"_status",
                            "orderable": false,
                            className : "text-center",
                            render: function(data, type, row) {
                                let html = "";
                                if(data=="Diajukan"){
                                    html += "<a onclick='viewdaftar(`"+row["ta_id"]+"`,"+<?= $tipe?>+")' data-toggle='modal' data-target='#view-daftar' class='btn btn-sm btn-outline-primary btn-warning'><small><i class='fa fa-question mr-1 text-light'></i></small><i class='far fa-eye text-light'></i></a>";;
                                }else if(data=="Diterima"){
                                    html += "<a onclick='viewdaftar(`"+row["ta_id"]+"`,"+<?= $tipe?>+")' data-toggle='modal' data-target='#view-daftar' class='btn btn-sm btn-outline-primary btn-success'><small><i class='fa fa-check mr-1 text-light'></i></small><i class='far fa-eye'></i></a>";
                                }else{
                                    html += "<a onclick='viewdaftar(`"+row["ta_id"]+"`,"+<?= $tipe?>+")' data-toggle='modal' data-target='#view-daftar' class='btn btn-sm btn-outline-primary btn-danger'><small><i class='fa fa-times mr-1 text-light'></i></small><i class='far fa-eye'></i></a>";
                                }
                                return html;
                            }
                        },
                    ],
                });
            });
        </script>
        <!-- end datatables pendaftar saya-->        
        <!-- acc bimbingan -->
        <script>
            function accbimbingan(id,tipe,status){
                cek = true;
                if(tipe==1 && status=="TERIMA"){
                    if('<?= $akun["dosen_kuota1"]?>' == 0){
                        cek=false;
                    }else{
                        cek=true;
                    }
                }else if(tipe==2 && status=="TERIMA"){
                    if('<?= $akun["dosen_kuota2"]?>' == 0){
                        cek=false;
                    }else{
                        cek=true;
                    }
                }
                if(cek == false){
                    Swal.fire({
                        title: "Peringatan",
                        icon: "error",
                        text: "Bimbingan Anda Sudah Penuh",
                        type: "error",
                        timer: 4500
                    });
                }else{
                        Swal.fire({
                            icon: "question",
                            title: "Ubah Verifikasi",
                            text: status+" Tugas Akhir Ini?",
                            showDenyButton: true,
                            confirmButtonText: "Ya",
                            denyButtonText: `Batal`
                            }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                $.ajax({
                                    type: "GET",
                                    url: "<?php echo base_url('index.php/TugasAkhir/catatan') ?>",
                                    dataType: "text",
                                    data: {
                                        catatan: $("#ta_catatan").val(),
                                        id: id
                                    },
                                    success: function(data) { //jika ambil data sukses
                                        window.location.href = "<?= base_url("index.php/TugasAkhir/accbimbingan/")?>"+tipe+"/"+status+"?ta_id="+id;
                                    }
                                });
                            }
                        });
                }
            }
        </script>
        <!-- end acc bimbingan -->
        <!-- view pendaftar -->
        <script>
            function viewdaftar(id,tipe){
                <?php if($periode["periode_progress"]=="Verifikasi"){?>
                    document.getElementById("btn-validasi").style.display = "block";
                <?php }else{?>
                    document.getElementById("btn-validasi").style.display = "none";
                <?php }?>
                $("#verif_title").text("Verifikasi Pembimbing "+tipe);
                $("#btn-acc").attr("onclick","accbimbingan('"+id+"',"+tipe+",'TERIMA')");
                $("#btn-tolak").attr("onclick","accbimbingan('"+id+"',"+tipe+",'TOLAK')");
                $("#btn-batal").attr("onclick","accbimbingan('"+id+"',"+tipe+",'MEMBATALKAN')");
                $.ajax({
                    type: "GET",
                    url: "<?php echo base_url('index.php/TugasAkhir/ajaxdaftar') ?>",
                    dataType: "JSON",
                    data: {
                        ta_id: id
                    },
                    success: function(data) { //jika ambil data sukses
                        //tampil button sesuai status saat ini dan set onclick
                        if('<?= $periode["periode_progress"]?>' == 'Verifikasi'){
                            if(data["dosen"+tipe+"_status"]=="Diterima"){
                                document.getElementById("btn-acc").style.display = "none";
                                document.getElementById("btn-batal").style.display = "block";
                                document.getElementById("btn-tolak").style.display = "block";
                            }else if(data["dosen"+tipe+"_status"]=="Ditolak"){
                                document.getElementById("btn-acc").style.display = "block";
                                document.getElementById("btn-batal").style.display = "block";
                                document.getElementById("btn-tolak").style.display = "none";
                            }else{
                                document.getElementById("btn-batal").style.display = "none";
                                document.getElementById("btn-acc").style.display = "block";
                                document.getElementById("btn-tolak").style.display = "block";
                            }
                        }else{
                            document.getElementById("btn-acc").style.display = "none";
                            document.getElementById("btn-batal").style.display = "none";
                            document.getElementById("btn-tolak").style.display = "none";
                        }
                        if(data["dosen"+tipe+"_status"]=="Diajukan"){
                            $("#dosen_status").text(": Menunggu Verifikasi");
                        }else{
                            $("#dosen_status").text(": "+data["dosen"+tipe+"_status"]);
                        }
                        $("#ta_catatan_view").text(data["ta_catatan"]);
                        $("#ta_catatan").val(data["ta_catatan"]);
                        $("#ta_judul").text('"'+data["ta_judul"]+'"');
                        $("#mhs_nim").text(': '+data["mhs_nim"]);
                        $("#mhs_nama").text(': '+data["mhs_nama"]);
                        $("#ta_status_pengajuan").text(': '+data["ta_progres"]);
                        $("#ta_status").text(': '+data["ta_status"]);
                        $("#dosen1").text(': '+data["pembimbing1"]);
                        $("#dosen2").text(': '+data["pembimbing2"]);
                        $("#ta_asal").text(': '+data["ta_asal"]);
                        $("#ta_pkl").text(': '+data["ta_pkl"]);
                        $("#ta_tim").text(': '+data["ta_tim"]);
                        $("#ta_tim_nama").text(': '+data["ta_tim_nama"]);
                        $("#ta_kebaharuan").text(data["ta_kebaharuan"]);
                        $("#ta_pendukung").attr("href",data["ta_pendukung"]);
                        $("#ta_draft").attr("href","<?= base_url("index.php/Mahasiswa/openpdf?url=")?>"+data["ta_draft"]);
                        if(data["ta_status"]=="Dispensasi"){
                            $("#ta_dispensasi").attr("href","<?= base_url("index.php/Mahasiswa/openpdf?url=")?>"+data["ta_dispensasi"]);
                        }else{
                            $("#ta_dispensasi").removeAttr("href");
                        }
                    }
                });
            }
        </script>
        <!-- end view pendaftar -->
        <?php }?>

        <?php if($page == "Arsip Pendaftaran Tugas Akhir"){?>
        <!-- datatables arsip Pendaftaran Ta -->
        <script>
            $(document).ready(function() {
                var table = null;
                table = $('#arsip-tabel').DataTable({
                    language: {
                        searchPlaceholder: 'Tahun/Semester'
                    },
                    "processing": true,
                    "serverSide": true,
                    "ordering": true,
                    "order": [
                        [0, 'asc']
                    ],
                    "ajax": {
                        "url": "<?= base_url('index.php/Datatables/arsip_tabel') ?>",
                        "type": "POST",
                    },
                    "deferRender": true,
                    "aLengthMenu": [
                        [10, 30, 50, 100],
                        [10, 30, 50, 100]
                    ],
                    "columns": [
                        {
                            "data": "periode_id",
                            render: function(data, type, row) {
                                let html = row["no"];
                                return html;
                            }
                        },
                        {
                            "data": "periode_id"
                        },
                        {
                            "data": "periode_tahun"
                        },
                        {
                            "data": "periode_semester",
                            "orderable": false
                        },
                        {
                            "data": "periode_buka",
                            "orderable": false
                        },
                        {
                            "data": "periode_tutup",
                            "orderable": false
                        },
                        {
                            "data": "periode_id",
                            className: 'text-center',
                            "orderable": false,
                            render: function(data, type, row) {
                                let html =
                                "<div class='btn-group'>"+
                                    "<button onclick='downloadarsip(`"+data+"`,``)' type='button' class='btn btn-light bg-grey'>"+
                                        "<i class='fa fa-file-download'></i>"+
                                    "</button>";
                                return html;
                            }
                        },
                        {
                            "data": "periode_id",
                            className: 'text-center',
                            "orderable": false,
                            render: function(data, type, row) {
                                let html = "";
                                if("<?= $akun_role?>"!="Mahasiswa"){
                                    html +=
                                    "<div class='btn-group'>"+
                                        "<button onclick='downloadarsip(`"+data+"`,`<?= $akun["user_id"]?>`)' type='button' class='btn btn-light bg-grey'>"+
                                            "<i class='fa fa-file-download'></i>"+
                                        "</button>";
                                }
                                return html;
                            }
                        },
                    ],
                });
            });
        </script>
        <script>
            function downloadarsip(data,nip){
                window.location.href = "<?= base_url("index.php/Download/daftar?periode=")?>"+data+"&nip="+nip;
            }
        </script>
        <!-- end datatables arsip Pendaftaran Ta -->
        <?php }?>
    </body>
</html>

