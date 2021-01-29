<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <?php $this->load->view("admin/header"); ?>
    <body>
        <!-- begin #page-loader -->
        <div id="page-loader" class="fade show"><span class="spinner"></span></div>
        <!-- end #page-loader -->

        <!-- begin #page-container -->
        <div id="page-container" class="page-container fade page-without-sidebar page-header-fixed page-with-top-menu">
            <!-- begin #header -->
            <div id="header" class="header navbar-default">
                <!-- begin navbar-header -->
                <div class="navbar-header">
                    <a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> <b>Waroeng</b> Group</a>
                </div>
                <!-- end navbar-header -->
                <?php $this->load->view("admin/navbar"); ?>
            </div>
            <!-- end #header -->

            <?php $this->load->view("admin/top_menu"); ?>

            <!-- begin #content -->
            <div id="content" class="content">
                <!-- begin breadcrumb -->

                <nav style="display: grid; padding-bottom: 10px; font-size: 12pt" aria-label="breadcrumb" >
                    <ol class="breadcrumb pull-left">
                        <li class="breadcrumb-item"><a href="javascript:;">WaroengGroup</a></li>
                        <li class="breadcrumb-item"><a href="javascript:;">Admin</a></li>
                        <li class="breadcrumb-item active">Data Pengguna</li>
                    </ol>
                </nav>
                <!-- end breadcrumb -->
                <!-- begin panel -->
                <div class="panel panel-inverse" data-sortable-id="index-10" >
                    <div class="panel-heading">
                        <div class="panel-heading-btn">
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                        </div>
                        <a href="#" class="btn btn-primary btn-icon btn-circle btn-sm" 
                           data-toggle="modal" data-target="#modal-tambah-pengguna">
                            <i class="fa fa-plus"></i> 
                        </a>
                    </div>
                    <div class="panel-body">
                        <div id="data-pengguna">

                        </div>
                    </div>
                </div>

                <!-- end panel -->
            </div>
            <!-- end #content -->

            <!-- #modal-dialog -->
            <div class="modal fade" id="modal-tambah-pengguna">
                <div class="modal-dialog">
                    <div style="background-color: #000;color: #fff" class="modal-content">
                        <div class="modal-header">
                            <h4 style="color: #fff" class="modal-title">Tambah Pengguna</h4>
                            <a href="#" class="btn btn-danger btn-icon btn-circle btn-sm" data-dismiss="modal">
                                <i class="fa fa-times"></i> 
                            </a>
                        </div>
                        <form  role="form" enctype="multipart/form-data" id="form_tambah_pengguna" class="margin-bottom-0">
                            <div style="background-color: #fff"class="modal-body">
                                <div class="form-group m-b-15">
                                    <label class="col-form-label">Nama Pengguna</label>
                                    <div class="input-group m-b-10">
                                        <input type="text" class="form-control" name="nama_pengguna" placeholder="Nama Pengguna" />
                                    </div>
                                </div>
                                <div class="form-group m-b-15">
                                    <label class="col-form-label">Username</label>
                                    <div class="input-group m-b-10">
                                        <input type="text" class="form-control" name="username" placeholder="Username" />
                                    </div>
                                </div>
                                <div class="form-group m-b-15">
                                    <label class="col-form-label">Password</label>
                                    <div class="input-group m-b-10">
                                        <input type="text" class="form-control" name="password" placeholder="Password" />
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
                                <button type="submit" class="btn btn-success">Simpan</button>>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- #modal-dialog -->
            <div class="modal fade" id="modal-edit-pengguna">
                <div class="modal-dialog">
                    <div style="background-color: #000;color: #fff" class="modal-content">
                        <div class="modal-header">
                            <h4 style="color: #fff" class="modal-title">Edit Pengguna</h4>
                            <a href="#" class="btn btn-danger btn-icon btn-circle btn-sm" data-dismiss="modal">
                                <i class="fa fa-times"></i> 
                            </a>
                        </div>
                        <form enctype="multipart/form-data" id="form_update_pengguna" class="margin-bottom-0">
                            <div style="background-color: #fff"class="modal-body">
                                <div class="form-group m-b-15">
                                    <label class="col-form-label">Nama Pengguna</label>
                                    <div class="input-group m-b-10">
                                        <input type="text" class="form-control" name="nama_pengguna" id="id_nama" placeholder="Nama Pengguna" />
                                        <input type="hidden" name="id_user" id="id_user"/> <input type="hidden" name="foto" id="id_foto"/> 
                                    </div>
                                </div>
                                <div class="form-group m-b-15">
                                    <label class="col-form-label">Username</label>
                                    <div class="input-group m-b-10">
                                        <input type="text" class="form-control" name="username" id="id_username" placeholder="Username" />
                                    </div>
                                </div>
                                <div class="form-group m-b-15">
                                    <label class="col-form-label">Password</label>
                                    <div class="input-group m-b-10">
                                        <input type="text" class="form-control" name="password" id="id_password" placeholder="Password" />
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


            <!-- begin scroll to top btn -->
            <a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
            <!-- end scroll to top btn -->
        </div>
        <!-- end page container -->

        <?php $this->load->view("admin/footer"); ?>
        <script>
            //Form Validation
            $(document).ready(function () {
                get_data();
                $('#form_tambah_pengguna').bootstrapValidator({
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
                                remote: {
                                    type: 'POST',
                                    message: 'Username tidak tersedia',
                                    url: '<?php echo site_url('admin/cek_username'); ?>',
                                    data: {
                                        type: 'username'
                                    }
                                }
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
                                notEmpty: {
                                    message: 'File foto tidak boleh kosong'
                                },
                                file: {
                                    extension: 'jpeg,jpg,png',
                                    type: 'image/jpeg,image/png',
                                    message: 'Ekstensi file yang diperbolehkan adalah .jpeg .jpg .png'
                                }
                            }
                        },
                    },
                })
            });

            //Form Validation
            $(document).ready(function () {
                $('#form_update_pengguna').bootstrapValidator({
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
                                remote: {
                                    type: 'POST',
                                    message: 'Username tidak tersedia',
                                    url: '<?php echo site_url('admin/cek_username'); ?>',
                                    data: {
                                        type: 'username'
                                    }
                                }
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
                })
            });
        </script>

        <script>
            $(document).ready(function () {
                // Untuk sunting
                $('#modal-edit-pengguna').on('show.bs.modal', function (event) {
                    var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                    var modal = $(this)

                    // Isi nilai pada field
                    modal.find('#id_user').attr("value", div.data('id_user'));
                    modal.find('#id_foto').attr("value", div.data('foto'));
                    modal.find('#id_nama').attr("value", div.data('nama'));
                    modal.find('#id_username').attr("value", div.data('username'));
                    modal.find('#id_password').attr("value", div.data('password'));


                });

                $('#modal-hapus-pengguna').on('show.bs.modal', function (event) {
                    var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
                    var modal = $(this)

                    // Isi nilai pada field
                    modal.find('#id_hapus_pengguna').attr("value", div.data('id_hapus_pengguna'));
                });

                $("#form_tambah_pengguna").on('success.form.bv', function (event) {
                    event.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo site_url('admin/tambah_pengguna'); ?>",
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        success: function (result) {
                            if (result != 0) {
                                $('#modal-tambah-pengguna').modal('hide');
                                $('#form_tambah_pengguna').data('bootstrapValidator').resetForm();
                                $('#form_tambah_pengguna').trigger("reset");
                                swal({
                                    title: "Sukses",
                                    text: "Berhasil tambah pengguna",
                                    icon: "success"
                                }).then(function () {
                                    get_data();
                                });
                            } else {
                                swal({
                                    title: "Gagal",
                                    text: "Gagal tambah pengguna",
                                    icon: "error"
                                })
                            }
                        }
                    })
                });

                $("#form_update_pengguna").on('success.form.bv', function (event) {
                    event.preventDefault();
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo site_url('admin/update_pengguna'); ?>",
                        data: new FormData(this),
                        processData: false,
                        contentType: false,
                        success: function (result) {
                            if (result != 0) {
                                $('#modal-edit-pengguna').modal('hide');
                                $('#form_update_pengguna').data('bootstrapValidator').resetForm();
                                $('#form_update_pengguna').trigger("reset");
                                swal({
                                    title: "Sukses",
                                    text: "Berhasil update pengguna",
                                    icon: "success"
                                }).then(function () {
                                    get_data();
                                });
                            } else {
                                swal({
                                    title: "Gagal",
                                    text: "Gagal update pengguna",
                                    icon: "error"
                                })
                            }
                        }
                    })
                });
            });
        </script>

        <script>
            function get_data() {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo site_url('admin/get_pengguna'); ?>",
                    beforeSend: function () {
                        $('#data-pengguna').html('<div class="d-flex justify-content-center"><div class="fa-3x"><i class="fas fa-spinner fa-pulse"></i></div></div>');
                    },
                    success: function (result) {
                        $('#data-pengguna').html(result);
                        $('#data-table-default').DataTable({
                            responsive: true
                        });
                    }
                });
            }

            function hapus_pengguna(id, foto) {
                swal({
                    title: "Peringatan Hapus",
                    text: "Apakah anda yakin menghapus data pengguna ini?",
                    icon: "warning",
                    buttons: {
                        cancel: "Batal",
                        confirm: "Hapus"
                    }
                    //dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        var data_hapus = {
                            'id_hapus_pengguna': id,
                            'foto_pengguna': foto,
                        };
                        $.ajax({
                            type: 'POST',
                            url: "<?php echo site_url('admin/hapus_pengguna'); ?>",
                            data: data_hapus,
                            success: function (result) {
                                if (result != 0) {
                                    // On success redirect.  
                                    swal({
                                        title: "Sukses",
                                        text: "Berhasil hapus pengguna",
                                        icon: "success"
                                    }).then(function () {
                                        get_data();
                                    });

                                } else
                                    swal({
                                        title: "Gagal!",
                                        text: "Gagal hapus penggunaa",
                                        icon: "error",
                                    })
                            }
                        })
                    } else {
                        //                            swal("Your imaginary file is safe!");
                    }
                });

            }

        </script>
    </body>
</html>
