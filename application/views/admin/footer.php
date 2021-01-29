<!-- #modal-dialog -->
<div class="modal fade" id="modal-edit-profil">
    <div class="modal-dialog">
        <div style="background-color: #000;color: #fff" class="modal-content">
            <div class="modal-header">
                <h4 style="color: #fff" class="modal-title">Edit Profil</h4>
                <a href="#" class="btn btn-danger btn-icon btn-circle btn-sm" data-dismiss="modal">
                    <i class="fa fa-times"></i> 
                </a>
            </div>
            <form  role="form"  enctype="multipart/form-data" id="form_perbarui_pengguna" class="margin-bottom-0">
                <div style="background-color: #fff"class="modal-body">
                    <div class="form-group m-b-15">
                        <label class="col-form-label">Nama Pengguna</label>
                        <div class="input-group m-b-10">
                            <input type="text" class="form-control" name="nama_pengguna" id="id_nama" placeholder="Nama Pengguna" value="<?php echo $this->session->userdata('nama'); ?>"/>
                            <input type="hidden" class="form-control" name="id_user" id="id_user" value="<?php echo $this->session->userdata('id_user'); ?>"/> 
                            <input type="hidden" class="form-control" name="foto" id="id_foto" value="<?php echo $this->session->userdata('foto'); ?>"/> 
                            <input type="hidden" class="form-control" name="url" id="id_foto" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>
                        </div>
                    </div>
                    <div class="form-group m-b-15">
                        <label class="col-form-label">Username</label>
                        <div class="input-group m-b-10">
                            <input type="text" class="form-control" name="username" id="id_username" placeholder="Username" value="<?php echo $this->session->userdata('username'); ?>" />
                        </div>
                    </div>
                    <div class="form-group m-b-15">
                        <label class="col-form-label">Password</label>
                        <div class="input-group m-b-10">
                            <input type="text" class="form-control" name="password" id="id_password" placeholder="Password" value="<?php echo $this->session->userdata('password'); ?>"/>
                        </div>
                    </div> 
                    <div class="form-group m-b-15">
                        <label class="col-form-label">Foto</label>
                        <div class="input-group m-b-10">
                            <input type="file" class="form-control" name="foto" placeholder="foto" />
                        </div>
                    </div>
                </div>
                <div style="background-color: #fff" class="modal-footer">
                    <button href="javascript:;" class="btn btn-warning" data-dismiss="modal">Batal</button>>
                    <button type="submit" class="btn btn-success">Update</button>>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- ================== BEGIN BASE JS ================== -->
<script src="<?php echo base_url(); ?>assets/plugins/jquery/jquery-3.3.1.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-sweetalert/sweetalert.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-validator/bootstrapValidator.js"></script>
<!--[if lt IE 9]>
        <script src="../assets/crossbrowserjs/html5shiv.js"></script>
        <script src="../assets/crossbrowserjs/respond.min.js"></script>
        <script src="../assets/crossbrowserjs/excanvas.min.js"></script>
<![endif]-->
<script src="<?php echo base_url(); ?>assets/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/js-cookie/js.cookie.js"></script>
<script src="<?php echo base_url(); ?>assets/js/theme/default.min.js"></script>
<script src="<?php echo base_url(); ?>assets/js/apps.min.js"></script>
<!-- ================== END BASE JS ================== -->

<!-- ================== BEGIN PAGE LEVEL JS ================== -->
<script src="<?php echo base_url(); ?>assets/plugins/sparkline/jquery.sparkline.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>assets/js/demo/dashboard.min.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/DataTables/media/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js"></script>
<!-- ================== END PAGE LEVEL JS ================== -->


<script>
    $(document).ready(function () {
        App.init();
        Dashboard.init();
    });
</script>

<script>
    $(document).ready(function () {
        $("#link_logout").click(function (event) {
            swal({
                title: "Peringatan Logout",
                text: "Anda yakin akan melakukan logout?",
                icon: "warning",
                buttons: {
                    cancel: "Batal",
                    confirm: "OK",
                },
                //dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    window.location = "<?php echo site_url('autentikasi/logout'); ?>";
                } else {
                    //                            swal("Your imaginary file is safe!");
                }
            });
        });

        $('#form_perbarui_pengguna').bootstrapValidator({
            // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later
            fields: {
                nama_pengguna: {

                    validators: {
                        notEmpty: {
                            message: 'Nama tidak boleh kosong'
                        },
                        regexp: {
                            regexp: /^[a-z\s]+$/i,
                            message: 'Nama harus berupa huruf'
                        }
                    }
                },
                username: {
                    validators: {
                        stringLength: {
                            min: 4,
                            message: 'Username minimal 4 karakter'
                        },
                        notEmpty: {
                            message: 'Username tidak boleh kosong'
                        },
                    }
                },
                password: {
                    validators: {
                        stringLength: {
                            min: 4,
                            message: 'Password minimal 4 karakter'
                        },
                        notEmpty: {
                            message: 'Password tidak boleh kosong'
                        }
                    }
                },
                foto: {
                    validators: {
                        file: {
                            extension: 'jpeg,jpg,png',
                            type: 'image/jpeg,image/png',
                            message: 'Ekstensi file yang diperbolehkan adalah .jpeg .jpg .png'
                        }
                    }
                },
            },
        });

        $("#form_perbarui_pengguna").on('success.form.bv', function (event) {
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url('autentikasi/update_pengguna'); ?>",
                data: new FormData(this),
                processData: false,
                contentType: false,
                success: function (result) {
                    if (result != 0) {
                        $('#modal-edit-profil').modal('hide');
                        $('#form_perbarui_pengguna').data('bootstrapValidator').resetForm();
                        $('#form_perbarui_pengguna').trigger("reset");
                        swal({
                            title: "Sukses",
                            text: "Berhasil perbarui profil",
                            icon: "success"
                        }).then(function () {
                            location.reload();
                        });
                    } else {
                        swal({
                            title: "Gagal",
                            text: "Gagal perbarui profil",
                            icon: "error"
                        })
                    }
                }
            })
        });
    })
</script>